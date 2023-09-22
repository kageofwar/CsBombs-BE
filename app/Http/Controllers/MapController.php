<?php

namespace App\Http\Controllers;

use App\Models\Heavys;
use App\Models\Map;
use App\Models\Sites;
use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function index()
    {
        $mapas = Map::all();

        return $mapas;
    }

    public function search($id) 
    {
        $mapa = Map::FindOrFail($id);

        return $mapa;
    }

    public function create(Request $request)
    {
        $mapa = new Map;

        DB::beginTransaction();

        $mapa->name = $request->name;
        $mapa->map_url_pic = $request->map_url_pic;  
        $mapa->save();
        if (!$mapa->save()) {
            return DB::rollBack();
        }

        $sites = $request->input('sites');

        
        foreach ($sites as $site) {
            $siteOfMap = new Sites;
            $siteOfMap->nome = $site["nome"];
            $siteOfMap->map_id = $mapa->id;
            $siteOfMap->save();
        }

        $ctTeam = new Teams;
        $ctTeam->name = 'Counter-Terrorists';
        $ctTeam->map_id = $mapa->id;
        $ctTeam->save();

        $trTeam = new Teams;
        $trTeam->name = 'Terrorists';
        $trTeam->map_id = $mapa->id;
        $trTeam->save();

        $smoke = new Heavys;
        $smoke->name = 'Smoke';
        $smoke->map_id = $mapa->id;
        $smoke->save();

        $flashBang = new Heavys;
        $flashBang->name = 'FlashBang';
        $flashBang->map_id = $mapa->id;
        $flashBang->save();

        $molotov = new Heavys;
        $molotov->name = 'Molotov';
        $molotov->map_id = $mapa->id;
        $molotov->save();

        DB::commit();

        return response()->json([
            'mensagem' => 'Mapa Cadastrado com Sucesso!',
            'Mapa' => $mapa->name
        ], 202);
    }
}
