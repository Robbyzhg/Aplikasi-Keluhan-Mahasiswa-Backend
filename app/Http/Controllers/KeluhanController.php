<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluhans = Keluhan::paginate(10);
        return response()->json([
            'data' => $keluhans
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
        $keluhan = Keluhan::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'jenis_aduan' => $request->jenis_aduan,
            'status' => 'pending',
            'keterangan' => $request->keterangan
        ]);
        return response()->json([
            'data' => $keluhan
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function show(Keluhan $keluhan)
    {
        return response()->json([
            'data' => $keluhan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keluhan $keluhan)
    {
        $keluhan->nama_mahasiswa = $request->nama_mahasiswa;
        $keluhan->jenis_aduan = $request->jenis_aduan;
        $keluhan->keterangan = $request->keterangan;
        $keluhan->save();

        return response()->json([
            'data' => $keluhan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluhan $keluhan)
    {
        $keluhan->delete();
        return response()->json([
            'message' => 'Keluhan Deleted'
        ], 204);
    }
}
