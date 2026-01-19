<?php
namespace App\Services;

use App\Models\Task;
use App\Exceptions\TaskAlreadyExistsException;

class TaskService{

    public function getPaginatedTasks($query, $request){
        $perPage = $request->get('per_page', 15);
        return $query->orderBy('created_at', 'desc')->paginate($perPage);
    }
    public function createTask(array $data) {
        $exists = Task::where("title", $data["title"])
        ->where("deadline", $data["deadline"])
        ->where("priority", $data["priority"])
        ->exists();
        if($exists){
            // return response()->json(["message"=>"This task already exists"],409);
            throw new TaskAlreadyExistsException('Task with these details already exists');
        }
        return Task::create($data);
        
    }

    public function updateTask (Task $task, array $data):Task {
        $task->update($data);
        return $task->fresh();
    }

    public function deleteTask (Task $task):void {
        $task->delete();
    }

}