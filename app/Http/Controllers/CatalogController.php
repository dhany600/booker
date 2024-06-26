<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\Category;
use App\Service\ActivityLogService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategoryId = $request->query('category');

        // Get the current user
        $user = Auth::user();

        // If a category is selected, filter books by category; otherwise, get all books
        if ($selectedCategoryId) {
            $books = Book::whereHas('categories', function ($query) use ($selectedCategoryId) {
                $query->where('categories.id', $selectedCategoryId);
            })->get();
        } else {
            $books = Book::all();
        }

        // Get the IDs of favorited books for the user
        $userFavorites = $user->favorites()->pluck('book_id')->toArray();

        return view('katalog.index', [
            'books' => $books,
            'categories' => $categories,
            'userFavorites' => $userFavorites,
        ]);
    }



    public function borrowBook(Request $request)
    {
        $userId = auth()->id(); // Assuming you have authentication
        $bookId = $request->input('book_id');

        $returnDate = Carbon::now()->addDays(14);

        $borrowedBook = new BorrowedBook();
        $borrowedBook->user_id = $userId;
        $borrowedBook->book_id = $bookId;
        $borrowedBook->reading_status = 'belum dibaca';
        $borrowedBook->returned_at = $returnDate;
        $borrowedBook->save();

        // Reduce the book_left count by 1
        $book = Book::find($bookId);
        if ($book) {
            $book->decrement('book_left'); // Reduce book_left by 1

            ActivityLogService::log('Meminjam buku ' . $book->nama_buku, $book, 'meminjam buku');
        }


        return response()->json(['message' => 'Book borrowed successfully'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
