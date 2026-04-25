@extends('layouts.mantis')

@section('content')

<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Data Pegawai</h4></h4>
        </div>

        <div class="card-body">
            <form action="{{ route('pegawai.store') }}" method="POST">
                @csrf
                <div class="form-group my-2">
                    <label for="nama_pegawai">Nama Pegawai</label>
                    <input type="text"  name="nama_pegawai" class="form-control @error('nama_pegawai') is-invalid
                    @enderror" autocomplete=”off”>

                    @error('nama_pegawai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                   <div class="form-group my-2 mb-2">
                    <label for="nama_pegawai">Email Pegawai</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid
                    @enderror" autocomplete="off">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group my-2">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" class="form-control @error('nik') is-invalid
                    @enderror" autofocus>

                    @error('nik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="nama_pegawai">Umur</label>
                    <input type="number" name="umur" class="form-control form-control @error('umur') is-invalid
                    @enderror" autofocus>
                    @error('umur')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="nama_pegawai">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control">
                        <option value="">Pilih Polarisasi</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" autofocus>
                </div>

                <div class="form-group my-2">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" autofocus>
                </div>

                <div class="form-group my-2">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="10" class="form-control @error('alamat') is-invalid
                    @enderror">
                    {{ old('alamat') }}
                    </textarea>
                      @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group my-2 d-flex justify-content-end ">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
