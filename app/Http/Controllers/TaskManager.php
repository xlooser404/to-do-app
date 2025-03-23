<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskManager extends Controller
{
    function listTask()
    {
        // Fetch tasks where the status is NULL and paginate the results
        $tasks = Tasks::where("status", NULL)->paginate(5);
        return view("welcome", compact('tasks'));
    }

    // Display the form to add a new task
    function addTask()
    {
        return view('tasks.add');
    }

    function addTaskPost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);

        // Create a new Tasks instance
        $task = new Tasks();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->status = $request->status;

        // Save the task to the database
        if($task->save()){
            // If the task is saved successfully, redirect to the home page with a success message
            return redirect(route("home"))
            ->with("success", "Task added successfully");
        }
        return redirect(route("task.add"))
            ->with("error", "Task not added");
    }


    // Update the status of a task to "completed"
    function updateTaskStatus($id)
    {
        // Find the task by ID and update its status to "completed"
        if(Tasks::where('id', $id)->update(['status' =>"completed"])){
            return redirect(route("home"))->with("success", "Task completed");
        }
        return redirect(route("home"))->with("error", "Error occured while updating, try again");
    }

    // Delete a task by ID
    function deleteTask($id)
    {
        // Find the task by ID and delete it
        if(Tasks::where('id', $id)->delete()){
            return redirect(route("home"))->with("success", "Task completed");
        }
        return redirect(route("home"))->with("error", "Error occured while deleting, try again");
    }
}
