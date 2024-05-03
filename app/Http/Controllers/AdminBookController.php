<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $book = Book::query();
            return DataTables::of($book)
            ->addColumn('actions', function ($book) {
                return '<a href="' . route('admin.book.show', $book->id) . '" class="btn btn-sm btn-info">Show Details</a>';
            })
            ->addColumn('favorites', function ($book) {
                $formattedPrice = 0;
                return $formattedPrice;
            })
            ->rawColumns(['actions']) // Declare the 'actions' column as raw HTML
            ->make(true);
        };
        return view('admin.books.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_buku' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'pengarang' => 'required|string|max:255',
            'book_quantity' => 'required|string|min:1',
            'category_id' => 'required',
            'gambar_buku' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
            'pdf_buku' => 'required|mimes:pdf|max:20480', // Adjust max file size as needed
        ]);

        // If validation passes, this code will execute
        // Handle file uploads for 'gambar_buku' and 'pdf_buku'
        $gambarBukuPath = $request->file('gambar_buku')->store('gambar_buku');
        // dd($gambarBukuPath);
        $pdfBukuPath = $request->file('pdf_buku')->store('pdf_buku');

        // Create a new book entry with the validated data and uploaded file paths
        $book = new Book([
            'nama_buku' => $validatedData['nama_buku'],
            'synopsis' => $validatedData['synopsis'],
            'pengarang' => $validatedData['pengarang'],
            'book_left' => $validatedData['book_quantity'],
            'book_quantity' => $validatedData['book_quantity'],
            'category_id' => $validatedData['category_id'],
            'gambar_buku' => $gambarBukuPath,
            'pdf_buku' => $pdfBukuPath,
        ]);
        $book->save();

        // Redirect the user with a success message
        return redirect('admin-dashboard/book/')->with('success', 'New post has been added');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = Book::where('id', $id)->firstOrFail();
        return view('admin.books.show', [
            'books' => $books,
        ]);
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
