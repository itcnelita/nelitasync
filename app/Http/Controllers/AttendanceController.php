<?php

namespace App\Http\Controllers;

// use App\Models\AttendanceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $id_identity = $request->id_identity;
        // AttendanceModel::where('id_identity', $id_identity)->get();

        $id = Auth::user()->id_identity;
        $logs = DB::table('log_presensi')
            ->where('id_identity', $id)
            ->orderBy('id', 'desc')
            ->get();


        return view('attendance.attendance', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {

        // dd(Auth::user()->id);

        // dd($request->all());

        DB::table('log_presensi')->insert([
            'id_identity' => Auth::user()->id_identity,
            'time' => $request->time
        ]);

        return redirect()->back()->with('success', 'Berhasil Absen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
