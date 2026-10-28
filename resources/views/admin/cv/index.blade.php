@extends('layouts.admin')

@section('title', 'Data CV')

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">CV</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data CV</h1>
                <p class="mb-0">List data seluruh CV ({{ $dataCV->count() }})</p>
            </div>
            <div>
                <a href="{{ route('cv.create') }}" class="btn btn-success text-white">Tambah CV</a>
            </div>
        </div>
    </div>

    @include('layouts.partials.flash')

    <div class="row">
        @forelse ($dataCV as $item)
            <div class="col-12 col-md-6 col-xl-4 mb-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold me-3"
                                style="width:56px;height:56px;font-size:1.25rem;">
                                {{ strtoupper(mb_substr($item->first_name, 0, 1) . mb_substr($item->last_name, 0, 1)) }}
                            </div>
                            <div>
                                <h2 class="h5 mb-0">{{ $item->first_name }} {{ $item->last_name }}</h2>
                                <small class="text-gray-500">CV #{{ $item->cv_id }}</small>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <span class="fw-bold">Email:</span>
                                <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                            </li>
                            <li>
                                <span class="fw-bold">Phone:</span>
                                @if ($item->phone)
                                    <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                                @else
                                    <span class="text-gray-500">-</span>
                                @endif
                            </li>
                        </ul>
                    </div>

                    <div class="card-footer bg-white border-0 pt-0 pb-3">
                        <a href="{{ route('cv.edit', $item->cv_id) }}" class="btn btn-info btn-sm">Edit</a>

                        <form action="{{ route('cv.destroy', $item->cv_id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Hapus CV {{ e($item->first_name) }} {{ e($item->last_name) }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-body text-center py-5">
                        <p class="mb-3">Belum ada data CV.</p>
                        <a href="{{ route('cv.create') }}" class="btn btn-success text-white">Tambah CV pertama</a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection
