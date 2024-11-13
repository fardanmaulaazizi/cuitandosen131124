@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <span class="ms-2">Tryout Gratis</span> </h5>
        </div>
        @if (session('status'))
        <div class="row alert alert-success">
            {{session('status')}}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row  " id="tryout-list">
                    @if (auth()->user()->role == 'admin')
                    <div class="col-md-12">
                        <a href="{{url('admin-free-tryout/creates-free/')}}" class="btn btn-primary">Tambah Tryout</a>
                    </div>
                    @endif
                    @foreach ($tryouts as $to)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-clipboard-list fa-3x"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <span class="text-grey">Latihan</span>
                                        <h5 class="card-title">{{$to->nama}}</h5>
                                        <a href="{{route('admin-tryout.show', $to->id)}}" class="btn btn-primary">Mulai</a>
                                        @if (auth()->user()->role == 'admin')
                                        <a href="{{route('admin-free-tryout.edit', $to->id)}}" class="btn btn-primary">Edit</a>
                                        @endif
                                        <a href="{{url('admin-free-tryout/list-hasil/'. $to->id)}}" class="btn btn-info mt-1">Riwayat</a>
                                        @if (auth()->user()->role == 'admin')
                                        <a href="{{route('admin-tryout.destroy', $to->id)}}" class="btn btn-danger mt-1">Hapus</a>
                                        @endif
                                    </div>
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
