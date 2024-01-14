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
    public function index(Request $request)
    {
        $data = $request->all();
        $id = $data['user_id'];
        $order = $this->orderRepository->findByUserId($id);


        if ($order) {
            return response()->json(['order' => $order]);
        }

        return response()->json(['message' => 'Order not found'], 404);
    }

    // Create - Store a newly created order in the database
    public function store(Request $request)
    {
        $data = $request->all();
        $shoppingCartList = json_decode($data['shopping_carts']);
        $this->shoppingCartRepository->updateProgress($shoppingCartList);
        $data['shopping_carts'] = $this->shoppingCartRepository->findByIds($data['shopping_carts']);
        $order = $this->orderRepository->save($data);
        return response()->json(['message' => 'Order created successfully', 'order' => $order]);
    }

    // Show - Display the specified order
    public function show(Request $request)
    {

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
