<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    public string $table  = "projecttasks";
    //
    public function doGetAllTasks(): string
    {
        return $this->doGetAll()->toJson();
    }
    public function doGetTaskById(string $id): string
    {
        return $this->doGetById($id)->toJson();
    }

    public function doUpdateTaskById(string $id, Request $request): string
    {
        return $this->doUpdateById($id, $request->all());
    }
    public function doDeleteTaskById(string $id): string
    {
        return $this->doDeleteById($id);
    }
    public function doInsertTask(Request $request): string
    {
        return $this->doInsert($request->all());
    }
}
