<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'year'        => 'required|integer|min:1900|max:' . date('Y'),
            'stock'       => 'required|integer|min:0',
        ]);
        Book::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambah.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'year'        => 'required|integer|min:1900|max:' . date('Y'),
            'stock'       => 'required|integer|min:0',
        ]);
        $book->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diubah.');
    }

    public function destroy(Book $book)
    {
        if ($book->borrowingDetails()->count() > 0) {
            return redirect()->route('books.index')
                ->with('error', 'Buku tidak bisa dihapus karena sudah pernah dipinjam.');
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}