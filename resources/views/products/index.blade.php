<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>Products</title>
    <style>
        .delete-btn {padding: 0 !important;display: inline !important;background: transparent !important;color: var(--links) !important;}
        .delete-btn:hover {text-decoration: underline;}
        .delete-form {display: inline !important;vertical-align: middle !important;}
    </style>
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
                    <a href="{{ route("products.edit", ["store" => $store, "product" => $product]) }}">Edit</a> |
                    <a href="{{ route("products.view", ["store" => $store, "product" => $product]) }}">View</a> |
                    <form onsubmit="return confirm('Are you sure?');" class="delete-form" action="{{route('products.destroy', ["store" => $store['id'],'product' => $product['id']]) }}" method="POST">
                        @method('DELETE')
                        @csrf()
                        <input class="delete-btn" type="submit" value="Delete">
                    </form>
                </td>
            </tr>

        @endforeach
    </table>

</body>
</html>
