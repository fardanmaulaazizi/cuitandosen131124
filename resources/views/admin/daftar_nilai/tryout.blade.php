@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-daftar-nilai')}}" class="text-dark ms-2 me-2">Daftar Nilai</a> > <span class="ms-2">{{$paket->nama}}</span></h5>
        </div>
        @if (session('status'))
            <div class="row alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="row" id="tryout-list">
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
                                        <a href="{{url('admin-daftar-nilai/tryout/list/'. $to->id)}}" class="btn btn-info mt-1">Riwayat</a>

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