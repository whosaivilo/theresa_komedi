<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Guest Home</title>
  <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
</head>
<body>
  <div class="container text-center">
    <h2>Selamat Datang, Pengguna!</h2>
    @if(session('success'))
      <p>{{ session('success') }}</p>
    @endif
  </div>
</body>
</html>
