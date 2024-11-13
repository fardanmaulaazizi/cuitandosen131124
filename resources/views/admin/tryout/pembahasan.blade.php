@extends('layout.admin')
@section('content')
<div class="container-fluid" >
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
           {{-- <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url(Str::startsWith(request()->path(), 'admin-basic') ? 'admin-mypaket' : 'admin-atur' )}}" class="text-dark ms-2 me-2">{{Str::startsWith(request()->path(), 'admin-basic') ? 'Paket Saya' : 'Atur Paket'}} </a> > <a href="{{url('admin-atur/kategori/'.$ts->tryout->paket->kategori)}}" class="text-dark me-2 ms-2">Paket {{ucwords($ts->tryout->paket->kategori)}}</a> > <a href={{url('admin-atur/atur/'.$ts->tryout->paket->id)}} class="text-dark me-2 ms-2">{{$ts->tryout->paket->nama}}</a> > <a href="{{url('admin-tryout/list-hasil/'.$ts->tryout->id)}}" class="text-dark me-2 ms-2">{{$ts->tryout->nama}}</a> > <span class="ms-2">Pembahasan</span></h5>--}}
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        @foreach ($ts->tryout->soals as $key => $so)
                        <div class="row mt-3 soal-soal {{$key != 0 ? 'd-none' : ''}}" id="soal-{{$key}}">
                            <div class="d-flex justify-content-between mb-5">
                                <h5><b>Soal {{$loop->iteration}}</b> <span class="span-kategori">{{ucwords($so->kategori)}}</span></h5>
                                <div>
                                    <button class="btn {{buttonClass($so->pembahasan, myNilai($ts->id, $so->id))}} ms-1" >
                                        {{buttonClass($so->pembahasan, myNilai($ts->id, $so->id)) == 'btn-success' ? 'Benar' : (buttonClass($so->pembahasan, myNilai($ts->id, $so->id)) == 'btn-danger' ? 'Salah' : 'Kosong')}}
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <p class="font-med">{!! $so->deskripsi !!}</p>
                            </div>
                            <span class="mb-3"><b>Pilihan Jawaban:</b> </span>
                            @php
                                $bahas = '';
                                $jawab = '';
                            @endphp
                            @foreach ($so->pilgans as $index => $pg)
                            @php
                            $colSize = (preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/', $pg->deskripsi)) ? 'col-md-4' : 'col-md-12';
                            @endphp
                            <div class="{{ $colSize }} d-flex justify-content-between mt-1">
                                <p><b>{{ chr($index + 65) }}.</b> {!! $pg->deskripsi !!}</p>
                                <span class="btn btn-primary btn-nilai">{{$pg->nilai}} Point</span>
                            </div>
                            @php
                                if(optional($so->pembahasan)->pilgan_id == $pg->id){
                                    $bahas .= chr($index + 65);
                                }
                                if(optional(myNilai($ts->id, $so->id))->pilgan_id == $pg->id){
                                    $jawab .= chr($index + 65);
                                }

                            @endphp
                            @endforeach
                            <hr>
                            <p><b>Kunci Jawaban: {{$bahas}}</b> </p>
                            <p><b>Jawaban Anda: {{$jawab}}</b> </p>
                            <hr>
                            <p><b>Pembahasan</b></p>
                            <p>{!! optional($so->pembahasan)->deskripsi !!}</p>
                            @if (optional($so->pembahasan)->url_video1 != null)
                            <iframe width="500" height="400" src="{{optional($so->pembahasan)->url_video1}}" id="i-frame1" ></iframe>
                            @endif
                            @if (optional($so->pembahasan)->url_video2 != null)
                            <iframe width="500" height="400" src="{{optional($so->pembahasan)->url_video2}}" id="i-frame2" class="mt-4"></iframe>
                            @endif
                            @if (optional($so->pembahasan)->url_video3 != null)
                            <iframe width="500" height="400" src="{{optional($so->pembahasan)->url_video3}}" id="i-frame3" class="mt-4"></iframe>
                            @endif
                        </div>
                        
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card " style="position: sticky; top:80px">
                    <div class="card-body">
                        <h5 class="card-title mb-2" style="text-align: center;"><b>Nomor Soal </b></h5>
                        <hr>
                        @foreach ($ts->tryout->soals as $key2 => $so2)
                        
                        <button class="btn {{buttonClass($so2->pembahasan, myNilai($ts->id, $so2->id))}} {{$key2 == 0 ? 'btn-active' : ''}} ms-1 button-soal mt-2" data-key="{{$key2}}" id="button-{{$key2}}" style="width:60px">
                            {{$loop->iteration}}
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</div>
@endsection

@section('script')
<script>
    $('.button-soal').on('click', function(){
        if ($(this).hasClass('button-soal')) {
            var key = $(this).data('key');
            $('.button-soal').removeClass('btn-active');
            $('#button-'+key).addClass('btn-active')
            
            $('.soal-soal').addClass('d-none');
            $('#soal-'+key).removeClass('d-none');
        }
    })
    
    
</script>

<script>
    
</script>
@endsection
