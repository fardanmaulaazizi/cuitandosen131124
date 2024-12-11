@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <a href="{{url('admin-daftar-nilai')}}" class="text-dark ms-2 me-2">Daftar Nilai</a> > <a  href="{{ url('admin-daftar-nilai/tryout/'.$tryout->paket_id) }}" class="text-dark ms-2 me-2" >{{($tryout->paket->nama)}}</a> > <span class="ms-2">{{($tryout->nama)}}</span></h5>
        </div>
        <div class="card w-100">
            <div class="card-body p-4">
                @if (session('error'))
                    <div class="row alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
                <h5 class="card-title fw-semibold mb-4">Riwayat Try Out</h5>
                <div class="table-responsive" >
                    <table class="table text-nowrap mb-0 align-middle" id="table1">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tanggal Latihan</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Skor Akhir</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tryoutSession as $item)
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6></td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{$item->user->name  }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{formattedDate($item->created_at)}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 fs-4">{{$item->nilais()->sum('nilai') + $item->nilai_sesis()->sum('nilai')}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{url('admin-hasil-test/'.$item->id)}}" class="badge bg-warning rounded-3 fw-semibold">Lihat Hasil</a>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <a href="{{url('pembahasan/'.$item->id)}}" class="badge bg-primary rounded-3 fw-semibold">Lihat Pembahasan</a>
                                    </div>
                                </td>
                            </tr> 
                            @endforeach
                            
                            
                            
                        </tbody>
                    </table>
                    {{-- <div class="d-flex justify-content-center">
                        {{ $tryoutSession->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
       $('#table1').DataTable({
                "columns": [
                    { "data": "no", "orderable": true, "searchable": false },
                    { "data": "nama" },
                    { "data": "tanggal latihan",  "searchable": false},
                    { "data": "skor akhir", "orderable": true, "searchable": false },
                    { "data": "action", "searchable": false, "orderable": false  },
                ]
            });
    </script>
@endSection
@endsection



