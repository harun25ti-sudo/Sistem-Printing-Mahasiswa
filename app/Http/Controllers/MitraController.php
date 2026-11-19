<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    public function index()
    {
        $dataMitra = Mitra::latest()->get();
        return view('admin.mitra.index', compact('dataMitra'));
    }

    public function create()
    {
        return view('admin.mitra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko'     => 'required|string|max:100',
            'nama_pemilik'  => 'required|string|max:100',
            'email'         => 'required|email|unique:mitra,email',
            'phone'         => 'nullable|string|max:20',
            'alamat'        => 'nullable|string',
            'lokasi'        => 'nullable|string|max:100',
            'deskripsi'     => 'nullable|string',
            'harga_bw'      => 'required|numeric|min:0',
            'harga_warna'   => 'required|numeric|min:0',
            'kapasitas_maks'=> 'required|integer|min:1',
            'status'        => 'required|in:aktif,nonaktif,pending',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except(['foto', '_token']);
        $data['layanan_antar'] = $request->boolean('layanan_antar');
        $data['cetak_warna']   = $request->boolean('cetak_warna');
        $data['near_campus']   = $request->boolean('near_campus');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('mitra', 'public');
        }

        Mitra::create($data);

        return redirect()->route('mitra.index')->with('success', 'Data Mitra berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('admin.mitra.show', compact('mitra'));
    }

    public function edit(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('admin.mitra.edit', compact('mitra'));
    }

    public function update(Request $request, string $id)
    {
        $mitra = Mitra::findOrFail($id);

        $request->validate([
            'nama_toko'     => 'required|string|max:100',
            'nama_pemilik'  => 'required|string|max:100',
            'email'         => 'required|email|unique:mitra,email,' . $id . ',mitra_id',
            'phone'         => 'nullable|string|max:20',
            'alamat'        => 'nullable|string',
            'lokasi'        => 'nullable|string|max:100',
            'deskripsi'     => 'nullable|string',
            'harga_bw'      => 'required|numeric|min:0',
            'harga_warna'   => 'required|numeric|min:0',
            'kapasitas_maks'=> 'required|integer|min:1',
            'status'        => 'required|in:aktif,nonaktif,pending',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except(['foto', '_token', '_method']);
        $data['layanan_antar'] = $request->boolean('layanan_antar');
        $data['cetak_warna']   = $request->boolean('cetak_warna');
        $data['near_campus']   = $request->boolean('near_campus');

        if ($request->hasFile('foto')) {
            if ($mitra->foto) {
                Storage::disk('public')->delete($mitra->foto);
            }
            $data['foto'] = $request->file('foto')->store('mitra', 'public');
        }

        $mitra->update($data);

        return redirect()->route('mitra.index')->with('success', 'Data Mitra berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        if ($mitra->foto) {
            Storage::disk('public')->delete($mitra->foto);
        }
        $mitra->delete();

        return redirect()->route('mitra.index')->with('success', 'Data Mitra berhasil dihapus!');
    }
}
