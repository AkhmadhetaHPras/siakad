@extends('mahasiswa.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Mahasiswa
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="Nim">Nim</label>
                        <input type="text" name="Nim" class="form-control" id="Nim" aria-describedby="Nim">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" name="Nama" class="form-control" id="Nama" ariadescribedby="Nama">
                    </div>
                    <div class="form-group">
                        <label for="Jenis_Kelamin">Jenis Kelamin</label>
                        <select class="custom-select" id="Jenis_Kelamin" name="Jenis_Kelamin">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Tanggal_Lahir">Tanggal Lahir</label>
                        <input type="date" name="Tanggal_Lahir" class="form-control" id="Tanggal_Lahir" ariadescribedby="Tanggal_Lahir">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="Email" class="form-control" id="Email" ariadescribedby="Email">
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="textarea" name="Alamat" class="form-control" id="Alamat" ariadescribedby="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="Kelas">Kelas</label>
                        <input type="text" name="Kelas" class="form-control" id="Kelas" ariadescribedby="Kelas">
                    </div>
                    <div class="form-group">
                        <label for="Jurusan">Jurusan</label>
                        <input type="text" name="Jurusan" class="form-control" id="Jurusan" ariadescribedby="Jurusan">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection