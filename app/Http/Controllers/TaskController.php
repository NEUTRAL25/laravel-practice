<?php
namespace App\Http\Controllers;
jfrancisco_local

use Carbon\Carbon;
use App\Models\Task;
 master
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
class TaskController extends Controller
{
    public function index()
 jfrancisco_local
{
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
        'tasks' => $tasks
    ]);
}
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);

    {
        $tasks = Task::orderBy('created_at','asc')->get();
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $task = new Task;
        $task->name = $request->name;
        $task->created_at = Carbon::now();
        $task->save();
        return redirect ('/');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
 master
    }
    $task = new Task;
    $task->name = $request->name;
    $task->save();
    return redirect('/');
}
public function destroy(Task $task)
{
    $task->delete();
    return redirect('/');
}
}