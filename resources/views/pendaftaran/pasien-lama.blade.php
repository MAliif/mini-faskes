@extends('layouts.app')
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
            <div class="card-header">Daftar Pasien Lama</div>
            <div class="card-body p-0">
                <table class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No CM</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>No HP</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index => $pasien)
                            <tr>
                                <td>{{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}</td>
                                <td>{{ $pasien->nama }}</td>
                                <td>{{ $pasien->nocm }}</td>
                                <td>{{ $pasien->tgllahir }}</td>
                                <td>{{ ucwords($pasien->jeniskelamin) }}</td>
                                <td>{{ $pasien->nohp }}</td>
                                <td>
                                    <form action="{{ url('/registrasi/regis-pasien') }}" method="POST">
                                        @csrf
                                        <input style="display: none" type="hidden" name="pasien" value="{{ $pasien }}">
                                        <button type="submit" class="btn btn-success">Registrasi</button>
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

                <div class="p-3">
                    <div class="pagination-sm">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
