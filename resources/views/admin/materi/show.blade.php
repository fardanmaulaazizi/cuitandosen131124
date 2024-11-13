@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url(Str::startsWith(request()->path(), 'admin-basic') ? 'admin-mypaket' : 'admin-atur' )}}" class="text-dark ms-2 me-2">{{Str::startsWith(request()->path(), 'admin-basic') ? 'Paket Saya' : 'Atur Paket'}} </a> > <a href="{{url('admin-atur/kategori/'.$materi->paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($materi->paket->kategori)}}</a> > <a href={{url(Str::startsWith(request()->path(), 'admin-basic') ? 'admin-mypaket/'.$materi->paket->id : 'admin-atur/atur/'.$materi->paket->id)}} class="text-dark me-2 ms-2">{{$materi->paket->nama}}</a> > <span class="ms-2">{{$materi->nama}}</span></h5>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <h2><b>{{$materi->nama}}</b></h2>
                </div>
                <div class="mb-3 d-flex justify-content-start">
                    <p>{!! $materi->deskripsi !!}</p>
                </div>
                <hr>
                @if ($materi->url_file1 != null || $materi->url_file2 != null || $materi->url_file3 != null)
                <div class="mb-3">
                    <label class="form-label">Untuk Menambah Pemahaman Kamu Lihat Materi Berikut:</label><br>
                    @if ($materi->url_file1 != null)
                    <span class="btn btn-primary btn-file mt-2" id="placeholder-1"><i class="fas fa-file"></i> {{$materi->url_file1}} <a class="btn btn-primary ms-3" href="{{asset('materi/'.$materi->url_file1)}}" target="__blank">Lihat</a> </span> <br>
                    @endif
                    @if ($materi->url_file2 != null)
                    <span class="btn btn-primary btn-file mt-2" id="placeholder-1"><i class="fas fa-file"></i> {{$materi->url_file2}} <a class="btn btn-primary ms-3" href="{{asset('materi/'.$materi->url_file2)}}" target="__blank">Lihat</a> </span> <br>
                    @endif
                    @if ($materi->url_file3 != null)
                    <span class="btn btn-primary btn-file mt-2" id="placeholder-1"><i class="fas fa-file"></i> {{$materi->url_file3}} <a class="btn btn-primary ms-3" href="{{asset('materi/'.$materi->url_file3)}}" target="__blank">Lihat</a> </span> <br>
                    @endif
                </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
