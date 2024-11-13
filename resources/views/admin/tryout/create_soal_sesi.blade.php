@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-atur')}}" class="text-dark ms-2 me-2">Atur Paket</a> > <a href="{{url('admin-atur/kategori/'.$sesi->tryout->paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($sesi->tryout->paket->kategori)}}</a> > <a href={{url('admin-atur/atur/'.$sesi->tryout->paket->id)}} class="text-dark me-2 ms-2">{{$sesi->tryout->paket->nama}}</a> > <a href="{{url('admin-tryout/'.$sesi->tryout->id.'/edit')}}" class="text-dark me-2 ms-2">Edit {{$sesi->tryout->nama}}</a> > <span class="ms-2">Tambah Soal Sesi {{ucwords($sesi->nama)}}</span></h5>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin-tryout/store-soal-sesi')}}" method="post" >
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Soal</label>
                        <textarea name="deskripsi" cols="30" rows="10" class="form-control " id="soal-textarea"></textarea>
                        <button class="btn btn-warning" id="ubah-soal" type="button">
                            <i class="fas fa-palette"></i>
                        </button>
                        <input type="hidden" name="sesi_id" value="{{$sesi->id}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilihan Jawaban</label>
                        <div  id="list-pilgan">
                            <div class="row d-flex justify-content-start">
                                <div class="col-md-8">
                                    <textarea name="jawaban[]" cols="30" rows="1" class="form-control " id="first-pilgan"></textarea>
                                </div>
                                <div class="col-md-2 ">
                                    <input type="number" class="form-control" name="nilai[]" required placeholder="Nilai....">
                                </div>
                                <div class="col-md-2 ">
                                    <button class="btn btn-warning" id="ubah-pilgan" type="button">
                                        <i class="fas fa-palette"></i>
                                    </button>
                                </div>
                            </div>                
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
        
        $('#ubah-pilgan').on('click', function(){
            var $soalTextarea = $('#first-pilgan');
            
            if (tinymce.get('first-pilgan')) {
                tinymce.get('first-pilgan').remove();
            } else {      
                tinymce.init({
                    selector: '#first-pilgan',
                    plugins: 'image',
                    toolbar: 'undo redo | image',
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
        images_upload_url: '{{ asset("postAcceptor.php") }}',
        
    });
    
</script>

@endsection

