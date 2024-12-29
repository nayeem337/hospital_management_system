@extends('layouts.layout')
@section('content')

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h3>Create New Medicine</h3>
            </div>
            <div class="card-body">
                <form action="{{route('diagnostic.new')}}" method="POST">
                    <h5 class="text-center text-success mb-4">{{ session('message') }}</h5>
                @csrf

                <!--  Diagnostic Name -->
                    <div class="mb-3">
                        <label for="diagnosticName" class="form-label"> Diagnostic Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name=" diagnostic_name" id="companyName" placeholder="Enter Diagnostic name" required>
                    </div>

                    <!-- Diagnostic Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label"> Price <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="price" id="medicineName" placeholder="Enter Price" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Create New Diagnostic </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @include('layouts.delete_modal')
@endsection
