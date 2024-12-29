<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{

    public function index() {
        return view('admin.diagnostic.index');
    }

    public function create(Request $request) {
        Diagnostic::newDiagnostic($request);
        return back()->with('message', ' Diagnostic info create successfully!');
    }

    public function manage() {
        return view('admin.diagnostic.manage', ['diagnostics' => Diagnostic::all()]);
    }

    public function edit($id) {
        return view('admin.diagnostic.edit', ['diagnostic' => Diagnostic::find($id)]);
    }

    public function update(Request $request, $id) {
        Diagnostic::updateDiagnostic($request, $id);
        return back()->with('message', 'Diagnostic  info update successfully!');
    }

    public function delete($id) {
        Diagnostic::deleteDiagnostic($id);
        return back()->with('message', 'Diagnostic info delete successfully!');
    }

}
