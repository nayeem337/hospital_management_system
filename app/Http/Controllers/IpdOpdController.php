<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IpdOpd;

class IpdOpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ipd-opd.index_ipd',[
            'pods'=>IpdOpd::latest()->get(),
        ]);
    }

    public function opdview($id)
    {
        $opdview=IpdOpd::find($id);
        return view('admin.ipd-opd.opdview',compact('opdview'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.ipd-opd.create_ipd_opd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $opd = new IpdOpd;
        $opd->pataint_id = $request->pataint_id;
        $opd->date = $request->date;
        $opd->hospital_name = $request->hospital_name ;
        $opd->card_no = $request->card_no;
        $opd->provational_daiagonis = $request->provational_daiagonis;
        $opd->treatment_given = $request->treatment_given;
        $opd->investigation = $request->investigation   ;
        $opd->clinical = $request->clinical   ;
        $opd->bml = $request->bml   ;
        $opd->height = $request->height   ;
        $opd->weight = $request->weight   ;
        $opd->pulse = $request->pulse   ;
        $opd->resp_rate = $request->resp_rate   ;
        $opd->bp = $request->bp   ;
        $opd->temp = $request->temp   ;
        $opd->duration = $request->duration   ;
        $opd->reffer_time = $request->reffer_time   ;
        $opd->ambulance = $request->ambulance   ;
        $opd->privet_car = $request->privet_car   ;
        $opd->elective = $request->elective   ;
        $opd->urgent = $request->urgent   ;
        $opd->immedate = $request->immedate   ;
        $opd->diagnosis = $request->diagnosis   ;

        $opd->follow_up = $request->follow_up   ;
        $opd->diagnosis_manage = $request->diagnosis_manage   ;
        $opd->admission = $request->admission ;
        $opd->others = $request->others   ;
        $opd->genarel_checkup = $request->genarel_checkup   ;
        $opd->annual_checkup = $request->annual_checkup   ;
        $opd->pataint_request = $request->pataint_request   ;
        $opd->in_case_admission = $request->in_case_admission   ;
        $opd->shared_cabin = $request->shared_cabin   ;
        $opd->general_ward = $request->general_ward   ;
        $opd->nc_cabin = $request->nc_cabin   ;
        $opd->ceiling = $request->ceiling   ;
        $opd->reason_of_refarell = $request->reason_of_refarell   ;


        $opd->save();

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=IpdOpd::findOrFail($id);
        return view('admin.ipd-opd.edit_ipd',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $opd_id)
    {
        $input = $request->all();
        $opd =  IpdOpd::findOrFail($opd_id);
        $opd->pataint_id = $request->pataint_id   ;
        $opd->date = $request->date   ;
        $opd->hospital_name = $request->hospital_name ;
        $opd->card_no = $request->card_no   ;
        $opd->provational_daiagonis = $request->provational_daiagonis   ;
        $opd->treatment_given = $request->treatment_given   ;
        $opd->investigation = $request->investigation   ;
        $opd->clinical = $request->clinical   ;
        $opd->bml = $request->bml   ;
        $opd->height = $request->height   ;
        $opd->weight = $request->weight   ;
        $opd->pulse = $request->pulse   ;
        $opd->resp_rate = $request->resp_rate   ;
        $opd->bp = $request->bp   ;
        $opd->temp = $request->temp   ;
        $opd->duration = $request->duration   ;
        $opd->reffer_time = $request->reffer_time   ;
        $opd->ambulance = $request->ambulance   ;
        $opd->privet_car = $request->privet_car   ;
        $opd->elective = $request->elective   ;
        $opd->urgent = $request->urgent   ;
        $opd->immedate = $request->immedate   ;
        $opd->diagnosis = $request->diagnosis   ;

        $opd->follow_up = $request->follow_up   ;
        $opd->diagnosis_manage = $request->diagnosis_manage   ;
        $opd->admission = $request->admission ;
        $opd->others = $request->others   ;
        $opd->genarel_checkup = $request->genarel_checkup   ;
        $opd->annual_checkup = $request->annual_checkup   ;
        $opd->pataint_request = $request->pataint_request   ;
        $opd->in_case_admission = $request->in_case_admission   ;
        $opd->shared_cabin = $request->shared_cabin   ;
        $opd->general_ward = $request->general_ward   ;
        $opd->nc_cabin = $request->nc_cabin   ;
        $opd->ceiling = $request->ceiling   ;
        $opd->reason_of_refarell = $request->reason_of_refarell   ;

        $opd->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
