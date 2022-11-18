<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'phone' => 'required|string|max:255',
            'about' => 'required|string'
        ]);

        $data['image'] = $data['image']->store('public');

        $user->stores()->create($data);

        return to_route('stores.index');
    }

    public function edit(Store $store)
    {
        return view('stores/edit', [
            'store' => $store
        ]);
    }

    public function update(Request $request, Store $store)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'phone' => 'required|string|max:255',
            'about' => 'required|string'
        ]);

        $data['image'] = $data['image']->store('public');

        $store->update($data);

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
