<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KurirController extends Controller
{
    public function index()
    {
        $dataKurir = Kurir::latest()->get();
        return view('admin.kurir.index', compact('dataKurir'));
    }

    public function create()
    {
        return view('admin.kurir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'            => 'required|string|max:100',
            'email'           => 'required|email|unique:kurir,email',
            'phone'           => 'nullable|string|max:20',
            'no_kendaraan'    => 'nullable|string|max:20',
            'jenis_kendaraan' => 'nullable|string|max:50',
            'status'          => 'required|in:aktif,nonaktif,bertugas',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except(['foto', '_token']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('kurir', 'public');
        }

        Kurir::create($data);

        return redirect()->route('kurir.index')->with('success', 'Data Kurir berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $kurir = Kurir::findOrFail($id);
        return view('admin.kurir.show', compact('kurir'));
    }

    public function edit(string $id)
    {
        $kurir = Kurir::findOrFail($id);
        return view('admin.kurir.edit', compact('kurir'));
    }

    public function update(Request $request, string $id)
    {
        $kurir = Kurir::findOrFail($id);

        $request->validate([
            'nama'            => 'required|string|max:100',
            'email'           => 'required|email|unique:kurir,email,' . $id . ',kurir_id',
            'phone'           => 'nullable|string|max:20',
            'no_kendaraan'    => 'nullable|string|max:20',
            'jenis_kendaraan' => 'nullable|string|max:50',
            'status'          => 'required|in:aktif,nonaktif,bertugas',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except(['foto', '_token', '_method']);

        if ($request->hasFile('foto')) {
            if ($kurir->foto) {
                Storage::disk('public')->delete($kurir->foto);
            }
            $data['foto'] = $request->file('foto')->store('kurir', 'public');
        }

        $kurir->update($data);

        return redirect()->route('kurir.index')->with('success', 'Data Kurir berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $kurir = Kurir::findOrFail($id);
        if ($kurir->foto) {
            Storage::disk('public')->delete($kurir->foto);
        }
        $kurir->delete();

        return redirect()->route('kurir.index')->with('success', 'Data Kurir berhasil dihapus!');
    }
}
