<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function createNew(Request $request)
    {
        Teacher::newTeacher($request);
        return back()->with('message', 'Patient information has been successfully created!');
    }

//    public function manage()
//    {
//        return view('admin.category.manage', ['categories' => Teacher::all()]);
//    }
//
//    public function edit($id)
//    {
//        return view('admin.category.edit', ['category' => Teacher::find($id)]);
//    }
//
//    public function update(Request $request, $id)
//    {
//        Teacher::updateTeacher($request, $id);
//        return back()->with('message', 'Teacher info update successfully!');
//    }
//
//    public function delete($id)
//    {
//        Teacher::deleteTeacher($id);
//        return back()->with('message', 'Teacher info delete successfully!');
//    }
}
