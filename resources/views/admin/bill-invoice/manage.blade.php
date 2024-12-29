
@extends('layouts.layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">@lang('Bill Invoice')</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-success">{{Session('message')}}</h4>
                    <h3 class="card-title">@lang('Bill Invoice')</h3>
                    <div class="card-tools">
                        <button class="btn btn-default" data-toggle="collapse" href="#filter"><i class="fas fa-filter"></i> @lang('Filter')</button>
                    </div>
                </div>

                <table class="table table-striped" id="laravel_datatable">
                    <thead>
                    <tr>
                        <th>@lang('ID')</th>
                        <th>@lang(' User ID  ')</th>
                        <th>@lang(' Hospital ')</th>
                        <th>@lang(' Hospital Tk ')</th>
                        <th>@lang(' Lab ')</th>
                        <th>@lang(' Lab Tk ')</th>
                        <th>@lang(' Medicine ')</th>
                        <th>@lang(' Medicine Tk ')</th>
{{--                        <th>@lang(' Consulation  ')</th>--}}
{{--                        <th>@lang(' Consulation TK  ')</th>--}}
                        <th data-orderable="false">@lang('Actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td> {{$invoice->id}}</td>
                            <td> {{$invoice->user_id}}</td>
                            <td> {{$invoice->hospital}}</td>
                            <td> {{$invoice->hospital_tk}}</td>
                            <td> {{$invoice->lab}}</td>
                            <td> {{$invoice->lab_tk}}</td>
                            <td> {{$invoice->medicine}}</td>
                            <td> {{$invoice->medicine_tk}}</td>
{{--                            <td> {{$invoice->consulation}}</td>--}}
{{--                            <td> {{$invoice->consulation_tk}} </td>--}}
                            <td>

                                {{--                             <a href="{{route('medicien.edit',['id' => $medicine->id])}}" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="@lang('Edit')"><i class="fa fa-eye ambitious-padding-btn"></i></a>&nbsp;&nbsp;--}}
                                {{--                             @can('doctor-schedule-delete')--}}
                                {{--                             <a href="{{route('medicien.delete',['id' => $medicine->id])}}" data-href="" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="modal" data-target="#myModal" title="@lang('Delete')"><i class="fa fa-trash ambitious-padding-btn"></i></a>--}}
                                {{--                             @endcan--}}

{{--                                <a href="" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="@lang('Edit')"><i class="fa fa-eye ambitious-padding-btn"></i></a>&nbsp;&nbsp;--}}

                                <a href="{{route('billinvoice.edit',['id' => $invoice->id])}}" class="btn btn-success">Edit</a>
                                <a href="{{ route('billinvoice.view', $invoice->id) }}" target="_blank" class="btn btn-info">Print</a>
                                @can('doctor-schedule-delete')
                                    <a href="{{route('billinvoice.delete',['id' => $invoice->id])}}" data-href="" class="btn btn-info btn-outline btn-circle btn-lg btn-danger" onclick="return confirm('Are you want to sure to delete this!');"><i class="fa fa-trash ambitious-padding-btn"></i></a>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layouts.delete_modal')
@endsection
