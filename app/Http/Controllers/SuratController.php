<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratController extends Controller
{
    /**
     * Tampil Seluruh Agenda Surat & Hitung Statistik (Dashboard)
     */
    public function index()
    {
        $surats = Surat::latest()->get();

        $totalMasuk = Surat::whereRaw('LOWER(TRIM(jenis_surat)) = ?', ['masuk'])->count();
        $totalKeluar = Surat::whereRaw('LOWER(TRIM(jenis_surat)) = ?', ['keluar'])->count();

        return view('surat.index', compact('surats', 'totalMasuk', 'totalKeluar'));
    }

    /**
     * Mengambil data dengan kondisi jenis_surat adalah 'Masuk'
     */
    public function masuk()
    {
        $surats = Surat::where('jenis_surat', 'Masuk')->get();
        return view('surat.masuk', compact('surats'));
    }

    /**
     * Mengambil data dengan kondisi jenis_surat adalah 'Keluar'
     */
    public function keluar()
    {
        $surats = Surat::where('jenis_surat', 'Keluar')->get();
        return view('surat.keluar', compact('surats'));
    }

    /**
     * Tampilkan halaman cetak surat (untuk di-print via browser)
     */
    public function cetak($id)
    {
        $surat = Surat::findOrFail($id);
        $isPdf = false;
        return view('surat.cetak', compact('surat', 'isPdf'));
    }

    /**
     * Download PDF surat
     */
    public function pdf($id)
    {
        $surat = Surat::findOrFail($id);
        $isPdf = true;
        $pdf = Pdf::loadView('surat.cetak', compact('surat', 'isPdf'));
        $pdf->setPaper('A4', 'portrait');

        $namaFile = str_replace(['/', '\\'], '-', $surat->nomor_surat);

        return $pdf->download('Surat-' . $namaFile . '.pdf');
    }

    /**
     * Form Tambah Surat Baru
     */
    public function create()
    {
        return view('surat.create');
    }

    /**
     * Simpan Data Surat Baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat'       => 'required',
            'jenis_surat'       => 'required|in:Masuk,Keluar,masuk,keluar',
            'pengirim_penerima' => 'required',
            'perihal'           => 'required',
            'tanggal_surat'     => 'required|date',
            'isi'               => 'nullable',
            'penandatangan'     => 'nullable',
            'jabatan'           => 'nullable',
        ]);

        Surat::create($validated);

        \App\Models\ActivityLog::create([
            'username' => auth()->user()->name,
            'aktivitas' => 'Menambahkan surat baru dengan nomor: ' . $request->nomor_surat,
        ]);

        return redirect()->route('surat.index')->with('success', 'Data agenda surat berhasil ditambahkan!');
    }

    /**
     * Form Edit Data Surat
     */
    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        return view('surat.edit', compact('surat'));
    }

    /**
     * Perbarui Data Surat
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nomor_surat'       => 'required',
            'jenis_surat'       => 'required|in:Masuk,Keluar,masuk,keluar',
            'pengirim_penerima' => 'required',
            'perihal'           => 'required',
            'tanggal_surat'     => 'required|date',
            'isi'               => 'nullable',
            'penandatangan'     => 'nullable',
            'jabatan'           => 'nullable',
        ]);

        $surat = Surat::findOrFail($id);
        $surat->update($validated);

        \App\Models\ActivityLog::create([
            'username' => auth()->user()->name,
            'aktivitas' => 'Memperbarui surat dengan nomor: ' . $request->nomor_surat,
        ]);

        return redirect()->route('surat.index')->with('success', 'Data agenda surat berhasil diperbarui!');
    }

    /**
     * Hapus Data Surat
     */
    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $nomorSurat = $surat->nomor_surat;
        $surat->delete();

        \App\Models\ActivityLog::create([
            'username' => auth()->user()->name,
            'aktivitas' => 'Menghapus surat dengan nomor: ' . $nomorSurat,
        ]);

        return redirect()->route('surat.index')->with('success', 'Data agenda surat berhasil dihapus!');
    }
}