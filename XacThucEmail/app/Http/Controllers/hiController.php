<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hiController extends Controller
{
    public function Index()
    {
        return view("index");
    }
}
