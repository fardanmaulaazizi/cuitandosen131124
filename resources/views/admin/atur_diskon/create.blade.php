@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h3>Tambah Diskon</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="/admin-diskon" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Voucher Discount</label>
                        <input type="text" class="form-control" id="nama" name="name" placeholder="Voucher Diskon" required>
                    </div>
                    <div class="mb-3">
                        <label for="user" class="form-label">Pengguna</label>
                        <select class="form-select" name="user_id" id="user">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="paket" class="form-label">Paket</label>
                        <select class="form-select" name="paket_id" id="paket">
                            @foreach ($pakets as $paket)
                                <option value="{{ $paket->id }}">{{ $paket->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="periode_type" class="form-label">Tipe Periode</label>
                        <select class="form-select" name="periode_type" id="periode_type">
                            <option value="one-time">Sekali Pakai</option>
                            <option value="time-based">Waktu Tertentu</option>
                        </select>
                    </div>
                    <div id="time-based" style="display: none;">
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Tanggal Mulai Aktif</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Tanggal Kadaluarsa</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="discount_type" class="form-label">Jenis Diskon</label>
                        <select class="form-select" name="discount_type" id="discount_type">
                            <option value="percentage">Persentase</option>
                            <option value="nominal">Nominal</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="value" class="form-label">Jumlah Diskon</label>
                        <input type="number" class="form-control" id="value" name="value" required>
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
