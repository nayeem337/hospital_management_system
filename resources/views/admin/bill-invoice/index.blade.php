@extends('layouts.layout')
@section('content')

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h3>Create New Bill Invoice</h3>
            </div>
            <div class="card-body">
                <form action="{{route('billinvoice.new')}}" method="POST">
                    @csrf
                    <h5 class="text-center text-success mb-4">{{ session('message') }}</h5>
                    @csrf
                    <div class="mb-3">

                        @php
                            $patients= \App\Models\User::all();
                        @endphp

                        <label for="fname">Pataint:</label><br>
                        <select name="user_id" class="form-control">
                            @foreach($patients as $patient)

                                <option value=" {{$patient->id}} "> {{$patient->name}} </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="hospital" class="form-label"> Hospital </label>
                        <input type="text" class="form-control" id="hospital" name="hospital">
                    </div>
                    <div class="mb-3">
                        <label for="hospital_tk" class="form-label"> Hospital Tk </label>
                        <input type="text" class="form-control" id="hospital_tk" name="hospital_tk">
                    </div>
                    <div class="mb-3">
                        <label for="lab" class="form-label"> Lab </label>
                        <input type="text" class="form-control" id="lab" name="lab">
                    </div>
                    <div class="mb-3">
                        <label for="lab_tk" class="form-label"> Lab Tk </label>
                        <input type="text" class="form-control" id="lab_tk" name="lab_tk">
                    </div>
                    <div class="mb-3">
                        <label for="medicine" class="form-label"> Medicine </label>
                        <input type="text" class="form-control" id="medicine" name="medicine">
                    </div>
                    <div class="mb-3">
                        <label for="medicine_tk" class="form-label"> Medicine Tk </label>
                        <input type="text" class="form-control" id="medicine_tk" name="medicine_tk">
                    </div>
                    <div class="mb-3">
                        <label for="consulation" class="form-label"> Consulation </label>
                        <input type="text" class="form-control" id="consulation" name="consulation">
                    </div>
                    <div class="mb-3">
                        <label for="consulation_tk" class="form-label"> Consulation TK </label>
                        <input type="text" class="form-control" id="consulation_tk" name="consulation_tk">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.delete_modal')
@endsection
