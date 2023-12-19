<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    public function show(Task $task)
    {
        return TaskResource::make($task);   
    }

    public function store(StoreTaskRequest $request)
    {
       $task = Task::create($request->validated());

       return TaskResource::collection(Task::all());
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return TaskResource::make($task);   
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->noContent();
    }


}