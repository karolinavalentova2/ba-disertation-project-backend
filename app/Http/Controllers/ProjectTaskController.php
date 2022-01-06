<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support;
use Illuminate\Support\Collection;

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

    public function doReturnTasksByBoardId(string $boardId) {
        $data = $this->doGetAllByProperty("column_fk", $boardId);

        foreach ($data as $entry) {
            $entry->author = $this->doGetDataByIdWithTable("users", $entry->author_fk);
            $entry->assignedTo = $this->doGetDataByIdWithTable("users", $entry->assignee_fk);
            $entry->comments = $this->doGetDataByPropertyWithTable("comments", "task_fk" ,$entry->id);
            $entry->projects = $this->doGetDataByPropertyWithTable("projects", "team_fk", $entry->id);
            $entry->contributors = [];
            $entry->subTasks = $this->doGetAllByProperty("parent_fk", $entry->id);;
        }

        return $data->toJson();
    }
}
