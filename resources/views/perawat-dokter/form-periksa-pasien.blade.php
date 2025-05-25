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
                @if ($user->rolefk == 2)
                    Form Pengisian Berat Badan & Tekanan Darah Pasien
                @elseif ($user->rolefk == 3)
                    Form Pengisian Keluhan & Diagnosa Pasien
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    @if ($user->rolefk == 2)
                        <div class="col-12">
                            <form method="POST" action="{{ url('/periksa/save-pasien') }}">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="berat_badan">Berat Badan</label>
                                        <input id="berat_badan" type="text" class="form-control" name="berat_badan"
                                            required autofocus>
                                    </div>

                                    <div class="col-12 pt-3">
                                        <label for="tekanan_darah">Tekanan Darah</label>
                                        <input id="tekanan_darah" type="tekanan_darah" class="form-control"
                                            name="tekanan_darah" required>
                                    </div>

                                    <div class="col-12 pt-3" style="display: none">
                                        <input style="display: none" type="hidden" name="norec_rp"
                                            value="{{ $norec_rp }}">
                                        <input style="display: none" type="hidden" name="norec"
                                            value="{{ $norec }}">
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
                    @elseif ($user->rolefk == 3)
                        <div class="col-12">
                            <form method="POST" action="{{ url('/periksa/save-pasien') }}">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="keluhan">Keluhan</label>
                                        <input id="keluhan" type="text" class="form-control" name="keluhan" required
                                            autofocus>
                                    </div>

                                    <div class="col-12 pt-3">
                                        <label for="diagnosa">Diagnosa</label>
                                        <input id="diagnosa" type="diagnosa" class="form-control" name="diagnosa" required>
                                    </div>

                                    <div class="col-12 pt-3" style="display: none">
                                        <input style="display: none" type="hidden" name="norec_rp"
                                            value="{{ $norec_rp }}">
                                        <input style="display: none" type="hidden" name="norec"
                                            value="{{ $norec }}">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
