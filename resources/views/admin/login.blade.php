<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/custom-style.css') }}">
</head>

<body class="font-custom">
    <div class="login-container">
        <h2>Login</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>

        <p>Belum punya akun? <a href="{{ route('auth.register') }}">Daftar di sini</a></p>

    </div>


</body>

</html>
