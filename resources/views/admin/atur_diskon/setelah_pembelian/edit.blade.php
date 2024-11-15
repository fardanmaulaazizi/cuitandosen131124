@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h3>Tambah Diskon Setelah Pembelian</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/admin-diskon-setelah-pembelian/{{ $discount->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Voucher Discount</label>
                        <input type="text" class="form-control" id="nama" name="name" value="{{ $discount->name }}" placeholder="Voucher discount" required>
                    </div>

                    <div class="mb-3">
                        <label for="paket_buyed" class="form-label">Paket yang dibeli</label>
                        <select class="form-select" name="paket_buyed" id="paket_buyed">
                            <option value="0">Semua</option>
                            @foreach ($pakets as $paket)
                                @if ($paket->id == $discount->paket_buyed)
                                    <option value="{{ $paket->id }}" selected>{{ $paket->nama }}</option>
                                @else
                                    <option value="{{ $paket->id }}">{{ $paket->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="paket_discount" class="form-label">Paket yang didiscount</label>
                        <select class="form-select" name="paket_discount" id="paket_discount">
                            @if($discount->is_all)
                                <option value="0" selected>Semua</option>
                                @foreach ($pakets as $paket)
                                    <option value="{{ $paket->id }}">{{ $paket->nama }}</option>
                                @endforeach
                            @else
                                <option value="0">Semua</option>
                                @foreach ($pakets as $paket)
                                    @if ($paket->id == $discount->paket_discount)
                                        <option value="{{ $paket->id }}" selected>{{ $paket->nama }}</option>
                                    @else
                                        <option value="{{ $paket->id }}">{{ $paket->nama }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="periode_type" class="form-label">Tipe Periode</label>
                        <select class="form-select" name="periode_type" id="periode_type">
                            @if ($discount->periode_type == 'one-time')
                                <option value="one-time" selected>Sekali Pakai</option>
                                <option value="time-based">Waktu Tertentu</option>
                            @else
                                <option value="one-time">Sekali Pakai</option>
                                <option value="time-based" selected>Waktu Tertentu</option>
                            @endif
                        </select>
                    </div>
                    <div id="time-based" style="display: none;">
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Tanggal Mulai Aktif</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{$discount->start_date}}">
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Tanggal Kadaluarsa</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{$discount->end_date}}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="discount_type" class="form-label">Jenis discount</label>
                        <select class="form-select" name="discount_type" id="discount_type">
                            @if ($discount->discount_type == 'percentage')
                                <option value="percentage" selected>Persentase</option>
                                <option value="nominal">Nominal</option>
                            @else
                                <option value="percentage">Persentase</option>
                                <option value="nominal" selected>Nominal</option>
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="value" class="form-label">Jumlah discount</label>
                        <input type="number" class="form-control" id="value" name="value" value="{{ $discount->value }}" required>
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
        $('.dropify').dropify();
    </script>

    <script>
        document.getElementById('periode_type').addEventListener('change', function() {
            var timeBasedDiv = document.getElementById('time-based');

            if (this.value === 'time-based') {
                timeBasedDiv.style.display = 'block';
            } else {
                timeBasedDiv.style.display = 'none';
            }
        });

        window.addEventListener('load', function() {
            var periodeType = document.getElementById('periode_type');
            var timeBasedDiv = document.getElementById('time-based');

            if (periodeType.value === 'time-based') {
                timeBasedDiv.style.display = 'block';
            } else {
                timeBasedDiv.style.display = 'none';
            }
        });

        document.getElementById('discount_type').addEventListener('change', function() {
            var discountType = this.value;
            var valueInput = document.getElementById('value');

            if (discountType === 'percentage') {
                valueInput.setAttribute('max', 100);
            } else {
                valueInput.removeAttribute('max');
            }
        });

        window.addEventListener('load', function() {
            var discountType = document.getElementById('discount_type').value;
            var valueInput = document.getElementById('value');

            if (discountType === 'percentage') {
                valueInput.setAttribute('max', 100);
            } else {
                // Hapus max jika discount_type bukan 'percentage'
                valueInput.removeAttribute('max');
            }
        });
    </script>
@endsection
