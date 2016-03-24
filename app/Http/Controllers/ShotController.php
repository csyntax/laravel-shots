<?php

namespace App\Http\Controllers;

use App\Shot;
use App\Http\Requests;
use Illuminate\Http\Request;

class ShotController extends Controller
{   
    public function index() {
        $shots = Shot::orderBy('created_at', 'asc') -> get();
         
        return view('shots', [
            'shots' => $shots
        ]);
    }
}