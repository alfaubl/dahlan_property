<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

    
class DashboardController extends Controller
{
    /**
     * Display dashboard with all data (Optimized Version)
     */
    public function index()
    {
        try {
            // ============ OPTIMIZED QUERIES ============
            
            // 1. Data Produk dengan kategori (menggunakan JOIN lebih efisien)
            $products = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.category_id')
                ->select(
                    'products.*',
                    'categories.category_name',
                    DB::raw('(products.price * products.stock) as inventory_value')
                )
                ->orderByDesc('products.product_id')
                ->get();
            
            // 2. Data Kategori
            $categories = DB::table('categories')
                ->orderBy('category_id')
                ->get();
            
            // 3. Data Pelanggan
            $customers = DB::table('customers')
                ->orderByDesc('customer_id')
                ->limit(10) // Ambil 10 terbaru saja untuk dashboard
                ->get();
            
            // 4. Data Transaksi (7 hari terakhir)
            $transactions = DB::table('transactions')
                ->join('customers', 'transactions.customer_id', '=', 'customers.customer_id')
                ->select(
                    'transactions.*',
                    'customers.name as customer_name',
                    'customers.email as customer_email'
                )
                ->where('transactions.created_at', '>=', now()->subDays(7))
                ->orderByDesc('transaction_id')
                ->limit(10)
                ->get();
            
            // ============ AGGREGATE QUERIES ============
            
            // Inventory calculation (lebih efisien dalam 1 query)
            $inventory = DB::table('products')
                ->selectRaw('COUNT(*) as total_items')
                ->selectRaw('COALESCE(SUM(stock), 0) as total_stock')
                ->selectRaw('COALESCE(SUM(price * stock), 0) as total_value_raw')
                ->selectRaw('COALESCE(AVG(price), 0) as avg_price_raw')
                ->selectRaw('COALESCE(MAX(price), 0) as max_price')
                ->selectRaw('COALESCE(MIN(price), 0) as min_price')
                ->selectRaw('SUM(CASE WHEN stock < 10 THEN 1 ELSE 0 END) as low_stock_count')
                ->selectRaw('SUM(CASE WHEN stock = 0 THEN 1 ELSE 0 END) as out_of_stock_count')
                ->first();
            
            // Format di PHP (lebih fleksibel untuk localization)
            $inventory->total_value = number_format($inventory->total_value_raw, 0, ',', '.');
            $inventory->avg_price = number_format($inventory->avg_price_raw, 0, ',', '.');
            $inventory->max_price_formatted = number_format($inventory->max_price, 0, ',', '.');
            $inventory->min_price_formatted = number_format($inventory->min_price, 0, ',', '.');
            
            // ============ STATISTICS QUERIES ============
            
            // Total counts (lebih efisien dengan count() langsung)
            $total_categories = $categories->count();
            $total_products = $products->count();
            $total_customers = DB::table('customers')->count();
            $total_transactions = DB::table('transactions')->count();
            
            // Sales statistics (30 hari terakhir)
            $sales_stats = DB::table('transactions')
                ->selectRaw('COALESCE(SUM(total_amount), 0) as total_revenue')
                ->selectRaw('COUNT(*) as transaction_count')
                ->selectRaw('COALESCE(AVG(total_amount), 0) as avg_transaction')
                ->where('created_at', '>=', now()->subDays(30))
                ->where('status', 'completed')
                ->first();
            
            // Format revenue
            $sales_stats->total_revenue_formatted = number_format($sales_stats->total_revenue, 0, ',', '.');
            $sales_stats->avg_transaction_formatted = number_format($sales_stats->avg_transaction, 0, ',', '.');
            
            // ============ CHART DATA ============
            
            // Sales chart data (7 hari terakhir)
            $chart_data = DB::table('transactions')
                ->selectRaw('DATE(created_at) as date')
                ->selectRaw('COUNT(*) as count')
                ->selectRaw('COALESCE(SUM(total_amount), 0) as revenue')
                ->where('created_at', '>=', now()->subDays(7))
                ->where('status', 'completed')
                ->groupBy('date')
                ->orderBy('date')
                ->get()
                ->keyBy('date');
            
            // Category distribution
            $category_distribution = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.category_id')
                ->select(
                    'categories.category_name',
                    DB::raw('COUNT(products.product_id) as product_count'),
                    DB::raw('SUM(products.stock) as total_stock')
                )
                ->groupBy('categories.category_id', 'categories.category_name')
                ->orderByDesc('product_count')
                ->get();
            
            // ============ RECENT & LOW STOCK DATA ============
            
            // Recent products (5 terbaru)
            $recent_products = $products->take(5);
            
            // Low stock products (< 10)
            $low_stock_products = $products
                ->where('stock', '<', 10)
                ->where('stock', '>', 0)
                ->take(5);
            
            // Out of stock products
            $out_of_stock_products = $products
                ->where('stock', '=', 0)
                ->take(5);
            
            // Best selling products (berdasarkan transaksi)
            $best_selling = DB::table('transaction_items')
                ->join('products', 'transaction_items.product_id', '=', 'products.product_id')
                ->select(
                    'products.product_name',
                    DB::raw('SUM(transaction_items.quantity) as total_sold'),
                    DB::raw('SUM(transaction_items.quantity * transaction_items.price) as total_revenue')
                )
                ->groupBy('products.product_id', 'products.product_name')
                ->orderByDesc('total_sold')
                ->limit(5)
                ->get();
            
            // ============ PERFORMANCE METRICS ============
            
            // Inventory turnover ratio (perkiraan)
            $inventory_turnover = $inventory->total_value_raw > 0 
                ? round($sales_stats->total_revenue / $inventory->total_value_raw, 2)
                : 0;
            
            // Stock cover (berapa hari stok bertahan)
            $average_daily_sales = $sales_stats->total_revenue > 0 
                ? $sales_stats->total_revenue / 30 
                : 0;
            $stock_cover_days = $average_daily_sales > 0 
                ? round($inventory->total_value_raw / $average_daily_sales, 1)
                : 'N/A';
            
            // ============ KIRIM KE VIEW ============
            return view('dashboard', [
                // Data utama
                'products' => $products,
                'categories' => $categories,
                'customers' => $customers,
                'transactions' => $transactions,
                
                // Statistik
                'total_categories' => $total_categories,
                'total_products' => $total_products,
                'total_customers' => $total_customers,
                'total_transactions' => $total_transactions,
                
                // Inventori
                'inventory' => $inventory,
                
                // Penjualan
                'sales_stats' => $sales_stats,
                
                // Data spesifik
                'recent_products' => $recent_products,
                'low_stock_products' => $low_stock_products,
                'out_of_stock_products' => $out_of_stock_products,
                'best_selling' => $best_selling,
                'category_distribution' => $category_distribution,
                
                // Chart data
                'chart_data' => $chart_data,
                
                // Performance metrics
                'inventory_turnover' => $inventory_turnover,
                'stock_cover_days' => $stock_cover_days,
                
                // System info
                'server_time' => now()->format('d M Y H:i:s'),
                'memory_usage' => round(memory_get_usage() / 1024 / 1024, 2) . ' MB',
                'execution_time' => round((microtime(true) - LARAVEL_START) * 1000, 2) . ' ms',
            ]);
            
        } catch (\Exception $e) {
            // Log error dengan konteks lengkap
            Log::error('DashboardController@index Error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id() ?? 'guest',
                'ip' => request()->ip(),
            ]);
            
            // Kirim ke view dengan data minimal
            return view('dashboard', [
                'error' => 'Terjadi kesalahan sistem. Silakan coba lagi nanti.',
                'error_details' => config('app.debug') ? $e->getMessage() : null,
                'products' => collect(),
                'categories' => collect(),
                'customers' => collect(),
                'transactions' => collect(),
                'total_categories' => 0,
                'total_products' => 0,
                'total_customers' => 0,
                'total_transactions' => 0,
                'inventory' => (object)[
                    'total_items' => 0,
                    'total_stock' => 0,
                    'total_value' => '0',
                    'avg_price' => '0',
                    'max_price_formatted' => '0',
                    'min_price_formatted' => '0',
                    'low_stock_count' => 0,
                    'out_of_stock_count' => 0,
                ],
            ]);
        }
    }
    
    /**
     * Get dashboard statistics via AJAX (for real-time updates)
     */
    public function getStats(Request $request)
    {
        try {
            $stats = [
                'products' => DB::table('products')->count(),
                'customers' => DB::table('customers')->count(),
                'transactions_today' => DB::table('transactions')
                    ->whereDate('created_at', today())
                    ->count(),
                'revenue_today' => DB::table('transactions')
                    ->whereDate('created_at', today())
                    ->where('status', 'completed')
                    ->sum('total_amount') ?? 0,
                'low_stock_count' => DB::table('products')
                    ->where('stock', '<', 10)
                    ->where('stock', '>', 0)
                    ->count(),
                'out_of_stock_count' => DB::table('products')
                    ->where('stock', 0)
                    ->count(),
                'server_time' => now()->format('H:i:s'),
            ];
            
            // Format numbers
            $stats['revenue_today_formatted'] = number_format($stats['revenue_today'], 0, ',', '.');
            
            return response()->json([
                'success' => true,
                'data' => $stats,
                'timestamp' => now()->toISOString(),
            ]);
            
        } catch (\Exception $e) {
            Log::error('Dashboard stats error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to load statistics',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }
    
    /**
     * Export dashboard data
     */
    public function export(Request $request, $type = 'pdf')
    {
        // Query data untuk export
        $data = [
            'products' => DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.category_id')
                ->select('products.*', 'categories.category_name')
                ->get(),
            'export_date' => now()->format('d F Y H:i:s'),
            'generated_by' => Auth::user()->name ?? 'System',
        ];
        
        if ($type === 'pdf') {
            // Return PDF view
            return view('exports.dashboard-pdf', $data);
            // Atau gunakan library seperti DomPDF, SnappyPDF
        } elseif ($type === 'excel') {
            // Return Excel
            // Gunakan Maatwebsite/Laravel-Excel atau similar
            return response()->download('path/to/excel/file');
        } else {
            // Return JSON
            return response()->json($data);
        }
    }
    
    /**
     * Clear cache and refresh dashboard
     */
    
}