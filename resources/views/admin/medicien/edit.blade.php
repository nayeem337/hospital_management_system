@extends('layouts.layout')
@section('content')

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h3> Edit Medicine</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('medicien.update', ['id' => $medicine->id]) }}" method="POST">
                    <h5 class="text-center text-success mb-4">{{ session('message') }}</h5>
                @csrf

                <!-- Company Name -->
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $medicine->company_name }}" name="company_name" id="companyName" placeholder="Enter company name" required>
                    </div>

                    <!-- Medicine Name -->
                    <div class="mb-3">
                        <label for="medicineName" class="form-label">Medicine Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $medicine->medicien_name }}" name="medicien_name" id="medicineName" placeholder="Enter medicine name" required>
                    </div>

                    <!-- Generic Name -->
                    <div class="mb-3">
                        <label for="genericName" class="form-label">Generic Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $medicine->generic_name }}" name="generic_name" id="genericName" placeholder="Enter generic name" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update Medicine</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.delete_modal')
@endsection
