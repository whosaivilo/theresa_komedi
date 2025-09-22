<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 700px;
            margin: 20px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px 12px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #3498db;
            color: #fff;
            width: 200px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        ul {
            list-style-type: disc;
            margin: 0;
            padding-left: 20px;
        }

        .highlight-text {
            font-weight: bold;
            color: #e74c3c;
        }

        .wisuda-status {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Pegawai</h1>
        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <th>Umur</th>
                <td>{{ $my_age }} tahun</td>
            </tr>
            <tr>
                <th>Hobi</th>
                <td>
                    <ul>
                        @foreach($hobbies as $hobby)
                            <li>{{ $hobby }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Tanggal Harus Wisuda</th>
                <td>{{ $tgl_harus_wisuda }}</td>
            </tr>
            <tr>
                <th>Jarak ke Tanggal Wisuda</th>
                <td>
                    @if($time_to_study_left > 0)
                        <span class="wisuda-status">{{ $time_to_study_left }} hari lagi</span>
                    @elseif($time_to_study_left == 0)
                        <span class="wisuda-status highlight-text">Hari ini tanggal wisuda!</span>
                    @else
                        <span class="wisuda-status highlight-text">Sudah lewat {{ abs($time_to_study_left) }} hari</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Semester Saat Ini</th>
                <td>{{ $current_semester }}</td>
            </tr>
            @if($semester_message)
            <tr>
                <th>Pesan Semester</th>
                <td>{{ $semester_message }}</td>
            </tr>
            @endif
            <tr>
                <th>Cita-cita</th>
                <td>{{ $future_goal }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
