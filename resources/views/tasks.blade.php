@extends('layouts.app')

@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class= "panel-body d-flex align-items-centers justify-content-center pb-4">
        <button class = "btn btn-success align-items-center mr-4" id = "opener">
        <i class="fa fa-plus"></i> ADD NEW TASK
        </button>

         <!-- tentative for delete all task-->
        <form method="POST" action="{{ route('tasks.clear') }}">
            @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete all tasks?')">Delete All Tasks</button>
        </form>
    </div>

    <div class="panel-body" id = "add-tasks">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" style= "width: auto;">
                </div>
            </div>
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- TODO: Current Tasks -->
	 @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading p-4 text-center">
                Current Tasks
            </div>
            <div class="panel-body">
                <table class="table table-default task-table">
                    <!-- Table Headings -->
                    <thead class= "col" >
                        <th>Task</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody class= "col">
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text pt-3">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                </td>
                                <td class = "col">
                                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger mr-1 pl-3 pr-3">
                                                    <i class="fa fa-trash"></i> Delete
                                            </button>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-primary ml-1 pl-3 pr-3">
                                                    <i class="fa fa-trash"></i> Modify
                                            </button>
                                            <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection