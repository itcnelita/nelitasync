@extends('layouts.base')

@section('title', 'Manajemen Ekstrakurikuler - Nelita Sync')

@section('content')
    <main class="w-full min-h-screen bg-gray-50 pb-24" x-data="{ openTambah: false, openEdit: false, editData: {} }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Manajemen Ekstrakurikuler</h1>
                    <p class="text-sm text-gray-500">Kelola daftar kegiatan ekskul di SMKN 5 Tangerang</p>
                </div>
                <button @click="openTambah = true"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-all shadow-sm">
                    <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                    Tambah Ekskul
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
                        <i data-lucide="layers" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Ekskul</p>
                        <p class="text-xl font-bold text-gray-800">{{ $totalEkskul }}</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-3 bg-green-50 text-green-600 rounded-lg">
                        <i data-lucide="check-circle" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Ekskul Aktif</p>
                        <p class="text-xl font-bold text-gray-800">{{ $ekskulAktif }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-4 border-b border-gray-100">
                    <form action="{{ route('ManageEkstrakulikuler.index') }}" method="GET" class="relative max-w-md">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i data-lucide="search" class="w-4 h-4 text-gray-400"></i>
                        </span>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                            placeholder="Cari ekskul atau pembina...">
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-gray-600 font-medium border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4">Nama Ekskul</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Pembina</th>
                                <th class="px-6 py-4">Jadwal & Lokasi</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($ekskuls as $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-blue-600">{{ $item->name }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $item->category }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $item->pembina }}</td>
                                    <td class="px-6 py-4">
                                        <span class="block text-gray-800 font-medium">{{ $item->day }},
                                            {{ $item->time }}</span>
                                        <span class="text-xs text-gray-400">{{ $item->location }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($item->is_active)
                                            <span
                                                class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Aktif</span>
                                        @else
                                            <span
                                                class="px-2 py-1 bg-red-100 text-red-700 text-xs rounded-full">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center space-x-2">
                                            <button @click="openEdit = true; editData = {{ json_encode($item) }}"
                                                class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </button>
                                            <form action="{{ route('ManageEkstrakulikuler.destroy', $item->id) }}"
                                                method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf @method('DELETE')
                                                <button
                                                    class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-gray-400 italic">Data tidak
                                        ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-gray-100">
                    {{ $ekskuls->links() }}
                </div>
            </div>
        </div>

        <div x-show="openTambah" class="fixed inset-0 z-[99] overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div @click="openTambah = false" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
                <div
                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-xl shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form action="{{ route('ManageEkstrakulikuler.store') }}" method="POST">
                        @csrf
                        <div class="px-6 py-4 border-b border-gray-100">
                            <h3 class="text-lg font-bold text-gray-800">Tambah Ekstrakurikuler</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Ekskul</label>
                                <input type="text" name="name" required
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pembina</label>
                                <select name="pembina" id="pembina_tambah" class="select2-tw w-full" required>
                                    <option value="">-- Pilih Guru --</option>
                                    @foreach ($listGuru as $guru)
                                        <option value="{{ $guru->fullName }}">{{ $guru->fullName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                                    <select name="category" class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                        <option>Teknologi & Sains</option>
                                        <option>Olahraga</option>
                                        <option>Seni & Budaya</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Hari</label>
                                    <select name="day" class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                        <option>Senin</option>
                                        <option>Selasa</option>
                                        <option>Rabu</option>
                                        <option>Kamis</option>
                                        <option>Jumat</option>
                                        <option>Sabtu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Waktu</label>
                                    <input type="text" name="time" placeholder="10:00 - 12:00"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                                    <input type="text" name="location"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                </div>
                            </div>
                        </div>
                        <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3">
                            <button type="button" @click="openTambah = false"
                                class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold shadow-sm hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div x-show="openEdit" class="fixed inset-0 z-[99] overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div @click="openEdit = false" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
                <div
                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-xl shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form :action="`{{ url('/ManageEkstrakurikuler/update') }}/${editData.id}`" method="POST">
                        @csrf @method('PUT')
                        <div class="px-6 py-4 border-b border-gray-100">
                            <h3 class="text-lg font-bold text-gray-800">Edit Ekstrakurikuler</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <input type="hidden" name="id" x-model="editData.id">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Ekskul</label>
                                <input type="text" name="name" x-model="editData.name" required
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pembina</label>
                                <select name="pembina" id="pembina_edit" class="select2-tw w-full">
                                    @foreach ($listGuru as $guru)
                                        <option value="{{ $guru->fullName }}">{{ $guru->fullName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <select name="is_active" x-model="editData.is_active"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                        <option value="1">Aktif</option>
                                        <option value="0">Non-Aktif</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Hari</label>
                                    <input type="text" name="day" x-model="editData.day"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                </div>
                            </div>
                        </div>
                        <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3">
                            <button type="button" @click="openEdit = false"
                                class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    @push('head')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            /* Styling khusus agar Select2 cocok dengan Tailwind */
            .select2-container--default .select2-selection--single {
                height: 42px !important;
                border: 1px solid #e5e7eb !important;
                border-radius: 0.5rem !important;
                padding-top: 6px !important;
            }

            [x-cloak] {
                display: none !important;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                // Inisialisasi Select2
                $('#pembina_tambah, #pembina_edit').select2({
                    placeholder: 'Cari nama guru...',
                    width: '100%'
                });

                // Event listener Alpine untuk sinkronisasi Select2 saat Edit
                window.addEventListener('alpine:init', () => {
                    // Jika butuh logic tambahan
                });
            });
        </script>
    @endpush
@endsection

@section('title', 'Manajemen Ekstrakurikuler - Nelita Sync')

@section('content')
    <main class="p-4 md:ml-64 min-h-screen bg-gray-50 pt-20 pb-24" x-data="{ openTambah: false, openEdit: false, editData: {} }">
        <div class="max-w-7xl mx-auto">

            <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Manajemen Ekstrakurikuler</h1>
                    <p class="text-sm text-gray-500">Kelola daftar kegiatan ekskul di SMKN 5 Tangerang</p>
                </div>
                <button @click="openTambah = true"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-all shadow-sm">
                    <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                    Tambah Ekskul
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
                        <i data-lucide="layers" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Ekskul</p>
                        <p class="text-xl font-bold text-gray-800">{{ $totalEkskul }}</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-3 bg-green-50 text-green-600 rounded-lg">
                        <i data-lucide="check-circle" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Ekskul Aktif</p>
                        <p class="text-xl font-bold text-gray-800">{{ $ekskulAktif }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-4 border-b border-gray-100">
                    <form action="{{ route('ManageEkstrakulikuler.index') }}" method="GET" class="relative max-w-md">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i data-lucide="search" class="w-4 h-4 text-gray-400"></i>
                        </span>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                            placeholder="Cari ekskul atau pembina...">
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-gray-600 font-medium border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4">Nama Ekskul</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Pembina</th>
                                <th class="px-6 py-4">Jadwal & Lokasi</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($ekskuls as $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-blue-600">{{ $item->name }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $item->category }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $item->pembina }}</td>
                                    <td class="px-6 py-4">
                                        <span class="block text-gray-800 font-medium">{{ $item->day }},
                                            {{ $item->time }}</span>
                                        <span class="text-xs text-gray-400">{{ $item->location }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($item->is_active)
                                            <span
                                                class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Aktif</span>
                                        @else
                                            <span
                                                class="px-2 py-1 bg-red-100 text-red-700 text-xs rounded-full">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center space-x-2">
                                            <button @click="openEdit = true; editData = {{ json_encode($item) }}"
                                                class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </button>
                                            <form action="{{ route('ManageEkstrakulikuler.destroy', $item->id) }}"
                                                method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf @method('DELETE')
                                                <button
                                                    class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-gray-400 italic">Data tidak
                                        ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-gray-100">
                    {{ $ekskuls->links() }}
                </div>
            </div>
        </div>

        <div x-show="openTambah" class="fixed inset-0 z-[99] overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div @click="openTambah = false" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
                <div
                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-xl shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form action="{{ route('ManageEkstrakulikuler.store') }}" method="POST">
                        @csrf
                        <div class="px-6 py-4 border-b border-gray-100">
                            <h3 class="text-lg font-bold text-gray-800">Tambah Ekstrakurikuler</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Ekskul</label>
                                <input type="text" name="name" required
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pembina</label>
                                <select name="pembina" id="pembina_tambah" class="select2-tw w-full" required>
                                    <option value="">-- Pilih Guru --</option>
                                    @foreach ($listGuru as $guru)
                                        <option value="{{ $guru->fullName }}">{{ $guru->fullName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                                    <select name="category" class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                        <option>Teknologi & Sains</option>
                                        <option>Olahraga</option>
                                        <option>Seni & Budaya</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Hari</label>
                                    <select name="day" class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                        <option>Senin</option>
                                        <option>Selasa</option>
                                        <option>Rabu</option>
                                        <option>Kamis</option>
                                        <option>Jumat</option>
                                        <option>Sabtu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Waktu</label>
                                    <input type="text" name="time" placeholder="10:00 - 12:00"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                                    <input type="text" name="location"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                </div>
                            </div>
                        </div>
                        <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3">
                            <button type="button" @click="openTambah = false"
                                class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold shadow-sm hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div x-show="openEdit" class="fixed inset-0 z-[99] overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div @click="openEdit = false" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
                <div
                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-xl shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form :action="`{{ url('/ManageEkstrakurikuler/update') }}/${editData.id}`" method="POST">
                        @csrf @method('PUT')
                        <div class="px-6 py-4 border-b border-gray-100">
                            <h3 class="text-lg font-bold text-gray-800">Edit Ekstrakurikuler</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <input type="hidden" name="id" x-model="editData.id">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Ekskul</label>
                                <input type="text" name="name" x-model="editData.name" required
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pembina</label>
                                <select name="pembina" id="pembina_edit" class="select2-tw w-full">
                                    @foreach ($listGuru as $guru)
                                        <option value="{{ $guru->fullName }}">{{ $guru->fullName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <select name="is_active" x-model="editData.is_active"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                        <option value="1">Aktif</option>
                                        <option value="0">Non-Aktif</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Hari</label>
                                    <input type="text" name="day" x-model="editData.day"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg">
                                </div>
                            </div>
                        </div>
                        <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3">
                            <button type="button" @click="openEdit = false"
                                class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    @push('head')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            /* Styling khusus agar Select2 cocok dengan Tailwind */
            .select2-container--default .select2-selection--single {
                height: 42px !important;
                border: 1px solid #e5e7eb !important;
                border-radius: 0.5rem !important;
                padding-top: 6px !important;
            }

            [x-cloak] {
                display: none !important;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                // Inisialisasi Select2
                $('#pembina_tambah, #pembina_edit').select2({
                    placeholder: 'Cari nama guru...',
                    width: '100%'
                });

                // Event listener Alpine untuk sinkronisasi Select2 saat Edit
                window.addEventListener('alpine:init', () => {
                    // Jika butuh logic tambahan
                });
            });
        </script>
    @endpush
@endsection
