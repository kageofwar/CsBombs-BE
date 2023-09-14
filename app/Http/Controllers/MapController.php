<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

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
}
