<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BrandRepository;

class BrandController extends Controller
{
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    // Index - List all brands
    public function index()
    {
        $brands = $this->brandRepository->get();

        return response()->json($brands);
    }

    // Create - Store a newly created brand in the database
    public function store(Request $request)
    {
        $data = $request->all();

        $brand = $this->brandRepository->save($data);

        return response()->json(['message' => 'Brand created successfully', 'brand' => $brand]);
    }

    // Show - Display the specified brand
    public function show($id)
    {
        $brand = $this->brandRepository->findById($id);

        if ($brand) {
            return response()->json($brand);
        }

        return response()->json(['message' => 'Brand not found'], 404);
    }

    // Update - Update the specified brand in the database
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $brand = $this->brandRepository->save($data, ['id' => $id]);

        return response()->json(['message' => 'Brand updated successfully', 'brand' => $brand]);
    }

    // Destroy - Remove the specified brand from the database
    public function destroy($id)
    {
        $deleted = $this->brandRepository->deleteById($id);

        if ($deleted) {
            return response()->json(['message' => 'Brand deleted successfully']);
        }

        return response()->json(['message' => 'Brand not found'], 404);
    }
}

