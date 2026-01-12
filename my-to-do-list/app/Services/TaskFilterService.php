<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TaskFilterService
{
    public function applyFilters(Builder $query, Request $request): Builder 
    {
        if ($request->has('completed')){
            $query->where("completed", $request->boolean("completed"));
        }
        if ($request->has('priority')){
            $query->where('priority', $request->input('priority'));
        }
        if ($request->has("search")){
            $query->where("title", "like", "%" . $request->input("search") . "%");
        }
        return $query;
    }

    
}