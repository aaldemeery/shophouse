<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <a href="{{ route('stores.index') }}">Stores</a> |
    <a href="{{ route('products.create', ['store' => $store->id]) }}">Add product</a> |
    <a href="{{ route('logout') }}">Logout</a>
    <hr>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>price</th>
            <th>quantity</th>
            <th>Actions</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ Str::limit($product->name) }}</td>
                <td>{{ $product->price }} $</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <a href="">Edit</a> |
                    <a href="">View</a> |
                    <a href="">Delete</a>
                </td>
            </tr>

        @endforeach
    </table>

</body>
</html>
