<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
    <h1>Add Voucher</h1>
    <a href="{{ route('logout') }}">Logout</a> |
    <a href="{{ route('stores.index') }}">All Stores</a> |
    <a href="{{ route('products.index', ['store' => $store->id])  }}">All Products</a> |
    <a href="{{ route('wallets.show', $wallet)  }}">Wallet</a>
    <hr>
    <form action="{{ route('vouchers.store', ["store" => $store]) }}" method="post" enctype="multipart/form-data">
        @csrf()

        <label for="percentage">Percentage</label>
        <input type="number" min="0" max="100" name="percentage"/>

        <label for="remaining">Remaining</label>
        <input type="integer" name="remaining" id="remaining">

        <label for="code">Code</label>
        <input type="integer" name="code" id="code">

        <input type="submit" value="Create">
    </form>
</body>
</html>
