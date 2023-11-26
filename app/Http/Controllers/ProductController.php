<?php

namespace App\Http\Controllers;

use App\Repositories\BrandRepository;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductController extends Controller
{
    protected $productRepository;
    protected $brandRepository;

    public function __construct(ProductRepository $productRepository, BrandRepository $brandRepository)
    {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
    }

    // Index - List all products
    public function index()
    {
        $products = $this->productRepository->get();

        return response()->json($products);
    }



    public function store(Request $request)
    {
        $uploadedFile = $request->file('image');
        $upload = Cloudinary::upload($uploadedFile->getRealPath());
        $data = $request->all();
        $data['image_url'] =  $upload->getSecurePath();

        $product = $this->productRepository->save($data);
        $brand = $this->brandRepository->findById($product->brand_id);

        return response()->json(['message' => 'Product created successfully', 'product' => $product, 'brand'=> $brand]);
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
