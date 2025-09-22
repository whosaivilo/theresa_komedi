<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{

    public function index()
    {
        // Data dasar
        $name = "Theresa";
        $tanggal_lahir = "2005-07-15";
        $tgl_harus_wisuda = "2028-08-01";
        $hobbies = ["Membaca", "Menonton", "Coding", "Makan", "Traveling"];

        // Hitung umur
        $today = new \DateTime(date("Y-m-d"));
        $dob = new \DateTime($tanggal_lahir);
        $my_age = $today->diff($dob)->y;

        // Hitung jarak hari wisuda dengan hari ini
        $wisuda = new \DateTime($tgl_harus_wisuda);
        $interval = $today->diff($wisuda);
        $time_to_study_left = ($wisuda >= $today ? 1 : -1) * $interval->days;

        // Semester saat ini
        $current_semester = 3;

       // Pesan semester
        if ($current_semester < 3) {
        $semester_message = "Masih Awal, Kejar TAK";
        } else {
        $semester_message = "Jangan main-main, kurang-kurangi main game!";
        }

        // Kirim ke view
        return view("pegawai", [
            "name"              => $name,
            "my_age"            => $my_age,
            "hobbies"           => $hobbies,
            "tgl_harus_wisuda"  => $tgl_harus_wisuda,
            "time_to_study_left"=> $time_to_study_left,
            "current_semester"  => $current_semester,
            "semester_message"  => $semester_message,
            "future_goal"       => "Menjadi Software Engineer"
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
