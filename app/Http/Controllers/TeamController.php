<?php

namespace App\Http\Controllers;

use App\Exceptions\MissingParameterError;
use App\Exceptions\RouteError;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    //
    public string $table  = "teams";
    public function doGetTeamById(string $id): string
    {
        $team = $this->doGetById($id);
        if(!is_a($team, "MissingParameterError") && !is_a($team, "RouteError")) {
            $team->first()->author = $this->doGetDataByIdWithTable("users", $team->first()->author_fk);

            $team->first()->projects = $this->doGetDataByPropertyWithTable("projects", "team_fk", $team->first()->id);
        }
        return $team->toJson();
    }
    public function doGetTeamsByUserId(string $id) {

    }
    public function doGetAllTeams(): string
    {
        $data = $this->doGetAll();

        foreach ($data as $entry) {
            $entry->author = $this->doGetDataByIdWithTable("users", $entry->author_fk);
            $entry->projects = $this->doGetDataByPropertyWithTable("projects", "team_fk", $entry->id);

        }

        return $data->toJson();
    }

    public function doUpdateTeamById(string $id, Request $request): string
    {
        return $this->doUpdateById($id, $request->all());
    }
    public function doDeleteTeamById(string $id): string
    {
        return $this->doDeleteById($id);
    }
    public function doInsertTeam(Request $request): string
    {
        return $this->doInsert($request->all());
    }
}
