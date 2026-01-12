<?php
namespace App\Services;

use App\Models\Task;


class TaskService{

    public function getPaginatedTasks($query, $request){
        $perPage = $request->get("per_page", 15);
        return $query->paginate($perPage);
    }
    public function createTask(array $data): Task {
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