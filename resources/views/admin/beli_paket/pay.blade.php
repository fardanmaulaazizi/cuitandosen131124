@extends('layout.admin')
@section('content')
<div class="container-fluid">
    {{-- <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h2><b>Beli Paket Mandiri</b> </h2>
                </div>
                <div class="row">
                    @foreach ($paket as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="image-container">
                                <img src="{{asset('img/banner-paket/'.$item->url_foto)}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$item->nama}}</h5>
                                <p class="card-text">
                                    <b>IDR {{number_format($item->harga)}}</b> 
                                </p>
                                <p class="card-text">
                                    {{optional($item->videos())->count() + $item->tryouts()->count() + $item->materis()->count()}} Paket
                                </p>
                                <p class="card-text">
                                    Durasi Paket: {{$item->durasi}} bulan
                                </p>
                                <div class="d-flex align-items-stretch">
                                    <a href="{{route('admin-paket.show',$item->id)}}" class="btn btn-primary flex-grow-1">Lihat Paket</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
        @endif
        <div class="tab-class wow fadeInUp" data-wow-delay="0.1s">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <h3 class="text-primary ms-2">Metode Pembayaran</h3>
                    <div class="row g-4">
                        
                        <div class="col-lg-8 mt-5">
                            <div id="snap-container" class="w-100"></div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <div class="card shadow">
                                <h5 class="card-title mt-3 ms-3">Rincian Pembelian</h5>
                                <div class="card-body">
                                    <ul class="p-0">
                                        
                                        <li class="d-flex justify-content-between">
                                            <span>Paket</span>
                                            <span>{{$order->paket->nama}}</span>
                                        </li>
                                        <hr>
                                        <li class="d-flex justify-content-between" id="shipping-info">
                                            <span>Harga </span>
                                            <span>IDR {{number_format($order->paket->harga)}}</span>
                                        </li>
                                        <hr>
                                        
                                        <li class="d-flex justify-content-between" id="total-info">
                                            <span class="fw-bold">Masa Aktif</span>
                                            <span class="fw-bold">{{$order->paket->durasi}}</span>
                                        </li>
                                        
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Trigger snap popup. @TODO: Replace 'YOUR_SNAP_TOKEN' with your transaction token.
        // Also, use the embedId that you defined in the div above, here.
        window.snap.embed('{{$snapToken}}', {
            embedId: 'snap-container',
            onSuccess: function (result) {
                alert("payment SUCCESS!"); console.log(result);
                /* window.location.href = '/list-pesanan'; */
            },
            onPending: function (result) {
                alert("waiting for your payment!"); console.log(result);
            },
            onError: function (result) {
                alert("payment failed!"); console.log(result);
            },
            onClose: function () {
                alert('you closed the popup without finishing the payment');
            }
        });
    }); 
</script>
@endsection