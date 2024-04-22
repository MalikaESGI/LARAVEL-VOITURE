<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $voitures = Voiture::orderBy("created_at","desc")->limit(4)->get();

        return view('home',[
            'voitures'=> $voitures
        ]);
    }
}
