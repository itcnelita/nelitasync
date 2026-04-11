<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $users = User::when($search, function ($query) use ($search) {
            $query->where('fullName', 'like', "%{$search}%")
                ->orWhere('nisn', 'like', "%{$search}%")
                ->orWhere('nip', 'like', "%{$search}%");
        })
            ->orderBy('fullName', 'asc')
            ->paginate(10)
            ->withQueryString(); // Agar link pagination tidak hilang saat search

        $countSiswa = User::where('role', 'siswa')->count();
        $countGuru = User::where('role', 'guru')->count();

        return view('ManageUser.index', compact('users', 'countSiswa', 'countGuru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insert(Request $request) {}

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
    public function userDestroy(string $id)
    {
        //
    }
}
