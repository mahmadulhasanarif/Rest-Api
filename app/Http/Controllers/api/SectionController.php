<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $section = Section::latest()->get();
        return response()->json($section);
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id'=>'required',
            'section'=>'required',
        ]);

        Section::insert([
            'class_id'=>$request->class_id,
            'section'=>$request->section,
            'created_at'=>Carbon::now(),
        ]);

        return response("Section Created Successfully");
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return response()->json($section);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id'=>'required',
            'section'=>'required',
        ]);

        Section::findOrFail($id)->update([
            'class_id'=>$request->class_id,
            'section'=>$request->section,
            'updated_at'=>Carbon::now()
        ]);
        return response("Section Updated Successfully");
    }

    public function delete($id)
    {
        Section::findOrFail($id)->delete();
        return response("section deleted successfully");
    }
}
