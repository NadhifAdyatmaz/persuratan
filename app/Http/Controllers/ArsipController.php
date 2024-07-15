<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('arsip.addsurat', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $filePath = $request->file('file')->store('surats', 'public');

        Arsip::create([
            'nomor' => $request->nomor,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'file' => $filePath,
        ]);

        return redirect()->route('home')->with('success', 'Arsip berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('arsip.viewsurat', compact('arsip'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        $kategoris = Kategori::all(); // Ambil semua kategori untuk dropdown

        return view('arsip.editsurat', compact('arsip', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:2048', // Bisa kosong jika tidak diganti
        ]);

        $arsip = Arsip::findOrFail($id);

        // Update data arsip
        $arsip->nomor = $request->nomor;
        $arsip->kategori_id = $request->kategori_id;
        $arsip->judul = $request->judul;

        // Ganti file jika diunggah baru
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($arsip->file) {
                Storage::disk('public')->delete($arsip->file);
            }

            // Simpan file baru
            $filePath = $request->file('file')->store('surats', 'public');
            $arsip->file = $filePath;
        }


        $arsip->save();

        return redirect()->route('viewsurat', $arsip->id)->with('success', 'Arsip berhasil diperbarui.');
    }

    public function download($id)
    {
        $arsip = Arsip::findOrFail($id);

        // Ambil path dari storage
        $filePath = Storage::disk('public')->path($arsip->file);

        // Nama asli file
        $originalName = pathinfo($filePath, PATHINFO_FILENAME);

        // Mengirim file sebagai response dengan nama asli
        return response()->download($filePath, $originalName, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arsip $arsip)
    {
        $arsip->delete();

        return Redirect::route('home')->with('success', 'Data Terhapus');
    }
}
