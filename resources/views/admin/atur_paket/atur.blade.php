@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-atur')}}" class="text-dark ms-2 me-2">Atur Paket</a> > <a href="{{url('admin-atur/kategori/'.$paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($paket->kategori)}}</a> > <span class="ms-2">{{$paket->nama}}</span></h5>
        </div>
        @if (session('status'))
            <div class="row alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <div class="d-flex justify-content-start mb-3">
            <button class="btn btn-primary" id="button-video">Video Learning</button>
            <button class="btn btn-light ms-2" id="button-tryout">Tryout</button>
            <button class="btn btn-light ms-2" id="button-mini">TPA & Tes Kepribadian</button>
            <button class="btn btn-light ms-2" id="button-materi">Materi</button>
            <button class="btn btn-light ms-2" id="button-informasi">Informasi Kelas</button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row  d-none" id="tryout-list">
                    <div class="col-md-12">
                        <a href="{{url('admin-tryout/creates/'.$paket->id)}}" class="btn btn-primary">Tambah Tryout</a>
                    </div>
                    @foreach ($paket->tryouts->where('kategori', 'basic') as $to)
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
                                        <a href="{{route('admin-tryout.edit', $to->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('admin-tryout/list-hasil/'. $to->id)}}" class="btn btn-info mt-1">Riwayat</a>
                                        <a href="{{route('admin-tryout.destroy', $to->id)}}" class="btn btn-danger mt-1">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row  d-none" id="materi-list">
                    <div class="col-md-12">
                        <a href="{{url('admin-materi/creates/'.$paket->id)}}" class="btn btn-primary">Tambah Materi</a>
                    </div>
                    @foreach ($paket->materis as $mt)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-book fa-3x"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <span class="text-grey">Materi</span>
                                        <h5 class="card-title">{{$mt->nama}}</h5>
                                        <a href="{{url('admin-materi/'. $mt->id)}}" class="btn btn-primary">Lihat</a>
                                        <a href="{{route('admin-materi.edit', $mt->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('admin-materi.destroy', $mt->id)}}" class="btn btn-danger mt-1">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>             
                <div class="row  d-none" id="mini-list">
                    <div class="col-md-12">
                        <a href="{{url('admin-tryout/mini-creates/'.$paket->id)}}" class="btn btn-primary">Tambah TPA & Tes Kepribadian</a>
                    </div>
                    @foreach ($paket->tryouts->where('kategori', 'mini') as $mn)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-clipboard-list fa-3x"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <span class="text-grey">Latihan</span>
                                        <h5 class="card-title">{{$mn->nama}}</h5>
                                        <a href="{{route('admin-tryout.show', $mn->id)}}" class="btn btn-primary">Mulai</a>
                                        <a href="{{route('admin-tryout.edit', $mn->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('admin-tryout/list-hasil/'. $mn->id)}}" class="btn btn-info mt-1">Riwayat</a>
                                        <a href="{{route('admin-tryout.destroy', $mn->id)}}" class="btn btn-danger mt-1">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row  " id="video-list">
                    <div class="col-md-12">
                        <a href="{{url('admin-video/creates/'.$paket->id)}}" class="btn btn-primary">Tambah Video</a>
                    </div>
                    @foreach ($paket->videos as $vd)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                                        <i class="fas fa-video fa-3x"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <span class="text-grey">Video E-Learning</span>
                                        <h5 class="card-title">{{$vd->nama}}</h5>
                                        <a href="{{url('admin-video/'. $vd->id)}}" class="btn btn-primary">Tonton</a>
                                        <a href="{{route('admin-video.edit', $vd->id)}}" class="btn btn-primary">Atur</a>
                                        <a href="{{route('admin-video.destroy', $vd->id)}}" class="btn btn-danger mt-1">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row  d-none" id="informasi-list">
                    <div class="col-md-12">
                        <a href="{{route('admin-atur.edit', $paket->id)}}" class="btn btn-primary">Atur Informasi Kelas</a>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <p>{{$paket->deskripsi}}</p>
                                </div>
                                <div class="row">
                                    <a href="{{$paket->grup_wa}}" target="__blank" class="btn btn-info">Informasi Kelas Zoom</a>
                                    <a href="{{$paket->grup_telegram}}" target="__blank" class="btn btn-info mt-2">Grup Telegram</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#button-mini').on('click', function() {
            $('#mini-list').removeClass('d-none');
            $('#tryout-list').addClass('d-none');
            $('#materi-list').addClass('d-none');
            $('#video-list').addClass('d-none');
            $('#informasi-list').addClass('d-none');

            $('#button-mini').removeClass('btn-light');
            $('#button-mini').addClass('btn-primary');
            $('#button-tryout').addClass('btn-light');
            $('#button-tryout').removeClass('btn-primary');
            $('#button-materi').addClass('btn-light');
            $('#button-materi').removeClass('btn-primary');
            $('#button-video').addClass('btn-light');
            $('#button-video').removeClass('btn-primary');
            $('#button-informasi').addClass('btn-light');
            $('#button-informasi').removeClass('btn-primary');
        });
    
        // Similarly, write click event listeners for other buttons to show their respective rows
        $('#button-tryout').on('click', function() {
            $('#mini-list').addClass('d-none');
            $('#tryout-list').removeClass('d-none');
            $('#materi-list').addClass('d-none');
            $('#video-list').addClass('d-none');
            $('#informasi-list').addClass('d-none');

            $('#button-mini').addClass('btn-light');
            $('#button-mini').removeClass('btn-primary');
            $('#button-tryout').removeClass('btn-light');
            $('#button-tryout').addClass('btn-primary');
            $('#button-materi').addClass('btn-light');
            $('#button-materi').removeClass('btn-primary');
            $('#button-video').addClass('btn-light');
            $('#button-video').removeClass('btn-primary');
            $('#button-informasi').addClass('btn-light');
            $('#button-informasi').removeClass('btn-primary');
        });
    
        $('#button-materi').on('click', function() {
            $('#mini-list').addClass('d-none');
            $('#tryout-list').addClass('d-none');
            $('#materi-list').removeClass('d-none');
            $('#video-list').addClass('d-none');
            $('#informasi-list').addClass('d-none');

            $('#button-mini').addClass('btn-light');
            $('#button-mini').removeClass('btn-primary');
            $('#button-tryout').addClass('btn-light');
            $('#button-tryout').removeClass('btn-primary');
            $('#button-materi').removeClass('btn-light');
            $('#button-materi').addClass('btn-primary');
            $('#button-video').addClass('btn-light');
            $('#button-video').removeClass('btn-primary');
            $('#button-informasi').addClass('btn-light');
            $('#button-informasi').removeClass('btn-primary');
        });
    
        $('#button-video').on('click', function() {
            $('#mini-list').addClass('d-none');
            $('#tryout-list').addClass('d-none');
            $('#materi-list').addClass('d-none');
            $('#video-list').removeClass('d-none');
            $('#informasi-list').addClass('d-none');

            $('#button-mini').addClass('btn-light');
            $('#button-mini').removeClass('btn-primary');
            $('#button-tryout').addClass('btn-light');
            $('#button-tryout').removeClass('btn-primary');
            $('#button-materi').addClass('btn-light');
            $('#button-materi').removeClass('btn-primary');
            $('#button-video').removeClass('btn-light');
            $('#button-video').addClass('btn-primary');
            $('#button-informasi').addClass('btn-light');
            $('#button-informasi').removeClass('btn-primary');
        });
    
        $('#button-informasi').on('click', function() {
            $('#mini-list').addClass('d-none');
            $('#tryout-list').addClass('d-none');
            $('#materi-list').addClass('d-none');
            $('#video-list').addClass('d-none');
            $('#informasi-list').removeClass('d-none');

            $('#button-mini').addClass('btn-light');
            $('#button-mini').removeClass('btn-primary');
            $('#button-tryout').addClass('btn-light');
            $('#button-tryout').removeClass('btn-primary');
            $('#button-materi').addClass('btn-light');
            $('#button-materi').removeClass('btn-primary');
            $('#button-video').addClass('btn-light');
            $('#button-video').removeClass('btn-primary');
            $('#button-informasi').removeClass('btn-light');
            $('#button-informasi').addClass('btn-primary');
        });
    

    });
    </script>
@endsection