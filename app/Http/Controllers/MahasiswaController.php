<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Mahasiswa_MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $mahasiswas = Mahasiswa::where('Nim', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Nama', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Jurusan', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Jenis_Kelamin', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Email', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Alamat', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Tanggal_Lahir', 'LIKE', '%' . request('search') . '%')
                ->orWhereHas('kelas', function ($query) {
                    $query->where('nama_kelas', 'like', '%' . request('search') . '%');
                })->with('kelas')
                ->paginate(5);

            return view('mahasiswa.index', ['paginate' => $mahasiswas]);
        } else {
            $mahasiswa = Mahasiswa::with('kelas')->get(); // Mengambil semua isi tabel
            $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->Paginate(5);
            return view('mahasiswa.index', ['mahasiswa' => $mahasiswa, 'paginate' => $paginate]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswa.create', ['kelas' => $kelas]);
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
            'Foto' => 'required',
            'Jenis_Kelamin' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);
        $image_name = '';
        if ($request->file('Foto')) {
            $image_name = $request->file('Foto')->store('images', 'public');
        }
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->foto = $image_name;
        $mahasiswa->jenis_kelamin = $request->get('Jenis_Kelamin');
        $mahasiswa->email = $request->get('Email');
        $mahasiswa->alamat = $request->get('Email');
        $mahasiswa->tanggal_lahir = $request->get('Tanggal_Lahir');

        $kelas = Kelas::find($request->get('Kelas'));

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

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
        $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        return view('mahasiswa.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact('Mahasiswa', 'kelas'));
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
            'Foto' => 'required',
            'Jenis_Kelamin' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();

        if ($mahasiswa->foto && file_exists(storage_path('app/public/' . $mahasiswa->foto))) {
            Storage::delete('public/' . $mahasiswa->foto);
        }

        $image_name = $request->file('Foto')->store('images', 'public');
        $mahasiswa->foto = $image_name;

        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->jenis_kelamin = $request->get('Jenis_Kelamin');
        $mahasiswa->email = $request->get('Email');
        $mahasiswa->alamat = $request->get('Email');
        $mahasiswa->tanggal_lahir = $request->get('Tanggal_Lahir');

        $kelas = Kelas::find($request->get('Kelas'));

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

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

    public function khs($id)
    {

        $khs = Mahasiswa_MataKuliah::where('mahasiswa_id', $id)
            ->with('matakuliah')->get();
        $khs->mahasiswa = Mahasiswa::with('kelas')
            ->where('id_mahasiswa', $id)->first();

        return view('mahasiswa.khs', compact('khs'));
    }

    public function cetak_khs($id)
    {
        $khs = Mahasiswa_MataKuliah::where('mahasiswa_id', $id)
            ->with('matakuliah')->get();
        $khs->mahasiswa = Mahasiswa::with('kelas')
            ->where('id_mahasiswa', $id)->first();

        $pdf = PDF::loadview('mahasiswa.khs_pdf', ['khs' => $khs]);
        return $pdf->stream();
    }
}
