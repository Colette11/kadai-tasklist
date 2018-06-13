<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // add
use App\Task;

class UsersController extends Controller
{
    
    public function show($id)
    {
        $user = User::find($id);
        $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'tasks' => $tasks,
        ];

        $data += $this->counts($user);

        return view('tasks.show', $data);
    }
    
    public function edit($id)
    {
        $task = Task::find($id);

        if(\Auth::user()->id === $task->user_id){

        return view('tasks.edit', [
            'task' => $task,
        ]);
        }
        
        return redirect('/');
        
    }
}