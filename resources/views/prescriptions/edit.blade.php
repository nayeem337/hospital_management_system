@extends('layouts.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('prescriptions.index') }}">@lang('Prescription')</a></li>
                    <li class="breadcrumb-item active">@lang('Edit Prescription')</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@lang('Edit Prescription')</h3>
            </div>
            <div class="card-body">
                <form class="form-material form-horizontal" action="{{ route('prescriptions.update', $prescription) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_id">@lang('Select Patient') <b class="ambitious-crimson">*</b></label>
                                <select name="user_id" id="user_id" class="form-control custom-width-100 select2 @error('user_id') is-invalid @enderror" required>
                                    <option value="">--@lang('Select')--</option>
                                    @foreach($patients as $patient) {
                                        <option value="{{ $patient->id }}" @if($patient->id == request()->user_id) selected @endif>{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Prescription Date') <b class="ambitious-crimson">*</b></label>
                                <input type="text" name="prescription_date" id="prescription_date" class="form-control flatpickr @error('prescription_date') is-invalid @enderror" placeholder="@lang('Prescription Date')" value="{{ old('prescription_date', $prescription->prescription_date) }}" required>
                                @error('prescription_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <button type="button" class="btn btn-info" data-toggle="collapse" href="#caseStudy"><i class="fas fa-file-alt"></i> @lang('Case Study')</button>
                        </div>
                        <br><br>
                    </div>
                    <div id="caseStudy" class="collapse">
                        <div class="card-body border">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="food_allergy">@lang('Food Allergy')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pizza-slice"></i></span>
                                            </div>
                                            <input type="text" id="food_allergy" name="food_allergy" value="{{ old('food_allergy', $patientCaseStudy->food_allergy ?? null) }}" class="form-control @error('food_allergy') is-invalid @enderror" placeholder="@lang('Food Allergy')">
                                            @error('food_allergy')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heart_disease">@lang('Heart Disease')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-heart-broken"></i></span>
                                            </div>
                                            <input type="text" id="heart_disease" name="heart_disease" value="{{ old('heart_disease', $patientCaseStudy->heart_disease ?? null) }}" class="form-control @error('heart_disease') is-invalid @enderror" placeholder="@lang('Heart Disease')">
                                            @error('heart_disease')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="high_blood_pressure">@lang('High Blood Pressure')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tint"></i></span>
                                            </div>
                                            <input type="text" id="high_blood_pressure" name="high_blood_pressure" value="{{ old('high_blood_pressure', $patientCaseStudy->high_blood_pressure ?? null) }}" class="form-control @error('high_blood_pressure') is-invalid @enderror" placeholder="@lang('High Blood Pressure')">
                                            @error('high_blood_pressure')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="diabetic">@lang('Diabetic')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-drumstick-bite"></i></span>
                                            </div>
                                            <input type="text" id="diabetic" name="diabetic" value="{{ old('diabetic', $patientCaseStudy->diabetic ?? null) }}" class="form-control @error('diabetic') is-invalid @enderror" placeholder="@lang('Diabetic')">
                                            @error('diabetic')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="surgery">@lang('Surgery')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-nurse"></i></span>
                                            </div>
                                            <input type="text" id="surgery" name="surgery" value="{{ old('surgery', $patientCaseStudy->surgery ?? null) }}" class="form-control @error('surgery') is-invalid @enderror" placeholder="@lang('Surgery')">
                                            @error('surgery')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="accident">@lang('Accident')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-car-crash"></i></span>
                                            </div>
                                            <input type="text" id="accident" name="accident" value="{{ old('accident', $patientCaseStudy->accident ?? null) }}" class="form-control @error('accident') is-invalid @enderror" placeholder="@lang('Accident')">
                                            @error('accident')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="others">@lang('Others')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-ethereum"></i></span>
                                            </div>
                                            <input type="text" id="others" name="others" value="{{ old('others', $patientCaseStudy->others ?? null) }}" class="form-control @error('others') is-invalid @enderror" placeholder="@lang('Others')">
                                            @error('others')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="family_medical_history">@lang('Family Medical History')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-history"></i></span>
                                            </div>
                                            <input type="text" id="family_medical_history" name="family_medical_history" value="{{ old('family_medical_history', $patientCaseStudy->family_medical_history ?? null) }}" class="form-control @error('family_medical_history') is-invalid @enderror" placeholder="@lang('Family Medical History')">
                                            @error('family_medical_history')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="current_medication">@lang('Current Medication')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-capsules"></i></span>
                                            </div>
                                            <input type="text" id="current_medication" name="current_medication" value="{{ old('current_medication', $patientCaseStudy->current_medication ?? null) }}" class="form-control @error('current_medication') is-invalid @enderror" placeholder="@lang('Current Medication')">
                                            @error('current_medication')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pregnancy">@lang('Pregnancy')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-female"></i></span>
                                            </div>
                                            <input type="text" id="pregnancy" name="pregnancy" value="{{ old('pregnancy', $patientCaseStudy->pregnancy ?? null) }}" class="form-control @error('pregnancy') is-invalid @enderror" placeholder="@lang('Pregnancy')">
                                            @error('pregnancy')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="breastfeeding">@lang('Breast Feeding')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-baby"></i></span>
                                            </div>
                                            <input type="text" id="breastfeeding" name="breastfeeding" value="{{ old('breastfeeding', $patientCaseStudy->breastfeeding ?? null) }}" class="form-control @error('breastfeeding') is-invalid @enderror" placeholder="@lang('Breast feeding')">
                                            @error('breastfeeding')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="health_insurance">@lang('Health Insurance')</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-briefcase-medical"></i></span>
                                            </div>
                                            <input type="text" name="health_insurance" id="health_insurance" class="form-control @error('health_insurance') is-invalid @enderror" placeholder="@lang('Health Insurance')" value="{{ old('health_insurance', $patientCaseStudy->health_insurance ?? null) }}">
                                            @error('health_insurance')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="weight">@lang('Weight (kg)') <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-weight"></i></span>
                                    </div>
                                    <input type="text" id="weight" name="weight" value="{{ old('weight', $prescription->weight) }}" class="form-control @error('weight') is-invalid @enderror" placeholder="@lang('Weight (kg)')" required>
                                    @error('weight')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="height">@lang('Height (feet)') <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-ruler"></i></span>
                                    </div>
                                    <input type="text" id="height" name="height" value="{{ old('height', $prescription->height) }}" class="form-control @error('height') is-invalid @enderror" placeholder="@lang('Height')" required>
                                    @error('height')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="blood_pressure">@lang('Blood Pressure') <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-tint"></i></span>
                                    </div>
                                    <input type="text" id="blood_pressure" name="blood_pressure" value="{{ old('blood_pressure', $prescription->blood_pressure) }}" class="form-control @error('blood_pressure') is-invalid @enderror" placeholder="@lang('Blood Pressure')" required>
                                    @error('blood_pressure')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="chief_complaint">@lang('Chief Complaint') <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <textarea name="chief_complaint" id="chief_complaint" class="form-control @error('chief_complaint') is-invalid @enderror" rows="4" placeholder="Chief Complaint" required>{{ old('chief_complaint', $prescription->chief_complaint) }}</textarea>
                                    @error('chief_complaint')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="t1" class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('Medicine Name')</th>
                                        {{--                                            <th scope="col">@lang('Medicine Type')</th>--}}
                                        <th scope="col">Dosage</th>
                                        {{--                                            <th scope="col">@lang('Instruction')</th>--}}

                                        <th scope="col">@lang('Days')</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col" class="custom-white-space">@lang('Add / Remove')</th>
                                    </tr>
                                    </thead>

                                    <<tbody id="medicine">

                                    @php
                                        // Fetch all necessary data in a single query
                                        $pr_medicine = App\Models\PrescriptionMedicine::with('medicine') // Assuming you have a relation defined
                                            ->where('prescription_id', $prescription->id)
                                            ->get();
                                    @endphp

                                    @foreach($pr_medicine as $medi)

                                        <tr>
                                            <td>
                                                <input type="text" name="medicine_name[]" class="form-control"
                                                       value="{{ $medi->medicine->medicine_name ?? '' }}" placeholder="Medicine Name">
                                                <input type="hidden" name="medicine_id[]" class="form-control"
                                                       value="{{ $medi->medicine->id ?? '' }}" placeholder="Medicine Name">
                                            </td>

                                            <td>
                                                <input type="text" name="dosage[]" class="form-control" value="{{ $medi->dosage ?? '' }}" placeholder="Dosage">
                                            </td>
                                            <td>
                                                <input type="text" name="day[]" class="form-control" value="{{ $medi->days ?? '' }}" placeholder="Days">
                                            </td>
                                            <td>
                                                <input type="text" name="time[]" class="form-control" value="{{ $medi->time ?? '' }}" placeholder="Time">
                                            </td>
                                            <td>
                                                <input type="text" name="comment[]" class="form-control" value="{{ $medi->comment ?? '' }}" placeholder="Comment">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info m-remove"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mt-2 mb-3">
                        <div class="card-body ">
                            <label for="medicine_search" class="h5 font-weight-bold text-info">Medicine Search</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="medicine_search" name="search_data" placeholder="Search for medicines..." aria-label="Search for medicines" aria-describedby="basic-addon1">
                            </div>

                            <!-- Suggestion List Dropdown -->
                            <ul id="suggestion_list" class="list-group position-absolute w-100 mt-2" style="z-index: 1000; max-height: 200px; overflow-y: auto; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,.1); border-radius: .25rem; cursor: pointer; ">
                            </ul>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-dark">
                                    <tr>
                                        <th scope="col">@lang('Diagnosis')</th>
                                        <th scope="col">@lang('Instruction')</th>
                                        <th scope="col" class="custom-white-space custom-width-120">@lang('Add / Remove')</th>
                                    </tr>
                                    </thead>
                                    <tbody id="diagnosis">
                                    @php
                                        // Fetch all necessary data in a single query
                                        $pr_diaos = App\Models\PrescriptionDosage::with('dosage') // Assuming you have a relation defined
                                            ->where('prescription_id', $prescription->id)
                                            ->get();
                                    @endphp

                                    @foreach($pr_diaos  as $dos)

                                        <tr>
                                            <td>
                                                <input type="text" name="diagnosis[]" class="form-control" value="{{ $dos->dosage->diagnostic_name ?? '' }}" placeholder="Diagnosis">
                                                <input type="hidden" name="diagnostic_id[]" class="form-control" value="{{ $dos->dosage->id ?? '' }}" placeholder="Diagnosis">
                                            </td>
                                            <td>
                                                <input type="text" name="diagnosis_instruction[]" value="{{ $dos->instruction ?? '' }}" class="form-control" placeholder="Instruction">
                                            </td>
                                            <td>
                                                <!--                    <button type="button" class="btn btn-info d-add"><i class="fas fa-plus"></i></button>-->
                                                <button type="button" class="btn btn-danger d-remove"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mt-2 mb-3">
                        <div class="card-body ">
                            <label for="medicine_search" class="h5 font-weight-bold text-info">
                                Diagnosis Search</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="diagnosis_search" name="diagnosis_data" placeholder="Search Diagnosis..." aria-label="Search for medicines" aria-describedby="basic-addon1">
                            </div>

                            <!-- Suggestion List Dropdown -->
                            <ul id="diagnosis_list" class="list-group position-absolute w-100 mt-2" style="z-index: 1000; max-height: 200px; overflow-y: auto; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,.1); border-radius: .25rem; cursor: pointer; ">
                            </ul>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="blood_group">Nationality</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-heartbeat"></i></span>
                                    </div>
                                    <select name="nationality" class="form-control @error('gender') is-invalid @enderror" id="blood_group">
                                        <option value="">--@lang('Select')--</option>
                                        @php
                                            $countrys=App\Models\Country::get();
                                        @endphp

                                        @foreach( $countrys as $country)
                                            <option value="{{$country->id}}" {{ old('nationality') === 'bangladesh' ? 'selected' : '' }}>{{$country->country_name}}</option>
                                        @endforeach


                                    </select>
                                    @error('blood_group')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note">@lang('Note')</label>
                                <div class="input-group mb-3">
                                    <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" rows="4" placeholder="@lang('Note')">{{ old('note') }}</textarea>
                                    @error('note')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table id="t1" class="table">--}}
{{--                                    <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th scope="col">@lang('Medicine Name')</th>--}}
{{--                                            <th scope="col">@lang('Medicine Type')</th>--}}
{{--                                            <th scope="col">@lang('Instruction')</th>--}}
{{--                                            <th scope="col">@lang('Days')</th>--}}
{{--                                            <th scope="col" class="custom-white-space">@lang('Add / Remove')</th>--}}
{{--                                        </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                        @if (old('medicine_name'))--}}
{{--                                            @foreach (old('medicine_name') as $key => $value)--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="medicine_name[]" class="form-control" value="{{ old('medicine_name')[$key] }}" placeholder="Medicine Name">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="medicine_type[]" class="form-control" value="{{ old('medicine_type')[$key] }}" placeholder="Medicine Type">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="instruction[]" class="form-control" value="{{ old('instruction')[$key] }}" placeholder="Instructions">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="day[]" class="form-control" value="{{ old('day')[$key] }}" placeholder="Days">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <button type="button" class="btn btn-info m-add"><i class="fas fa-plus"></i></button>--}}
{{--                                                        <button type="button" class="btn btn-info m-remove"><i class="fas fa-trash"></i></button>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                        @else--}}
{{--                                            @foreach(json_decode($prescription->medicine_info) as $medicineInfo)--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="medicine_name[]" class="form-control" value="{{ $medicineInfo->medicine_name }}" placeholder="Medicine Name">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="medicine_type[]" class="form-control" value="{{ $medicineInfo->medicine_type }}" placeholder="Medicine Type">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="instruction[]" class="form-control" value="{{ $medicineInfo->instruction }}" placeholder="Instructions">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="day[]" class="form-control" value="{{ $medicineInfo->day }}" placeholder="Days">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <button type="button" class="btn btn-info m-add"><i class="fas fa-plus"></i></button>--}}
{{--                                                        <button type="button" class="btn btn-info m-remove"><i class="fas fa-trash"></i></button>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                        @endif--}}
{{--                                        <tbody id="medicine">--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <input type="text" name="medicine_name[]" class="form-control" value="" placeholder="Medicine Name">--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <input type="text" name="medicine_type[]" class="form-control" value="" placeholder="Medicine Type">--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <input type="text" name="instruction[]" class="form-control" value="" placeholder="Instructions">--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <input type="text" name="day[]" class="form-control" value="" placeholder="Days">--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <button type="button" class="btn btn-info m-add"><i class="fas fa-plus"></i></button>--}}
{{--                                                    <button type="button" class="btn btn-info m-remove"><i class="fas fa-trash"></i></button>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table">--}}
{{--                                    <thead class="table-dark">--}}
{{--                                        <tr>--}}
{{--                                            <th scope="col">@lang('Diagnosis')</th>--}}
{{--                                            <th scope="col">@lang('Instruction')</th>--}}
{{--                                            <th scope="col" class="custom-white-space custom-width-120">@lang('Add / Remove')</th>--}}
{{--                                        </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                        @if (old('diagnosis'))--}}
{{--                                            @foreach (old('diagnosis') as $key => $value)--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="diagnosis[]" class="form-control" value="{{ old('diagnosis')[$key] }}" placeholder="Diagnosis">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="diagnosis_instruction[]" class="form-control" value="{{ old('diagnosis_instruction')[$key] }}" placeholder="Instruction">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <button type="button" class="btn btn-info d-add"><i class="fas fa-plus"></i></button>--}}
{{--                                                        <button type="button" class="btn btn-info d-remove"><i class="fas fa-trash"></i></button>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                        @else--}}
{{--                                            @foreach (json_decode($prescription->diagnosis_info) as $diagnosisInfo)--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="diagnosis[]" class="form-control" value="{{ $diagnosisInfo->diagnosis }}" placeholder="Diagnosis">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <input type="text" name="diagnosis_instruction[]" class="form-control" value="{{ $diagnosisInfo->diagnosis_instruction }}" placeholder="Instruction">--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <button type="button" class="btn btn-info d-add"><i class="fas fa-plus"></i></button>--}}
{{--                                                        <button type="button" class="btn btn-info d-remove"><i class="fas fa-trash"></i></button>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                        @endif--}}
{{--                                        <tbody id="diagnosis">--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <input type="text" name="diagnosis[]" class="form-control" value="" placeholder="Diagnosis">--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <input type="text" name="diagnosis_instruction[]" class="form-control" value="" placeholder="Instruction">--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <button type="button" class="btn btn-info d-add"><i class="fas fa-plus"></i></button>--}}
{{--                                                    <button type="button" class="btn btn-info d-remove"><i class="fas fa-trash"></i></button>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="note">@lang('Note')</label>--}}
{{--                                <div class="input-group mb-3">--}}
{{--                                    <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" rows="4" placeholder="Note">{{ old('note', $prescription->note) }}</textarea>--}}
{{--                                    @error('note')--}}
{{--                                        <div class="invalid-feedback">--}}
{{--                                            {{ $message }}--}}
{{--                                        </div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" value="@lang('Submit')" class="btn btn-outline btn-info btn-lg"/>
                                    <a href="{{ route('prescriptions.index') }}" class="btn btn-outline btn-warning btn-lg">@lang('Cancel')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- jQuery Script -->
{{--for medicine--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Keyup event to fetch medicine suggestions
        $('#medicine_search').on('keyup', function() {
            let query = $(this).val();

            if (query.length > 1) {
                $.ajax({
                    url: "{{ route('search.medicine') }}",
                    method: "GET",
                    data: { search_data: query }, // Match 'search_data' with input 'name'

                    success: function(data) {
                        // Clear the list before appending
                        $('#suggestion_list').empty();

                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                $('#suggestion_list').append(`<li class="list-group-item" data-id="${item.id}">${item.medicine_name} - ${item.company_name} (Generic:${item.generic_name})</li>`);
                            });
                        } else {
                            $('#suggestion_list').append(`<li class="list-group-item text-muted">No matches found</li>`);
                        }
                    },
                    error: function() {
                        console.error('Error fetching suggestions.');
                    }
                });
            } else {
                $('#suggestion_list').empty(); // Clear suggestions if query is empty
            }
        });

        // Handle click on a suggestion
        $(document).on('click', '#suggestion_list li', function() {
            // Get the selected medicine name
            let medicineName = $(this).text();
            let medicineId = $(this).data('id');
            // console.log(medicineId);

            // Clear the search field and suggestion list
            $('#medicine_search').val('');
            $('#suggestion_list').empty();

            // Append a new row to the tbody
            $('#medicine').append(`
                <tr>
                    <td>
                        <input type="text" name="medicine_name[]" class="form-control" value="${medicineName}" placeholder="Medicine Name">
                        <input type="hidden" name="medicine_id[]" value="${medicineId}">
                    </td>

                    <td>
                        <input type="text" name="dosage[]" class="form-control" value="" placeholder="dosage">
                    </td>
                     <td>
                        <input type="text" name="day[]" class="form-control" value="" placeholder="Days">
                    </td>
                    <td>
                        <input type="text" name="time[]" class="form-control" value="" placeholder="time">
                    </td>
                       <td>
                        <input type="text" name="comment[]" class="form-control" value="" placeholder="comment">
                    </td>


                    <td>
                        <button type="button" class="btn btn-info m-remove"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            `);
        });

        // Optional: Handle row removal
        $(document).on('click', '.m-remove', function() {
            $(this).closest('tr').remove(); // Remove the clicked row
        });
    });
</script>

{{--for diasoge--}}
<script>
    $(document).ready(function () {
        // Keyup event to fetch diagnosis suggestions
        $('#diagnosis_search').on('keyup', function () {
            let query = $(this).val();

            if (query.length > 1) {
                $.ajax({
                    url: "{{ route('search.diagnosis') }}", // Update this route to match your backend logic
                    method: "GET",
                    data: { diagnosis_data: query }, // Send the search query
                    success: function (data) {
                        // Clear the list before appending new suggestions
                        $('#diagnosis_list').empty();

                        if (data.length > 0) {
                            $.each(data, function (index, item) {
                                $('#diagnosis_list').append(`<li class="list-group-item" data-id="${item.id}">${item.diagnostic_name}</li>`);
                            });
                        } else {
                            $('#diagnosis_list').append(`<li class="list-group-item text-muted">No matches found</li>`);
                        }
                    },
                    error: function () {
                        console.error('Error fetching suggestions.');
                    },
                });
            } else {
                $('#diagnosis_list').empty(); // Clear suggestions if query is too short
            }
        });

        // Handle click on a suggestion
        $(document).on('click', '#diagnosis_list li', function () {
            // Get the selected diagnosis name
            let diagnosticName = $(this).text();
            let diagnosticId = $(this).data('id');
            // console.log(diagnosticId);

            // Clear the search field and suggestion list
            $('#diagnosis_search').val('');
            $('#diagnosis_list').empty();

            // Append a new row to the table with the selected diagnosis
            $('#diagnosis').append(`
            <tr>
                <td>
                    <input type="text" name="diagnosis[]" class="form-control" value="${diagnosticName}" placeholder="Diagnosis">
                       <input type="hidden" name="diagnostic_id[]" value="${diagnosticId }">
                </td>
                <td>
                    <input type="text" name="diagnosis_instruction[]" class="form-control" placeholder="Instruction">
                </td>
                <td>
<!--                    <button type="button" class="btn btn-info d-add"><i class="fas fa-plus"></i></button>-->
                    <button type="button" class="btn btn-danger d-remove"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        `);
        });



        // Handle row removal
        $(document).on('click', '.d-remove', function () {
            $(this).closest('tr').remove(); // Remove the clicked row
        });
    });

</script>
@endsection

@push('footer')
    <script src="{{ asset('assets/js/custom/prescription.js') }}"></script>
@endpush
