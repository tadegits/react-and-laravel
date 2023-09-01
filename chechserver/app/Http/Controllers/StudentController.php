<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
//use Illuminate\Auth\Events\Validated;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return student::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestudentRequest $request)
    {
        student::create([
            'name' => $request['name'],
            'password' => $request['password'],
        ]);
        try{
            //student::create($request->post());
            return response()->json([
                'message' => 'Student Registered Successfully!'
            ]);
            
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something goes wrong while registering student'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student, $id)
    {
        //dd((int)($id));
        $allstudent = student::find($id);
        return response()->json([
            'status' => 200,
            'student' => $allstudent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestudentRequest $request, student $student, $id)
    {
        $request->validate([
            'name'=>'required',
            'password'=>'required',
        ]);

        $student = student::findorfail($id);

        try{
            $student->update($request->post());
            $student->save();
            return response()->json([
                'message' => 'Student Updated Successfully!',
                'username' => $request['name'],
                'userpassword' => $request['password'],
                'student' => $student,
            ]);
            
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something goes wrong while updating student'
            ], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student, $id)
    {
        $sted = student::findorfail($id);
        try{
            $sted->delete();
            $allstud = student::all();
            return response()->json([
                'message' => 'Student Delete Successfully!',
                'ids' => $id,
                'student' => $allstud,
            ]);
            
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something goes wrong while deleting student'
            ], 500);
        }
    }
}
