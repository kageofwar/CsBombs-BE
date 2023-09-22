<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Teams::all();

        return response()->json($teams);
    }
}
