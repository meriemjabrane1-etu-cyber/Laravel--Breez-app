<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        abort_if(!$user, 403);

        if ($user->role == 'manager') {
            $tasks = Task::all();
        } else {
            $tasks = Task::where('assigned_to', $user->id)->get();
        }

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
            'created_by' => auth()->id(),
        ]);

        return redirect('/tasks');
    }

    public function markDone(Task $task)
    {
        $user = auth()->user();
        abort_if(!$user, 403);
        if ($task->assigned_to !== $user->id()) {
            abort(403);
        }

        $task->update(['status' => 'done']);

        return back();
    }
}
