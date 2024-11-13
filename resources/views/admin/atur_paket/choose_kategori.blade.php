@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <span class="ms-2">Atur Paket</span> </h5>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4" style="overflow: hidden">
                                        <img src="{{asset('img/solo.svg')}}" style="width: auto; height:100px" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <h1 class="card-title" style="font-size: 2em">Paket Mandiri</h1>
                                        <p class="card-text">
                                            Belajar secara mandiri dengan paket belajar lengkap yang sudah kami sediakan untuk anda.
                                        </p>        
                                    </div>
                                </div>
                                <a href="{{url('admin-atur/kategori/mandiri')}}" class="btn btn-primary mt-2"><i class="fas fa-cog"></i> Atur</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4" style="overflow: hidden">
                                        <img src="{{asset('img/team.svg')}}" style="width: auto; height:100px" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <h1 class="card-title" style="font-size: 2em">Paket Bimbel</h1>
                                        <p class="card-text">
                                            Belajar lebih komprehensif ditemani pembimbing/coach profesional
                                        </p>        
                                    </div>
                                </div>
                                <a href="{{url('admin-atur/kategori/bimbel')}}" class="btn btn-primary mt-2"><i class="fas fa-cog"></i> Atur</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
