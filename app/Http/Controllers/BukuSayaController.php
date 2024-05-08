<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $userId = Auth::id(); // Get the ID of the currently logged-in user

        // Retrieve borrowed books for the logged-in user with their related book information
        $books = BorrowedBook::with('book')
            ->where('user_id', $userId)
            ->distinct('book_id')
            ->get();

        // return $books;

        return view('buku-saya.index', [
            'books' => $books,
        ]);
    }


    public function return(Request $request)
    {
        $userId = auth()->id();
        $bookId = $request->input('book_id');

        // Find the borrowed book for the user and book
        $borrowedBook = BorrowedBook::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->where('reading_status', 'belum dibaca') // Assuming you only want to update if the book hasn't been read yet
            ->first();

        if ($borrowedBook) {
            // Update the reading status to "dikembalikan"
            $borrowedBook->update(['reading_status' => 'dikembalikan']);

            // You may also increment the book_left count by 1
            $book = Book::find($bookId);
            if ($book) {
                $book->increment('book_left');
            }

            return response()->json(['message' => 'Book returned successfully'], 200);
        }

        return response()->json(['error' => 'Borrowed book not found'], 404);
    }

    public function handleReturn(Request $request)
    {
        $userId = auth()->id();
        $bookId = $request->input('book_id');

        // Find the borrowed book for the user and book
        $borrowedBook = BorrowedBook::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->where('reading_status', 'belum dibaca') // Assuming you only want to update if the book hasn't been read yet
            ->first();

        if ($borrowedBook) {
            // Update the reading status to "dikembalikan"
            $borrowedBook->update(['reading_status' => 'dikembalikan']);

            // You may also increment the book_left count by 1
            $book = Book::find($bookId);
            if ($book) {
                $book->increment('book_left');
            }

            return response()->json(['message' => 'Book returned successfully'], 200);
        }

        return response()->json(['error' => 'Borrowed book not found'], 404);
    }


    public function bukuFavorit()
    {
        $books = Book::all();
        return view('buku-saya.buku-favorit', [
            'books' => $books,
        ]);
    }

    public function riwayatPinjam()
    {
        $books = Book::all();
        return view('buku-saya.riwayat-pinjam', [
            'books' => $books,
        ]);
    }


    public function bacaBuku(Request $request)
    {
        $bookId = $request->query('book_id');

        // Find the book by its ID
        $book = Book::find($bookId);

        return view('baca-buku.index', [
            'book' => $book,
        ]);
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
