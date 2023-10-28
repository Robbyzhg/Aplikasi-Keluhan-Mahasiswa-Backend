<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::paginate(10);
        return response()->json([
            'data' => $staffs
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
        $staff = Staff::create([
            'nama_staff' => $request->nama_staff,
            'divisi_staff' => $request->divisi_staff,
            'tanggal_lahir_staff' => $request->tanggal_lahir_staff,
            'alamat_staff' => $request->alamat_staff,
        ]);
        return response()->json([
            'data' => $staff
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return response()->json([
            'data' => $staff
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $staff->nama_staff = $request->nama_staff;
        $staff->alamat_staff = $request->alamat_staff;
        $staff->tanggal_lahir_staff = $request->tanggal_lahir_staff;
        $staff->divisi_staff = $request->divisi_staff;
        $staff->save();

        return response()->json([
            'data' => $staff
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return response()->json([
            'message' => 'Staff Deleted'
        ], 204);
    }
}
