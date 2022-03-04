<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Image;

class HomeController extends Controller
{
    //

    public function index()
    {
        $data = Person::all();
        $imageData = Image::all();
        return view('home', [
            'data' => $data,
            'imageData' => $imageData
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address' => 'required'

        ]);

        $person = new Person();
        $person->first_name = $request->post('first_name');
        $person->last_name = $request->post('last_name');
        $person->email = $request->post('email');
        $person->address = $request->post('address');
        if (!$person->save()) {
            return redirect()->back()->with('error', 'Data add failed');
        } else {
            return redirect()->back()->with('success', 'Data has been add successfully');
        }
    }

    public function destory($personId){
        $person = Person::find($personId);
        if($person->delete()){
            return redirect()->back()->with('success','Data has been deleted');
        }else{
            return redirect()->back()->with('error','Data has delete failed');
        }
    }

    public function storeImage(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            //code...
            $image = new Image;

            if ($request->hasFile('image')) {
                $image_name = $request->file('image');
                $name = $image_name->getClientOriginalName();
                $destinationPath = public_path('/images/');
                $image_name->move($destinationPath, $name);

                $image->title = $request->post('title');
                $image->description = $request->post('description');
                $image->image_url = url('/images/' . $name);
        }
         
            if(!$image->save()){
                return redirect()->back()->with('error','Data has been add failed');
            }else{
                return redirect()->back()->with('success','Data has been add success');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error: " . $th->getMessage();
        }
      
    }
}