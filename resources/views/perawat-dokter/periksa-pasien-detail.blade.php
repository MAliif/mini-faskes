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
    <div class="container-sm mt-2">
        <div class="card">
            <div class="card-header">
                Data Pasien
                <br>
                {{ $data->nama }} | {{ ucwords($data->jeniskelamin) }} | {{ $data->tgllahir }} | {{ $data->nohp ?? '-' }}
            </div>
            <div class="card-body">
                <div class="row">
                    @if (isset($data->perawat))
                        <div class="col-12">
                            <span class="badge text-bg-primary">Diperiksa oleh - {{ $data->perawat }}</span>
                        </div>
                    @endif
                    <div class="col-12">
                        <span>Berat Badan : {{ $data->berat_badan ?? '-' }}</span>
                    </div>
                    <div class="col-12">
                        <span>Tekanan Darah : {{ $data->tekanan_darah ?? '-' }}</span>
                    </div>
                    @if ($user->rolefk == 2)
                        <div class="col-12">
                            <form action="{{ url('/periksa/form-periksa-pasien') }}" method="GET">
                                <input style="display: none" type="hidden" name="norec_rp" value="{{ $data->norec_rp }}">
                                <input style="display: none" type="hidden" name="norec" value="{{ $data->norec }}">
                                <button type="submit" class="btn btn-info">
                                    <i class="bi bi-person-fill"></i>
                                    Periksa
                                </button>
                            </form>
                        </div>
                    @endif
                    <hr class="my-2">
                    @if (isset($data->dokter))
                        <div class="col-12">
                            <span class="badge text-bg-primary">Diperiksa oleh - {{ $data->dokter }}</span>
                        </div>
                    @endif
                    <div class="col-12">
                        <span>Keluhan : {{ $data->keluhan ?? '-' }}</span>
                    </div>
                    <div class="col-12">
                        <span>Diagnosa : {{ $data->diagnosa ?? '-' }}</span>
                    </div>
                    @if ($user->rolefk == 3)
                        <div class="col-12">
                            <form action="{{ url('/periksa/form-periksa-pasien') }}" method="GET">
                                <input style="display: none" type="hidden" name="norec_rp" value="{{ $data->norec_rp }}">
                                <input style="display: none" type="hidden" name="norec" value="{{ $data->norec }}">
                                <button type="submit" class="btn btn-info">
                                    <i class="bi bi-person-fill"></i>
                                    Periksa
                                </button>
                            </form>
                        </div>
                    @endif
                    <hr class="my-2">
                    @if (count($obat) > 0)
                        <h3>List Obat Pasien</h3>
                        @forelse ($obat as $index => $d)
                            <div class="col-12">
                                <span>
                                    {{ $d->nama }}
                                    | {{ $d->jenis }}
                                    | {{ $d->jumlah }}
                                    | {{ $d->aturan_pakai }}
                                </span>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 pt-2">
                            <span>Obat belum ada</span>
                        </div>
                    @endif
                    @if ($user->rolefk == 4)
                        <div class="col-12 pt-2">
                            <form action="{{ url('/obat/form-obat-pasien') }}" method="POST">
                                @csrf
                                <input style="display: none" type="hidden" name="norec_rp" value="{{ $data->norec_rp }}">
                                <button type="submit" class="btn btn-warning">
                                    <i class="bi bi-bandaid"></i>
                                    Tambah Obat Pasien
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
