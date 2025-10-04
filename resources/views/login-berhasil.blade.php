<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berhasil!</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #a7bfe8, #619afc);
            /* Gradien biru muda */
            color: #333;
            overflow: hidden;
            position: relative;
        }

        .success-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 90%;
            position: relative;
            z-index: 1;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .success-icon {
            font-size: 60px;
            margin-bottom: 20px;
            color: #28a745;
            /* Warna hijau sukses */
        }

        h2 {
            margin: 0 0 15px 0;
            font-size: 28px;
            color: #333;
            font-weight: 600;
        }

        p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }

        .username-highlight {
            color: #619afc;
            font-weight: 600;
        }

        .back-button {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 25px;
            background-color: #619afc;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .back-button:hover {
            background-color: #4a8ae6;
            transform: translateY(-2px);
        }

        .success-container {
            /* ... properti lain yang sudah ada ... */
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Ini yang membuat elemen di dalamnya rata tengah secara horizontal */
        }
    </style>
</head>

<body>
    <div class="success-container">
        <div class="success-icon">🎉</div>
        <h2>Selamat datang, <span class="username-highlight">{{ $username ?? 'Pengguna' }}</span>!</h2>
        <p>Anda berhasil login ke sistem.</p>
        <a href="/" class="back-button">Go to Dashboard</a>
    </div>
</body>

</html>
