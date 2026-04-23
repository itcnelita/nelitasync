@extends('layouts.base')

@section('title', 'Eksplor Ekstrakurikuler | NELITASYNC')
@section('page', 'ekstrakurikuler')

@push('head')
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
    </style>
@endpush

@section('content')

    <div class="p-4 lg:p-8 max-w-6xl mx-auto">
        {{-- Header Section --}}
        <div class="mb-6 lg:mb-10 text-left">
            <h1 class="text-2xl lg:text-3xl font-bold text-slate-900 leading-tight tracking-tight">Eksplor Bakatmu!</h1>
            <p class="text-slate-500 mt-1 text-base lg:text-lg italic">Pilih dan bergabung dengan komunitas yang kamu sukai.
            </p>
        </div>

        {{-- Featured/Joined Section --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6 mb-8 lg:mb-10 text-left">
            <div
                class="bg-gradient-to-br from-indigo-600 to-violet-700 p-6 rounded-[1.5rem] lg:rounded-[2rem] text-white shadow-lg shadow-indigo-100 relative overflow-hidden">
                <div class="relative z-10">
                    <div class="bg-white/20 w-10 h-10 rounded-xl flex items-center justify-center mb-4">
                        <i data-lucide="star" class="w-5 h-5"></i>
                    </div>
                    <h3 class="text-lg lg:text-xl font-bold tracking-tight">Ekskul Saya</h3>
                    <p class="text-white/80 text-sm mt-1 italic">Kamu terdaftar di 2 Ekstrakurikuler aktif.</p>
                    <button
                        class="mt-4 bg-white text-indigo-600 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-slate-50 transition-colors">
                        Lihat Jadwal
                    </button>
                </div>
                <i data-lucide="award" class="absolute -right-4 -bottom-4 w-32 h-32 text-white/10 rotate-12"></i>
            </div>

            <div
                class="bg-white p-6 rounded-[1.5rem] lg:rounded-[2rem] border border-slate-100 shadow-sm flex flex-col justify-between">
                <div class="flex justify-between items-start">
                    <div class="bg-amber-50 text-amber-600 w-10 h-10 rounded-xl flex items-center justify-center">
                        <i data-lucide="megaphone" class="w-5 h-5"></i>
                    </div>
                    <span
                        class="text-[10px] font-bold bg-amber-100 text-amber-700 px-2 py-1 rounded-lg uppercase tracking-wider">Info
                        Terbaru</span>
                </div>
                <div class="mt-4">
                    <h3 class="text-slate-800 font-bold text-lg leading-none tracking-tight">Pendaftaran Dibuka</h3>
                    <p class="text-slate-500 text-sm mt-1">Ekskul Robotik & Coding kini membuka pendaftaran anggota baru.
                    </p>
                </div>
            </div>
        </div>

        {{-- List Ekskul --}}
        <div
            class="bg-white rounded-[1.5rem] lg:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden text-left">
            <div class="px-6 lg:px-8 py-5 border-b border-slate-50 flex justify-between items-center bg-white">
                <h3 class="font-bold text-slate-800 text-lg tracking-tight italic">Daftar Ekstrakurikuler</h3>
                <div class="flex space-x-2">
                    <button class="p-2 bg-slate-50 rounded-lg text-slate-400 hover:text-indigo-600">
                        <i data-lucide="filter" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto no-scrollbar">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50 text-slate-400 uppercase text-[10px] font-bold tracking-widest">
                        <tr>
                            <th class="px-8 py-4">Nama Ekskul</th>
                            <th class="px-8 py-4">Pembimbing</th>
                            <th class="px-8 py-4">Jadwal</th>
                            <th class="px-8 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">
                        {{-- Row 1 --}}
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                                        RC
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-700">Robotik & Coding</p>
                                        <p class="text-[10px] text-slate-400 uppercase tracking-tighter">Teknologi</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-slate-600">Bpk. Ahmad Sujarwo</td>
                            <td class="px-8 py-5 text-slate-500 italic">Kamis, 15:30 WIB</td>
                            <td class="px-8 py-5 text-center">
                                <button
                                    class="bg-emerald-50 text-emerald-600 px-4 py-1.5 rounded-full text-xs font-bold hover:bg-emerald-100 border border-emerald-100 transition-all">
                                    Daftar
                                </button>
                            </td>
                        </tr>

                        {{-- Row 2 --}}
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-rose-100 text-rose-600 flex items-center justify-center font-bold">
                                        PM
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-700">PMR</p>
                                        <p class="text-[10px] text-slate-400 uppercase tracking-tighter">Kemanusiaan</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-slate-600">Ibu Siti Zulaikha</td>
                            <td class="px-8 py-5 text-slate-500 italic">Selasa, 15:00 WIB</td>
                            <td class="px-8 py-5 text-center">
                                <span
                                    class="bg-slate-100 text-slate-400 px-4 py-1.5 rounded-full text-xs font-bold border border-slate-200 cursor-not-allowed">
                                    Penuh
                                </span>
                            </td>
                        </tr>

                        {{-- Row 3 --}}
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold">
                                        BS
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-700">Basket</p>
                                        <p class="text-[10px] text-slate-400 uppercase tracking-tighter">Olahraga</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-slate-600">Coach Doni</td>
                            <td class="px-8 py-5 text-slate-500 italic">Jumat, 16:00 WIB</td>
                            <td class="px-8 py-5 text-center">
                                <span
                                    class="text-indigo-600 font-bold text-xs bg-indigo-50 px-4 py-1.5 rounded-full border border-indigo-100">
                                    Terdaftar
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
@endpush
