<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all(); // Mengambil semua isi tabel
        $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->Paginate(5);
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Jenis_Kelamin' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);

        Mahasiswa::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        $Mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return view('mahasiswa.detail', compact('Mahasiswa'));
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $mahasiswas = Mahasiswa::where('Nim', 'LIKE', "%{$search}%")
            ->orWhere('Nama', 'LIKE', "%{$search}%")
            ->orWhere('Kelas', 'LIKE', "%{$search}%")
            ->orWhere('Jurusan', 'LIKE', "%{$search}%")
            ->orWhere('Jenis_Kelamin', 'LIKE', "%{$search}%")
            ->orWhere('Email', 'LIKE', "%{$search}%")
            ->orWhere('Alamat', 'LIKE', "%{$search}%")
            ->orWhere('Tanggal_Lahir', 'LIKE', "%{$search}%")
            ->paginate(5);

        return view('mahasiswa.index', ['paginate' => $mahasiswas])->with('succes', $search);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $Mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return view('mahasiswa.edit', compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Jenis_Kelamin' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        Mahasiswa::where('nim', $nim)
            ->update([
                'nim' => $request->Nim,
                'nama' => $request->Nama,
                'kelas' => $request->Kelas,
                'jurusan' => $request->Jurusan,
                'jenis_kelamin' => $request->Jenis_Kelamin,
                'email' => $request->Email,
                'alamat' => $request->Alamat,
                'tanggal_lahir' => $request->Tanggal_Lahir,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        Mahasiswa::where('nim', $nim)->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
