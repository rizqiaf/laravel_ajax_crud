<?php

namespace App\Http\Controllers\API;

use App\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'error' => false,
            'staff' => Staff::all(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'nama' => 'required',
            'nik' => 'required|unique',
            'jabatan' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
        ]);
        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages' => $validation->errors(),
            ], 200);
        }
        else
        {
            $staff = new Staff;
            $staff->nama = $request->input('name');
            $staff->nik = $request->input('nik');
            $staff->jabatan = $request->input('jabatan');
            $staff->alamat = $request->input('alamat');
            $staff->no_tlp = $request->input('no_tlp');
            $staff->email = $request->input('email');
            $staff->save();
            
            return response()->json([
                'error' => $staff,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);
        if(is_null($staff)){
            return response()->json([
                'error' => true,
                'message' => "Record with id # $id not found",
            ], 404);
        }
        return response()->json([
            'error' => false,
            'staff' => $staff,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[
            'nama' => 'required',
            'nik' => 'required|unique',
            'jabatan' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
        ]);
        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages' => $validation->errors(),
            ], 200);
        }
        else 
        {
            $staff = Staff::find($id);
            $staff->nama = $request->input('name');
            $staff->nik = $request->input('nik');
            $staff->jabatan = $request->input('jabatan');
            $staff->alamat = $request->input('alamat');
            $staff->no_tlp = $request->input('no_tlp');
            $staff->email = $request->input('email');
            $staff->save();
            
            return response()->json([
                'error' => false,
                'staff' => $staff,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        if(is_null($staff)){
            return response()->json([
                'error' => true,
                'messages' => "Record with id # $id not found",
            ], 404);
        }
        $staff->delete();
        return response()->json([
            'error' => false,
            'message' => "Staff Record successfully deleted id # $id",
        ], 200);
    }
    
}
