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
                    <li class="breadcrumb-item active">@lang('Prescription Info')</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>


    .prescription-form {
        border: 1px solid gray;
        padding: 20px;
        border-radius: 5px;
        background-color: #ffffff;
        max-width: 900px;
        margin: 30px auto;
    }
    .header1 {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .header-logo {
        max-height: 80px;
    }
    .header-center {
        text-align: center;
    }
    .header-center h2 {
        font-size: 22px;
        font-weight: bold;
        margin: 0;
    }
    .rx-symbol {
        font-size: 24px;
        font-weight: bold;
    }
    .form-label {
        font-weight: bold;
    }
    .note {
        font-size: 12px;
        text-align: center;
        margin-top: 20px;
        font-style: italic;
    }
    .signature {
        margin-top: 30px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">


            <div class="card-header">
                <h3 class="card-title"><b>@lang('Prescription Info')</b></h3>
                <div class="card-tools">
                    @can('prescription-update')
                        <a href="{{ route('prescriptions.edit', $prescription) }}?user_id={{ $prescription->user_id }}" class="btn btn-info">@lang('Edit')</a>
                    @endcan
                    <button id="doPrint" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                </div>
                 </div>
                  </div>


            <div class="prescription-form">

                <header>

                    <!-- Header -->
                    <div class="header1 col-md-12">
                        <!-- Left Logo -->
{{--                        <div class="" style="text-align: center; width: 20%; float: left">--}}
{{--                            <img src="{{ $company->company_logo }}" class="custom-wi-he" alt="">--}}
{{--                        </div>--}}

                        <div class="col-md-3" style="text-align: center; width: 20%; float: left">
                            <img src="{{ $company->company_logo }}" alt="Logo" class="header-logo">
                        </div>

                        <!-- Center Organization Info -->
                        <div class="header-center col-md-8" style="width: 60%; overflow: hidden; float: left">
                            <h2 class="fw-bold" style="letter-spacing: 1px; font-size: 22px;">IUT MEDICAL CENTER</h2>
                            <h2 class="fw-bold" style="letter-spacing: 1px; font-size: 22px;">{{ $company->company_name }}</h2>
{{--                            <p class="m-0" style="text-transform: uppercase; font-size: 15px;">Islamic University of Technology</p>--}}
{{--                            <p class="m-0" style="text-transform: uppercase; font-size: 15px;"> {!! str_replace(["script"], ["noscript"], $company->company_address) !!}</p>--}}
                            <p class="m-0 fw-bold" style="text-transform: uppercase; font-size: 15px;">Organisation of Islamic Cooperation</p>
                            <h5 class="mt-2 fw-bold" style="font-size: 15px;">CLINICAL MANAGEMENT FORM</h5>
                        </div>

                        <!-- Right Logo -->
                        <div class="col-md-3" style="text-align: center; width: 20%; overflow: hidden">
                            <img src="https://www.iutoic-dhaka.edu/uploads/img/1601362099_1582.png" alt="Logo" class="header-logo">
                        </div>
                    </div>

                    <hr style="width: 28%; margin: 0 auto; margin-bottom: 30px;">


                    <p class="fw-bold" style="font-size: 14px; margin-bottom: 15px !important;">SL: 123456</p>

                    <div class="header2">


                        <!-- Patient name And Date -->
                        <div class="row">

                            <div class="col-md-8" style="width: 70%; float: left">
                                <span class="fw-bold" style="font-size: 14px;">Full Name of Patient:</span>  {{ $prescription->user->name }}
                            </div>

                            <div class="col-md-4" style="width: 30%; overflow: hidden">
                                <span class="fw-bold" style="font-size: 14px;">Date:</span>.{{ date($companySettings->date_format ?? 'Y-m-d', strtotime($prescription->prescription_date)) }}
                            </div>

                        </div>



                        <!-- Designation And Age -->
                        <div class="row">

                            <div class="col-md-8" style="width: 70%; float: left">
                                <span class="fw-bold" style="font-size: 14px;">Designation/ID No:</span> {{ $prescription->user->id }}
                            </div>
                            <div class="col-md-4" style="width: 30%; overflow: hidden">
                                <span class="fw-bold" style="font-size: 14px;">Blood_pressure:</span> {{ $prescription->blood_pressure }}
                            </div>

                        </div>


                        <!-- Mobile And Gender -->
                        <div class="row" style="margin-left: -20px">

                           <div class="left" style="width: 70%; float: left">
                               <div class="col-md-8">
                                   <span class="fw-bold" style="font-size: 14px;">Mobile No:</span> {{ $prescription->user->phone }}
                               </div>

                               <div class="col-md-8">
                                   <span class="fw-bold" style="font-size: 14px;">Weight:</span> {{ $prescription->weight.'Kg' }}
                               </div>


                               <div class="col-md-8">
                                   <span class="fw-bold" style="font-size: 14px;">Height:</span> {{ $prescription->height }}
                               </div>
                           </div>


                            <div class="right" style="width: 30%; overflow: hidden">

                                <span class="fw-bold" style="font-size: 14px; margin-right: 9px;">Sex:</span>
                                <label for="male">{{ $prescription->user->gender }}</label>
{{--                                <label for="female">Female</label> <input type="checkbox" name="female" id="female">--}}
                            </div>

                        </div>

                        <!-- Nationality -->
                        <div class="row">
                            <div class="col-md-8">
                                <span class="fw-bold" style="font-size: 14px;">Nationality:</span> {{ $prescription->user->nationality }}
                            </div>
                        </div>

                    </div>

                </header>

                <hr>


                <div class="content">

                    <div class="container">
                        <div class="row">
                            <h5 class="mb-4" style="font-size: 17px;">Chief Complaints & Duration:- <p>{{ $prescription->chief_complaint }}</p></h5>


                            <div class="col-md-5 d-flex flex-column justify-content-between" style="border-right: 1px solid gray !important; height: 500px; width: 30%; float: left">
                                <h5 class="mb-3" style="font-size: 15px;">Vitals: O/E:- <br><br>


                                    </h5>
                                <h5 class="mb-3" style="font-size: 15px;">Investigations :-<br> <br>
                                    @php
                                        // Fetch all necessary data in a single query
                                        $pr_dosages = App\Models\PrescriptionDosage::with('dosage') // Assuming you have a relation defined
                                            ->where('prescription_id', $prescription->id)
                                            ->get();
                                    @endphp

                                    @foreach($pr_dosages as $dos)
                                        <p>{{$dos->dosage->diagnostic_name}} </p>
                                    @endforeach

                                </h5>
                                <h5 class="mb-3" style="font-size: 15px;">Advice/Instructions<br> <br><p>{{ $prescription->note}}</h5>
                            </div>



                            <div class="" style="width: 70%; overflow: hidden">
                                <h5 class="mb-3" style="font-size: 17px;">Rx</h5>
{{--                                @php--}}


{{--                                $pp=\App\Models\PrescriptionMedicine::where('prescription_id',$prescription->id)->get();--}}
{{--                                @endphp--}}
{{--                               @foreach($pp as $p)--}}
{{--                                   @php--}}
{{--                                       $pn=\App\Models\Medicien::find($p->id);--}}
{{--                                   @endphp--}}
{{--                                    <p>{{$pn->medicine_name}} - {{$p->dosage}} - {{$p->days}} - {{$p->time}} </p>--}}
{{--                                @endforeach--}}

                                @php
                                    // Fetch all necessary data in a single query
                                    $pr_medicine = App\Models\PrescriptionMedicine::with('medicine') // Assuming you have a relation defined
                                        ->where('prescription_id', $prescription->id)
                                        ->get();
                                @endphp
                                @foreach($pr_medicine as $m)

                                    <p>{{$m->medicine->medicine_name}} - {{$m->dosage}} - {{$m->days}} - {{$m->time}} </p>
                                @endforeach


                            </div>




                        </div>

                        <div class="row mt-5 mb-5">
                            <div class="col-md-7" style="width: 60%; float: left">

                            </div>

                            <div class="col-md-5" style="width: 40%; overflow: hidden">
                                <strong style="font-size: 16px; display: inline-block; margin-bottom: 10px;">Stamp & Sign of Treating Physician:</strong> <br>
                                <strong style="font-size: 16px;">Date: ____________________</strong>
                            </div>
                        </div>

                    </div>
                </div>


                <hr>


                <!-- Footer -->
                <div class="row signature">

                    <!-- Note -->
                    <p class="note">Natural resistance is better than drug assistance. Ensure the appropriate use of drugs.</p>
                </div>
            </div>

        </div>
</div>
</div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>




{{--<div class="row">--}}
{{--    <div class="col-12">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <h3 class="card-title">@lang('Prescription Info')</h3>--}}
{{--                <div class="card-tools">--}}
{{--                    @can('prescription-update')--}}
{{--                        <a href="{{ route('prescriptions.edit', $prescription) }}?user_id={{ $prescription->user_id }}" class="btn btn-info">@lang('Edit')</a>--}}
{{--                    @endcan--}}
{{--                    <button id="doPrint" class="btn btn-default"><i class="fas fa-print"></i> Print</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div id="print-area" class="card-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="invoice p-3 mb-3">--}}
{{--                            <div class="text-center">--}}
{{--                                <p class="text-right">@lang('Prescription ID') #{{ str_pad($prescription->id, 4, '0', STR_PAD_LEFT) }}<br></p>--}}
{{--                                <h4>--}}
{{--                                    <img src="{{ $company->company_logo }}" class="custom-wi-he" alt=""> {{ $company->company_name }}--}}
{{--                                </h4>--}}
{{--                                <!-- info row -->--}}
{{--                                <div class="row invoice-info">--}}
{{--                                    <div class="col-md-12 invoice-col">--}}
{{--                                        <address>--}}
{{--                                            {!! str_replace(["script"], ["noscript"], $company->company_address) !!}--}}
{{--                                            @lang('Email'): {{ $company->company_email }}<br>--}}
{{--                                            @if ($company->company_phone)--}}
{{--                                                @lang('Phone'): {{ $company->company_phone }}--}}
{{--                                            @endif--}}
{{--                                        </address>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.row -->--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="user_id">@lang('Patient Name')</label>--}}
{{--                                        <p>{{ $prescription->user->name }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="doctor_id">@lang('Doctor Name')</label>--}}
{{--                                        <p>{{ $prescription->doctor->name }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>@lang('Prescription Date')</label>--}}
{{--                                        <p>{{ date($companySettings->date_format ?? 'Y-m-d', strtotime($prescription->prescription_date)) }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="weight">@lang('Weight (kg)')</label>--}}
{{--                                        <p>{{ $prescription->weight }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="height">@lang('Height (feet)')</label>--}}
{{--                                        <p>{{ $prescription->height }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="blood_pressure">@lang('Blood Pressure')</label>--}}
{{--                                        <p>{{ $prescription->blood_pressure }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="chief_complaint">@lang('Chief Complaint')</label>--}}
{{--                                        <p>{!! nl2br(str_replace(["script"], ["noscript"], $prescription->chief_complaint)) !!}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="table-responsive">--}}
{{--                                        <table id="t1" class="table">--}}
{{--                                            <thead>--}}
{{--                                                <tr>--}}
{{--                                                    <th scope="col">@lang('Medicine Name')</th>--}}
{{--                                                    <th scope="col">@lang('Medicine Type')</th>--}}
{{--                                                    <th scope="col">@lang('Instruction')</th>--}}
{{--                                                    <th scope="col">@lang('Days')</th>--}}
{{--                                                </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody id="medicine">--}}
{{--                                                @foreach(json_decode($prescription->medicine_info) as $medicineInfo)--}}
{{--                                                    <tr>--}}
{{--                                                        <td>--}}
{{--                                                            {{ $medicineInfo->medicine_name }}--}}
{{--                                                        </td>--}}
{{--                                                        <td>--}}
{{--                                                            {{ $medicineInfo->medicine_type }}--}}
{{--                                                        </td>--}}
{{--                                                        <td>--}}
{{--                                                            {{ $medicineInfo->instruction }}--}}
{{--                                                        </td>--}}
{{--                                                        <td>--}}
{{--                                                            {{ $medicineInfo->day }}--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
{{--                                                @endforeach--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="table-responsive">--}}
{{--                                        <table class="table">--}}
{{--                                            <thead class="table-dark">--}}
{{--                                                <tr>--}}
{{--                                                    <th scope="col">@lang('Diagnosis')</th>--}}
{{--                                                    <th scope="col">@lang('Instruction')</th>--}}
{{--                                                </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody id="diagnosis">--}}
{{--                                                @foreach (json_decode($prescription->diagnosis_info) as $diagnosisInfo)--}}
{{--                                                    <tr>--}}
{{--                                                        <td>--}}
{{--                                                            {{ $diagnosisInfo->diagnosis }}--}}
{{--                                                        </td>--}}
{{--                                                        <td>--}}
{{--                                                            {{ $diagnosisInfo->diagnosis_instruction }}--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
{{--                                                @endforeach--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="note">@lang('Note')</label>--}}
{{--                                        <p>{{ $prescription->note }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
