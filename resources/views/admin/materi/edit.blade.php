@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-atur')}}" class="text-dark ms-2 me-2">Atur Paket</a> > <a href="{{url('admin-atur/kategori/'.$materi->paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($materi->paket->kategori)}}</a> > <a href={{url('admin-atur/atur/'.$materi->paket->id)}} class="text-dark me-2 ms-2">{{$materi->paket->nama}}</a> > <span class="ms-2">Edit {{$materi->nama}}</span></h5>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin-materi.update', $materi->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Materi</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="{{$materi->nama}}">
                    </div>
                    <div class="mb-3 ">
                        <label for="deskripsi" class="form-label">Penjelasan</label>
                        <textarea name="deskripsi" id="" cols="30" rows="10" class="jawaban-textarea">{!! $materi->deskripsi !!}</textarea>                        
                    </div>
                    <div class="mb-3">
                        <label for="file1">File (.pdf, .docx, .xlsx, .pptx) </label>
                        @if ($materi->url_file1 != null)
                        <br>
                        <span class="btn btn-primary btn-file mt-2" id="placeholder-1"><i class="fas fa-file"></i> {{$materi->url_file1}} <a class="btn btn-primary ms-3" href="{{asset('materi/'.$materi->url_file1)}}" target="__blank">Lihat</a> <i class="fas fa-times text-danger remove-file" data-file="1" data-materi="{{$materi->id}}" style="cursor: pointer"></i></span> 
                        @endif
                        @if ($materi->url_file2 != null)
                        <br>
                        <span class="btn btn-primary btn-file mt-2" id="placeholder-2"><i class="fas fa-file"></i> {{$materi->url_file2}} <a class="btn btn-primary ms-3" href="{{asset('materi/'.$materi->url_file2)}}" target="__blank">Lihat</a> <i class="fas fa-times text-danger remove-file" data-file="2" data-materi="{{$materi->id}}" style="cursor: pointer"></i></span> 
                        @endif
                        @if ($materi->url_file3 != null)
                        <br>
                        <span class="btn btn-primary btn-file mt-2" id="placeholder-3"><i class="fas fa-file"></i> {{$materi->url_file3}} <a class="btn btn-primary ms-3" href="{{asset('materi/'.$materi->url_file3)}}" target="__blank">Lihat</a> <i class="fas fa-times text-danger remove-file" data-file="3" data-materi="{{$materi->id}}" style="cursor: pointer"></i></span> 
                        @endif
                        <input type="file" class="form-control mt-1 {{$materi->url_file1 != null ? 'd-none' : ''}}" name="url_file1" id="input-1">
                        <input type="file" class="form-control mt-1 {{$materi->url_file2 != null ? 'd-none' : ''}}" name="url_file2" id="input-2">
                        <input type="file" class="form-control mt-1 {{$materi->url_file3 != null ? 'd-none' : ''}}" name="url_file3" id="input-3">
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
    tinymce.init({
        selector: '.jawaban-textarea',
        plugins: 'image',
        toolbar: 'undo redo | image',
        height: '320',
        images_upload_url: '{{ asset("postAcceptor.php") }}',
        
    });
    
</script>
<script>
    $(document).ready(function(){
        var csrfToken = "{{csrf_token()}}";
        
        $('.remove-file').on('click', function(){
            var userConfirmed = confirm('Yakin Hapus File?');
            
            if (userConfirmed) {
                var urutan = $(this).data('file');
                var materi = $(this).data('materi');
                
                $.ajax({
                    url: '/remove-file',
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN' : csrfToken
                    },
                    data: {
                        materi:materi,
                        urutan:urutan
                    },
                    success: function(response){
                        console.log(response);
                        $('#placeholder-'+urutan).remove();
                        $('#input-'+urutan).removeClass('d-none');
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
            }
            
        })
    })
</script>
@endsection