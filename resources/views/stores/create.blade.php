<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New store</title>
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
    <h1>New store</h1>
    <a href="{{ route('logout') }}">Logout</a> |
    <a href="{{ route('stores.index') }}">All stores</a> |
    <a href="{{ route('wallets.show', $wallet)  }}">Wallet</a>
    <hr>
    <form action="{{ route('stores.store') }}" method="post" enctype="multipart/form-data">
        @csrf()

        <label for="name">Name</label>
        <input type="text" name="name" id="name">

        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone">

        <label for="about">About</label>
        <textarea name="about" id="about" cols="30" rows="10"></textarea>

        <input type="submit" value="Create">
    </form>
</body>
</html>
