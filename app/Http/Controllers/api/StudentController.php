<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::latest()->get();
        return response()->json($student);
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id'=>'required',
            'section_id'=>'required',
            'name'=>'required',
            'email'=>'required|unique:students',
            'password'=>'required',
            'image'=>'required',
        ]);

        Student::insert([
            'class_id'=>$request->class_id,
            'section_id'=>$request->section_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'image'=>$request->image,
            'created_at'=>Carbon::now(),
        ]);

        return response("Student Data Created Successfully");
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id'=>'required',
            'section_id'=>'required',
            'name'=>'required',
            'email'=>'required|unique:students',
            'password'=>'required',
            'image'=>'required',
        ]);

        Student::findOrFail($id)->update([
            'class_id'=>$request->class_id,
            'section_id'=>$request->section_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'image'=>$request->image,
            'created_at'=>Carbon::now(),
        ]);
        return response("Student Data Updated Successfully");
    }

    public function delete($id)
    {
        Student::findOrFail($id)->delete();
        return response("Student Data deleted successfully");
    }
}
