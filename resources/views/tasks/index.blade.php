@extends("layouts.app")

@section('content')
    <!--Header-->
        <div class="row mt-2 mb-2 ml-1 mr-1">
            <div class="col-sm-6 mt-2">
                <h2>Tasks</h2>
            </div>
            <div class="col-sm-6 text-right mt-2">
                <a href="{{route("tasks.create")}}" class="btn btn-light"> Add New Task </a>
            </div>
        </div>

        <div class="row ml-2 mr-2">

            <!--Monday-->
            @foreach ($tasks as $day=>$values)
       
            <div class="card col p-1 m-1" style="width: 18rem;">
                <div class="card-header">
                    {{$day}}
                </div>
                <ul class="list-group list-group-flush">
                    
                    @foreach ($values as $task)
                        
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-10">
                                <a href="{{route ("tasks.show",["task"=>$task])}}" @if ($task->done) class="done" @endif>{{$task->name}}</a>
                            </div>
                            <div class="col-md-2 text-right">
                                <input disabled type="checkbox" @if ($task->done) checked @endif>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            @endforeach

        </div>

@endsection