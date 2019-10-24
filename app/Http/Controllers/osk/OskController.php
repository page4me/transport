<?php

namespace App\Http\Controllers\osk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OskController extends Controller
{
    //
    public function index()
    {
       return view('osk.index');
    }
}
