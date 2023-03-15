@extends('layouts.app')

@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class= "panel-body d-flex align-items-centers justify-content-center pb-4">
        <button class = "btn btn-success align-items-center mr-4" id = "opener">
        <i class="fa fa-plus"></i> ADD NEW TASK
        </button>

         <!-- tentative for delete all task-->
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete all tasks?')">Delete All Tasks</button>
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
            <div class="panel-heading p-4 text-center border border-white">
                Current Tasks
            </div>
            <div class="panel-body">
                <table class="table table-default task-table border border-white">
                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text pt-3 col">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td class= "col">
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                        {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger col-md-auto mr-1 pl-3 pr-3">
                                                <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    <input type="hidden" name="_method" value="DELETE">
                                </td>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                <td class= "col">
                                        <!-- tentative for edit button-->
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-primary col-md-auto ml-1 l-4 pr-3">
                                                <i class="fa fa-trash"></i> Modify
                                        </button>
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