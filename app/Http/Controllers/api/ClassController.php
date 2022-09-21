<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Sclass;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $class = Sclass::latest()->get();
        return response()->json($class);
    }

    public function store(Request $request)
    {
        $request->validate([
            'class'=>'required|unique:sclasses',
        ]);

        Sclass::insert([
            'class'=>$request->class,
            'created_at'=>Carbon::now(),
        ]);
        return response("Class Inserted Successfully");
    }

    public function edit($id)
    {
        $class = Sclass::findOrFail($id);
        return response()->json($class);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class'=>'required|unique:sclasses',
        ]);

        Sclass::findOrFail($id)->update([
            'class'=>$request->class,
            'updated_at'=>Carbon::now(),
        ]);
        return response('Class Data Updated Successfully');
    }

    public function delete($id) {
        Sclass::findOrFail($id)->delete();
        return response('Class data deleted successfully');
    }
}
