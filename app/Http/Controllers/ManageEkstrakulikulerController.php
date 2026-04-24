<?php

namespace App\Http\Controllers;

// Import harus sesuai dengan nama file di app/Models/
use App\Models\ManageEkstrakulikulerModel;
use App\Models\User;
use Illuminate\Http\Request;

class ManageEkstrakulikulerController extends Controller
{
    /**
     * Tampilan utama Manajemen Ekskul (Admin)
     */
    public function manage(Request $request)
    {
        $search = $request->query('search');

        $ekskuls = ManageEkstrakulikulerModel::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('pembina', 'like', "%{$search}%");
        })
            ->orderBy('name', 'asc')
            ->paginate(10)
            ->withQueryString();

        $totalEkskul = ManageEkstrakulikulerModel::count();
        $ekskulAktif = ManageEkstrakulikulerModel::where('is_active', 1)->count();

        // AMBIL DATA GURU UNTUK DROPDOWN
        // Kita ambil user dengan role 'guru'
        $listGuru = User::where('role', 'guru')
            ->orderBy('fullName', 'asc')
            ->get();

        // Kirim $listGuru ke view
        return view('ManageEkstrakulikuler.index', compact('ekskuls', 'totalEkskul', 'ekskulAktif', 'listGuru'));
    }

    /**
     * Simpan Ekskul Baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pembina' => 'required|string',
            'category' => 'required',
            'day' => 'required',
            'time' => 'required',
        ]);

        ManageEkstrakulikulerModel::create([
            'name' => $request->name,
            'category' => $request->category,
            'pembina' => $request->pembina,
            'day' => $request->day,
            'time' => $request->time,
            'location' => $request->location,
            'is_active' => $request->is_active ?? 1,
        ]);

        return redirect()->back()->with('success', 'Ekstrakurikuler berhasil diterbitkan!');
    }

    /**
     * Update Data Ekskul
     */
    public function update(Request $request, $id)
    {
        $ekskul = ManageEkstrakulikulerModel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'pembina' => 'required',
            'category' => 'required',
            'day' => 'required',
            'time' => 'required',
        ]);

        $ekskul->update([
            'name' => $request->name,
            'category' => $request->category,
            'pembina' => $request->pembina,
            'day' => $request->day,
            'time' => $request->time,
            'location' => $request->location,
            'is_active' => $request->is_active,
        ]);

        return redirect()->back()->with('success', 'Data ekstrakurikuler berhasil diperbarui!');
    }

    /**
     * Hapus Ekskul
     */
    public function destroy($id)
    {
        $ekskul = ManageEkstrakulikulerModel::findOrFail($id);
        $ekskul->delete();

        return redirect()->back()->with('success', 'Ekstrakurikuler telah dihapus dari sistem.');
    }
}
