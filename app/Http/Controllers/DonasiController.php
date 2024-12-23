<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use Illuminate\Support\Facades\Storage;

class DonasiController extends Controller
{
    public function create()
    {
        return view('donasi.create');
    }
    
    // Menampilkan form donasi
    public function index()
    {
        return view('donasi');
    }

    // Menyimpan data donasi ke database
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama' => 'required|string|max:255',
            'pesan' => 'required|string|max:500',
            'jumlah_donasi' => 'required|numeric|min:1000',
            'bukti_transfer' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // File max 2MB
        ]);

        // Mengupload file bukti transfer
        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $filePath = $file->store('bukti_transfer', 'public'); // Simpan di folder public/bukti_transfer
        }

        // Simpan data donasi ke database
        Donasi::create([
            'nama' => $request->nama,
            'pesan' => $request->pesan,
            'jumlah_donasi' => $request->jumlah_donasi,
            'bukti_transfer' => $filePath ?? null,  // Simpan path file jika ada
        ]);

        // Redirect ke halaman sukses atau halaman lain
        return redirect()->route('donasi')->with('success', 'Donasi Anda berhasil dikirim!');
    }
}
