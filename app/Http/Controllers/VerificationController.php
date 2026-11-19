<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use App\Models\Mitra;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Display accounts requiring verification (Mitra, Kurir, Admin)
     */
    public function index(Request $request)
    {
        $filter = $request->query('role', 'all');

        $query = User::whereIn('role', ['mitra', 'kurir', 'admin'])
                     ->latest();

        if ($filter !== 'all') {
            $query->where('role', $filter);
        }

        $users = $query->get();

        $counts = [
            'total'   => User::whereIn('role', ['mitra', 'kurir', 'admin'])->count(),
            'pending' => User::whereIn('role', ['mitra', 'kurir', 'admin'])->where('status', 'pending')->count(),
            'approved'=> User::whereIn('role', ['mitra', 'kurir', 'admin'])->where('status', 'approved')->count(),
            'rejected'=> User::whereIn('role', ['mitra', 'kurir', 'admin'])->where('status', 'rejected')->count(),
        ];

        return view('admin.verification.index', compact('users', 'counts', 'filter'));
    }

    /**
     * Approve user account
     */
    public function approve(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'approved']);

        // Sync with related tables
        if ($user->role === 'mitra') {
            Mitra::where('email', $user->email)->update(['status' => 'aktif']);
        } elseif ($user->role === 'kurir') {
            Kurir::where('email', $user->email)->update(['status' => 'aktif']);
        }

        return redirect()->back()->with('success', "Akun {$user->name} ({$user->role_label}) berhasil diverifikasi dan disetujui!");
    }

    /**
     * Reject user account
     */
    public function reject(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'rejected']);

        // Sync with related tables
        if ($user->role === 'mitra') {
            Mitra::where('email', $user->email)->update(['status' => 'nonaktif']);
        } elseif ($user->role === 'kurir') {
            Kurir::where('email', $user->email)->update(['status' => 'nonaktif']);
        }

        return redirect()->back()->with('success', "Akun {$user->name} ({$user->role_label}) telah ditolak.");
    }
}
