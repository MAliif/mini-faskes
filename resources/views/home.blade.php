@extends('layouts.app')
@php
    $user = Auth()->user();
@endphp
<style>
    th,
    td {
        vertical-align: middle;
        text-align: center !important;
    }

    form {
        margin: 0px;
        padding: 0px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($user->rolefk == 1)
                    <div class="card">
                        <div class="card-header">Data Pasien</div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No CM</th>
                                        <th>Nama Pasien</th>
                                        <th>Nomor Registrasi</th>
                                        <th>Tanggal Registrasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $index => $pasien)
                                        <tr>
                                            <td>{{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}</td>
                                            <td>{{ $pasien->nocm }}</td>
                                            <td>{{ $pasien->nama }}</td>
                                            <td>{{ $pasien->noregistrasi }}</td>
                                            <td>{{ $pasien->tglregistrasi }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data pasien.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            @if ($data->total() > 9)
                                <div class="pt-3">
                                    <div class="pagination-sm">
                                        {{ $data->links() }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @elseif (in_array($user->rolefk, [2, 3, 4]))
                    <div class="card">
                        <div class="card-header">Data Pasien</div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No CM</th>
                                        <th>Nama Pasien</th>
                                        <th>Nomor Registrasi</th>
                                        <th>Tanggal Registrasi</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $index => $pasien)
                                        <tr>
                                            <td>{{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}</td>
                                            <td>{{ $pasien->nocm }}</td>
                                            <td>{{ $pasien->nama }}</td>
                                            <td>{{ $pasien->noregistrasi }}</td>
                                            <td>{{ $pasien->tglregistrasi }}</td>
                                            <td>
                                                <form action="{{ url('/periksa/periksa-pasien-detail') }}" method="GET">
                                                    <input style="display: none" type="hidden" name="norec_rp"
                                                        value="{{ $pasien->norec_rp }}">
                                                    <button type="submit" class="btn btn-info">
                                                        <i class="bi bi-search"></i>
                                                        Periksa
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data pasien.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            @if ($data->total() > 9)
                                <div class="pt-3">
                                    <div class="pagination-sm">
                                        {{ $data->links() }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
