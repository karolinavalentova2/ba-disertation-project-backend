<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectBoardController extends Controller
{
    public string $table  = "boardcolumns";
    //
    public function doGetAllBoardColumns(): string
    {
        return $this->doGetAll()->toJson();
    }
    public function doGetProjectBoardColumnById(string $id): string
    {
        return $this->doGetById($id)->toJson();
    }
    public function doUpdateProjectBoardColumnById(string $id, Request $request): string
    {
        return $this->doUpdateById($id, $request->all());
    }
    public function doDeleteProjectBoardColumnById(string $id): string
    {
        return $this->doDeleteById($id);
    }
    public function doInsertProjectBoardColumn(Request $request): string
    {
        return $this->doInsert($request->all());
    }
    public function doGetProjectBoardsByProjectId(string $projectId): string
    {
        $boards = $this->doGetAllByProperty("project_fk", $projectId);
        foreach ($boards as $board) {
            $board->author = $this->doGetDataByPropertyWithTable("users", "id", $board->author_fk)->first();
            $board->project = $this->doGetDataByPropertyWithTable("projects", "id", $board->project_fk)->first();
            $board->tasks = $this->doGetDataByPropertyWithTable("projecttasks", "column_fk", $board->id);
        }

        return $boards->toJson();
    }
}
