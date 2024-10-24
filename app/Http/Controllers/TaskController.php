<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Get all tasks with filtering and pagination
    public function index(Request $request)
    {
        $query = Task::query();

        // Optional filtering by status or due_date
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }
        if ($request->has('due_date')) {
            $query->whereDate('due_date', '=', $request->input('due_date'));
        }

        // Pagination
        return response()->json($query->paginate(10));
    }

    // Get a single task
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    // Create a task
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:tasks|max:255',
            'description' => 'required|string|max:255',
            'due_date' => 'required|date|after:today',
        ]);

        $task = Task::create($request->all());

        return response()->json($task, 201);
    }

    // Update a task
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $this->validate($request, [
            'title' => 'sometimes|required|unique:tasks,title,' . $id,
            'description' => 'sometimes|string|max:255',
            'due_date' => 'sometimes|required|date|after:today',
        ]);

        $task->update($request->all());

        return response()->json($task);
    }

    // Delete a task
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }
}
