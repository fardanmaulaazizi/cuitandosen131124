@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5><a class="text-dark me-2" href="{{url('admin')}}"><i class="fa fa-home"></i></a> > <span class="ms-2">Akun Saya</span> </h5>
        </div>
        <div class="d-flex justify-content-between">
            <h3>Akun Saya</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin-akun.update', $user->id)}}" method="post" >
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" name="name" required value="{{$user->name}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{$user->email}}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="hp" class="form-label">HP/Telp.</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+62</div>
                            </div>
                            <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" required value="{{$user->hp}}">
                            @error('hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <h3>Ubah Password</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{url('ganti-password/'. $user->id)}}" method="post" >
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Sekarang</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Password Sekarang">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="new" class="form-label">Password Baru</label>
                        <input type="password" class="form-control @error('password_baru') is-invalid @enderror" id="password_baru" name="password_baru" required placeholder="Password Baru"> 
                        @error('password_baru')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="re" class="form-label">Ulangi Password</label>
                        <input type="password" class="form-control @error('ulangi_password') is-invalid @enderror" id="ulangi_password" name="ulangi_password" required placeholder="Ulangi Password">
                        @error('ulangi_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

