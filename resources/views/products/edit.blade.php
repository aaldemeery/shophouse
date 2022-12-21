<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <?php if (!$errors->isEmpty()) { ?>
        <ul>
            <?php foreach ($errors->messages() as $key => $messages) { ?>
                <?php foreach ($messages as $message) { ?>
                    <li style="color: red"><?= $message ?></li>
                <?php } ?>
            <?php } ?>
        </ul>
    <?php } ?>
</head>
<body>
    <h1>Edit Product</h1>
    <a href="{{ route('logout') }}">Logout</a> |
    <a href="{{ route('stores.index') }}">All Stores</a> |
    <a href="{{ route('products.index', ['store' => $store->id])  }}">All Products</a>
    <hr>
    <form action="{{ route('products.update', ['store' => $store->id, 'product' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf()

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{$product['name']}}">

        <label for="categoy">Category</label>
        <select name="category_id" id="categories">
            <?php foreach ($categories as $category) {?>
                <option  value="<?php echo $category['id'];?>" ><?php echo $category['name'];?></option>
            <?php }?>
        </select>

        <label for="image">Add images</label>
        @foreach ($images as $image)
            <img src="{{ Storage::url($image->path)}}" alt="Product image" width="256" style="display: block; margin: 10px 0;">
        @endforeach
        <input type="file" name="images[]" id="image" multiple>

        <label for="price">Price</label>
        <input type="integer" name="price" id="price" value="{{ $product['price'] }}">

        <label for="quantity">Quantity</label>
        <input type="integer" name="quantity" id="quantity" value="{{ $product['quantity'] }}">

        <label for="about">About</label>
        <textarea name="about" id="about" cols="30" rows="10" v>{{ $product['about'] }}</textarea>

        <input type="submit" value="Update">
    </form>
</body>
</html>
