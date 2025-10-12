<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthControler extends Controller
{
    public function index()
    { //Menampilkan halaman login
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3|regex:/[A-Z]/',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 3 karakter.',
            'password.regex'    => 'Password harus mengandung huruf kapital.',
        ]);

        if ($request->username === '2457301144' && $request->password === 'There') {
           return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, ' . $request->username . '!');

        } elseif ($request->username === 'Guest' && $request->password === 'Tamu123') {
           return redirect()->route('guest.dashboard')->with('success', 'Selamat datang, ' . $request->username . '!');

        }
        return redirect()->back()->with('error', 'Username dan password salah!');
    }

public function daftar() //Menampilkan form register
{
    return view('admin.register');
}

public function register(Request $request)
{
    $request->validate([
        'nama'             => 'required|regex:/^[^0-9]*$/',
        'alamat'           => 'required|max:300',
        'tanggal_lahir'    => 'required|date',
        'username'         => 'required',
        'password'         => 'required|min:5|regex:/[A-Z]/|regex:/[0-9]/',
        'confirm_password' => 'required|same:password',
    ], [
        'nama.regex'            => 'Nama tidak boleh mengandung angka.',
        'alamat.max'            => 'Alamat maksimal 300 karakter.',
        'password.regex'        => 'Password harus mengandung huruf besar dan angka.',
        'confirm_password.same' => 'Password dan konfirmasi tidak sama.',
    ]);

    return redirect()->route('auth')->with('success', 'Registerasi berhasil, silakan login.');
}
/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{

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
};
