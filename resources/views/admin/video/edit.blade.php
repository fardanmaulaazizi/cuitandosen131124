@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-atur')}}" class="text-dark ms-2 me-2">Atur Paket</a> > <a href="{{url('admin-atur/kategori/'.$video->paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($video->paket->kategori)}}</a> > <a href={{url('admin-atur/atur/'.$video->paket->id)}} class="text-dark me-2 ms-2">{{$video->paket->nama}}</a> > <span class="ms-2">Edit {{$video->nama}}</span></h5>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin-video.update', $video->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Video</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="{{$video->nama}}">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Video</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{$video->deskripsi}}</textarea>
                    </div>
                    <div class="mb-3 ">
                        <label for="url_video" class="form-label">URL Video</label>
                        <input type="text" id="url_video" name="url_video" class="form-control" value="{{$video->url_video}}">
                    </div>
                    <div class="mb-3">
                        <iframe width="500" height="315" src="{{$video->url_video}}" id="i-frame"></iframe>

                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
<script>
    $('#url_video').on('input', function(){
        var url = $(this).val();

        $('#i-frame').attr('src', url);
    })
</script>
@endsection