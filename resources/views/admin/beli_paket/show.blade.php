@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-paket')}}" class="text-dark ms-2 me-2">Beli Paket</a> > <span class="ms-2">{{$paket->nama}}</span></h5>
        </div>
        @if (session('status'))
        <div class="row alert alert-success">
            {{session('status')}}
        </div>
        @endif

        @if (session('error'))
        <div class="row alert alert-danger">
            {{session('error')}}
        </div>
        @endif
        
        <div class="row">
            <div class="col-md-9" >
                <div class="card" style="border:1px solid #A074C4">
                    <div class="card-body">
                        <div class="row">
                            <h6 class="text-primary ms-2"><b>KONTEN PAKET</b> </h6>
                        </div>
                        <div class="row" id="tryout-list">
                            @foreach ($paket->tryouts->where('kategori', 'basic') as $to)
                            <div class="col-md-4">
                                <div class="row list-paket mt-2 ms-1">
                                    <div class="col-md-3 d-flex justify-content-center align-items-center col-icon">
                                        <i class="fas fa-lock fa-2x"></i>
                                    </div>
                                    <div class="col-md-9">
                                        <span class="text-grey">Latihan</span>
                                        <br>
                                        <span class="card-title" style="font-size: 14px; font-weight:bold">{{trimAfter50Letters($to->nama)}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            @foreach ($paket->materis as $mt)
                            <div class="col-md-4"> 
                                <div class="row list-paket mt-2 ms-1">
                                    <div class="col-md-3 d-flex justify-content-center align-items-center col-icon">
                                        <i class="fas fa-lock fa-2x"></i>
                                    </div>
                                    <div class="col-md-9">
                                        <span class="text-grey">Materi</span>
                                        <br>
                                        <span class="card-title" style="font-size: 14px; font-weight:bold">{{trimAfter50Letters($mt->nama)}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            @foreach ($paket->tryouts->where('kategori', 'mini') as $mn)
                            <div class="col-md-4">
                                <div class="row list-paket mt-2 ms-1">
                                    <div class="col-md-3 d-flex justify-content-center align-items-center col-icon">
                                        <i class="fas fa-lock fa-2x"></i>
                                    </div>
                                    <div class="col-md-9">
                                        <span class="text-grey">Latihan</span>
                                        <br>
                                        <span class="card-title" style="font-size: 14px; font-weight:bold">{{trimAfter50Letters($mn->nama)}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            @foreach ($paket->videos as $vd)
                            <div class="col-md-4">
                                <div class="row list-paket mt-2 ms-1">
                                    <div class="col-md-3 d-flex justify-content-center align-items-center col-icon">
                                        <i class="fas fa-lock fa-2x"></i>
                                    </div>
                                    <div class="col-md-9">
                                        <span class="text-grey">Video E-Learning</span>
                                        <br>
                                        <span class="card-title" style="font-size: 14px; font-weight:bold">{{trimAfter50Letters($vd->nama)}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row mt-5" id="informasi-list">
                            <div class="col-md-5">
                                <div class="row mt-3">
                                    <div class="col-md-1">
                                        <i class="fas fa-check-circle text-success"></i>
                                    </div>
                                    <div class="col-md-11">
                                        Full Akses Selama {{$paket->durasi}} bulan
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-1">
                                        <i class="fas fa-check-circle text-success"></i>
                                    </div>
                                    <div class="col-md-11">
                                        Kunci Jawaban
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-1">
                                        <i class="fas fa-check-circle text-success"></i>
                                    </div>
                                    <div class="col-md-11">
                                        Praktis & Simple
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-1">
                                        <i class="fas fa-check-circle text-success"></i>
                                    </div>
                                    <div class="col-md-11">
                                        Grup Bimbingan di WA & Telegram
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row mt-3">
                                    <div class="col-md-1">
                                        <i class="fas fa-check-circle text-success"></i>
                                    </div>
                                    <div class="col-md-11">
                                        Simulasi Sistem CAT Realtime
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-1">
                                        <i class="fas fa-check-circle text-success"></i>
                                    </div>
                                    <div class="col-md-11">
                                        Pembahasan oleh Tutor Profesional
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-1">
                                        <i class="fas fa-check-circle text-success"></i>
                                    </div>
                                    <div class="col-md-11">
                                        Akses dari Laptop, Tablet atau Smartphone
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-1">
                                        <i class="fas fa-check-circle text-success"></i>
                                    </div>
                                    <div class="col-md-11">
                                        UI/UX yang Mudah Dipahami
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="border:1px solid #A074C4">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-stretch text-center">
                            <h5><b>HARGA PAKET</b></h5>
                            <h3 class="mb-4"><b>IDR <span id="harga_asli">{{ number_format($paket->harga) }}</span></b></h3>
                            <div>
                                <h6 class="text-start mt-5"><b>Voucher Discount</b></h6>
                                @if($discounts->count() > 0)
                                    <select class="form-select" name="voucher" id="voucher_select">
                                        <option value="0" selected>-- Pilih Voucher --</option>
                                        @foreach ($discounts as $discount)
                                            <option value="{{ $discount->id }}" data-type="{{ $discount->discount_type }}" data-value="{{ $discount->value }}">
                                                @if ($discount->discount_type == "nominal")
                                                    Rp {{ number_format($discount->value) }}
                                                @else
                                                    {{ $discount->value }}%
                                                @endif - {{ $discount->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <h6 class="mt-5">Harga yang harus dibayarkan :<b><h2 id="harga_setelah_diskon" class="fs-3">IDR {{ number_format($paket->harga) }}</h2></b></h6>
                                @else
                                    Anda tidak memiliki voucher untuk digunakan
                                @endif
                                <form action="{{route('admin-paket.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="paket_id" value="{{$paket->id}}">
                                    <input  type="hidden" name="discount_id" id="discount_id">
                                    <button class="btn btn-primary p-3 mt-2 w-100">
                                        <h5 class="text-white"><i class="fas fa-shopping-bag me-2"></i> BELI PAKET</h5>
                                    </button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const hargaAsli = parseInt(document.getElementById("harga_asli").innerText.replace(/[^0-9]/g, ""));
        const voucherSelect = document.getElementById("voucher_select");
        const hargaSetelahDiskon = document.getElementById("harga_setelah_diskon");

        const discountIdInput = document.getElementById("discount_id");

        function updateHarga() {
            const selectedVoucher = voucherSelect.options[voucherSelect.selectedIndex];
            const voucherType = selectedVoucher.getAttribute("data-type");
            const voucherValue = parseFloat(selectedVoucher.getAttribute("data-value"));
            const discountId = selectedVoucher.value; 
            let hargaFinal = hargaAsli;

            if (voucherType === "nominal") {
                hargaFinal -= voucherValue;
            } 
            else if (voucherType === "percentage") {
                hargaFinal -= (hargaAsli * voucherValue / 100);
            }

            if (hargaFinal < 0) {
                hargaFinal = 0;
            }
            discountIdInput.value = discountId;
            hargaSetelahDiskon.innerHTML = `IDR ${hargaFinal.toLocaleString()}`;
        }

        updateHarga();

        voucherSelect.addEventListener("change", updateHarga);
    });
</script>



@endsection
