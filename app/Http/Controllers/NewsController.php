<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewsRepository;

class NewsController extends Controller
{
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    // Index - List all news
    public function index()
    {
        $news = $this->newsRepository->get();

        return response()->json($news);
    }

    // Create - Store a newly created news in the database
    public function store(Request $request)
    {
        $data = $request->all();

        $news = $this->newsRepository->save($data);

        return response()->json(['message' => 'News created successfully', 'news' => $news]);
    }

    // Show - Display the specified news
    public function show($id)
    {
        $news = $this->newsRepository->findById($id);

        if ($news) {
            return response()->json($news);
        }

        return response()->json(['message' => 'News not found'], 404);
    }

    // Update - Update the specified news in the database
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $news = $this->newsRepository->save($data, ['id' => $id]);

        return response()->json(['message' => 'News updated successfully', 'news' => $news]);
    }

    // Destroy - Remove the specified news from the database
    public function destroy($id)
    {
        $deleted = $this->newsRepository->deleteById($id);

        if ($deleted) {
            return response()->json(['message' => 'News deleted successfully']);
        }

        return response()->json(['message' => 'News not found'], 404);
    }
}
