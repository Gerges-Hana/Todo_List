<?php

namespace App\Http\Controllers;

use App\Models\Todo_list;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index()
    {
        $tasks = Todo_list::orderBy('created_at', 'desc')->get();
        return view('index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
        ]);
        Todo_list::create(['title' => $request->title]);

        return redirect('/');
    }
    public function update(Request $request, Todo_list $task)
    {
        $request->validate([
            'title' => 'required|max:100',
        ]);

        $task->update([
            'title' => $request->input('title'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        Todo_list::findOrFail($id)->delete();


        return redirect('/');
    }
}
