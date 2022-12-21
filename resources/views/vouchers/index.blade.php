<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>Voucher</title>
    <style>
        .delete-btn {padding: 0 !important;display: inline !important;background: transparent !important;color: var(--links) !important;}
        .delete-btn:hover {text-decoration: underline;}
        .delete-form {display: inline !important;vertical-align: middle !important;}
    </style>
</head>
<body>
    <h1>vouchers</h1>
    <a href="{{ route('stores.index') }}">Stores</a> |
    <a href="{{  route('vouchers.create', ["store" => $store->id]) }}">Add voucher</a> |
    <a href="">Wallet</a> |
    <a href="">Logout</a>
    <hr>
    <table>
        <tr>
            <th>Id</th>
            <th>Percentage</th>
            <th>Remaining</th>
            <th>Code</th>
            <th>Actions</th>
        </tr>
        @foreach($vouchers as $voucher)
            <tr>
                <td>{{ $voucher->id }}</td>
                <td>%{{ $voucher->percentage }}</td>
                <td>{{ $voucher->remaining }}</td>
                <td>{{ $voucher->code }}</td>
                <td>
                    <a href="{{ route("vouchers.edit", ["store" => $store, "voucher" => $voucher]) }}">Edit</a>
                </td>
            </tr>

        @endforeach
    </table>

</body>
</html>
