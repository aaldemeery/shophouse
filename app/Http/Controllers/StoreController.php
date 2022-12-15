<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\UpdateStoreRequest;

class StoreController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stores = $user->stores()->simplePaginate();

        return view('stores/index', [
            'stores' => $stores,
            'user' => $user,
        ]);
    }

    public function create()
    {
        return view('stores/create');
    }

    public function store(CreateStoreRequest $request)
    {
        Auth::user()
            ->stores()
            ->create(
                $request->validated()
            );

        return to_route('stores.index');
    }

    public function edit(Store $store)
    {
        return view('stores/edit', [
            'store' => $store
        ]);
    }

    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->validated());

        return to_route('stores.index', [
            'store' => $store
        ]);
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return to_route('stores.index');
    }
}
