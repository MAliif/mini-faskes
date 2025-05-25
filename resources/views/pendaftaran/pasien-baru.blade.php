@extends('layouts.app')

@section('content')
    <div class="container-sm mt-2 col-md-3">
        <div class="card">
            <div class="card-header">Daftar Pasien Baru</div>
            <div class="card-body">
                <form method="POST" action="{{ url('/registrasi/save-pasien') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="nama">Nama</label>
                            <input id="nama" type="text" class="form-control" name="nama" required autofocus>
                        </div>

                        <div class="col-12 pt-3">
                            <label for="tgllahir">Tanggal Lahir</label>
                            <input id="tgllahir" type="date" class="form-control" name="tgllahir" required>
                        </div>

                        <div class="col-12 pt-3">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select id="jeniskelamin" class="form-control" name="jeniskelamin" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-12 pt-3">
                            <label for="nohp">Nomor HP</label>
                            <input id="nohp" type="number" class="form-control" name="nohp" required>
                        </div>

                        <div class="col-12 pt-3 text-center">
                            <button type="submit" class="btn btn-success">
                                        <i class="bi bi-save"></i>
                                        Save
                                    </button>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
