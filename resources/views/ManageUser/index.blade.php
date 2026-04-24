@php
    date_default_timezone_set('Asia/Jakarta');
@endphp

@extends('layouts.base')

@section('title', 'Manajemen Data | NELITASYNC')

@push('head')
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Pagination Styling */
        .nelita-pagination nav div:first-child {
            display: none;
        }

        .nelita-pagination nav {
            @apply flex justify-center;
        }

        .nelita-pagination span[aria-current="page"] span {
            @apply bg-blue-600 border-blue-600 text-white rounded-lg px-3 py-1 mx-1 text-xs font-bold !important;
        }
    </style>
@endpush

@section('content')
    <div class="flex min-h-screen bg-[#F8FAFC] pb-24 lg:pb-0 relative overflow-x-hidden text-left" x-data="{
        search: '',
        modalTambah: false,
        modalView: false,
        modalEdit: false,
        userTerpilih: {}
    }">

        <main class="flex-1 w-full min-w-0 overflow-x-hidden">
            <div class="p-4 lg:p-8 max-w-7xl mx-auto">

                {{-- Alert Flash Message --}}
                @if (session('success'))
                    <div
                        class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-2xl text-sm font-bold italic">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Alert Validation Errors --}}
                @if ($errors->any())
                    <div
                        class="mb-6 p-4 bg-rose-50 border border-rose-100 text-rose-600 rounded-2xl text-sm font-bold italic">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8 text-left">
                    <div>
                        <h1
                            class="text-2xl lg:text-3xl font-bold text-slate-900 leading-tight tracking-tight uppercase italic">
                            Warga Sekolah</h1>
                        <p class="text-slate-500 mt-1 text-sm lg:text-base italic">
                            Database Terpadu SMKN 5 Tangerang ({{ $countGuru }} Guru & {{ $countSiswa }} Siswa).
                        </p>
                    </div>
                    <button @click="modalTambah = true; userTerpilih = {}; modalEdit = false"
                        class="bg-blue-600 text-white px-6 py-3.5 rounded-2xl font-bold shadow-lg shadow-blue-100 flex items-center justify-center gap-2 hover:bg-blue-700 transition-all text-xs uppercase tracking-widest">
                        <i data-lucide="plus" class="w-4 h-4 text-white"></i>
                        <span>Tambah Data</span>
                    </button>
                </div>

                <div
                    class="bg-white rounded-[1.5rem] lg:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden text-left">
                    <div class="p-4 lg:p-6 border-b border-slate-50 flex gap-4 items-center bg-slate-50/30">
                        <div class="relative flex-1">
                            <i data-lucide="search"
                                class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-300"></i>
                            <input type="text" x-model="search" placeholder="Cari nama atau ID warga sekolah..."
                                class="w-full pl-10 pr-4 py-3 bg-white border-none rounded-xl text-sm font-medium focus:ring-2 focus:ring-blue-100 transition-all italic outline-none">
                        </div>
                    </div>

                    <div class="overflow-x-auto no-scrollbar">
                        <table class="w-full text-left min-w-[800px]">
                            <thead
                                class="bg-slate-50/50 text-slate-400 uppercase text-[10px] font-bold tracking-widest italic">
                                <tr>
                                    <th class="px-8 py-5">Nama Lengkap & Role</th>
                                    <th class="px-8 py-5">Identitas / Kelas</th>
                                    <th class="px-8 py-5 text-center">Status</th>
                                    <th class="px-8 py-5 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50 text-sm italic font-medium">
                                @foreach ($users as $user)
                                    <tr class="hover:bg-slate-50/30 transition"
                                        x-show="('{{ strtolower($user->fullName) }}'.includes(search.toLowerCase()) || '{{ $user->id_identity }}'.includes(search))"
                                        x-transition:enter.duration.200ms>

                                        <td class="px-8 py-5 font-bold text-slate-700 flex items-center gap-4">
                                            <div
                                                class="w-10 h-10 rounded-2xl flex items-center justify-center font-bold text-[11px] border
                                                {{ $user->role === 'siswa' ? 'bg-blue-50 text-blue-600 border-blue-100' : 'bg-amber-50 text-amber-600 border-amber-100' }}">
                                                {{ substr($user->fullName, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <p class="leading-none tracking-tight">{{ $user->fullName }}</p>
                                                    <span
                                                        class="text-[8px] px-2 py-0.5 rounded-md uppercase font-black tracking-tighter {{ $user->role === 'siswa' ? 'bg-blue-100 text-blue-600' : 'bg-amber-100 text-amber-600' }}">
                                                        {{ $user->role }}
                                                    </span>
                                                </div>
                                                <p
                                                    class="text-[9px] text-slate-400 mt-1 uppercase font-black tracking-widest">
                                                    {{ $user->email }}</p>
                                            </div>
                                        </td>

                                        <td class="px-8 py-5">
                                            <p class="text-slate-600 font-bold leading-none tracking-tighter">
                                                {{ $user->id_identity ?? '-' }}</p>
                                            <p class="text-[10px] text-slate-400 mt-1 uppercase font-bold italic">
                                                {{ $user->class ?? 'Staff/Guru' }}</p>
                                        </td>

                                        <td class="px-8 py-5 text-center">
                                            <span
                                                class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase border tracking-tighter
                                                {{ $user->status === 'aktif' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-rose-50 text-rose-600 border-rose-100' }}">
                                                {{ $user->status }}
                                            </span>
                                        </td>

                                        <td class="px-8 py-5 text-right">
                                            <div class="flex justify-end gap-2">
                                                <button @click="userTerpilih = {{ json_encode($user) }}; modalView = true"
                                                    class="p-2.5 bg-slate-50 text-slate-400 hover:bg-blue-600 hover:text-white rounded-xl transition-all shadow-sm">
                                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                                </button>
                                                <button
                                                    @click="userTerpilih = {{ json_encode($user) }}; modalEdit = true; modalTambah = false"
                                                    class="p-2.5 bg-slate-50 text-slate-400 hover:bg-amber-500 hover:text-white rounded-xl transition-all shadow-sm">
                                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                                </button>
                                                <form action="{{ route('ManageUser.destroy', $user->id) }}" method="POST"
                                                    onsubmit="return confirm('Hapus data warga ini?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit"
                                                        class="p-2.5 bg-slate-50 text-slate-400 hover:bg-rose-500 hover:text-white rounded-xl transition-all shadow-sm">
                                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="p-6 bg-slate-50/30 border-t border-slate-50 nelita-pagination">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </main>

        <template x-teleport="body">
            <div x-cloak>
                {{-- Modal Tambah & Edit --}}
                <div x-show="modalTambah || modalEdit"
                    class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm"
                    x-transition>
                    <div @click.away="modalTambah = false; modalEdit = false"
                        class="bg-white w-full max-w-5xl rounded-[2.5rem] p-8 lg:p-12 shadow-2xl relative overflow-y-auto max-h-[95vh]">

                        <h3 class="text-2xl font-black text-slate-800 italic uppercase tracking-tight mb-10"
                            x-text="modalTambah ? 'Registrasi Warga Baru' : 'Perbarui Data Warga'"></h3>

                        <form
                            :action="modalTambah ? '{{ route('ManageUser.insert') }}' : '{{ url('/ManageUser/update') }}/' +
                                userTerpilih.id"
                            method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">

                            @csrf
                            {{-- Method Spoofing Dinamis --}}
                            <input type="hidden" name="_method" :value="modalEdit ? 'PUT' : 'POST'">

                            <div class="space-y-5">
                                <div class="space-y-1">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Nama
                                        Lengkap</label>
                                    <input type="text" name="fullName" x-model="userTerpilih.fullName" required
                                        class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 outline-none focus:ring-2 focus:ring-blue-100 italic">
                                </div>
                                <div class="space-y-1">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">ID
                                        Identitas (ID/NIP/NISN)</label>
                                    <input type="text" name="id_identity" x-model="userTerpilih.id_identity"
                                        class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 outline-none italic">
                                </div>
                                <div class="space-y-1">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Kelas /
                                        Unit Kerja</label>
                                    <input type="text" name="class" x-model="userTerpilih.class"
                                        placeholder="Contoh: XI RPL 2"
                                        class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 outline-none italic">
                                </div>
                                <div class="space-y-1">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Email
                                        Address</label>
                                    <input type="email" name="email" x-model="userTerpilih.email" required
                                        class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 outline-none italic">
                                </div>
                            </div>

                            <div class="space-y-5">
                                <div class="space-y-1">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Role /
                                        Akses</label>
                                    <select name="role" x-model="userTerpilih.role"
                                        class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 outline-none italic">
                                        <option value="siswa">Siswa</option>
                                        <option value="guru">Guru</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="space-y-1">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Status
                                        Akun</label>
                                    <select name="status" x-model="userTerpilih.status"
                                        class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 outline-none italic">
                                        <option value="aktif">Aktif</option>
                                        <option value="non-aktif">Non-Aktif</option>
                                    </select>
                                </div>
                                <div class="space-y-1">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Profile
                                        Path (URL Foto)</label>
                                    <input type="text" name="profile_path" x-model="userTerpilih.profile_path"
                                        class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 outline-none italic">
                                </div>
                                <div class="space-y-1">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Password</label>
                                    <input type="password" name="password" placeholder="••••••••"
                                        class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 outline-none italic">
                                    <template x-if="modalEdit">
                                        <p class="text-[9px] text-amber-500 font-bold ml-4 italic">*Kosongkan jika tidak
                                            ingin ganti password</p>
                                    </template>
                                </div>
                            </div>

                            <div class="md:col-span-2 pt-10 flex gap-4">
                                <button type="button" @click="modalTambah = false; modalEdit = false"
                                    class="flex-1 py-5 bg-slate-100 text-slate-400 font-bold rounded-3xl text-[10px] uppercase tracking-widest transition hover:bg-slate-200">Batal</button>
                                <button type="submit"
                                    class="flex-[2] py-5 bg-blue-600 text-white font-bold rounded-3xl shadow-xl shadow-blue-100 text-[10px] uppercase tracking-widest transition hover:bg-blue-700"
                                    x-text="modalTambah ? 'Simpan Database' : 'Update Perubahan'"></button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Modal View --}}
                <div x-show="modalView"
                    class="fixed inset-0 z-[110] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm"
                    x-transition x-cloak>
                    <div @click.away="modalView = false"
                        class="bg-white w-full max-w-5xl rounded-[2.5rem] p-8 lg:p-12 shadow-2xl relative overflow-y-auto max-h-[95vh] text-left">
                        <div class="absolute top-0 right-0 w-48 h-48 bg-blue-50 rounded-full -mr-24 -mt-24 opacity-50">
                        </div>
                        <div class="flex justify-between items-start mb-10 relative z-10">
                            <div>
                                <h3 class="text-2xl font-black text-slate-800 italic uppercase tracking-tight">Detail
                                    Informasi Warga</h3>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-1">Sistem NELITA
                                    SYNC</p>
                            </div>
                            <button @click="modalView = false" class="p-2 hover:bg-slate-100 rounded-xl transition">
                                <i data-lucide="x" class="text-slate-400"></i>
                            </button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 relative z-10 italic">
                            <div class="md:col-span-2 p-5 bg-slate-50 rounded-2xl border border-white shadow-sm">
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-[2px] mb-2 block ml-2">Nama
                                    Lengkap</label>
                                <p class="font-bold text-slate-700 text-lg px-2" x-text="userTerpilih.fullName"></p>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[2px] ml-4">Role /
                                    Jabatan</label>
                                <div class="w-full bg-blue-50/50 rounded-2xl px-6 py-4 text-sm font-bold text-blue-600 italic uppercase"
                                    x-text="userTerpilih.role"></div>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[2px] ml-4">Status
                                    Akun</label>
                                <div class="w-full rounded-2xl px-6 py-4 text-sm font-bold italic uppercase"
                                    :class="userTerpilih.status === 'aktif' ? 'bg-emerald-50 text-emerald-600' :
                                        'bg-rose-50 text-rose-600'"
                                    x-text="userTerpilih.status">
                                </div>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[2px] ml-4">Nomor
                                    Identitas</label>
                                <div class="w-full bg-slate-50 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 italic"
                                    x-text="userTerpilih.id_identity || '-'"></div>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[2px] ml-4">Kelas /
                                    Unit</label>
                                <div class="w-full bg-slate-50 rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 italic"
                                    x-text="userTerpilih.class || 'Staff/Guru'"></div>
                            </div>
                            <div class="md:col-span-2 pt-10 flex gap-4">
                                <button @click="modalView = false; modalEdit = true"
                                    class="flex-[2] py-5 bg-blue-600 text-white font-bold rounded-3xl shadow-xl text-[11px] uppercase tracking-[3px] transition hover:bg-blue-700 flex items-center justify-center gap-2">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i> Buka Form Edit
                                </button>
                                <button @click="modalView = false"
                                    class="flex-1 py-5 bg-slate-100 text-slate-400 font-bold rounded-3xl text-[11px] uppercase tracking-[3px] transition hover:bg-slate-200">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
@endsection

@push('scripts')
    <script>
        lucide.createIcons();
    </script>
@endpush
