<?php

namespace App\Http\Controllers;

use App\Models\Sites;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    public function index() 
    {
        $sites = Sites::all();

        return response()->json($sites);
    }
}
