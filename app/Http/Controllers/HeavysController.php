<?php

namespace App\Http\Controllers;

use App\Models\Heavys;
use Illuminate\Http\Request;

class HeavysController extends Controller
{
    public function index() 
    {
        $heavys = Heavys::all();

        return response()->json($heavys);
    }
}
