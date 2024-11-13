@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-atur')}}" class="text-dark ms-2 me-2">Atur Paket</a> > <a href="{{url('admin-atur/kategori/'.$tryout->paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($tryout->paket->kategori)}}</a> > <a href={{url('admin-atur/atur/'.$tryout->paket->id)}} class="text-dark me-2 ms-2">{{$tryout->paket->nama}}</a> > <span class="ms-2">Edit {{$tryout->nama}}</span></h5>
        </div>
        <div class="row alert alert-success d-none" id="alert-success">
            Data Berhasil Diupdate
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Info Dasar</h5>
                <hr>
                <form action="{{route('admin-tryout.update', $tryout->id)}}" method="post" id="tryout-form">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Tryout</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="{{$tryout->nama}}">
                    </div>
                    <div class="mb-3 d-none">
                        <label for="kategori" class="form-label">Kategori Tryout</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" value="{{$tryout->kategori}}">
                    </div>
                    <div class="mb-3 ">
                        <label for="durasi" class="form-label">Durasi (menit)</label>
                        <input type="number" id="durasi" name="waktu" class="form-control" required value="{{$tryout->waktu}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Soal - Soal</h5>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{url('admin-tryout/tambah-soal/'.$tryout->id)}}" class="btn btn-primary">Tambah Soal</a>
                    </div>
                </div>
                @foreach ($tryout->soals as $so)
                <div class="row mt-3">
                    <h5>
                        <b>Soal {{$loop->iteration}}</b> 
                        <small><a href="{{url('admin-tryout/edit-soal/'.$so->id)}}" class="btn btn-info ms-3">Edit</a></small>
                        <small>
                            <form action="{{url('admin-tryout/hapus-soal/'.$so->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger ms-1">Hapus</button>
                            </form>
                        </small>
                        <small>
                            <a href="{{url('edit-pembahasan/'.$so->id)}}" class="btn btn-warning ms-1">Pembahasan <i class="fas {{$so->pembahasan != null ? 'fa-check-circle' : 'fa-times-circle'}} "></i></a>
                        </small>
                    </h5>
                    
                    <div class="col-md-12">
                        <p>{!! $so->deskripsi !!}</p>
                    </div>
                    <span class="mb-3"><b>Pilihan Jawaban:</b> </span>
                    @foreach ($so->pilgans as $index => $pg)
                    @php
                    $colSize = (preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/', $pg->deskripsi)) ? 'col-md-3' : 'col-md-12';
                    @endphp
                    <div class="{{ $colSize }}">
                        <p><b>{{ chr($index + 65) }}.</b> {!! $pg->deskripsi !!}</p>
                    </div>
                    @endforeach
                    
                </div>
                <hr>
                @endforeach
                <div class="row" id="list-sesi">
                    <div class="col-md-12">
                        <button class="btn btn-primary" id="tambah-sesi">Tambah Sesi</button>
                    </div>
                </div>
            </div>
        </div>
        @if (count($tryout->tambahans) > 0 )
        <h3>Sesi Tambahan:</h3>
        @endif
        @foreach ($tryout->tambahans as $tm)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Sesi {{ucwords($tm->nama)}}</h5>
                <hr>
                <form action="{{url('admin-tryout/update-sesi/'.$tm->id)}}" method="post" id="tryout-form">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Sesi</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="{{$tm->nama}}">
                    </div>
                    <div class="mb-3 ">
                        <label for="durasi" class="form-label">Durasi (menit)</label>
                        <input type="number" id="durasi" name="waktu" class="form-control" required value="{{$tm->waktu}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <hr>
                <div class="row">
                    <h5 class="card-title">Soal - Soal</h5>
                    <div class="col-md-12">
                        <a href="{{url('admin-tryout/tambah-soal-sesi/'.$tm->id)}}" class="btn btn-primary">Tambah Soal</a>
                    </div>
                </div>
                @foreach ($tm->soal_sesis as $sos)
                <div class="row mt-3">
                    <h5>
                        <b>Soal {{$loop->iteration}}</b> 
                        <small><a href="{{url('admin-tryout/edit-soal-sesi/'.$sos->id)}}" class="btn btn-info ms-3">Edit</a></small>
                        <small>
                            <form action="{{url('admin-tryout/hapus-soal-sesi/'.$sos->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger ms-1">Hapus</button>
                            </form>
                        </small>
                        <small>
                            <a href="{{url('edit-pembahasan-sesi/'.$sos->id)}}" class="btn btn-warning ms-1">Pembahasan <i class="fas {{$sos->pembahasan_sesi != null ? 'fa-check-circle' : 'fa-times-circle'}} "></i></a>
                        </small>
                    </h5>
                    
                    <div class="col-md-12">
                        <p>{!! $sos->deskripsi !!}</p>
                    </div>
                    <span class="mb-3"><b>Pilihan Jawaban:</b> </span>
                    @foreach ($sos->pilgan_sesis as $index => $pgs)
                    @php
                    $colSize = (preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/', $pgs->deskripsi)) ? 'col-md-3' : 'col-md-12';
                    @endphp
                    <div class="{{ $colSize }}">
                        <p><b>{{ chr($index + 65) }}.</b> {!! $pgs->deskripsi !!}</p>
                    </div>
                    @endforeach
                    
                </div>
                <hr>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#tryout-form').submit(function (event) {
            event.preventDefault();
            
            var formData = $(this).serialize();
            
            $.ajax({
                method: 'put',
                headers: {'X-CSRF-TOKEN' : "{{csrf_token()}}"},
                url: $(this).attr('action'),
                data: formData,
                success: function (response) {
                    console.log(response);
                    $('#alert-success').removeClass('d-none');
                    setTimeout(function() {
                        $('#alert-success').addClass('d-none');
                    }, 3000);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<script>
    $('#tambah-sesi').on('click', function(){
        var formHtml = `
        <form class="mt-3" action="{{url('admin-tryout/store-sesi/'.$tryout->id)}}" method="post" id="tryout-form">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Sesi</label>
                <input type="text" class="form-control" id="nama" name="nama" required >
            </div>
            <div class="mb-3 ">
                <label for="durasi" class="form-label">Durasi (menit)</label>
                <input type="number" id="durasi" name="waktu" class="form-control" required >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        `;
        $('#list-sesi').append(formHtml);
    })
</script>
@endsection