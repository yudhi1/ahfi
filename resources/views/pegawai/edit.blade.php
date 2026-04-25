@extends('layouts.mantis')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Data Pegawai</h4></h4>
        </div>

        <div class="card-body">
         <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group my-2">
                    <label for="nama_pegawai">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control @error('nama_pegawai') is-invalid
                    @enderror" autofocus value="{{ $pegawai->nama_pegawai }}">

                    @error('nama_pegawai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" class="form-control @error('nik') is-invalid
                    @enderror" autofocus value="{{ $pegawai->nik }}">

                    @error('nik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="Umur">Umur</label>
                    <input type="number" name="umur" class="form-control form-control @error('umur') is-invalid
                    @enderror" autofocus value="{{ $pegawai->umur }}">
                    @error('umur')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="nama_pegawai">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ $pegawai->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" autofocus value="{{ $pegawai->tanggal_lahir }}">
                </div>

                <div class="form-group my-2">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" autofocus value="{{ $pegawai->tempat_lahir }}">
                </div>

                <div class="form-group my-2">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="10" class="form-control @error('alamat') is-invalid
                    @enderror">
                    {{ $pegawai->alamat }}
                    </textarea>
                      @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group my-2 d-flex justify-content-end ">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
