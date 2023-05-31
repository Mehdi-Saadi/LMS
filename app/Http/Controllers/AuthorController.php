<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        return view('authors', ['authors' => Author::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
        ]);

        $author = new Author();
        $author->name = $validated['name'];
        $author->save();

        alert()->success('', "Author Saved");
        return to_route('authors');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
        ]);

        $author = Author::findOrFail($id);
        $author->name = $validated['name'];
        $author->save();

        alert()->success('', "Author Changed");
        return to_route('authors');
    }

    public function delete($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        alert()->success('', "Author Deleted");
        return to_route('authors');
    }
}
