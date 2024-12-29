
@extends('layouts.layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">@lang('Medecien')</li>
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
                    <h3 class="card-title">@lang('Medecien')</h3>
                    <div class="card-tools">
                        <button class="btn btn-default" data-toggle="collapse" href="#filter"><i class="fas fa-filter"></i> @lang('Filter')</button>
                    </div>
                </div>

                <table class="table table-striped" id="laravel_datatable">
                    <thead>
                    <tr>
                        <th>@lang('ID')</th>
                        <th>@lang('Diagnostic Name')</th>
                        <th>@lang('Price')</th>
                        <th data-orderable="false">@lang('Actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($diagnostics as $diagnostic)
                        <tr>
                            <td> {{$loop->iteration}}  </td>
                            <td> {{$diagnostic->diagnostic_name}} </td>
                            <td> {{$diagnostic->price}} </td>
                            <td>

                                {{--                             <a href="{{route('medicien.edit',['id' => $medicine->id])}}" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="@lang('Edit')"><i class="fa fa-eye ambitious-padding-btn"></i></a>&nbsp;&nbsp;--}}
                                {{--                             @can('doctor-schedule-delete')--}}
                                {{--                             <a href="{{route('medicien.delete',['id' => $medicine->id])}}" data-href="" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="modal" data-target="#myModal" title="@lang('Delete')"><i class="fa fa-trash ambitious-padding-btn"></i></a>--}}
                                {{--                             @endcan--}}

                                <a href="{{route('diagnostic.edit',['id' => $diagnostic->id])}}" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="@lang('Edit')"><i class="fa fa-eye ambitious-padding-btn"></i></a>&nbsp;&nbsp;
                                @can('doctor-schedule-delete')
                                    <a href="" data-href="{{route('diagnostic.delete',['id' => $diagnostic->id])}}" class="btn btn-info btn-outline btn-circle btn-lg" onclick="return confirm('Are you want to sure to delete this!');"><i class="fa fa-trash ambitious-padding-btn"></i></a>
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
