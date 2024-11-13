@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <span class="ms-2">Riwayat Pembelian</span> </h5>
        </div>
        @if (session('status'))
        <div class="row alert alert-success">
            {{session('status')}}
        </div>
        @endif
        <div class="d-flex justify-content-start mb-3">
            <button class="btn btn-primary" id="button-tunggu">Menunggu Pembayaran</button>
            <button class="btn btn-light ms-2" id="button-gagal">Pembayaran Batal</button>
            <button class="btn btn-light ms-2" id="button-berhasil">Pembayaran Berhasil</button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row  " id="tunggu-list">
                    @foreach ($tunggu as $tg)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5><b>Nama Paket :<span class="text-primary">{{$tg->paket->nama ?? '--'}}</span></b></h5>
                                <h6><b>{{formatDate($tg->created_at)}}</b></h6>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="image-container2">
                                            <img src="{{asset('img/banner-paket/'.($tg->paket->url_foto ?? 'placeholder.webp'))}}" class="img-fluid" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h5 class="mt-5"><b>Total Pembayaran :<span class="text-primary">IDR {{number_format($tg->harga)}}</span></b></h5>
                                        <h5 ><b>Batas Pembayaran :<span class="text-danger">{{formatDate($tg->limit_payment)}}</span></b></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{url('payment/'.$tg->id)}}" class="btn btn-primary mt-5">Bayar Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row  d-none" id="gagal-list">
                    @foreach ($gagal as $gg)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5><b>Nama Paket :<span class="text-primary">{{$gg->paket->nama ?? '--'}}</span></b></h5>
                                <h6><b>{{formatDate($gg->created_at)}}</b></h6>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="image-container2">
                                            <img src="{{asset('img/banner-paket/'.($gg->paket->url_foto ?? 'placeholder.webp'))}}" class="img-fluid" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h5 class="mt-5"><b>Total Pembayaran :<span class="text-primary">IDR {{number_format($gg->harga)}}</span></b></h5>
                                        <h5 ><b>Batas Pembayaran :<span class="text-danger">{{formatDate($gg->limit_payment)}}</span></b></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-outline-danger mt-5" style="cursor: default !important">Pembayaran Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row  d-none" id="berhasil-list">
                    @foreach ($berhasil as $br)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5><b>Nama Paket :<span class="text-primary">{{$br->paket->nama ?? '--'}}</span></b></h5>
                                <h6><b>{{formatDate($br->created_at)}}</b></h6>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="image-container2">
                                            <img src="{{asset('img/banner-paket/'.($br->paket->url_foto ?? 'placeholder.webp'))}}" class="img-fluid" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h5 class="mt-5"><b>Total Pembayaran :<span class="text-primary">IDR {{number_format($br->harga)}}</span></b></h5>
                                        <h5 ><b>Batas Pembayaran :<span class="text-danger">{{formatDate($br->limit_payment)}}</span></b></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-outline-success mt-5" style="cursor: default !important">Pembayaran Berhasil</button>
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
        $('#button-berhasil').on('click', function() {
            $('#gagal-list').addClass('d-none');
            $('#berhasil-list').removeClass('d-none');
            $('#tunggu-list').addClass('d-none');
            
            $('#button-berhasil').removeClass('btn-light');
            $('#button-berhasil').addClass('btn-primary');
            $('#button-gagal').addClass('btn-light');
            $('#button-gagal').removeClass('btn-primary');
            $('#button-tunggu').addClass('btn-light');
            $('#button-tunggu').removeClass('btn-primary');
        });
        
        // Similarly, write click event listeners for other buttons to show their respective rows
        $('#button-gagal').on('click', function() {
            $('#gagal-list').removeClass('d-none');
            $('#berhasil-list').addClass('d-none');
            $('#tunggu-list').addClass('d-none');
            
            $('#button-berhasil').addClass('btn-light');
            $('#button-berhasil').removeClass('btn-primary');
            $('#button-gagal').removeClass('btn-light');
            $('#button-gagal').addClass('btn-primary');
            $('#button-tunggu').addClass('btn-light');
            $('#button-tunggu').removeClass('btn-primary');
        });
        
        $('#button-tunggu').on('click', function() {
            $('#gagal-list').addClass('d-none');
            $('#berhasil-list').addClass('d-none');
            $('#tunggu-list').removeClass('d-none');
            
            $('#button-berhasil').addClass('btn-light');
            $('#button-berhasil').removeClass('btn-primary');
            $('#button-gagal').addClass('btn-light');
            $('#button-gagal').removeClass('btn-primary');
            $('#button-tunggu').removeClass('btn-light');
            $('#button-tunggu').addClass('btn-primary');
        });
        
        
    });
</script>
@endsection