@extends('layouts.app')
@php
    $user = Auth()->user();
@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($user->rolefk == 1)
                    <div class="row mb-3">
                        <div class="col-3">
                            <a href="{{ url('/registrasi/pasien-baru') }}" class="btn btn-info">Daftar Pasien Baru</a>
                        </div>
                        <div class="col-3">
                            <a href="{{ url('/registrasi/pasien-lama') }}" class="btn btn-warning">Daftar Pasien Lama</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Data Pasien</div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Registrasi</th>
                                        <th>No CM</th>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal Registrasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $index => $pasien)
                                        <tr>
                                            <td>{{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}</td>
                                            <td>{{ $pasien->noregistrasi }}</td>
                                            <td>{{ $pasien->nocm }}</td>
                                            <td>{{ $pasien->nama }}</td>
                                            <td>{{ $pasien->tglregistrasi }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data pasien.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="p-3">
                                <div class="pagination-sm">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
