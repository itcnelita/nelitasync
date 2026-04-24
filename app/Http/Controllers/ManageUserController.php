<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $users = User::when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('fullName', 'like', "%{$search}%")
                    ->orWhere('nisn', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        })
            ->orderBy('fullName', 'asc')
            ->paginate(15)
            ->withQueryString();

        $countSiswa = User::where('role', 'siswa')->count();
        $countGuru = User::where('role', 'guru')->count();
        $totalWarga = User::count();

        return view('ManageUser.index', compact('users', 'countSiswa', 'countGuru', 'totalWarga'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'fullName'    => 'required|string|max:255',
            'id_identity' => 'nullable|unique:users,id_identity',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|min:6',
            'role'        => 'required',
            'status'      => 'required'
        ]);

        User::create([
            'fullName'    => $request->fullName,
            'id_identity' => $request->id_identity,
            'class'       => $request->class,
            'email'       => $request->email,
            'role'        => $request->role,
            'status'      => $request->status,
            'password'    => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Warga berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'fullName'    => 'required',
            'email'       => 'required|email|unique:users,email,' . $id,
            'id_identity' => 'nullable|unique:users,id_identity,' . $id,
        ]);

        $data = $request->only(['fullName', 'id_identity', 'class', 'email', 'role', 'status']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function userDestroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data warga telah dihapus.');
    }
}
