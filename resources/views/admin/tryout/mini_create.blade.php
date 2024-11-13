@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-atur')}}" class="text-dark ms-2 me-2">Atur Paket</a> > <a href={{url('admin-atur/atur/'.$paket->id)}} class="text-dark me-2 ms-2">{{$paket->nama}}</a> > <span class="ms-2">Tambah Mini Tryout</span></h5>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin-tryout.store')}}" method="post" >
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Tryout</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                        <input type="hidden" class="form-control" id="kategori" name="kategori" value="mini">
                    <div class="mb-3 ">
                        <label for="durasi" class="form-label">Durasi (menit)</label>
                        <input type="number" id="durasi" name="waktu" class="form-control" required>
                        <input type="hidden" name="paket_id" value="{{$paket->id}}">
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

