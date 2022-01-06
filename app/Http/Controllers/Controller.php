<?php

namespace App\Http\Controllers;

use App\Exceptions\MissingParameterError;
use App\Exceptions\RouteError;
use Error;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public string $table;
    public function doGetAllByProperty(string $property, $value): Collection
    {
        return DB::table($this->table)->where($property, '=' ,$value)->get();
    }
    public function doGetAll(): Collection | RouteError
    {
        try {
            return DB::table($this->table)->where("active",'=' ,true)->get();
        } catch (Exception $ex) {
            return (new RouteError($ex->getMessage()));
        }
    }
    public function doInsert(array $newEntry)
    {
        try {
            if(empty($newEntry)) {
                return new MissingParameterError("Cannot insert empty record / " . $this->table, 500);
            }
            $newEntry["created"] = new \DateTime();
            if(isset($newEntry["modified"])) {
                $newEntry["modified"] = new \DateTime();
            }


            $insertId = DB::table($this->table)->insert($newEntry);

            return $this->doGetById($insertId);
        } catch (Exception $ex) {
            return (new RouteError($ex->getMessage()))->toJson();
        }
    }
    public function doGetById(string $id): Collection|MissingParameterError|RouteError
    {
        try {
            if(empty($id)) {
                return new MissingParameterError("No id passed / " . $this->table, 500);
            }
            // Instead of using first() we use get() as to have an easier time working with the return of the call for this method in the controllers that inherit this;
            return DB::table($this->table)->where('id', '=', $id)->get();
        } catch (Exception $ex) {
            return (new RouteError($ex->getMessage()));
        }
    }
    public function doUpdateById(string $id, array $changedEntry): string
    {
        try {
            if(empty($id)) {
                return (new MissingParameterError("No id specified on entry for update " . $this->table, 500))->toJson();
            }

            return '{"updated": "'. DB::table($this->table)
                    ->where('id', '=', $id)
                    ->update([...$changedEntry]) .'"}';
        } catch (Exception $ex) {
            return (new RouteError($ex->getMessage()))->toJson();
        }
    }
    public function doDeleteById(string $id): MissingParameterError|string
    {
        try {
            if(!$id) {
                return new MissingParameterError("No id specified on entry for deletion " . $this->table, 500);
            }
            return '{"deleted": "'. DB::table($this->table)
                    ->where('id', '=', $id)
                    ->update(["active" => 0]) .'"}';
        } catch (Exception $ex) {
            return (new RouteError($ex->getMessage()))->toJson();
        }
    }
    public function doGetDataByIdWithTable($table, $id)
    {
        $tmpData = DB::table($table)->where('id', '=', $id)->first();
        if(isset($tmpData->password)) {
            unset($tmpData->password);
            unset($tmpData->verificationCode);
        }
        return $tmpData;
    }
    public function doGetDataByPropertyWithTable($table, $property, $value)
    {
        return DB::table($table)->where($property, '=', $value)->get();
    }
}
