<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use App\Repositories\ShoppingCartRepository;

class OrderController extends Controller
{
    protected $orderRepository;
    protected $shoppingCartRepository;

    public function __construct(OrderRepository $orderRepository, ShoppingCartRepository $shoppingCartRepository)
    {
        $this->shoppingCartRepository = $shoppingCartRepository;
        $this->orderRepository = $orderRepository;
    }

    // Index - List all orders
    public function index()
    {
        $orders = $this->orderRepository->get();

        return response()->json($orders);
    }

    // Create - Store a newly created order in the database
    public function store(Request $request)
    {
        $data = $request->all();
        $shoppingCartList = json_decode($data['shopping_cart_list']);
        $this->shoppingCartRepository->updateProgress($shoppingCartList);
        unset($data['shopping_cart_list']);

        $order = $this->orderRepository->save($data);
        return response()->json(['message' => 'Order created successfully', 'order' => $order]);
    }

    // Show - Display the specified order
    public function show($id)
    {
        $order = $this->orderRepository->findById($id);

        if ($order) {
            return response()->json($order);
        }

        return response()->json(['message' => 'Order not found'], 404);
    }

    // Update - Update the specified order in the database
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $order = $this->orderRepository->save($data, ['id' => $id]);

        return response()->json(['message' => 'Order updated successfully', 'order' => $order]);
    }

    // Destroy - Remove the specified order from the database
    public function destroy($id)
    {
        $deleted = $this->orderRepository->deleteById($id);

        if ($deleted) {
            return response()->json(['message' => 'Order deleted successfully']);
        }

        return response()->json(['message' => 'Order not found'], 404);
    }
}
