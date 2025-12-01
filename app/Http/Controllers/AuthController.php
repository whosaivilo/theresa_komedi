<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        session(['last_login' => now()]);

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        } else {
            return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
        }
    }

    public function daftar() //Menampilkan form register
    {
        return view('pages.auth.register');
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
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();      // Hapus semua session
        $request->session()->regenerateToken(); // Cegah CSRF

        return redirect()->route('auth')->with('success', 'Logout berhasil!');
    }
}
