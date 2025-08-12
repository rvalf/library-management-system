<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('categories')->get();
        return view('librarian.book.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('librarian.book.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
            'authors' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'category' => 'required|array',
            'category.*' => 'exists:categories,id',
        ]);

        $book = Book::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'authors' => $validated['authors'],
            'isbn' => $validated['isbn'],
        ]);

        $book->categories()->sync($validated['category']);

        return redirect()->route('libr.books.index')
            ->with('success', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = Book::with('categories')->findOrFail($id);
        $categories = Category::all();
        return view('librarian.book.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
            'authors' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'category' => 'required|array',
        ]);

        $book->update($request->only(['title', 'description', 'authors', 'isbn']));

        if ($request->has('category')) {
            $book->categories()->sync($request->category);
        } else {
            $book->categories()->detach();
        }

        return redirect()->route('libr.books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('libr.books.index')->with('success', 'Book deleted successfully.');
    }
}
