@extends('layouts.mantis')

@section('content')

<div>
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="card-tittle">Data Pegawai</h1>
            <div>
                <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-bordered" id="myTable" class="display">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->user?->email }}</td>
                        <td>{{ $item->nama_pegawai }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->umur }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->locale('id')->format('d-m-Y') }}</td>
                        <td>{{ $item->tempat_lahir }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>

                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Aksi
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('pegawai.edit', $item->id) }}">Edit</a></li>
                                    <li><a class="dropdown-item" href="{{ route('pegawai.destroy', $item->id) }}" data-confirm-delete="true">Delete</a></li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
