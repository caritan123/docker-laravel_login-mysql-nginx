<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.task.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get()->where('email_verified_at', '!=', 'null');
        return view('page.task.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = $request->validate([
            'name' => 'required',
            'assigned_to' => 'required',
            'description' => 'required',
        ]);

        $form['user_id'] = $form['assigned_to'];


        Task::create($form);

        return redirect()->route('task.create')->with('success', 'Task has been updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Task $task) # original
    public function edit($task) # temporary
    {
        return view('page.task.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        // $this->office->fill($form)->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
