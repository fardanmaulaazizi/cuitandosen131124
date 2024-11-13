@extends('layout.tryout')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h3>Hasil Tryout <b>{{ucwords($session->tryout->nama)}}</b></h3>
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
                            <a href="{{url('admin-mypaket/'.$session->tryout->paket->id)}}" class="btn btn-danger ms-2">Kembali</a> 
							<a href="{{url('pembahasan/'.$session->id)}}" class="btn btn-warning ms-2">Lihat Pembahasan</a>
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
                        </div> --}}
                    </div>
                    
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
