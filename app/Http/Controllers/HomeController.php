<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified'])->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategoryId = $request->query('category');

        // Initialize an empty array for user favorites
        $userFavorites = [];

        // Get the current user if authenticated
        if (auth()->check()) {
            $user = auth()->user();
            // Get the IDs of favorited books for the user
            $userFavorites = $user->favorites()->pluck('book_id')->toArray();
        }

        // If a category is selected, filter books by category; otherwise, get all books
        if ($selectedCategoryId) {
            $books = Book::whereHas('categories', function ($query) use ($selectedCategoryId) {
                $query->where('categories.id', $selectedCategoryId);
            })->get();
        } else {
            $books = Book::all();
        }

        return view('home', [
            'books' => $books,
            'categories' => $categories,
            'userFavorites' => $userFavorites,
        ]);
    }


    public function about()
    {
        $books = Book::all();
        return view('tentang-kami.index', [
            'books' => $books,
        ]);
    }
}
