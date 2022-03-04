<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    //GET METHOD
    public function index(){
        $image = Image::all();
        return response()->json($image, 200);
    }

    //GET METHOD
    public function show($imageid){
        $data = Image::find($imageid);
        return response()->json($data, 200);
    }

    public function store(Request $request){
        
    }
}