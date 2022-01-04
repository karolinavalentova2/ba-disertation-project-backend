<?php

namespace App\Http\Controllers;

use App\Exceptions\RouteError;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public string $table  = "users";
    public function doGetUserById(string $id): string
    {
        $res = $this->doGetById($id);
        if(isset($res->password)) {
            unset($res->password);
            unset($res->verificationCode);
        }
        return $res->toJson();
    }
    public function doUpdateUserById(string $id, Request $request): string
    {
        return $this->doUpdateById($id, $request->all());
    }
    public function doDeleteUserById(string $id): string
    {
        return $this->doDeleteById($id);
    }
    public function doInsertUser(Request $request): string
    {
        return $this->doInsert($request->all());
    }
}
