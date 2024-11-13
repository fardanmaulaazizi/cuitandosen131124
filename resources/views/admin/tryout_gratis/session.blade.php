@extends('layout.tryout')
@section('content')
<div class="container-fluid" style="max-width: 1300px !important">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h3>{{$session->tryout->nama}}</h3>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        @foreach ($session->tryout->soals as $key => $so)
                        <div class="row mt-3 soal-soal {{$key != 0 ? 'd-none' : ''}}" id="soal-{{$key}}">
                            <div class="d-flex justify-content-between mb-5">
                                <h5><b>Soal {{$loop->iteration}}</b> <span class="span-kategori">{{ucwords($so->kategori)}}</span></h5>
                                <div>
                                  {{--   <button class="btn btn-secondary">Bantuan</button>
                                    <button class="btn btn-danger">Laporkan Soal</button> --}}
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <p class="font-med">{!! $so->deskripsi !!}</p>
                            </div>
                            <span class="mb-3"><b>Pilihan Jawaban:</b> </span>
                            @foreach ($so->pilgans as $index => $pg)
                            @php
                            $colSize = (preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/', $pg->deskripsi)) ? 'col-md-3' : 'col-md-12';
                            @endphp
                            <div class="{{ $colSize }}">
                                <input type="radio" name="answer-{{$so->id}}" id="answer_{{ $index }}" value="{{$pg->nilai}}" class="radio-jawaban" data-key="{{$key}}" data-pilgan="{{$pg->id}}" data-soal="{{$so->id}}" data-jawaban="{{$pg->deskripsi }}" >
                                <label for="answer_{{ $index }}" class="font-med"><b>{{ chr($index + 65) }}.</b> {!! $pg->deskripsi !!}</label>
                            </div>                            
                            @endforeach
                            <hr>
                        </div>
                        
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="position: sticky; top:80px">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;">Waktu Tersisa</h5>
                        <p id="countdown" style="font-size: 40px; font-weight: bold; text-align: center;"></p>
                    </div>
                </div>
                <div class="card mt-2" style="position: sticky; top:250px">
                    <div class="card-body">
                        <h5 class="card-title mb-2" style="text-align: center;"><b>Sudah Selesai?</b></h5>
                        <hr>
                        <div class="d-flex justify-content-center">
                            {{-- <button class="btn btn-danger">Batal</button> --}}
                            <a href="{{url('admin-tryout/hasil-test/'.$session->id)}}" class="btn btn-secondary ms-2">Selesai</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-start">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="text-center mb-4"><b>Nomor Soal</b></h5>
                        <hr>
                        @foreach ($session->tryout->soals as $key2 => $so2)
                        <button class="btn {{$key2 == 0 ? 'btn-primary' : 'btn-light'}} ms-1 button-soal " data-key="{{$key2}}" id="button-{{$key2}}">
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
            $('.button-soal').attr('class', 'btn btn-light ms-1 button-soal');
            $('.button-answered').removeClass('btn-primary');
            $('.button-answered').addClass('btn-secondary');
            $('#button-'+key).toggleClass('btn-light btn-primary')
            
            $('.soal-soal').addClass('d-none');
            $('#soal-'+key).removeClass('d-none');
        }
    })

    $(document).on('click', '.button-answered', function(){
        if ($(this).hasClass('button-answered')) {
            var key = $(this).data('key');
            $('.button-soal').attr('class', 'btn btn-light ms-1 button-soal');
            $('.button-answered').removeClass('btn-primary');
            $('.button-answered').addClass('btn-secondary');
            $('#button-'+key).removeClass('btn-secondary');
            $('#button-'+key).addClass('btn-primary');
            
            $('.soal-soal').addClass('d-none');
            $('#soal-'+key).removeClass('d-none');
        }
    })
    
    $('.radio-jawaban').on('click', function(){
        var key = $(this).data('key');
        var pilgan = $(this).data('pilgan');
        var jawaban = $(this).data('jawaban');
        var nilai = $(this).val();
        var soal = $(this).data('soal');
        var session = {{$session->id}};
        
        // Warna tombol terjawab
        $('#button-'+key).removeClass('button-soal');
        $('#button-'+key).removeClass('btn-light');
        $('#button-'+key).removeClass('btn-primary');
        $('#button-'+key).addClass('btn-secondary button-answered');
        // end warna tombol terjawab

        //kirim jawaban ke server
        $.ajax({
            url: '/upload-jawaban',
            method:'post',
            headers: {'X-CSRF-TOKEN' : "{{csrf_token()}}"},
            data: {session:session, pilgan:pilgan, jawaban:jawaban, nilai:nilai, soal:soal},
            success: function(response){
                console.log(response)
            },
            error: function(error){
                console.log(error)
            }
        })
        //end kirim jawaban ke server
    
    })
</script>
<script>
    $(document).ready(function() {
        var session = {{$session->id}};
        // Start time
        var startTime = new Date("{{ $session->start_time }}").getTime();
        // Max duration in milliseconds
        var maxDuration = {{ $session->tryout->waktu }} * 60 * 1000;
        
        // Update countdown every second
        var countdownInterval = setInterval(function() {
            // Current time
            var now = new Date().getTime();
            // Remaining time in milliseconds
            var remainingTime = maxDuration - (now - startTime);
            
            // Calculate remaining hours, minutes, and seconds
            var hours = Math.floor(remainingTime / (1000 * 60 * 60));
            var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
            
            // Format hours, minutes, and seconds with leading zeros
            var formattedHours = ('0' + hours).slice(-2);
            var formattedMinutes = ('0' + minutes).slice(-2);
            var formattedSeconds = ('0' + seconds).slice(-2);
            
            // Display remaining time in the element with id="countdown"
            $("#countdown").html(formattedHours + ":" + formattedMinutes + ":" + formattedSeconds);
            
            // If the countdown is finished, clear the interval
            if (remainingTime <= 0) {
                clearInterval(countdownInterval);
                $("#countdown").html("Time's up!");
                // Additional logic for handling when time's up

                $.ajax({
                    url: "/stop-session/"+session,
                    method:'post',
                    headers: {'X-CSRF-TOKEN' : "{{csrf_token()}}"},
                    success: function(response) {
                        console.log(response)

                        window.location.href = "/admin-tryout/hasil-test/" + session; 
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
            
            }
        }, 1000); // Update every second
    });
</script>
<script>
    
</script>
@endsection
