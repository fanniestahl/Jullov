<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        $days = [
            "Monday" => [],
            "Tuesday" => [],
            "Wednesday" => [],
            "Thursday" => [],
            "Friday" => [],
            "Saturday" => [],
            "Sunday" => []
        ];

        foreach ($tasks as $task) {
            $days[$task->day][] = $task;
        }

        return view("tasks.index", ["tasks" => $days]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tasks.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|max:255|min:3",
            "description" => "required",
            "day" => "required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday"
        ]);

    Task::create([
        "name" => $request->name,
        "description" => $request->description,
        "day" => $request->day,
        "done" => false
    ]);

    return redirect()->route("tasks.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view("tasks.show", ["task" => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view("tasks.edit", ["task" => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            "name" => "required|max:255|min:3",
            "description" => "required",
            "day" => "required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday"
        ]);

        $task->name = $request->name;
        $task->description = $request->description;
        $task->day = $request->day;
        $task->done = $request->done ? true : false;
        
        $task->save();

        return redirect()->route("tasks.show", ["task" => $task]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route("tasks.index");
    }
}
