@extends('layout.tryout')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h3>Hasil Tryout <b>{{ucwords($session->tryout->nama)}}</b></h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <h5 ><b>NILAI KAMU</b> </h5>
                    <h1 class="mt-5"><b>{{$session->nilais()->sum('nilai')}}</b></h1>
                </div>
                 <div class="mb-3 d-flex justify-content-start">
                  {{--  <a href="{{url('admin-tryout/mulai/'.$session->id)}}" class="btn btn-primary">Mulai</a>--}}
                    <a href="{{url('admin-free-tryout/list-hasil/'.$tryout->id)}}" class="btn btn-danger ms-2">Kembali</a>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
