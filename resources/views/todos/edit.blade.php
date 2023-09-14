@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h1">
                    <a href="{{url()->previous()}}" class="btn btn-lg">
                        <i class="fa-solid fa-circle-left fa-2xl" style="color: #0000a0;"></i>
                    </a>
                    {{ __('To-Do') }}
                </div>

                <div class="card-body">
                <div class="container">
                    <h2>Edit Task</h2> <br><br>
                    <form method="POST" action="{{route('todos.update')}}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="task_id" value="{{$todo->id}}">
                        <div class="mb-3">
                            <label for="task_name" class="form-label h5">Task Name</label>
                            <input type="text" class="form-control" id="task_name" name="task_name" value="{{$todo->title}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="task_description" class="form-label h5">Task Description</label>
                            <textarea class="form-control" id="task_description" name="task_description" rows="3">
                                {{$todo->description}}
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="taskStatus" class="form-label h5">
                            <i class="fa-solid fa-clipboard-check fa-lg" style="color: #000080;"></i> Status
                            </label>
                            <select class="form-select" id="taskStatus" name="taskStatus" required>
                                <option value="" disabled selected>Select status</option>
                                <option value="1">
                                    <i class="fas fa-check-circle text-success"></i> Completed
                                </option>
                                <option value="0">
                                    <i class="fas fa-times-circle text-danger"></i> Not Completed
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Todo</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
