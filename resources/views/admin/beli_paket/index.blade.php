@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <span class="ms-2">Beli Paket</span> </h5>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach ($paket as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="image-container">
                                <img src="{{asset('img/banner-paket/'.$item->url_foto)}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$item->nama}}</h5>
                                <p class="card-text">
                                   <b>IDR {{number_format($item->harga)}}</b> 
                                </p>
                                <p class="card-text">
                                    {{optional($item->videos())->count() + $item->tryouts()->count() + $item->materis()->count()}} Paket
                                </p>
                                <p class="card-text">
                                    Durasi Paket: {{$item->durasi}} bulan
                                </p>
                                <div class="d-flex align-items-stretch">
                                    <a href="{{route('admin-paket.show',$item->id)}}" class="btn btn-primary flex-grow-1">Lihat Paket</a>
                                </div>
                                
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
