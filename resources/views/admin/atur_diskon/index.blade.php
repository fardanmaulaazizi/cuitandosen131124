@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="/admin-diskon" class="text-dark me-2 ms-2">Atur Diskon</a></h5>
        <div>
            <div class="d-flex justify-content-between my-5">
                <h5>Semua diskon</h5>
                <a href="/admin-diskon/create" class="btn btn-primary">Tambah Paket</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Periode</th>
                                    <th scope="col">Penggunaan</th>
                                    <th scope="col">Diskon</th>
                                    <th scope="col">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($regularDiscounts as $discount)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{ Str::limit($discount->name, 20, '...') }}</td>
                                        <td>{{ Str::limit($discount->user->name, 20, '...') }}</td>
                                        <td>
                                            @if($discount->is_all)
                                                Semua
                                            @else
                                                {{ Str::limit($discount->paket->nama, 20, '...') }}
                                            @endif
                                        </td>
                                        @if ($discount->periode_type === "one-time")
                                            <td>Tanpa Batasan</td>
                                        @else
                                            <td>{{ $discount->start_date }} - {{ $discount->end_date }}</td>
                                        @endif
                                        @if ($discount->is_used == false)
                                            <td>Belum Digunakan</td>
                                        @else
                                            <td>Sudah Digunakan</td>
                                        @endif
                                        <td>
                                            @if ($discount->discount_type == "percentage")
                                                {{ $discount->value }}%
                                            @else
                                                Rp. {{ number_format($discount->value) }}
                                            @endif
                                        </td>
                                        <td class="d-flex gap-2">
                                            <a href="/admin-diskon/{{ $discount->id}}/edit" class="btn btn-primary"><i class="fas fa-cog"></i> Atur</a>
                                            <form action="/admin-diskon/{{ $discount->id}}" method="POST" onsubmit="return confirm('Yakin Hapus Data?')" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <div class="d-flex justify-content-between my-5">
                <h5>Diskon Setelah Pembelian</h5>
                <a href="/admin-diskon-setelah-pembelian/create" class="btn btn-primary">Tambah Paket</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Beli Paket</th>
                                    <th scope="col">Bonus Paket</th>
                                    <th scope="col">Periode</th>
                                    <th scope="col">Diskon</th>
                                    <th scope="col">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($buyingDiscounts as $discount)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{ Str::limit($discount->name, 20, '...') }}</td>
                                        <td>{{ Str::limit($discount->paketBuyed->nama , 20, '...') }}</td>
                                        <td>
                                            @if($discount->is_all)
                                                Semua
                                            @else
                                                {{ Str::limit($discount->paketDiscount->nama, 20, '...') }}
                                            @endif
                                        </td>
                                        @if ($discount->periode_type === "one-time")
                                            <td>Tanpa Batasan</td>
                                        @else
                                            <td>{{ $discount->start_date }} - {{ $discount->end_date }}</td>
                                        @endif
                                        <td>
                                            @if ($discount->discount_type == "percentage")
                                                {{ $discount->value }}%
                                            @else
                                                Rp. {{ number_format($discount->value) }}
                                            @endif
                                        </td>
                                        <td class="d-flex gap-2">
                                            <a href="/admin-diskon-setelah-pembelian/{{ $discount->id}}/edit" class="btn btn-primary"><i class="fas fa-cog"></i> Atur</a>
                                            <form action="/admin-diskon-setelah-pembelian/{{ $discount->id}}" method="POST" onsubmit="return confirm('Yakin Hapus Data?')" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
