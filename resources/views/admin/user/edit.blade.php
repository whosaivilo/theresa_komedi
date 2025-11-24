<!--
=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Start CSS --}}
    @include('layouts.admin.css')
</head>

<body>

    @include('layouts.admin.sidebar')

    <main class="content">

        {{-- Header --}}
        @include('layouts.admin.header')

        {{-- Breadcrumb & Title --}}
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Edit User</h1>
                    <p class="mb-0">Form untuk mengubah data user</p>
                </div>
                <div>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-primary">
                        <i class="far fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        {{-- Form Section --}}
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-4">

                                {{-- Name --}}
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $user->name) }}"
                                        placeholder="Enter full name" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $user->email) }}"
                                        placeholder="Enter email" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password Baru (Opsional)</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Isi jika ingin mengganti password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Confirm Password --}}
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Ulangi password baru">
                                </div>

                                {{-- Profile Picture --}}
                                <div class="col-md-12 mb-3">
                                    <label for="profile_picture">Foto Profil</label>
                                    <input type="file"
                                        class="form-control @error('profile_picture') is-invalid @enderror"
                                        id="profile_picture" name="profile_picture">
                                    @error('profile_picture')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    @if ($user->profile_picture)
                                        <div class="mt-2">
                                            <small class="text-muted">Foto saat ini:</small><br>

                                            @if (filter_var($user->profile_picture, FILTER_VALIDATE_URL))
                                                {{-- Jika URL eksternal --}}
                                                <img src="{{ $user->profile_picture }}"
                                                    style="max-height:120px;border-radius:8px;">
                                            @else
                                                {{-- Jika file lokal --}}
                                                <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                    style="max-height:120px;border-radius:8px;">
                                            @endif
                                        </div>
                                    @endif

                                </div>

                            </div>

                            {{-- Buttons --}}
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.user.index') }}" class="btn btn-outline-secondary">Batal</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.admin.footer')
        @include('layouts.admin.js')

    </main>
</body>

</html>
