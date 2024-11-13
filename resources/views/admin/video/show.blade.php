@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url(Str::startsWith(request()->path(), 'admin-basic') ? 'admin-mypaket' : 'admin-atur' )}}" class="text-dark ms-2 me-2">{{Str::startsWith(request()->path(), 'admin-basic') ? 'Paket Saya' : 'Atur Paket'}} </a> > <a href="{{url('admin-atur/kategori/'.$video->paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($video->paket->kategori)}}</a> > <a href={{url(Str::startsWith(request()->path(), 'admin-basic') ? 'admin-mypaket/'.$video->paket->id : 'admin-atur/atur/'.$video->paket->id)}} class="text-dark me-2 ms-2">{{$video->paket->nama}}</a> > <span class="ms-2">{{$video->nama}}</span></h5>
        </div>
        <div class="card">
            <div class="card-body">
                @if ($video->url_video != null)
                <div class="mb-3">
                    <iframe width="500" height="315" src="{{$video->url_video}}" id="i-frame" allowfullscreen></iframe>
                    <p class="mt-5">{{$video->deskripsi}}</p>
                </div>
                @endif
                @if ($video->url_video_stored != null)
                <div class="mb-3">
                    <video  id="my-video" class="video-js" data-setup="{}" width="500" height="315" controls controlsList="nodownload"> <source src="{{asset('videos/'.$video->url_video_stored)}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
<script>
    var player = videojs('my-video');
    
    // Add event listener to prevent the context menu
    player.on('contextmenu', function(event) {
        event.preventDefault();
    });
</script>
@endsection