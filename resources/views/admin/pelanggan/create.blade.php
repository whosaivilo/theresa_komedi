<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Form Tambah Pelanggan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt Premium Bootstrap Dashboard - Forms">
    <meta name="author" content="Themesberg">
    <meta name="description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="og:title" content="Volt Premium Bootstrap Dashboard - Forms">
    <meta property="og:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="og:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="twitter:title" content="Volt Premium Bootstrap Dashboard - Forms">
    <meta property="twitter:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="twitter:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets-admin') }}/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets-admin') }}/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets-admin') }}/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('assets-admin') }}/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="{{ asset('assets-admin') }}/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">


    {{-- Start CSS --}}
   @include('layouts.admin.css')
</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

@include('layouts.admin.sidebar')

    <main class="content">

        {{-- Start Content --}}
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#"> </a>
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pelanggan</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Tambah Pelanggan</h1>
                    <p class="mb-0">Form untuk menambahkan data pelanggan baru</p>
                </div>
                <div>
                    <a href="{{ route('pelanggan.index') }}"
                        class="btn btn-primary"><i class="far fa-question-circle me-1"></i> Kembali</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-info">
                                {!! session('success') !!}
                            </div>
                        @endif
                        <form action="{{ route('pelanggan.store') }}" method="POST">
                            @csrf

                            <div class="row mb-4">
                                <!-- First Name -->
                                <div class="col-md-4 mb-3">
                                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                        name="first_name" value="{{ old('first_name') }}"
                                        placeholder="Enter first name" required>
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Birthday -->
                                <div class="col-md-4 mb-3">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" class="form-control @error('birthday') is-invalid @enderror"
                                        id="birthday" name="birthday" value="{{ old('birthday') }}">
                                    @error('birthday')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-4 mb-3">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}"
                                        placeholder="Enter email" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Last Name -->
                                <div class="col-md-4 mb-3">
                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                        name="last_name" value="{{ old('last_name') }}"
                                        placeholder="Enter last name" required>
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gender -->
                                <div class="col-md-4 mb-3">
                                    <label for="gender">Gender</label>
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                        name="gender">
                                        <option value="">-- Pilih --</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                            Female</option>
                                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="col-md-4 mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone') }}"
                                        placeholder="Enter phone number">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-warning">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>


        <div class="card theme-settings bg-gray-800 theme-settings-expand" id="theme-settings-expand">
            <div class="card-body bg-gray-800 text-white rounded-top p-3 py-2">
                <span class="fw-bold d-inline-flex align-items-center h6">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Settings
                </span>
            </div>
        </div>
        {{-- End Main Content --}}

        @include('layouts.admin.footer')

        @include('layouts.admin.js')


</body>

</html>
