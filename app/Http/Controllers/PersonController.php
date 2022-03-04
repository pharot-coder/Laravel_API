<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;


class PersonController extends Controller
{

    //GET METHOD
    public function index()
    {
        $data = Person::all();
        return response()->json($data, 200);
    }

    //GET METHOD
    public function show($personid)
    {
        $data = Person::findorFail($personid);
         return response()->json($data, 200);
    }

    //POST METHOD
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        try {
            //code...
            $person = new Person;
            $person->first_name = $request->post('first_name');
            $person->last_name = $request->post('last_name');
            $person->email = $request->post('email');
            $person->address = $request->post('address');
            if ($person->save()) {
                return response()->json([
                    'success' => 'Data has been created'
                ], 201);
            } else {
                return response()->json([
                    'error' => 'Data create failed'
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'error' => $th->getMessage()
            ]);
        }
    }

    //PUT METHOD
    public function update(Request $request, $personid)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        try {
            //code...
            $person =  Person::find($personid);
            $person->first_name = $request->post('first_name');
            $person->last_name = $request->post('last_name');
            $person->email = $request->post('email');
            $person->address = $request->post('address');
            if ($person->save()) {
                return response()->json([
                    'success' => 'Data has been updated'
                ], 201);
            } else {
                return response()->json([
                    'error' => 'Data update fail'
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'error' => $th->getMessage()
            ]);
        }
    }

    //DELETE METHOD
    public function destroy($personid)
    {
        $person = Person::find($personid);
        if ($person->delete()) {
            return response()->json([
                'success' => 'Data has been deleted'
            ], 201);
        } else {
            return response()->json([
                'error' => 'Data delete fail'
            ]);
        }
    }
}