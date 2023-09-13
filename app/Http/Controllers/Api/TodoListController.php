<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo_list;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index()
    {
        $tasks = Todo_list::all();
        return response()->json(['data' => $tasks]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
        ]);

        $task = Todo_list::create([
            'title' => $request->input('title'),
            'completed' => false, // By default, a new task is not completed.
        ]);

        return response()->json(['message' => 'Task created successfully', 'data' => $task], 201);
    }


    public function show($id)
    {
        $task = Todo_list::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json(['data' => $task]);
    }

    public function update(Request $request, $id)
    {
        $task = Todo_list::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $request->validate([
            'title' => 'required|max:100',
            'completed' => 'boolean',
        ]);

        $task->update([
            'title' => $request->input('title'),
            'completed' => $request->input('completed', false),
        ]);

        return response()->json(['message' => 'Task updated successfully', 'data' => $task]);
    }

    public function destroy($id)
    {
        $task = Todo_list::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
