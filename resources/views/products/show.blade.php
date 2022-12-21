<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>Show product</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>
    <a href="{{ route('logout') }}">Logout</a> |
    <a href="{{ route('stores.index') }}">All Stores</a> |
    <a href="{{ route('products.index', ['store' => $store->id])  }}">All Products</a> |
    <a href="{{ route('wallets.show', $wallet)  }}">Wallet</a>
    <hr>
    @foreach($images as $image)
    <img src="{{ Storage::url($image->path) }}" alt="Product image" width="256" style="margin: 3px;">
    @endforeach
    <h2>Price : {{ $product->price }}</h2>
    <h2>Ctegory : {{ $product->category->name }}</h2>
    @if($product->quantity <= 5 )
        <p style="color : orange">Only {{ $product->quantity }} left in store </p>
    @endif
    <h2>About : </h2>
    <p>{{ $product->about }}</p>
</body>
</html>
