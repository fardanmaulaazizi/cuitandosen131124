@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-4">
        <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-mypaket')}}" class="text-dark me-2 ms-2">Paket Saya</a> > <span class="ms-2">Paket {{ucwords($kategori)}}</span> </h5>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach ($order as $item)
                <div class="col-md-4">
                    <div class="card">
                        <div class="image-container">
                            <img src="{{asset('img/banner-paket/'.$item->paket->url_foto)}}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$item->paket->nama}}</h5>
                            <p class="card-text">
                                {{optional($item->paket->videos())->count() + $item->paket->tryouts()->count() + $item->paket->materis()->count()}} Paket
                            </p>
                            <p class="card-text">
                                <b>Berlaku Sampai :</b>
                            </p>
                            <p class="card-text">{{formatDate($item->expired)}}</p>
                            <a href="{{url('admin-mypaket/'.$item->paket->id)}}" class="btn btn-primary flex-grow-1 w-100">Mulai Belajar</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
