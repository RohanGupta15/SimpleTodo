<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index(){

        $todos = Todo::all();
        return view('todos.index', [
            'todos' => $todos
        ]);
    }
    public function create(){
        return view('todos.create');
    }

    public function store(TodoRequest $request){
        // return $request->all();

        Todo::create([
            'title' => $request->task_name,
            'description' => $request->task_description
        ]);

        $request->session()->flash('alert-success', 'Task added successfully!');

        return to_route('todos.index');
    }

    public function show($id){
        $details = Todo::find($id);

        if(! $details) {
            request()->session()->flash('error', 'Unable to find Task in the list!');
            return to_route('todos.index')->withErrors([
                'error' => "Unable to find Task in the list!"
            ]);
        }
        
        return view('todos.show', ['todo' => $details]);
    }

    public function edit($id){
        $details = Todo::find($id);

        if(! $details) {
            request()->session()->flash('error', 'Unable to find Task in the list!');
            return to_route('todos.index')->withErrors([
                'error' => "Unable to find Task in the list!"
            ]);
        }
        
        return view('todos.edit', ['todo' => $details]);
    }

    public function update(TodoRequest $request){
        $details = Todo::find($request->task_id);

        if(! $details) {
            request()->session()->flash('error', 'Unable to find Task in the list!');
            return to_route('todos.index')->withErrors([
                'error' => "Unable to find Task in the list!"
            ]);
        }
  
        $details->update([
            'title' => $request->task_name,
            'description' => $request->task_description,
            'completed' => $request->taskStatus
        ]);

        $request->session()->flash('alert-update', 'Task Updated successfully!');

        return to_route('todos.index');
    }

    public function delete(Request $request){
        $details = Todo::find($request->task_id);

        
        if(! $details) {
            request()->session()->flash('error', 'Unable to find Task in the list!');
            return to_route('todos.index')->withErrors([
                'error' => "Unable to find Task in the list!"
            ]);
        }
  
        $details->delete();

        $request->session()->flash('alert-remove', 'Task Deleted successfully!');

        return to_route('todos.index');
    }
}
