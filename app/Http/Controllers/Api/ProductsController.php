<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::with('user', 'user.role')->orderBy('created_at', 'DESC')->paginate(10);
        return response()->json([
            'success' => true,
            'results' => $product,
        ]);
    }

    public function show(Product $product)
    {
        $product = Product::with('user', 'user.role')->findOrFail($product->id);

        return response()->json([
            'success' => true,
            'results' => $product,
        ]);
    }
}
