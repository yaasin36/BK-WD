<?php

namespace App\Http\Controllers;

use App\Models\Pasien; // Pastikan import namespace benar
use App\Models\DaftarPoliklinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PasienController extends Controller
{
    public function index()
    {
        $pasien_list = Pasien::paginate(10); // Ambil data pasien dengan paginasi
        return view('admin.pasien.index', compact('pasien_list'));
    }

    private function generateNoRM()
    {
        // Ambil pasien terakhir berdasarkan ID
        $lastPasien = Pasien::orderBy('id', 'desc')->first();
        
        // Jika belum ada pasien, mulai dari 001
        $nextNumber = $lastPasien ? ((int) substr($lastPasien->no_rm, -3)) + 1 : 1;

        // Format nomor RM (YYYYMM-XXX)
        return date('Ym') . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }


    public function create()
    {
        return view('admin.pasien.create'); // Return ke view form tambah pasien
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_ktp' => 'required|numeric|digits:1',
            'no_hp' => 'required|string|max:15',
        ]);

        // Tambahkan no_rm
        $validated['no_rm'] = $this->generateNoRM();

        // Simpan data ke database
        Pasien::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function getLogin()
    {
        return view('pasien.login'); // Pastikan ada view bernama `login.blade.php`
    }

    public function getRegister()
    {
        // Logic untuk pendaftaran pasien (misalnya, return form pendaftaran)
        return view('pasien.register'); // Pastikan file view 'register.blade.php' ada
    }


    public function destroy($id)
    {
        // Cari data pasien berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Hapus data pasien
        $pasien->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }

    public function edit($id)
    {
        // Cari data pasien berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Return ke view form edit pasien dengan data pasien
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'no_ktp' => 'required|numeric|max:15',
        'no_hp' => 'required|string|max:15',
    ]);

    // Cari data pasien berdasarkan ID
    $pasien = Pasien::findOrFail($id);

    // Update data pasien
    $pasien->update($validated);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
}

   public function postLogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'no_hp' => 'required|numeric',
        ]);

        // Cek keberadaan pasien
        $pasien = Pasien::where('nama', $request->nama)
                        ->where('no_hp', $request->no_hp)
                        ->first();

        if ($pasien) {
            // Simpan data pasien ke sesi
            $request->session()->put('data', $pasien);
            $request->session()->put('role', 'pasien');

            // Redirect ke dashboard pasien
            return redirect('/pasien');
        } else {
            // Kembalikan ke login dengan pesan error
            return redirect('/pasien/login')->withErrors(['login' => 'Nama atau Nomor HP salah']);
        }
    }
    public function dashboard(Request $request)
    {
        // Ambil data pasien dari sesi
        $pasien = $request->session()->get('data');
    
        // Pastikan pasien ditemukan
        if (!$pasien) {
            return redirect('/pasien/login')->withErrors(['login' => 'Sesi telah berakhir. Silakan login kembali.']);
        }
    
        // Data tambahan jika diperlukan
        $antrian_list = DaftarPoliklinik::where('id_pasien', $pasien->id)->get();
    
        // Kirim data ke view
        return view('pasien.dashboard', compact('antrian_list'));
    }
    
    public function postRegister(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:500',
        'no_ktp' => 'required|numeric|max:16',
        'no_hp' => 'required|string|max:15',
    ]);

    // Gunakan no_hp sebagai password
    Pasien::create([
        'nama' => $validated['nama'],
        'alamat' => $validated['alamat'],
        'no_ktp' => $validated['no_ktp'],
        'no_hp' => $validated['no_hp'],
        'password' => bcrypt($validated['no_hp']), // Enkripsi nomor HP sebagai password
    ]);

    // Redirect ke halaman login dengan pesan sukses
    return redirect()->route('pasien.login')->with('success', 'Akun berhasil dibuat. Silakan login.');
}

    



}
