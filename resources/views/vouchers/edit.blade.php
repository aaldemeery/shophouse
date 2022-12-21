<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Voucher</title>
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
    <h1>Edit Voucher</h1>
    <a href="{{ route('logout') }}">Logout</a> |
    <a href="{{ route('stores.index') }}">All Stores</a> |
    <a href="{{ route('vouchers.index', ['store' => $store->id])  }}">All vouchres</a> |
    <a href="{{ route('wallets.show', $wallet)  }}">Wallet</a>
    <hr>
    <form action="{{ route('vouchers.update', ["store" => $store, "voucher" => $voucher]) }}" method="post" enctype="multipart/form-data">
        @csrf()

        <label for="remaining">Remaining</label>
        <input type="integer" name="remaining" id="remaining" value="{{ $voucher->remaining }}">

        <input type="submit" value="Update">
    </form>
</body>
</html>
