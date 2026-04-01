<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class TaskController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        $tasks = $user->role === 'manager'
            ? Task::with('assignedTo')->get()
            : Task::where('assigned_to', $user->id)->with('assignedTo')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $employees = User::where('role', 'employee')->get();
        return view('tasks.create', compact('employees'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'assigned_to' => ['required', 'exists:users,id'],
        ]);

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
        if ($task->assigned_to != auth()->id()) {
            abort(403);
        }

        $task->update(['status' => 'done']);
        return back();
    }
}
