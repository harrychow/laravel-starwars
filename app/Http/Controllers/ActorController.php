<?php

namespace App\Http\Controllers;

use App\Models\Actor;

class ActorController extends Controller
{
    //

    public function index()
    {
        $actors = Actor::with('movies')->get();
        return view('actors.index', compact('actors'));
    }
}
