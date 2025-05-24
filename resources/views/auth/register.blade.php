@extends('layouts.app')

@section('content')
    <div class="container-sm mt-2 col-md-7">
        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form method="POST" action="{{ url('/register-post') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                        </div>

                        <div class="col-4">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="col-4">
                            <label for="rolefk">Pilih Posisi</label>
                            <select class="form-select" id="rolefk" name="rolefk" required>
                                <option value="" disabled selected>-- Pilih Role --</option>
                            </select>
                        </div>

                        <div class="col-8"></div>
                        <div class="col-4 pt-3 text-end">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- Import API --}}
<script src="{{ asset('js/app-helper.js') }}"></script>
<script>
    useApi.get('/role/get-role').then(res => {
        const select = document.getElementById('rolefk');
        res.forEach(dat => {
            const option = document.createElement('option');
            option.value = dat.id;
            option.textContent = toCapitalCase(dat.role);
            select.appendChild(option);
        });
    }).catch(e => {
        console.log(e)
    });

    // External Function
    function toCapitalCase(str) {
        return str.toLowerCase().replace(/\b\w/g, char => char.toUpperCase());
    }
</script>
