<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProducteRequest;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Store $store)
    {

        $products = $store->products()->simplePaginate();

        return view("products/index", [
            "products" => $products,
            "store" => $store,
        ]);

    }

    public function create(Store $store)
    {
        $categories = Category::get();

        return view('products.create', [
            "store" => $store,
            "categories" => $categories,
        ]);
    }


    public function store(CreateProducteRequest $request, Store $store)
    {
        $product = $store->products()->create($request->validated());

        $images = $this->uploadImages($request->validated('images'));

        $product->images()->createMany($images);

        return to_route('products.index', ['store' => $store]);
    }

    private function uploadImages(array $images): array
    {
        $data = [];

        foreach ($images as $image) {
            $temp = [];
            $temp['path'] = $image->store('public');
            $data[] = $temp;
        }

        return $data;
    }
}
