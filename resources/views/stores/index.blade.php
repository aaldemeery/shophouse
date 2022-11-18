<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>stores</title>
</head>
<body>
    <h1>{{ $user->name }} stores</h1>
    <a href="{{ route('stores.create') }}">New Store</a> |
    <a href="{{ route('logout') }}">Logout</a>
    <hr>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Phone</th>
            <th>About</th>
            <th>Actions</th>
        </tr>
        @foreach ($stores as $store)
            <tr>
                <td>{{ $store['id'] }}</td>
                <td>{{ $store['name'] }}</td>
                <td><img src="{{ Storage::url($store['image']) }}" ></td>
                <td>{{ $store['phone'] }}</td>
                <td>{{ Str::limit($store['about'], 10) }}</td>
                <td>
                    <a href="{{ route('stores.edit', ['store' => $store]) }}">Edit</a> |
                    <a href="#">View </a> |
                    <form class="delete-form" action="{{route('stores.destroy', ['store' => $store['id']]) }}" method="POST">
                        @method('DELETE')
                        @csrf()
                        <input class="delete-btn" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $stores->links() }}
</body>
</html>
