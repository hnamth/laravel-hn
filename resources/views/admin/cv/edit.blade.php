@extends('layouts.admin')

@section('title', 'Edit CV')

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cv.index') }}">CV</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit CV</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit CV</h1>
                <p class="mb-0">Form untuk memperbarui CV.</p>
            </div>
            <div>
                <a href="{{ route('cv.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form action="{{ route('cv.update', $cv->cv_id) }}" method="POST">
                        @method('PUT')
                        @include('admin.cv._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
