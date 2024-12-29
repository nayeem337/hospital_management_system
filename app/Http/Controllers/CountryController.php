<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index() {
        return view('admin.country.index');
    }

    public function create(Request $request) {
        Country::newCountry($request);
        return back()->with('message', ' Country info create successfully!');
    }

    public function manage() {
        return view('admin.country.manage', ['countries' => Country::all()]);
    }

    public function edit($id) {
        return view('admin.country.edit', ['country' => Country::find($id)]);
    }

    public function update(Request $request, $id) {
        Country::updateCountry($request, $id);
        return back()->with('message', 'Country  info update successfully!');
    }

    public function delete($id) {
        Country::deleteCountry($id);
        return back()->with('message', 'Country info delete successfully!');
    }

}
