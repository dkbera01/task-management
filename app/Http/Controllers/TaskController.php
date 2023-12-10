<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projectId = $request->input('project_id');
        $tasks = Task::when($projectId, function ($query) use ($projectId) {
            $query->where('project_id', $projectId);
        })->orderBy('priority')->get();

        $projects = Project::all();

        return view('tasks.index', compact('tasks', 'projects', 'projectId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $maxPriority = Task::where('project_id', $request->project_id)->max('priority') ?: 0;

        $newTask             = new Task();
        $newTask->name       = $request->name;
        $newTask->project_id = $request->project_id;
        $newTask->priority   = ++$maxPriority;

        $newTask->save();
        Session::flash('success', 'Task created successfully!');
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('projects', 'task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->name       = $request->name;
        $task->project_id = $request->project_id;
        $task->save();
        Session::flash('success', 'Task Updated successfully!');
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Task::where('priority', '>', $task->priority)
            ->update(['priority' => DB::raw('priority - 1')]);

        $task->delete();
        Session::flash('success', 'Task Delete successfully!');
        return redirect()->route('task.index');
    }

    /**
     * Reorder TaskPriority
     *
     * @param Request $request
     * @param Task $task
     * @return void
     */
    public function reorderPriority(Request $request, Task $task)
    {
        $task->update(['priority' => $request->input('priority')]);
        return response()->json(['success' => true]);
    }
}
