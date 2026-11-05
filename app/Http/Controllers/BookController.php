<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $books = Book::with('category')
            ->when($request->category_id, function ($query, $categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->orderBy('title')
            ->get();

        return view('books.index', compact('books', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        Book::create($data);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambah.');
    }

    public function show(Book $book)
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate($this->rules());

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diubah.');
    }

    public function destroy(Book $book)
    {
        Gate::authorize('delete', $book);

        if ($book->borrowingDetails()->exists()) {
            return redirect()->route('books.index')
                ->with('error', 'Buku tidak bisa dihapus karena sudah pernah dipinjam.');
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }

    private function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title'       => ['required', 'string', 'max:255'],
            'author'      => ['required', 'string', 'max:255'],
            'year'        => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'stock'       => ['required', 'integer', 'min:0'],
        ];
    }
}