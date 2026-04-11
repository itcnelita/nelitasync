@extends('layouts.base')

@section('title', 'Dashboard Siswa | NELITASYNC')
@section('page', 'dashboard')

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
    </style>
@endpush

@section('content')

    {{--  //content  --}}
    <div class="p-4 lg:p-8 max-w-6xl mx-auto">
        <div class="mb-6 lg:mb-10 text-left">
            <h1 class="text-2xl lg:text-3xl font-bold text-slate-900 leading-tight tracking-tight">Selamat Pagi!
            </h1>
            <p class="text-slate-500 mt-1 text-base lg:text-lg italic">Halo, {{ Auth::user()->name }} 👋</p>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8 lg:mb-10 text-left">

            <div
                class="bg-white p-6 rounded-[1.5rem] lg:rounded-[2rem] border border-slate-100 shadow-sm flex flex-col justify-between sm:col-span-2 lg:col-span-1">
                <div class="flex justify-between items-start">
                    <div class="bg-emerald-50 text-emerald-600 w-10 h-10 rounded-xl flex items-center justify-center">
                        <i data-lucide="check-circle" class="w-5 h-5"></i>
                    </div>
                    <span
                        class="text-[10px] font-bold bg-emerald-100 text-emerald-700 px-2 py-1 rounded-lg uppercase tracking-wider">Hadir</span>
                </div>
                <div class="mt-4">
                    <h3 class="text-slate-800 font-bold text-lg leading-none tracking-tight">Absensi Hari Ini</h3>
                    <p class="text-slate-500 text-sm mt-1">Kehadiran kamu tercatat di sistem.</p>
                </div>
            </div>

            <div
                class="bg-gradient-to-br from-amber-500 to-orange-600 p-6 rounded-[1.5rem] lg:rounded-[2rem] text-white shadow-lg shadow-orange-100">
                <div class="bg-white/20 w-10 h-10 rounded-xl flex items-center justify-center mb-4"><i data-lucide="wrench"
                        class="w-5 h-5"></i></div>
                <h3 class="text-lg lg:text-xl font-bold tracking-tight">Lapor Kerusakan</h3>
                <p class="text-white/80 text-sm mt-1">Lantai, meja, atau fasilitas bermasalah? Laporkan.</p>
            </div>

            <div
                class="bg-gradient-to-br from-blue-600 to-indigo-700 p-6 rounded-[1.5rem] lg:rounded-[2rem] text-white shadow-lg shadow-blue-100">
                <div class="bg-white/20 w-10 h-10 rounded-xl flex items-center justify-center mb-4"><i
                        data-lucide="user-plus" class="w-5 h-5"></i></div>
                <h3 class="text-lg lg:text-xl font-bold tracking-tight">Point Karakter</h3>
                <p class="text-white/80 text-sm mt-1">Berikan apresiasi atau lapor pelanggaran teman.</p>
            </div>

        </div>

        <div
            class="bg-white rounded-[1.5rem] lg:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden text-left mb-10">
            <div class="px-6 lg:px-8 py-5 border-b border-slate-50 bg-white">
                <h3 class="font-bold text-slate-800 text-lg tracking-tight italic">Laporan Terbaru</h3>
            </div>
            <div class="overflow-x-auto no-scrollbar">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50 text-slate-400 uppercase text-[10px] font-bold tracking-widest">
                        <tr>
                            <th class="px-8 py-4">Kategori</th>
                            <th class="px-8 py-4">Keterangan</th>
                            <th class="px-8 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm">
                        <tr>
                            <td class="px-8 py-5 flex items-center space-x-3 font-bold text-slate-700">
                                <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                                <span>Sarpras</span>
                            </td>
                            <td class="px-8 py-5 text-slate-500 italic">Papan tulis Kelas XII RPL kendor</td>
                            <td class="px-8 py-5 text-center">
                                <span
                                    class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold uppercase border border-blue-100">Diproses</span>
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
