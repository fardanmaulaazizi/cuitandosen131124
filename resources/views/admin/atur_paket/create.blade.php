@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h3>Tambah Paket</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin-atur.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Paket</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3 ">
                        <label for="harga" class="form-label">Harga Paket</label>
                        <input type="number" id="harga" name="harga" class="form-control">
                    </div>
                    <div class="mb-3 ">
                        <label for="durasi" class="form-label">Durasi Aktif (bulan)</label>
                        <input type="number" id="durasi" name="durasi" class="form-control">
                    </div>
                    <div class="mb-3 ">
                        <label for="grup_wa" class="form-label">Grup WA</label>
                        <input type="text" id="grup_wa" name="grup_wa" class="form-control" >
                    </div>
                    <div class="mb-3 ">
                        <label for="grup_telegram" class="form-label">Grup Telegram</label>
                        <input type="text" id="grup_telegram" name="grup_telegram" class="form-control" >
                    </div>
                    <div class="mb-3 ">
                        <label for="file" class="form-label">Banner Paket</label>
                        <input type="file" id="file" name="file" class="dropify">
                        <input type="hidden" id="kategori" name="kategori" class="form-control" value="{{$kategori}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('.dropify').dropify();
    </script>
@endsection