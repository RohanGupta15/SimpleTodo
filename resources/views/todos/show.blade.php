@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h2">
                    <a href="{{url()->previous()}}" class="btn btn-lg">
                        <i class="fa-solid fa-circle-left fa-2xl" style="color: #0000a0;"></i>
                    </a>
                    {{ __('Task Details') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <div class="p-4">
                        <h2>
                            {{$todo->title}}
                        </h2>
                    </div>
                    <div class="p-4">
                        <p>
                            {{$todo->description}}
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
