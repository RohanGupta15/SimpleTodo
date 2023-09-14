@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h1">
                <i class="fa-solid fa-list-check" style="color: #0000a0;"></i>
                {{ __('To-Do') }}
               
            </div>

                <div class="card-body">
                        <div class="container w-full row">
                            <div class="col justify-left">
                                <h2>Task List</h2>
                            </div>
                            <div class="col text-end">
                            <a href="{{route('todos.create')}}">
                                <div class="btn btn-lg">
                                Add <i class="fa-solid fa-plus fa-xl" style="color: #000080;"></i>
                                </div>
                            </a>  
                            </div>
                        </div>


                        @if (session('alert-success'))
                            <div class="alert alert-success mt-3">
                                {{ session('alert-success') }}
                            </div>
                        @endif
                        @if (session('alert-update'))
                            <div class="alert alert-success mt-3">
                                {{ session('alert-update') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('alert-remove'))
                            <div class="alert alert-danger mt-3">
                                {{ session('alert-remove') }}
                            </div>
                        @endif
                        @if (count($todos) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Description</th>
                                    <th>
                                        Status
                                    </th>
                                    <th>Actions</th>
                                    <th>
                                        Remove
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todos as $todo)
                                    <tr>
                                        <td>
                                            {{$todo->title}}
                                        </td>
                                        <td>
                                            {{$todo->description}}
                                        </td>
                                        <td>
                                            @if ($todo->completed == 1)
                                            <a href="" class="btn btn-sm">
                                            <i class="fa-solid fa-circle-check fa-xl" style="color: #008000;"></i>
                                            </a>
                                            @else
                                            <a href="" class="btn btn-sm">
                                                <i class="fa-regular fa-clock fa-xl" style="color: #ff0000;"></i>
                                            </a>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <!-- Edit Task -->
                                            <a href="{{route('todos.edit', $todo->id)}}" class="btn btn-sm mr-2">
                                            <i class="fa-regular fa-pen-to-square fa-lg" style="color: #0000a0;"></i>
                                            </a>
                                            <!-- View Task Details -->
                                            <a href="{{route('todos.show', $todo->id)}}" class="btn btn-sm ml-2">
                                                <i class="fa-regular fa-eye fa-lg" style="color: #0000a0;"></i>
                                            </a>
                                            
                                        </td>
                                        <td>
                                            <!-- Delete Task from the DB -->
                                        <form method="POST" action="{{route('todos.delete')}}" class"p-2">
                                            @csrf
                                            @method('Delete')
                                                <input type="hidden" name="task_id" value="{{$todo->id}}">
                                                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div>
                            <a href="{{route('todos.create')}}">
                                <div class="btn btn-lg">
                                    <i class="fa-solid fa-plus fa-xl" style="color: #000080;"></i> Let's Add some tasks!
                                </div>
                            </a>   
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
