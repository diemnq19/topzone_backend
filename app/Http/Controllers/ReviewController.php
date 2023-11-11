<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ReviewRepository;

class ReviewController extends Controller
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    // Index - List all reviews
    public function index()
    {
        $reviews = $this->reviewRepository->get();

        return response()->json($reviews);
    }

    // Create - Store a newly created review in the database
    public function store(Request $request)
    {
        $data = $request->all();

        $review = $this->reviewRepository->save($data);

        return response()->json(['message' => 'Review created successfully', 'review' => $review]);
    }

    // Show - Display the specified review
    public function show($id)
    {
        $review = $this->reviewRepository->findById($id);

        if ($review) {
            return response()->json($review);
        }

        return response()->json(['message' => 'Review not found'], 404);
    }

    // Update - Update the specified review in the database
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $review = $this->reviewRepository->save($data, ['id' => $id]);

        return response()->json(['message' => 'Review updated successfully', 'review' => $review]);
    }

    // Destroy - Remove the specified review from the database
    public function destroy($id)
    {
        $deleted = $this->reviewRepository->deleteById($id);

        if ($deleted) {
            return response()->json(['message' => 'Review deleted successfully']);
        }

        return response()->json(['message' => 'Review not found'], 404);
    }
}
