<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function createNew(Request $request) {
        Staff::newStaff($request);
        return back()->with('message', 'Staff information has been successfully created!');
    }

}
