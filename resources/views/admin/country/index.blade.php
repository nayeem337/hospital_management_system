@extends('layouts.layout')
@section('content')

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h3>Create New Country</h3>
            </div>
            <div class="card-body">
                <form action="{{route('country.new')}}" method="POST">
                    <h5 class="text-center text-success mb-4">{{ session('message') }}</h5>
                @csrf

                <!--  Country Name -->
                    <div class="mb-3">
                        <label for="countryName" class="form-label"> Country Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="country_name" id="companyName" placeholder="Enter Country name" required>
                    </div>


                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Create New Country </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @include('layouts.delete_modal')
@endsection
