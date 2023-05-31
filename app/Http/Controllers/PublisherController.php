<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        return view('publishers', ['publishers' => Publisher::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
        ]);

        $publisher = new Publisher();
        $publisher->name = $validated['name'];
        $publisher->save();

        alert()->success('', "Publisher Saved");
        return to_route('publishers');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
        ]);

        $publisher = Publisher::findOrFail($id);
        $publisher->name = $validated['name'];
        $publisher->save();

        alert()->success('', "Publisher Changed");
        return to_route('publishers');
    }

    public function delete($id)
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        alert()->success('', "Publisher Deleted");
        return to_route('publishers');
    }
}
