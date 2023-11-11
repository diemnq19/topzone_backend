<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    // Index - List all products
    public function index()
    {
        $products = $this->productRepository->get();

        return response()->json($products);
    }

    // Create - Store a newly created product in the database
    public function store(Request $request)
    {
        $data = $request->all();

        $product = $this->productRepository->save($data);

        return response()->json(['message' => 'Product created successfully', 'product' => $product]);
    }

    // Show - Display the specified product
    public function show($id)
    {
        $product = $this->productRepository->findById($id);

        if ($product) {
            return response()->json($product);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }

    // Update - Update the specified product in the database
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $product = $this->productRepository->save($data, ['id' => $id]);

        return response()->json(['message' => 'Product updated successfully', 'product' => $product]);
    }

    // Destroy - Remove the specified product from the database
    public function destroy($id)
    {
        $deleted = $this->productRepository->deleteById($id);

        if ($deleted) {
            return response()->json(['message' => 'Product deleted successfully']);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }
}
