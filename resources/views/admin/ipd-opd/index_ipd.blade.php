
@extends('layouts.layout')
@section('content')

    <div class="container mt-5">
        <div class="card shadow-lg">
{{--            <div class="card-header bg-primary text-white text-center">--}}
{{--                <h3>Create New Opd</h3>--}}
{{--            </div>--}}
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">Card_no</th>
                        <th scope="col">Hospital no</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pods as $opd)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$opd->patient->name ?? ''}}</td>
                        <td>{{$opd->card_no}}</td>
                        <td>{{$opd->hospital_name}}</td>
                        <td>
                            <a href="{{ route('ipd-opd.edit', $opd->id) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('opd.view', $opd->id) }}" target="_blank" class="btn btn-info">Print</a>


                            {{--                            <button type="button" class="btn btn-danger">Print</button>--}}
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
