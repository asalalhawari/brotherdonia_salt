<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
{
    return view('site.videos.index'); 
}

}
