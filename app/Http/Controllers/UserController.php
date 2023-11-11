<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->get();

        return response()->json($users);
    }

    // Create - Store a newly created user in the database
    public function store(Request $request)
    {
        $data = $request->all();

        $user = $this->userRepository->save($data);

        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }

    // Show - Display the specified user
    public function show($id)
    {
        $user = $this->userRepository->findById($id);

        if ($user) {
            return response()->json($user);
        }

        return response()->json(['message' => 'User not found'], 404);
    }

    // Update - Update the specified user in the database
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $user = $this->userRepository->save($data, ['id' => $id]);

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    // Destroy - Remove the specified user from the database
    public function destroy($id)
    {
        $deleted = $this->userRepository->deleteById($id);

        if ($deleted) {
            return response()->json(['message' => 'User deleted successfully']);
        }

        return response()->json(['message' => 'User not found'], 404);
    }

    public function user()
    {
        $user = auth()->user();
        return response()->json(['user' => $user]);
    }
}
