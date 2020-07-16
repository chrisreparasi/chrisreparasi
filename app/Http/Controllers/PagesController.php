<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function status()
    {
        $status = 0;
        return view('status',compact('status'));
    }

    public function filter(Request $request)
    {
      $status = $request->get('q');
      return view('status',compact('status'));
    }
}