<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
</head>
<body>
    <div class="register-container">
        <h2>Form Registrasi</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <input type="text" name="nama" placeholder="Nama">
            <textarea name="alamat" placeholder="Alamat"></textarea>
            <input type="date" name="tanggal_lahir">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password">
            <button type="submit">Daftar</button>
        </form>
    </div>
</body>
</html>
