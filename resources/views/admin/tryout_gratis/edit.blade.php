@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-free-tryout')}}" class="text-dark ms-2 me-2">Tryout Gratis</a> > <span class="ms-2">Edit {{$tryout->nama}}</span></h5>
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
                        <a href="{{url('admin-free-tryout/tambah-soal/'.$tryout->id)}}" class="btn btn-primary">Tambah Soal</a>
                    </div>
                </div>
                @foreach ($tryout->soals as $so)
                <div class="row mt-3">
                    <h5>
                        <b>Soal {{$loop->iteration}}</b> 
                        <small><a href="{{url('admin-free-tryout/edit-soal/'.$so->id)}}" class="btn btn-info ms-3">Edit</a></small>
                        <small>
                            <form action="{{url('admin-free-tryout/hapus-soal/'.$so->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger ms-1">Hapus</button>
                            </form>
                        </small>
                        <small>
                            <a href="{{url('admin-free-tryout-edit-pembahasan/'.$so->id)}}" class="btn btn-warning ms-1">Pembahasan <i class="fas {{$so->pembahasan != null ? 'fa-check-circle' : 'fa-times-circle'}} "></i></a>
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
            </div>
        </div>
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
@endsection