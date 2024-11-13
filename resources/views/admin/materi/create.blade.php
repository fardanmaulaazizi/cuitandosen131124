@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-atur')}}" class="text-dark ms-2 me-2">Atur Paket</a> > <a href="{{url('admin-atur/kategori/'.$paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($paket->kategori)}}</a> > <a href={{url('admin-atur/atur/'.$paket->id)}} class="text-dark me-2 ms-2">{{$paket->nama}}</a> > <span class="ms-2">Tambah Materi</span></h5>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin-materi.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Materi</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3 ">
                        <label for="deskripsi" class="form-label">Penjelasan</label>
                        <textarea name="deskripsi" id="" cols="30" rows="10" class="jawaban-textarea"></textarea>                        
                        <input type="hidden" name="paket_id" value="{{$paket->id}}">
                    </div>
                    <div class="mb-3">
                        <label for="file1">File (.pdf, .docx, .xlsx, .pptx) </label>
                        <input type="file" class="form-control" name="url_file1">
                        <input type="file" class="form-control" name="url_file2">
                        <input type="file" class="form-control" name="url_file3">
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
    
@endsection