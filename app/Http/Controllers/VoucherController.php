<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Requests\CreateVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;

class VoucherController extends Controller
{
    public function index(Store $store)
    {
        $vouchers = $store->vouchers()->simplePaginate();

        return view("vouchers.index", [
            "store" => $store,
            "vouchers" => $vouchers,
        ]);
    }

    public function create(Store $store)
    {
        return view("vouchers.create", [
            "store" => $store
        ]);
    }

    public function store(CreateVoucherRequest $request, Store $store)
    {
        $voucher = $store->vouchers()->create($request->validated());

        return to_route("vouchers.index", [
        "store" => $store,
        ]);
    }

    public function destroy(Store $store, Voucher $voucher)
    {
        $voucher->delete();

        return to_route("vouchers.index", [
            "store" => $store,
        ]);
    }

    public function edit(Store $store, voucher $voucher)
    {

        return view('vouchers.edit', [
            "voucher" => $voucher,
            "store" => $store,
        ]);
    }

    public function update(UpdateVoucherRequest $request, Store $store, Voucher $voucher)
    {
        $voucher->update($request->validated());

        return to_route("vouchers.index", [
            "store" => $store,
            "voucher" => $voucher,
        ]);
    }

}
