<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users', ['users' => Student::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'address' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/(09)[0-9]{9}/|size:11',
            'gender' => 'required|in:male,female',
        ]);

        $user = new Student();
        $user->name = $validated['name'];
        $user->address = $validated['address'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->gender = $validated['gender'];
        $user->save();

        alert()->success('', "User Saved");
        return to_route('users');
    }

    public function details($id)
    {
        return view('userDetails', [
            'user' => Student::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'address' => 'required|min:10|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/(09)[0-9]{9}/|size:11',
            'gender' => 'required|in:male,female',
        ]);

        $user = Student::findOrFail($id);
        $user->name = $validated['name'];
        $user->address = $validated['address'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->gender = $validated['gender'];
        $user->save();

        alert()->success('', "User Changed");
        return to_route('users');
    }

    public function delete($id)
    {
        $user = Student::findOrFail($id);
        $user->delete();

        alert()->success('', "User Deleted");
        return to_route('users');
    }
}
