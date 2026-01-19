<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Services\TaskFilterService;
use App\Services\TaskService;

class TasksController extends Controller
{

    public function __construct(
        private TaskService $taskService,
        private TaskFilterService $taskFilterService)
    {}
    public function index(Request $request)
    {
        $query = Task::query();
        // $query = $this->taskFilterService->applyFilters($query, $request);
        // $tasks = $query->get();
        $tasks = $this->taskService->getPaginatedTasks($query, $request);
        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {

        $task = $this->taskService->createTask($request->validated());
        
        return new TaskResource($task); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return  response()->json($task); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task = $this->taskService->updateTask($task, $request->validated());
        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {   
        $this->taskService->deleteTask($task);
        return response()->noContent();
    }
}
