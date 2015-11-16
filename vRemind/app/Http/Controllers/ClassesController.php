<?php

namespace vRemind\Http\Controllers;

use Illuminate\Http\Request;
use vRemind\Http\Requests;
use vRemind\Http\Controllers\Controller;
use Input;
use Response;
use Session;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('classes.home');
    }

    public function upload()
    {
    	$file = Input::file('file');
		$destinationPath = 'uploads';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(12);
		$extension = Input::file('file')->getClientOriginalExtension(); 
		$link = $filename.'.'.$extension;
		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); 
		$upload_success = Input::file('file')->move($destinationPath, $filename.'.'.$extension);
		if( $upload_success ) {
			Session::put('image', $link);
		   return redirect('classes');

		} else {
		   return Response::json('error', 400);
		}
	}

}
