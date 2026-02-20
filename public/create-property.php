<?php
session_start();

// Hardcode login (anggap sudah login)
$_SESSION['login'] = true;

// Koneksi database langsung
$host = '127.0.0.1';
$dbname = 'dahlan_project';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch(PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Proses simpan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $type = $_POST['type'] ?? '';
    $price = $_POST['price'] ?? 0;
    $city = $_POST['city'] ?? '';
    
    $sql = "INSERT INTO properties (title, type, price, city, user_id, property_code, created_at, updated_at) 
            VALUES (?, ?, ?, ?, 1, CONCAT('PROP-', UNIX_TIMESTAMP()), NOW(), NOW())";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $type, $price, $city]);
    
    echo "Sukses! <a href='/create-property.php'>Tambah lagi</a>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Properti (Final)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Properti</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tipe</label>
                <select name="type" class="form-control" required>
                    <option value="house">Rumah</option>
                    <option value="apartment">Apartemen</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Kota</label>
                <input type="text" name="city" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>