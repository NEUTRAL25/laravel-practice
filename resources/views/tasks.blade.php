jfrancisco_local
<link rel="stylesheet" href="{{ asset('css/styles.css') }}" >
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" crossorigin="anonymous">

master

@extends('layouts.app')
 
@section('content')


<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
</head>

<Body>
    <!-- Bootstrap Boilerplate... -->
 jfrancisco_local
 
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
 
        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            
            {{ csrf_field() }}
 
            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task Name:</label>
 
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <br>
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add a Task
                    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   
    <div class= "input-section">
        <div class="panel-body">

            <!-- Display Validation Errors -->
            @include('common.errors')
    
            <!-- New Task Form -->
            <form action="/task" method="POST" class="form-horizontal">
                {{ csrf_field() }}
    
                <!-- Task Name -->
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task</label>
    
                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                </div>
    
                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus"></i>Add Task
                        </button>
                    </div>
 master
                </div>
            </form>
        </div>
    </div>
 jfrancisco_local
    
    <!-- Current Tasks -->
    @if (count($tasks) > 0)


    {{-- above is the input section and below shows the input values--}}
        <!-- TODO: Current Tasks -->
        <!-- Current Tasks -->
        @if (count($tasks) > 0)
    <div class= "show-section">
 master
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>
    
            <div class="panel-body">
 jfrancisco_local
                <table class="table table-striped task-table">
 
                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>Created on</th>
                        <th>&nbsp;</th>
                    </thead>
 
                    <!-- Table Body -->
                    <tbody class="tbody">
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $task->created_at->format('m-d-Y H:i:s') }}</div>
                                </td>
                                <!-- Delete Button -->
                                <td class="delete-button">
                                    <form action="{{ url('task/'.$task->id) }}" method="POST" id="delete-task-{{ $task->id }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger delete-task" data-task-id="{{ $task->id }}">
                                        <i class="fa fa-trash"></i> Remove Task
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
=======
            <table class="table table-striped task-table">
    
            <!-- Table Headings -->
                <thead>
                    <th>Task</th>
                    <th>Date</th>
                    <th>Time </th>
                    <th>Action </th>
                </thead>

            <!-- Table Body -->
                <tbody>
                @foreach ($tasks as $task)
                <tr>
                <!-- Task Name -->
                    <td class="table-text">
                        <div>{{ $task->name }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $task->name }}</div>
                    </td>
                    <td class="date-table-text">
                        <div>{{ $task->created_at }}</div>
                    </td>
                    <td>
                    <!-- TODO: Delete Button -->
                        <form action="/task/{{ $task->id }}" method="POST">
                            <input type="hidden" name="_method" value="CHECK">
                            <button class = "btn btn-success">Check Task</button>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class = "btn btn-danger">Delete Task</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
 master
            </div>
        </div>
    </div>
</Body>

    @endif

    <script src="{{ asset('js/delete-task.js') }}"></script>

@endsection