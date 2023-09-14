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
                @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
                <div class="container">
                    <h2>Create a New Task</h2>
                    <form method="POST" action="{{route('todos.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="task_name" class="form-label">Task Name</label>
                            <input type="text" class="form-control" id="task_name" name="task_name">
                        </div>
                        <div class="mb-3">
                            <label for="task_description" class="form-label">Task Description</label>
                            <textarea class="form-control" id="task_description" name="task_description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add to Todo</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
