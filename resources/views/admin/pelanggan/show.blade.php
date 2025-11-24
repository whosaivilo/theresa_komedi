@extends('layouts.admin.app')
@section('content')


    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pelanggan</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
            <div>
                <h1 class="h4">Detail Pelanggan</h1>
                <p class="mb-0">Informasi lengkap dan file pendukung</p>
            </div>
            <div>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
        {{-- DATA PELANGGAN --}}
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <h5 class="mb-3">Informasi Pelanggan</h5>
                <table class="table table-bordered">
                    <tr>
                        <th width="200">First Name</th>
                        <td>{{ $pelanggan->first_name }}</td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td>{{ $pelanggan->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $pelanggan->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $pelanggan->phone }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $pelanggan->gender }}</td>
                    </tr>
                    <tr>
                        <th>Birthday</th>
                        <td>{{ $pelanggan->birthday }}</td>
                    </tr>
                </table>
            </div>
        </div>
        {{-- FILE PENDUKUNG --}}
        <div class="card border-0 shadow">
            <div class="card-body">
                <h5 class="mt-4">File Pendukung</h5>

                <form action="{{ route('pelanggan.uploadFile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="ref_table" value="pelanggan">

                    <input type="hidden" name="ref_id" value="{{ $pelanggan->pelanggan_id }}">

                    <input type="file" name="files[]" multiple>
                    <button type="submit" class="btn btn-primary">Upload File</button>
                </form>
                <hr>
                <h6>Daftar File</h6>

                @if ($files->count())
                    <ul class="list-group">
                        @foreach ($files as $file)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ asset('storage/uploads/' . $file->file) }}" target="_blank">
                                    {{ $file->file }}
                                </a>

                                <form action="{{ route('pelanggan.deleteFile', $file->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Belum ada file pendukung.</p>
                @endif

            </div>
        </div>
    </div>
@endsection
