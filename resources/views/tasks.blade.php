
@extends('layouts.app')
 
@section('content')

<link rel= "stylesheet" type= "text/css" href= "index.css">

<section>
    <!-- Bootstrap Boilerplate... -->
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
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

 {{-- above is the input section and below shows the input values--}}
    <!-- TODO: Current Tasks -->
     <!-- Current Tasks -->
     @if (count($tasks) > 0)
    <div class= "show-section">
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>
 
            <div class="panel-body">
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
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button>Delete Task</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

    @endif
@endsection