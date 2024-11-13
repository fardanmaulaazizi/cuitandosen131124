@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-atur')}}" class="text-dark me-2 ms-2">Atur Paket</a> > <span class="ms-2">Paket {{ucwords($kategori)}}</span></h5>
            <a href="{{url('admin-atur/buat/'.$kategori)}}" class="btn btn-primary">Tambah Paket</a>
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
                                    IDR {{number_format($item->harga)}}
                                </p>
                                <p class="card-text">
                                    Durasi Paket: {{$item->durasi}} bulan
                                </p>
                                <a href="{{url('admin-atur/atur/'.$item->id)}}" class="btn btn-primary"><i class="fas fa-cog"></i> Atur</a>
								<form action="{{ route('admin-atur.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin Hapus Data?')" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        <i class="fas fa-trash"></i> Hapus
    </button>
</form>

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
