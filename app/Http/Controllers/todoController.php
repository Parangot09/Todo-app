<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class todoController extends Controller
{
    public function addTask()
    {
        return view("create");
    }

    public function newTask(Request $request)
    {
        $validated = $request->validate([
            "title"=> "required|max:255",
            "description"=> "required|max:255",
        ]);
        todo::create($validated);
        return redirect("/")->with("success","New Task added!");
    }

    public function allTasks()
    {
        $tasks = Todo::orderBy("id","desc")->paginate(2);
        return view("welcome",["tasks" => $tasks]);
    }

    public function delTask($id)
    {
        todo::where("id", $id)->delete();
        return redirect("/")->with("success","Task Deleted!");
    }

    public function editTask(Request $request, $id)
    {   $task = todo::find($id);
        return view("edit",["task"=> $task]);
    }

    public function updateTask(Request $request, $id)
    {
        $validated = $request->validate([
            "title"=> "required|max:255",
            "description"=> "required|max:255",
        ]);
        $task = todo::findOrFail($id);
        $task->title = $validated["title"];
        $task->description = $validated["description"];
        $task->save();

        return redirect("/")->with("success","Task updated!");
    }
}
