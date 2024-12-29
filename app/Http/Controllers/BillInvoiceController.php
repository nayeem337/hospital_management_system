<?php

namespace App\Http\Controllers;

use App\Models\BillInvoice;
use App\Models\IpdOpd;
use Illuminate\Http\Request;

class BillInvoiceController extends Controller
{


    public function billview($id)
    {
        $billview = BillInvoice::find($id);
        return view('admin.bill-invoice.billview',compact('billview'));
    }
    public function index() {
        return view('admin.bill-invoice.index');
    }

    public function create(Request $request) {
        BillInvoice::newMBillInvoice($request);
        return back()->with('message', 'Bill Invoice info create successfully!');
    }

    public function manage() {
        return view('admin.bill-invoice.manage', ['invoices' => BillInvoice::all()]);
    }

    public function edit($id) {
        return view('admin.bill-invoice.edit', ['invoice' => BillInvoice::find($id)]);
    }

    public function update(Request $request, $id) {
        BillInvoice::updateBillInvoice($request, $id);


//        $pataint_id = $request->input('pataint_id');
//        $hospital = $request->input('hospital');
//        $hospital_tk = $request->input('hospital_tk');
//        $lab = $request->input('lab');
//        $lab_tk = $request->input('lab_tk');
//        $medicine = $request->input('medicine');
//        $medicine_tk = $request->input('medicine_tk');
//        $consulation = $request->input('consulation');
//        $consulation_tk = $request->input('consulation_tk');


        return back()->with('message', 'Bill Invoice  info update successfully!');
    }

    public function delete($id) {
        BillInvoice::deleteBillInvoice($id);
        return back()->with('message', 'Bill Invoice info delete successfully!');
    }


}
