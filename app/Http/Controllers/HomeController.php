<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
