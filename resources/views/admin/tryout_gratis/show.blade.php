@extends('layout.tryout')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h3>Coba Tryout</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <h2><b>{{$tryout->nama}}</b></h2>
                    <h5 >Kategori: <b>{{ucwords($tryout->kategori)}}</b> </h5>
                    <h5 class="mt-5">Tryout ini terdiri dari <b>{{$tryout->soals()->count()}}</b> soal</h5>
                    <h5>Waktu pengerjaan adalah <b>{{$tryout->waktu}}</b> menit</h5>
                </div>
                <div class="mb-3 d-flex justify-content-start">
                    <a href="{{url('admin-tryouts/'.$tryout->id.'/'.$token)}}" class="btn btn-primary">Mulai</a>
                    <a href="" class="btn btn-danger ms-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
