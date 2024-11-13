@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-atur')}}" class="text-dark ms-2 me-2">Atur Paket</a> > <a href="{{url('admin-atur/kategori/'.$soal->tryout->paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($soal->tryout->paket->kategori)}}</a> > <a href={{url('admin-atur/atur/'.$soal->tryout->paket->id)}} class="text-dark me-2 ms-2">{{$soal->tryout->paket->nama}}</a> > <a href="{{url('admin-tryout/'.$soal->tryout->id.'/edit')}}" class="text-dark me-2 ms-2">Edit {{$soal->tryout->nama}}</a> > <span class="ms-2">Edit Pembahasan</span></h5>
        </div>
        <div class="card">
            <div class="card-body">
                <label class="form-label">Soal</label>
                <p>{!! $soal->deskripsi !!}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{url('edit-pembahasan/'.$soal->id)}}" method="post" >
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Pilihan Jawaban</label>
                        <div class="row">
                            @foreach ($soal->pilgans as $index => $pg)
                            @php
                            $colSize = (preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/', $pg->deskripsi)) ? 'col-md-3' : 'col-md-12';
                            @endphp
                            <div class="{{ $colSize }} {{optional($soal->pembahasan)->pilgan_id == $pg->id ? 'checked' : ''}}">
                                <input type="radio" name="answer" id="answer_{{ $index }}" value="{{$pg->id}}" class="radio-jawaban "  {{optional($soal->pembahasan)->pilgan_id == $pg->id ? 'checked' : ''}}>
                                <label for="answer_{{ $index }}" class="font-med"><b>{{ chr($index + 65) }}.</b> {!! $pg->deskripsi !!}</label>
                            </div>                            
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Penjelasan</label>
                        <textarea name="deskripsi" id="" cols="30" rows="10" class="jawaban-textarea">{!! optional($soal->pembahasan)->deskripsi !!}</textarea>
                    </div>
                    <div class="mb-3 ">
                        <label for="url_video1" class="form-label">URL Video 1</label>
                        <input type="text" id="url_video1" name="url_video1" class="form-control" value="{{optional($soal->pembahasan)->url_video1}}">
                    </div>
                    <div class="mb-3">
                        <iframe width="500" height="315" src="{{optional($soal->pembahasan)->url_video1 == null ? '' : optional($soal->pembahasan)->url_video1}}" id="i-frame1" class="{{optional($soal->pembahasan)->url_video1 == null ? 'd-none' : ''}}"></iframe>
                    </div>
                    <div class="mb-3 ">
                        <label for="url_video2" class="form-label">URL Video 2</label>
                        <input type="text" id="url_video2" name="url_video2" class="form-control" value="{{optional($soal->pembahasan)->url_video2}}">
                    </div>
                    <div class="mb-3">
                        <iframe width="500" height="315" src="{{optional($soal->pembahasan)->url_video2 == null ? '' : optional($soal->pembahasan)->url_video2}}" id="i-frame2" class="{{optional($soal->pembahasan)->url_video2 == null ? 'd-none' : ''}}"></iframe>
                    </div>
                    <div class="mb-3 ">
                        <label for="url_video3" class="form-label">URL Video 3</label>
                        <input type="text" id="url_video3" name="url_video3" class="form-control" value="{{optional($soal->pembahasan)->url_video3}}">
                    </div>
                    <div class="mb-3">
                        <iframe width="500" height="315" src="{{optional($soal->pembahasan)->url_video3 == null ? '' : optional($soal->pembahasan)->url_video3}}" id="i-frame3" class="{{optional($soal->pembahasan)->url_video3 == null ? 'd-none' : ''}}"></iframe>
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
    $('#url_video1').on('input', function(){
        console.log('inputted');
        var url = $(this).val();
        
        $('#i-frame1').removeClass('d-none');
        $('#i-frame1').attr('src', url);
    })
</script>
<script>
    $('#url_video2').on('input', function(){
        console.log('inputted');
        var url = $(this).val();
        
        $('#i-frame2').removeClass('d-none');
        $('#i-frame2').attr('src', url);
    })
</script>
<script>
    $('#url_video3').on('input', function(){
        console.log('inputted');
        var url = $(this).val();
        
        $('#i-frame3').removeClass('d-none');
        $('#i-frame3').attr('src', url);
    })
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
        selector: '.jawaban-textarea',// change this value according to your HTML
        license_key: 'gpl',
        plugins: 'image',
        toolbar: 'undo redo | image',
        images_upload_url: '{{ asset("postAcceptor.php") }}',
        
    });
    
</script>

@endsection

