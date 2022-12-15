
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit store</title>
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
    <h1>Edit store</h1>
    <a href="{{ route('logout') }}">Logout</a> |
    <a href="{{ route('stores.index') }}">All stores</a>
    <hr>
    <form action="{{ route('stores.update', ['store' => $store['id']]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf()

        <label for="name">Name</label>
        <input type="text" name="name" id="name"  value="{{ $store['name'] }}">

        <label for="image">Image</label>
        @if ($store->image != null)
            <img src="{{ Storage::url($store['image'])}}" alt="Store image" width="256" style="display: block; margin: 10px 0;">
        @endif
        <input type="file" name="image" id="image">

        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ $store['phone'] }}">

        <label for="about">About</label>
        <textarea name="about" id="about" cols="30" rows="10">{{ $store['about'] }}</textarea>

        <input type="submit" value="Update">
    </form>
</body>
</html>
