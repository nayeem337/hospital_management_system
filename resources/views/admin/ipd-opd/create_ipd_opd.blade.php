@extends('layouts.layout')
@section('content')

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h3> Create New Opd </h3>
            </div>
            <div class="card-body">
                <form  action="{{route('ipd-opd.store')}}" method="POST">
                    @csrf
                    @php
                        $patients= \App\Models\Patient::all();
                    @endphp
                    <div class="col-md-12">
                        <div class='row'>
                            <div class='col-md-6'>
                                <label for="fname">Pataint:</label><br>
                                <select name="pataint_id" class="form-control">
                                    @foreach($patients as $patient)
                                        @php
                                            $users= \App\Models\User::find($patient->user_id);
                                        @endphp
                                        <option value="{{$users->id  }}">{{$users->name  }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='col-md-6'>
                                <label for="fname">Date:</label><br>
                                <input type="date" id="fname" class="form-control" name="date" value="">
                            </div>
                            <div class='col-md-6'>
                                <label for="fname">Id Card No/Designation:</label><br>
                                <input type="text" id="fname" class="form-control" name="card_no" value="">
                            </div>
                            <div class='col-md-6'>
                                <label for="fname">Hospital Name:</label><br>
                                <select class="form-control" id="toadd" name="hospital_name">
                                    <option selected disabled> Select Hospital</option>
                                    <option > Select Hospital</option>
                                    <option > Ahsania Mission Cancer & General Hospital</option>
                                    <option > International Medical College & Hospital</option>
                                    <option > Hospital A B C</option>
                                    <option id="other" > Others</option>
                                </select>
                                <input type="text" id="hospital_name" class="form-control" name="hospital_name" style="display:none;"  value="">
                            </div>
                            <div class='col-md-6'>
                                <label for="fname">Diagnosis:</label><br>
                                <input type="text" id="diagnosis" class="form-control" name="diagnosis" value="">
                            </div>
                            <div class='col-md-12'>
                                <!--<label for="fname">Select One:</label><br>-->
                                <input type="checkbox" id="immediate" name="immediate" value="1">
                                <label for="immediate">Immediate</label>
                                <input type="checkbox" id="urgent" name="urgent" value="1">
                                <label for="urgent">Urgent</label>
                                <input type="checkbox" id="elective" name="elective" value="1">
                                <label for="elective">Elective</label>
                                <input type="checkbox" id="privet_car" name="privet_car" value="1">
                                <label for="privet_car">Privet Car</label>
                                <input type="checkbox" id="ambulance" name="ambulance" value="1">
                                <label for="ambulance">Ambulance</label><br>

                            </div>

                            <div class='col-md-12'>
                                <label for="fname">Reason Of referral</label><br>
                                <input type="text" id="reason_of_refarell" class="form-control" name="reason_of_refarell" value="">
                            </div>
                            <div class='col-md-6'>
                                <label for="fname">Reffer Time:</label><br>
                                <select name="reffer_time" class="form-control">
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                            </div>
                            <div class='col-md-12'>
                                <label for="fname">Compains & Duration:</label><br>
                                <input type="text" id="diagnosis" class="form-control" name="duration" value="">
                            </div>
                            <div class='col-md-3'>
                                <label for="fname">temp:</label><br>
                                <input type="text" id="diagnosis" class="form-control" name="temp" value="">
                            </div>
                            <div class='col-md-3'>
                                <label for="fname">Bp:</label><br>
                                <input type="text" id="diagnosis" class="form-control" name="bp" value="">
                            </div>
                            <div class='col-md-3'>
                                <label for="fname">Pulse:</label><br>
                                <input type="text" id="diagnosis" class="form-control" name="pulse" value="">
                            </div>
                            <div class='col-md-3'>
                                <label for="fname">Resp:</label><br>
                                <input type="text" id="diagnosis" class="form-control" name="resp_rate" value="">
                            </div>
                            <div class='col-md-3'>
                                <label for="fname">Wight:</label><br>
                                <input type="text" id="diagnosis" class="form-control" name="weight" value="">
                            </div>
                            <div class='col-md-3'>
                                <label for="fname">Height:</label><br>
                                <input type="text" id="diagnosis" class="form-control" name="height" value="">
                            </div>
                            <div class='col-md-3'>
                                <label for="fname">Bmi:</label><br>
                                <input type="text" id="diagnosis" class="form-control" name="bml" value="">
                            </div>
                            <div class='col-md-12'>
                                <label for="fname">Clinical Examinition:</label><br>

                                <textarea id="w3review" name="clinical" rows="4" cols="100">
.
</textarea>


                            </div>
                            <div class='col-md-12'>
                                <label for="fname">Investigition:</label><br>
                                <textarea id="w3review" name="investigation" rows="4" cols="100">
.
</textarea>

                            </div>
                            <div class='col-md-12'>
                                <label for="fname">Provatioanl Daiagonis:</label><br>
                                <textarea id="w3review" name="provational_daiagonis" rows="4" cols="100">
.
</textarea>

                            </div>
                            <div class='col-md-12'>
                                <label for="fname">Treatment Given:</label><br>
                                <textarea id="w3review" name="treatment_given" rows="4" cols="100">
.
</textarea>

                            </div>
                            <div class='col-md-12'>
                                <!--<label for="fname">Select One:</label><br>-->
                                <input type="checkbox" id="follow_up" name="follow_up" value="1">
                                <label for="follow_up">follow_up</label>
                                <input type="checkbox" id="diagnosis_manage" name="diagnosis_manage" value="1">
                                <label for="diagnosis_manage">diagnosis_manage</label>
                                <input type="checkbox" id="admission" name="admission" value="1">
                                <label for="admission">admission</label>
                                <input type="checkbox" id="others" name="others" value="1">
                                <label for="others">others</label>
                                <input type="checkbox" id="genarel_checkup" name="genarel_checkup" value="1">
                                <label for="genarel_checkup">genarel_checkup</label><br>
                                <input type="checkbox" id="annual_checkup" name="annual_checkup" value="1">
                                <label for="annual_checkup">annual_checkup</label><br>
                                <input type="checkbox" id="pataint_request" name="pataint_request" value="1">
                                <label for="pataint_request">pataint_request</label><br>

                            </div>
                            <div class='col-md-12'>
                                <label for="fname">In_case_admission:</label><br>
                                <textarea id="w3review" name="in_case_admission" rows="4" cols="100">
.
</textarea>
                                <div class='col-md-12'>
                                    <!--<label for="fname">Select One:</label><br>-->
                                    <input type="checkbox" id="shared_cabin" name="shared_cabin" value="1">
                                    <label for="shared_cabin">shared_cabin</label>
                                    <input type="checkbox" id="general_ward" name="general_ward" value="1">
                                    <label for="general_ward">general_ward</label>
                                    <input type="checkbox" id="nc_cabin" name="nc_cabin" value="1">
                                    <label for="nc_cabin">nc_cabin</label>
                                    <input type="checkbox" id="ceiling" name="ceiling" value="1">
                                    <label for="ceiling">ceiling</label>


                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create Opd</button>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.delete_modal')
@endsection
