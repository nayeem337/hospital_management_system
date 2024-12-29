<?php

namespace App\Http\Controllers;

use App\Models\Medicien;
use Illuminate\Http\Request;

class MedicienController extends Controller
{

    public function index() {
        return view('admin.medicien.index');
    }

    public function create(Request $request) {
        Medicien::newMedicien($request);
        return back()->with('message', 'Medicien info create successfully!');
    }

    public function manage() {
        return view('admin.medicien.manage', ['medicines' => Medicien::all()]);
    }

    public function edit($id) {
        return view('admin.medicien.edit', ['medicine' => Medicien::find($id)]);
    }

    public function update(Request $request, $id) {
        Medicien::updateMedicien($request, $id);
        return back()->with('message', 'Medicien  info update successfully!');
    }

    public function delete($id) {
        Medicien::deleteMedicien($id);
        return back()->with('message', 'Medicien info delete successfully!');
    }


}
