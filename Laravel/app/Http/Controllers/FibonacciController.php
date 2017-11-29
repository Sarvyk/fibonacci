<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonacciController extends Controller
{
    public function show($i)
    {
        return view('fibonacci1',['i' => $i]);
    }
}