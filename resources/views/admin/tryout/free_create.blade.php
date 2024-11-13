@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h3>Tambah Tryout</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin-tryout.store')}}" method="post" >
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Tryout</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                        <input type="hidden" class="form-control" id="kategori" name="kategori" value="gratis">
                    <div class="mb-3 ">
                        <label for="durasi" class="form-label">Durasi (menit)</label>
                        <input type="number" id="durasi" name="waktu" class="form-control" required>
                        <input type="hidden" name="paket_id" value="{{$paket->id ?? 0}}">
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

