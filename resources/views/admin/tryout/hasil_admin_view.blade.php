@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
           {{-- <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url(Str::startsWith(request()->path(), 'admin-basic') ? 'admin-mypaket' : 'admin-atur' )}}" class="text-dark ms-2 me-2">{{Str::startsWith(request()->path(), 'admin-basic') ? 'Paket Saya' : 'Atur Paket'}} </a> > <a href="{{url('admin-atur/kategori/'.$session->tryout->paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($session->tryout->paket->kategori)}}</a> > <a href={{url(Str::startsWith(request()->path(), 'admin-basic') ? 'admin-mypaket/'.$session->tryout->paket->id : 'admin-atur/atur/'.$session->tryout->paket->id)}} class="text-dark me-2 ms-2">{{$session->tryout->paket->nama}}</a> > <a href="{{url(Str::startsWith(request()->path(), 'admin-basic') ? 'admin-basic-tryout/list-hasil/'.$session->tryout->paket->id : 'admin-tryout/list-hasil/'.$session->tryout->id)}}" class="text-dark me-2 ms-2">Riwayat Tryout</a> > <span class="ms-2">Hasil Tryout</span></h5> --}}
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <h2 ><b>NILAI KAMU</b> </h2>
                            <h1 class="mt-5"><b>{{$session->nilais()->sum('nilai') + $session->nilai_sesis()->sum('nilai')}} dari {{$session->total_nilai()}} </b></h1>
                        </div>
                        <div class="mb-3 d-flex justify-content-start">
                           {{--  <a href="{{url('admin-tryout/mulai/'.$session->id)}}" class="btn btn-primary">Mulai</a>--}}
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <!-- Row for category headers -->
                        <div class="row mb-3">
                            <div class="col-lg-3"></div>
                            @foreach ($session->nilaiPerKategori() as $key => $item)
                                <div class="col-lg-2 text-center p-2 bg-light border rounded">
                                    <h5 ><b>{{ ucwords($key) }}</b></h5>
                                </div>
                            @endforeach
                        </div>
                        <!-- Row for "Nilai Kamu" -->
                        <div class="row mt-2">
                            <div class="col-lg-3">
                                <h5><b>Nilai Kamu :</b></h5>
                            </div>
                            @foreach ($session->nilaiPerKategori() as $key => $item)
                                <div class="col-lg-2 text-center p-3 bg-light border rounded">
                                    <h2 ><b>{{ $item }}</b></h2>
                                </div>
                            @endforeach
                        </div>
                       {{-- <div class="row mt-2">
                            <div class="col-lg-3">
                                <h5><b>Passing Grade :</b></h5>
                            </div>
                            @foreach ($session->nilaiPerKategori() as $key => $item)
                                <div class="col-lg-2 text-center p-3 bg-light border rounded">
                                    <h2 class="text-success"><b>{{ round($session->nilaiMaxPerKategori()[$key] * 0.75)}}</b></h2>
                                </div>
                            @endforeach
                        </div>
                        <!-- Row for "Nilai Max" -->
                        <div class="row mt-2">
                            <div class="col-lg-3">
                                <h5><b>Lulus :</b></h5>
                            </div>
                            @foreach ($session->nilaiPerKategori() as $key => $item)
                                <div class="col-lg-2 text-center p-3 bg-light border rounded">
                                    <h2 class="{{ $item >= $session->nilaiMaxPerKategori()[$key] * 0.75 ? 'text-success' : 'text-danger'}}"><b>{{ $item >= $session->nilaiMaxPerKategori()[$key] * 0.75 ? 'LULUS' : 'TIDAK'}}</b></h2>
                                </div>
                            @endforeach
                        </div>--}}
                    </div>
                    
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
