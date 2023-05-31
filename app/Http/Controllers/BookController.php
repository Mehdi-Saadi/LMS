<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        return view('books', [
            'books' => Book::all(), // book_name, book_publisher, book_author, book_status, book category
            'publishers' => Publisher::all(), // all publishers
            'authors' => Author::all(), // all authors
            'categories' => Category::all(), // all categories
            ]);
    }

    public function store(Request $request)
    {
        // get all publishers, authors and categories for validating
        $publisher_names = Publisher::pluck('name');
        $author_names = Author::pluck('name');
        $category_names = Category::pluck('name');

        $validated = $request->validate([
            'name' => 'required|max:100',
            'publisher_name' => [
                'required',
                Rule::in($publisher_names)
            ],
            'author_name' => [
                'required',
                'array',
                Rule::in($author_names),
            ],
            'category_name' => [
                'required',
                'array',
                Rule::in($category_names),
            ],
        ]);

        $book = new Book();
        $book->name = $validated['name'];
        $book->publisher = $validated['publisher_name'];
        $book->author = implode(', ', $validated['author_name']);
        $book->category = implode(', ', $validated['category_name']);
        $book->save();

        alert()->success('', "Book Saved");
        return to_route('books');
    }

    public function details($id)
    {
        return view('bookDetails', [
            'book' => Book::findOrFail($id),
            'publishers' => Publisher::all(), // all publishers
            'authors' => Author::all(), // all authors
            'categories' => Category::all(), // all categories
            ]);
    }

    public function update(Request $request, $id)
    {
        // get all publishers, authors and categories for validating
        $publisher_names = Publisher::pluck('name');
        $author_names = Author::pluck('name');
        $category_names = Category::pluck('name');

        $validated = $request->validate([
            'name' => 'required|max:100',
            'publisher_name' => [
                'required',
                Rule::in($publisher_names)
            ],
            'author_name' => [
                'required',
                'array',
                Rule::in($author_names),
            ],
            'category_name' => [
                'required',
                'array',
                Rule::in($category_names),
            ],
        ]);

        $book = Book::findOrFail($id);
        $book->name = $validated['name'];
        $book->publisher = $validated['publisher_name'];
        $book->author = implode(', ', $validated['author_name']);
        $book->category = implode(', ', $validated['category_name']);
        $book->save();

        alert()->success('', "Book Changed");
        return to_route('books');
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        alert()->success('', "Book Deleted");
        return to_route('books');
    }
}
