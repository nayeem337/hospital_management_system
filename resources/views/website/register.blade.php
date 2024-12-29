<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hospital </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container text-center mt-5">
    <a href="{{route('teacher')}}" class="btn btn-primary btn-lg rounded-pill shadow-sm me-3"> Teacher </a>
    <a href="{{route('student')}}" class="btn btn-success btn-lg rounded-pill shadow-sm me-3"> Student </a>
    <a href="{{route('staff')}}" class="btn btn-danger btn-lg rounded-pill shadow-sm"> Staff </a>
</div>

<!-- Bootstrap JS Bundle (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
