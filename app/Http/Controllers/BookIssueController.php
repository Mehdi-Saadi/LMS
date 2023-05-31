<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use App\Models\BookIssue;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookIssueController extends Controller
{
    public function index()
    {
        return view('bookIssues', [
            'users' => Student::all(), // all available users
            'books' => Book::where('status', 1)->get(), // all available books
            'bookIssues' => BookIssue::all(),
        ]);
    }

    public function store(Request $request)
    {
        // get all users and books for validating
        $user_ids = Student::pluck('id');
        $book_ids = Book::pluck('id');

        $validated = $request->validate([
            'user_id' => [
                'required',
                Rule::in($user_ids)
            ],
            'book_id' => [
                'required',
                'array',
                Rule::in($book_ids),
            ],
        ]);

        $user = Student::findOrFail($validated['user_id']);
        $book = Book::findOrFail($validated['book_id'])->toArray();

        // user a loop for adding the records
        // because of several book selecting for a user
        foreach ($book as $item) {
            $bookIssue = new BookIssue();
            $bookIssue->student_name = $user->name;
            $bookIssue->book_name = $item['name'];
            $bookIssue->student_id = $user->id;
            $bookIssue->book_id = $item['id'];
            $bookIssue->save();

            // set the status 0 for each selected book
            $status = Book::findOrFail($item['id']);
            $status->status = 0;
            $status->save();
        }

        alert()->success('', "Book Issue Saved");
        return to_route('bookIssues');
    }

    public function details($id)
    {
        $bookIssue = BookIssue::findOrFail($id);
        $book = Book::findOrFail($bookIssue->book_id);
        $user = Student::findOrFail($bookIssue->student_id);

        return view('bookIssueDetails', [
            'bookIssue' => $bookIssue,
            'book' => $book,
            'user' => $user,
        ]);
    }

    public function delete($id)
    {
        $bookIssue = BookIssue::findOrFail($id);
        $book = Book::findOrFail($bookIssue->book_id);
        $book->status = 1;
        $book->save();
        $bookIssue->delete();

        alert()->success('', "Book Issue Deleted");
        return to_route('bookIssues');
    }
}
