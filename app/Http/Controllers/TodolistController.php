<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index()
{
    $todolists = Todolist::all();
    return view('home', compact('todolists'));
}


    
    public function store(Request $request)
    {
        $data = $request -> validate([
            'content' => 'required'
        ]);

        TodoList::create($data);
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $todolist = TodoList::findOrFail($id);
        $todolist->update([
            'content' => $request->content,
        ]);

        return redirect()->route('index');
    }

    public function destroy($id)
{
    $todolist = Todolist::findOrFail($id);
    $todolist->delete();

    return redirect()->route('index')->with('success', 'Task deleted successfully!');
}

    
}
