<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        alert()->success('', "You're logged in");
        return view('index', [
            'authors' => Author::all()->count(),
            'publishers' => Publisher::all()->count(),
            'categories' => Category::all()->count(),
            'books' => Book::all()->count(),
            'users' => Student::all()->count(),
            'bookIssues' => BookIssue::all()->count(),
        ]);
    }
}
