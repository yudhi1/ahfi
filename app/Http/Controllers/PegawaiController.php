<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'email' => 'required|email|unique:users,email',
            'nik' => 'required|numeric|unique:pegawais,nik',
            'alamat' => 'required',
            'umur' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',

        ]);

        $newRequest = $request->all();
        $newData = Pegawai::create($newRequest);
        $user = User::create([
            'name' => $newData->nama_pegawai,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'pegawai_id' => $newData->id,
        ]);

        $newData->user_id= $user->id;
        $newData->save();

        Alert::success('Berhasil', 'Data pegawai berhasil ditambahkan');

        return redirect()->route('pegawai.index');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $validatedData = $request->validate([
            'nama_pegawai' => 'required',
            'nik' => 'required|numeric|unique:pegawais,nik,'.$pegawai->nik,
            'alamat' => 'required',
            'umur' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',

        ]);

        $pegawai->update($validatedData);

        // $pegawai->update($request->except('nik'));

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        Alert::success('Berhasil', 'Data pegawai berhasil dihapus');
        return redirect()->route('pegawai.index');
    }
}
