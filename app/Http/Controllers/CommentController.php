<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    function __construct() {}
    public string $table = "comments";

    //
    public function doGetAllComments(): string
    {
        return $this->doGetAll()->toJson();
    }
    public function doGetCommentById(string $id): string
    {
        return $this->doGetById($id)->toJson();
    }
    public function doUpdateCommentById(string $id, Request $request): string
    {
        return $this->doUpdateById($id, $request->all());
    }
    public function doDeleteCommentById(string $id): string
    {
        return $this->doDeleteById($id);
    }
    public function doInsertComment(Request $request): string
    {
        return $this->doInsert($request->all());
    }
}
