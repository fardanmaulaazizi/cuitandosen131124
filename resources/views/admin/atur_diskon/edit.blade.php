@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h3>Ubah Diskon</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/admin-diskon/{{ $discount->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Voucher Discount</label>
                        <input type="text" class="form-control" id="nama" name="name" placeholder="Voucher Diskon" value="{{$discount->name}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="user" class="form-label">Pengguna</label>
                        <select  class="form-select" name="user_id" id="user">
                            @if($discount->user_all != null)
                                <option value="semua" selected>Semua</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            @else
                                <option value="semua" >Semua</option>
                                @foreach ($users as $user)
                                    @if ($user->id == $discount->user_id)
                                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                    @else
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="paket" class="form-label">Paket</label>
                        <select  class="form-select" name="paket_id" id="paket">
                            @if($discount->is_all)
                                <option value="0" selected>Semua</option>
                                @foreach ($pakets as $paket)
                                    <option value="{{ $paket->id }}">{{ $paket->nama }}</option>
                                @endforeach
                            @else
                                <option value="0">Semua</option>
                                @foreach ($pakets as $paket)
                                    @if ($paket->id == $discount->paket_id)
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
                        <select  class="form-select" name="periode_type" id="periode_type">
                            @if ($discount->periode_type == 'one-time')
                                <option value="one-time" selected>Sekali Pakai</option>
                                <option value="time-based">Waktu Tertentu</option>
                            @else
                                <option value="one-time">Sekali Pakai</option>
                                <option value="time-based" selected>Waktu Tertentu</option>
                            @endif
                        </select>
                    </div>
                    <div id="time-based">
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
                        <label for="discount_type" class="form-label">Jenis Diskon</label>
                        <select  class="form-select" name="discount_type" id="discount_type">
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
                        <label for="value" class="form-label">Jumlah Diskon</label>
                        <input type="number" class="form-control" id="value" name="value" value="{{$discount->value}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="is_active" class="form-label">Kondisi Kupon</label>
                        <select  class="form-select" name="is_active" id="is_active">
                            @if ($discount->is_active == 1)
                                <option value="1" selected>Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            @else
                                <option value="1">Aktif</option>
                                <option value="0" selected>Tidak Aktif</option>
                            @endif
                        </select>
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
        // Menambahkan event listener untuk perubahan select #periode-type
        document.getElementById('periode_type').addEventListener('change', function() {
            var timeBasedDiv = document.getElementById('time-based');

            if (this.value === 'time-based') {
                // Menampilkan #time-based jika 'time-based' dipilih
                timeBasedDiv.style.display = 'block';
            } else {
                // Menyembunyikan #time-based jika pilihan lain dipilih
                timeBasedDiv.style.display = 'none';
            }
        });

        // Memastikan elemen time-based disembunyikan pada awalnya jika sudah ada pilihan sebelumnya
        window.addEventListener('load', function() {
            var periodeType = document.getElementById('periode_type');
            var timeBasedDiv = document.getElementById('time-based');

            // Jika opsi yang dipilih adalah 'time-based', tampilkan #time-based
            if (periodeType.value === 'time-based') {
                timeBasedDiv.style.display = 'block';
            } else {
                timeBasedDiv.style.display = 'none';
            }
        });
    </script>
    
@endsection