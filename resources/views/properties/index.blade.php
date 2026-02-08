@section('content')
<div class=\"container\">
    <h1>Properties</h1>
    <a href=\"{{ route('properties.create') }}\" class=\"btn btn-primary\">Add New Property</a>
    
    <table class=\"table mt-3\">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse(\$properties as \$property)
            <tr>
                <td>{{ \$property->id }}</td>
                <td>{{ \$property->property_code }}</td>
                <td>{{ \$property->name }}</td>
                <td>{{ \$property->type }}</td>
                <td>Rp {{ number_format(\$property->price, 0, ',', '.') }}</td>
                <td>
                    <a href=\"{{ route('properties.show', \$property) }}\" class=\"btn btn-info btn-sm\">View</a>
                    <a href=\"{{ route('properties.edit', \$property) }}\" class=\"btn btn-warning btn-sm\">Edit</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan=\"6\">No properties found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection"