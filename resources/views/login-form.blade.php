<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Pengaduan Warga</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #a7bfe8, #619afc); /* Gradien biru muda */
            color: #333;
            overflow: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            filter: blur(100px);
            z-index: 0;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.85); /* Sedikit transparan */
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 380px;
            text-align: center;
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px); /* Efek blur pada latar belakang container */
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 30px;
            position: absolute;
            top: 25px;
            left: 25px;
        }

        .header a {
            text-decoration: none;
            color: #555;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .header a svg {
            width: 16px;
            height: 16px;
        }

        .logo {
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #619afc;
            font-weight: 600;
            font-size: 20px;
        }

        .logo svg {
            width: 30px;
            height: 30px;
            fill: #619afc;
        }

        h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
            font-weight: 600;
        }

        .welcome-message {
            font-size: 14px;
            color: #777;
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
            font-weight: 500;
        }

        .input-wrapper {
            position: relative;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            box-sizing: border-box;
            background-color: #f8f8f8;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #619afc;
            box-shadow: 0 0 0 3px rgba(97, 154, 252, 0.2);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
        }

        .options-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .forgot-password a {
            color: #619afc;
            text-decoration: none;
            font-weight: 500;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-weight: 600;
        }

        .sign-in-button {
            background-color: #619afc;
            color: white;
            margin-bottom: 15px;
        }

        .sign-in-button:hover {
            background-color: #4a8ae6;
            transform: translateY(-2px);
        }

        .google-sign-in {
            background-color: white;
            border: 1px solid #ddd;
            color: #555;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 16px;
            padding: 12px;
        }

        .google-sign-in:hover {
            background-color: #f0f0f0;
            transform: translateY(-2px);
        }

        .google-sign-in img {
            width: 20px;
            height: 20px;
        }

        .signup-link {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }

        .signup-link a {
            color: #619afc;
            text-decoration: none;
            font-weight: 500;
        }

        .error-message {
            color: red;
            font-size: 13px;
            margin-top: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            Login
        </div>
        <h2>Welcome Back!</h2>
        <p class="welcome-message">Silakan masukkan username dan password Anda</p>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/auth/login" method="POST">
            @csrf <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" value="{{ old('username') }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" placeholder="Masukkan Password">
                    <span class="password-toggle" onclick="togglePasswordVisibility()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                            <path fill-rule="evenodd" d="M.335 9.362a1.125 1.125 0 0 0 0 1.276c.749 1.748 4.194 5.25 9.665 5.25s8.916-3.502 9.665-5.25a1.125 1.125 0 0 0 0-1.276c-.749-1.748-4.194-5.25-9.665-5.25S1.084 7.614.335 9.362ZM10 10.5a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="options-row">
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <button type="submit" class="sign-in-button">Sign in</button>
        </form>
        <p class="signup-link">Don't have an account? <a href="#">Sign up</a></p>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const toggleIcon = passwordField.nextElementSibling; // Get the SVG icon

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                // Anda bisa ganti ikon di sini jika punya ikon mata terbuka
                toggleIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M13.432 14.886a6 6 0 0 1-7.792-7.792 6 6 0 0 1 7.792 7.792Z" />
                                            <path fill-rule="evenodd" d="M10 1.25A8.75 8.75 0 0 0 .335 9.362a1.125 1.125 0 0 0 0 1.276c.749 1.748 4.194 5.25 9.665 5.25s8.916-3.502 9.665-5.25a1.125 1.125 0 0 0 0-1.276C19.665 7.614 16.22 4.112 10 4.112v0A8.75 8.75 0 0 0 1.25 10a.625.625 0 0 1-1.25 0c0-5.385 4.365-9.75 9.75-9.75h0Zm1.715 6.702a2.5 2.5 0 0 0-3.048-3.048l2.972 2.972ZM3.742 9.805a6 6 0 0 1 6.13-6.13l-6.13 6.13Zm12.516 0c-.829 1.94-3.322 4.112-6.13 4.112v0a6 6 0 0 1-6.13-6.13l6.13 6.13Z" clip-rule="evenodd" />
                                        </svg>`; // Ikon mata terbuka
            } else {
                passwordField.type = 'password';
                // Kembalikan ke ikon mata tertutup
                toggleIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                            <path fill-rule="evenodd" d="M.335 9.362a1.125 1.125 0 0 0 0 1.276c.749 1.748 4.194 5.25 9.665 5.25s8.916-3.502 9.665-5.25a1.125 1.125 0 0 0 0-1.276c-.749-1.748-4.194-5.25-9.665-5.25S1.084 7.614.335 9.362ZM10 10.5a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                                        </svg>`; // Ikon mata tertutup
            }
        }
    </script>
</body>
</html>
