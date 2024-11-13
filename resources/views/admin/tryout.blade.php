@extends('layout.admin')
@section('content')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        {{-- Kerjakan di area sini --}}
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-4">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden" id="paket-tersedia">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Paket Tersedia</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">{{$jumlah_paket}}</h4>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden" id="paket-anda">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Paket Anda</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">{{$paket_anda}}</h4>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden" id="menunggu-pembayaran">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Menunggu Pembayaran</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">{{$menunggu_pembayaran}}</h4>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="earning"></div>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-md-12 ">
            <div class="owl-carousel" id="main-carousel">
              <!-- Main Carousel Slides -->
              @foreach ($paket as $item)
              <div style="display: flex; justify-content: flex-start;">
                <!-- Left Column -->
                <div style="padding-right: 20px; margin-top:70px">
                  <h2>{{$item->nama}}</h2>
                  <p class="fw-semibold">Harga: IDR {{number_format($item->harga)}}</p>
                  <p class="fw-semibold">Jumlah Paket: {{optional($item->videos())->count() + $item->tryouts()->count() + $item->materis()->count()}} Paket</p>
                  <p>{{$item->deskripsi}}</p>
                </div>
                
                <!-- Right Column -->
                <div>
                  <img src="{{asset('img/banner-paket/'.$item->url_foto)}}" title="{{$item->nama}}" style="max-width: 100%; max-height: 350px; margin-left:80px;margin-top:20px" alt="">
                </div>
              </div>
              
              
              @endforeach
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Sampai Sini --}}
</div>
</div>
</div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
      loop:true,
      margin:10,
      nav: false,
      items: 1,
      autoplay:3000
    });
    
    // Link Thumbnails with Main Carousel
    /* $(".owl-thumbs .owl-thumb-item").on("click", function(){
      $(".owl-thumbs .owl-thumb-item").removeClass("active");
      $(this).addClass("active");
      var slideIndex = $(this).data("slide");
      $("#main-carousel").trigger("to.owl.carousel", [slideIndex, 300]);
    }); */
  });
</script>



@endsection