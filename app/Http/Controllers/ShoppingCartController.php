<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Repositories\ShoppingCartRepository;

class ShoppingCartController extends Controller
{
    protected $shoppingCartRepository;
    protected $productRepository;

    public function __construct(ShoppingCartRepository $shoppingCartRepository, ProductRepository $productRepository)
    {
        $this->shoppingCartRepository = $shoppingCartRepository;
        $this->productRepository = $productRepository;
    }

    // Index - List all items in the shopping cart
    public function index()
    {
        return response()->json(['message' => 'User Not Found'], 404);
    }

    // Create - Add a new item to the shopping cart
    public function store(Request $request)
    {
        $data = $request->all();
        $data['progress'] = false;
        $item = $this->shoppingCartRepository->save($data);
        $product = $this->productRepository->findById($data['product_id']);

        return response()->json(['message' => 'Item added to the shopping cart successfully', 'item' => $item, 'product'=>$product]);
    }

    // Show - Display the specified item in the shopping cart
    public function show($id)
    {
        $item = $this->shoppingCartRepository->findByUserId($id);

        if ($item) {
            return response()->json($item);
        }

        return response()->json(['message' => 'Item not found in the shopping cart'], 404);
    }

    // Update - Update the specified item in the shopping cart
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = $this->shoppingCartRepository->save($data, ['id' => $id]);

        return response()->json(['message' => 'Item in the shopping cart updated successfully', 'item' => $item]);
    }

    // Destroy - Remove the specified item from the shopping cart
    public function destroy($id)
    {
        $deleted = $this->shoppingCartRepository->deleteById($id);

        if ($deleted) {
            return response()->json(['message' => 'Item removed from the shopping cart successfully']);
        }

        return response()->json(['message' => 'Item not found in the shopping cart'], 404);
    }
}
