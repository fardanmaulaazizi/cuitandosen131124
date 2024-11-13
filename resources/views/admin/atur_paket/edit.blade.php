@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-atur')}}" class="text-dark ms-2 me-2">Atur Paket</a> > <a href="{{url('admin-atur/kategori/'.$paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($paket->kategori)}}</a> > <a href={{url('admin-atur/atur/'.$paket->id)}} class="text-dark me-2 ms-2">{{$paket->nama}}</a> > <span class="ms-2">Edit {{$paket->nama}}</span></h5>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin-atur.update', $paket->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="{{$paket->nama}}">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Paket</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{$paket->deskripsi}}</textarea>
                    </div>
                    <div class="mb-3 ">
                        <label for="harga" class="form-label">Harga Paket</label>
                        <input type="number" id="harga" name="harga" class="form-control" value="{{$paket->harga}}">
                    </div>
                    <div class="mb-3 ">
                        <label for="durasi" class="form-label">Durasi Aktif (bulan)</label>
                        <input type="number" id="durasi" name="durasi" class="form-control" value="{{$paket->durasi}}">
                    </div>
                    <div class="mb-3 ">
                        <label for="grup_wa" class="form-label">Informasi Kelas Zoom</label>
                        <input type="text" id="grup_wa" name="grup_wa" class="form-control" value="{{$paket->grup_wa}}">
                    </div>
                    <div class="mb-3 ">
                        <label for="grup_telegram" class="form-label">Grup Telegram</label>
                        <input type="text" id="grup_telegram" name="grup_telegram" class="form-control" value="{{$paket->grup_telegram}}">
                    </div>
                    <div class="mb-3 ">
                        <label for="file" class="form-label">Banner Paket</label>
                        <input type="file" id="file" name="file" class="dropify" data-default-file="{{asset('img/banner-paket/'.$paket->url_foto)}}">
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