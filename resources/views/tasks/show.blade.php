@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row pt-4">
            <div class="col-sm-6">
                <h1>Task Information</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route("tasks.index")}}" class="btn btn-outline-secondary">Back to Tasks</a>
            </div>
        </div>  

        <h4 class="mt-3">{{$task->day}}</h4>
        <h4 class="mt-3">{{$task->name}}</h4>
        <p class="mt-3">{{$task->description}} </p>

        
        <div class="row pb-2">
            <div class="col-sm-6">
                <label>Done</label>
                <input disabled type="checkbox" @if ($task->done) checked @endif>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route("tasks.edit",["task" => $task])}}" class="btn btn-outline-secondary">Edit</a>

                <form action="{{route("tasks.destroy", ["task" => $task])}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class=" btn btn-outline-danger mt-2" type="submit">Delete</button>
                </form>
            </div>   
        </div>
    </div>

@endsection