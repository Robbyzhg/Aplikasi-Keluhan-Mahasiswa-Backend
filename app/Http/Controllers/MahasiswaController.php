<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(10);
        return response()->json([
            'data' => $mahasiswas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'jurusan' => $request->jurusan,
            'tanggal_lahir_mahasiswa' => $request->tanggal_lahir_mahasiswa,
            'alamat_mahasiswa' => $request->alamat_mahasiswa,
            'semester' => $request->semester,
        ]);
        return response()->json([
            'data' => $mahasiswa
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return response()->json([
            'data' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->tanggal_lahir_mahasiswa = $request->tanggal_lahir_mahasiswa;
        $mahasiswa->semester = $request->semester;
        $mahasiswa->alamat_mahasiswa = $request->alamat_mahasiswa;
        $mahasiswa->save();

        return response()->json([
            'data' => $mahasiswa
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return response()->json([
            'message' => 'Mahasiswa Deleted'
        ], 204);
    }
}
