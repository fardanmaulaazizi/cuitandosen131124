@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-free-tryout')}}" class="text-dark ms-2 me-2">Tryout Gratis</a> > <a href={{route('admin-free-tryout.edit', $soal->tryout->id)}} class="text-dark me-2 ms-2">Edit {{$soal->tryout->nama}}</a> > <span class="ms-2">Edit Soal</span></h5>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin-free-tryout/update-soal/'.$soal->id)}}" method="post" >
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Soal</label>
                        <textarea name="deskripsi" cols="30" rows="10" class="form-control {{(preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/', $soal->deskripsi)) ? 'jawaban-textarea' : ''}}" id="soal-textarea">{!! $soal->deskripsi !!}</textarea>
                        <button class="btn btn-warning" id="ubah-soal" type="button">
                            <i class="fas fa-palette"></i>
                        </button>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="kategori" class="form-label">Kategori Soal</label>
                                <input type="text" name="kategori" required class="form-control" value="{{$soal->kategori}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilihan Jawaban</label>
                        <div  id="list-pilgan">
                            @foreach ($soal->pilgans as $key => $pg)
                            <div class="row d-flex justify-content-start mb-3 curr-field">
                                <div class="col-md-8">
                                    <textarea name="jawaban_curr[]" cols="30" id="pg-{{$key}}" rows="1" class="form-control {{(preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/', $pg->deskripsi)) ? 'jawaban-textarea' : ''}}" >{!! $pg->deskripsi !!}</textarea>
                                </div>
                                <div class="col-md-2 ">
                                    <input type="number" class="form-control" name="nilai_curr[]" required value="{{$pg->nilai}}">
                                </div>
                                <div class="col-md-2 ">
                                    <button class="btn btn-warning ubah-pilgan" data-pg="{{$key}}" type="button">
                                        <i class="fas fa-palette"></i>
                                    </button>
                                    <button class="btn btn-danger remove-field-curr" data-pg="{{$pg->id}}" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>  
                            @endforeach
                                           
                        </div>
                        <div class="row">
                            <div class="col-md-12 ms-2 mt-2">
                                <button class="btn btn-warning" id="tambah-pilgan" type="button">
                                    <i class="fas fa-palette"></i>
                                </button>
                                <button class="btn btn-info" id="tambah-pilgan-biasa" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
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
    $(document).ready(function () {
        // Counter to keep track of the number of added fields
        var counter = 1;
        
        // Function to add new set of fields
        function addFields() {
            var newFields = `
            <div class="row d-flex justify-content-start mt-2 added-fields">
                <div class="col-md-8">
                    <textarea name="jawaban[]" cols="30" rows="1" class="form-control jawaban-textarea" ></textarea>
                </div>
                <div class="col-md-2 ">
                    <input type="number" class="form-control" name="nilai[]" required placeholder="Nilai....">
                </div>
                <div class="col-md-2 ">
                    <button class="btn btn-danger remove-field">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            `;
            $('#list-pilgan').append(newFields); // Append new fields to the container
            counter++; // Increment counter
            tinymce.init({
                selector: '.jawaban-textarea',
                plugins: 'image',
                toolbar: 'undo redo | image',
                images_upload_url: '{{ asset("postAcceptor.php") }}',
            });
        }
        
        function addFieldsBiasa() {
            var newFields = `
            <div class="row d-flex justify-content-start mt-2 added-fields">
                <div class="col-md-8">
                    <textarea name="jawaban[]" cols="30" rows="1" class="form-control " ></textarea>
                </div>
                <div class="col-md-2 ">
                    <input type="number" class="form-control" name="nilai[]" required placeholder="Nilai....">
                </div>
                <div class="col-md-2 ">
                    <button class="btn btn-danger remove-field">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            `;
            $('#list-pilgan').append(newFields); // Append new fields to the container
            counter++; // Increment counter
            
        }
        
        // Add fields when the "Tambah" button is clicked
        $('#tambah-pilgan').click(function () {
            addFields();
        });
        
        $('#tambah-pilgan-biasa').click(function () {
            addFieldsBiasa();
        });
        
        // Remove added fields when the "Hapus" button is clicked
        $('#list-pilgan').on('click', '.remove-field', function () {
            $(this).closest('.added-fields').remove();
            counter--; // Decrement counter
        });

        $('#list-pilgan').on('click', '.remove-field-curr', function () {
            var pg = $(this).data('pg');
            console.log(pg);
            $(this).closest('.curr-field').remove();

            $.ajax({
                url: '/remove-pg/'+pg,
                method:'post',
                headers:{'X-CSRF-TOKEN' : "{{csrf_token()}}"},
                success: function(response){
                    console.log(response)
                },
                error: function(error){
                    console.log(error)
                }
            })
        });
        
        $('.ubah-pilgan').on('click', function(){
            var pg = $(this).data('pg');
            
            if (tinymce.get('pg-'+pg)) {
                tinymce.get('pg-'+pg).remove();
            } else {      
                tinymce.init({
                    selector: '#pg-' +pg,
                    plugins: 'image',
                    toolbar: 'undo redo | image',
                    height: '320',
                    images_upload_url: '{{ asset("postAcceptor.php") }}',
                });
            }
        });
        
        $('#ubah-soal').on('click', function(){
            var $soalTextarea = $('#soal-textarea');
            
            if (tinymce.get('soal-textarea')) {
                tinymce.get('soal-textarea').remove();
            } else {
                
                tinymce.init({
                    selector: '#soal-textarea',
                    plugins: 'image',
                    height: '320',
                    toolbar: 'undo redo | image',
                    images_upload_url: '{{ asset("postAcceptor.php") }}',
                });
            }
        });
        
    });
    
</script>

{{-- <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
    $("button").click(function () {
        $("textarea").each(function () {
            nicEditors.findEditor(this.id).saveContent();
        });
    });
</script> --}}

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

