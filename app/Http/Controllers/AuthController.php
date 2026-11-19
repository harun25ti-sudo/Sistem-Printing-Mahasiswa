<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use App\Models\Mitra;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    /**
     * Handle login authentication
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Check confirmation status
            if ($user->status === 'pending') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('warning', 'Pendaftaran akun ' . $user->role_label . ' Anda sedang menunggu verifikasi dari Administrator.');
            }

            if ($user->status === 'rejected') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('error', 'Akun Anda telah ditolak oleh Administrator.');
            }

            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))
                ->with('success', 'Selamat datang kembali, ' . $user->name . ' (' . $user->role_label . ')!');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Show registration form
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:100',
            'email'                 => 'required|email|unique:users,email',
            'phone'                 => 'nullable|string|max:30',
            'alamat'                => 'nullable|string|max:500',
            'role'                  => 'required|in:pelanggan,mitra,kurir,admin',
            'password'              => 'required|min:8|confirmed',
        ]);

        $role = $request->role;
        // Pelanggan does not need verification (direct approved)
        // Admin, Kurir, and Mitra require verification from admin (pending)
        $status = ($role === 'pelanggan') ? 'approved' : 'pending';

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'alamat'   => $request->alamat,
            'role'     => $role,
            'status'   => $status,
            'password' => Hash::make($request->password),
        ]);

        // Auto create profile in related tables
        if ($role === 'pelanggan') {
            $nameParts = explode(' ', $user->name, 2);
            Pelanggan::create([
                'first_name' => $nameParts[0],
                'last_name'  => $nameParts[1] ?? '',
                'email'      => $user->email,
                'phone'      => $user->phone ?? '-',
                'birthday'   => now()->subYears(20)->toDateString(),
                'gender'     => 'Other',
            ]);

            // Auto login for customer
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('dashboard')
                ->with('success', 'Pendaftaran akun Pelanggan berhasil! Akun Anda langsung aktif.');
        }

        if ($role === 'mitra') {
            Mitra::create([
                'nama_toko'     => $user->name,
                'nama_pemilik'  => $user->name,
                'email'         => $user->email,
                'phone'         => $user->phone,
                'alamat'        => $user->alamat,
                'status'        => 'pending',
                'harga_bw'      => 300,
                'harga_warna'   => 1000,
                'kapasitas_maks'=> 6,
            ]);
        }

        if ($role === 'kurir') {
            Kurir::create([
                'nama'   => $user->name,
                'email'  => $user->email,
                'phone'  => $user->phone,
                'status' => 'nonaktif', // until verified
            ]);
        }

        return redirect()->route('login')->with('warning', 
            'Pendaftaran berhasil! Akun ' . $user->role_label . ' memerlukan konfirmasi Administrator sebelum dapat digunakan. Silakan tunggu verifikasi.'
        );
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil keluar dari sistem (Logged out).');
    }
}
