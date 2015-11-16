<?php

namespace vRemind\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use vRemind\Http\Requests;
use vRemind\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
        	return redirect('classes');
        }
        else {
        	return view('welcome');
        }
    }
}
