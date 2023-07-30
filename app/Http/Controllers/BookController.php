<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);
        return response()->json([
            'data' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'isbn' => ['required'],
            'published_at' => ['required'],
            'copies' => ['required']
        ]);
        
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'published_at' => $request->published_at,
            'copies' => $request->copies
        ]);

        return response()->json([
            'data' => $book
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json([
            'data' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'isbn' => ['required'],
            'published_at' => ['required'],
            'copies' => ['required']
        ]);
        
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->published_at = $request->published_at;
        $book->copies = $request->copies;
        $book->save();

        return response()->json([
            'data' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'message' => 'book has been deleted'
        ], 204);
    }
}
