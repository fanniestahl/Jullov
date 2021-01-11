@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <form action="{{route("tasks.update", ["task" => $task])}}" method="POST">
            @csrf
            @method("PUT")
            <div class="row pt-4 pb-4">
                <div class="col-sm-6">
                    <h1>Edit Task</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route("tasks.index")}}" class="btn btn-outline-secondary">Back to Tasks</a>
                </div>
            </div>  

            <div class="input-group">
                <div class="input-group-prepend">
                <div class="input-group-text">Task Name</div>
                </div>
                <input type="text" class="form-control" placeholder="Clean my room" value="{{old("name", $task->name)}}" name="name">
                @error("name")
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="input-group mt-3 mb-3">
                <div class="input-group-prepend">
                <div class="input-group-text ">Task Description</div>
                </div>
                <textarea class=" form-control" placeholder="Need to vacuum-clean...." name="description">{{old("description", $task->description)}} </textarea>
                @error("description")
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <select id="inputState" class="form-control" name="day">
                <option selected>Select Day</option>
                <option>-----------</option>
                 @foreach(["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday","Sunday"] as $day)
                    <option @if(old("day", $task->day)==$day) selected @endif >{{$day}}</option>
                    @endforeach
                </select>
                @error("day")
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            
                <div class="row pb-2">
                    <div class="col-sm-6">
                        <label>Done</label>
                        <input type="checkbox" name="done" @if ($task->done) checked @endif>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-outline-secondary" type="submit">Edit</button>
                    </div>   
            </div>
        </form>
    </div>

@endsection