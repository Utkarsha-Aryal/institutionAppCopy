@extends('backend.layout.main')
@section('title')
    Dashboard
@endsection
@section('main-content')
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0"> Welcome @auth{{auth()->user()->name}}@endauth</h4>
            <p class="mb-0 text-muted">Short Description........</p>
        </div>
    </div>
    <!-- End Page Header -->
@endsection
