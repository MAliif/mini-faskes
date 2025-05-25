@extends('layouts.app')
@php
    $user = Auth()->user();
@endphp
<style>
    th,
    td {
        text-align: center !important;
    }

    form {
        margin: 0px;
        padding: 0px;
    }
</style>
@section('content')
    <div class="container-sm mt-2 col-md-4">
        <div class="card">
            <div class="card-header">
                Form Tambah Obat Pasien
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ url('/obat/save-obat-pasien') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="obat_id">Pilih Obat</label>
                                    <select class="form-select" id="obat_id" name="obat_id" required>
                                        <option value="" disabled selected>-- Pilih Obat --</option>
                                        @foreach ($dataObat as $obat)
                                            <option value="{{ $obat->id }}">
                                                {{ $obat->nama_obat }} - ({{ $obat->jenis }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 pt-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" id="jumlah" type="jumlah" class="form-control" name="jumlah"
                                        required>
                                </div>

                                <div class="col-12 pt-3">
                                    <label for="aturan_pakai">Aturan Pakai</label>
                                    <input id="aturan_pakai" type="text" class="form-control" name="aturan_pakai"
                                        required autofocus>
                                </div>

                                <div class="col-12 pt-3" style="display: none">
                                    <input style="display: none" type="hidden" name="norec_rp" value="{{ $norec_rp }}">
                                </div>

                                <div class="col-12 text-center pt-3">
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-save"></i>
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
