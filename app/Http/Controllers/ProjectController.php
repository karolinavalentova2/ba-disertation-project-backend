<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public string $table  = "projects";
    public function doGetAllProjects(): string
    {
        return $this->doGetAll()->toJson();
    }
    public function doGetProjectById(string $id): string
    {
        return $this->doGetById($id)->toJson();
    }
    public function doUpdateProjectById(string $id, Request $request): string
    {
        return $this->doUpdateById($id, $request->all());
    }
    public function doDeleteProjectById(string $id): string
    {
        return $this->doDeleteById($id);
    }
    public function doInsertProject(Request $request): string
    {
        return $this->doInsert($request->all());
    }
}
