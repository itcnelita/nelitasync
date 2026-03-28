@extends('layouts.base')

@section('title', 'Dashboard Siswa | NELITASYNC')

@push('head')
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endpush

@section('content')
    <div class="flex min-h-screen bg-[#F8FAFC] pb-24 lg:pb-0">

        <aside class="w-72 bg-white border-r border-slate-100 hidden lg:flex flex-col sticky top-0 h-screen">
            <div class="p-8">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                        <i data-lucide="layout-grid" class="text-white w-6 h-6"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-800">NELITA<span
                            class="text-blue-600">SYNC</span></span>
                </div>
            </div>

            <nav class="flex-1 px-6 space-y-2 overflow-y-auto no-scrollbar">
                <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-[2px] px-4 italic">Menu
                    Utama</label>
                <a href="#"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl bg-blue-600 text-white shadow-lg shadow-blue-200">
                    <i data-lucide="home" class="w-5 h-5"></i>
                    <span class="font-semibold">Beranda</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-blue-50 hover:text-blue-600 transition-all">
                    <i data-lucide="calendar-range" class="w-5 h-5"></i>
                    <span class="font-medium">Jadwal & KBM</span>
                </a>

                <div class="pt-6">
                    <label
                        class="text-[10px] font-extrabold text-slate-400 uppercase tracking-[2px] px-4 italic">Laporan</label>
                    <div class="mt-2 space-y-1">
                        <a href="#"
                            class="flex items-center space-x-3 px-4 py-3 rounded-xl text-emerald-600 hover:bg-emerald-50 transition-all">
                            <i data-lucide="award" class="w-5 h-5"></i>
                            <span class="font-medium text-slate-600">Poin Kebaikan</span>
                        </a>
                        <a href="#"
                            class="flex items-center space-x-3 px-4 py-3 rounded-xl text-rose-600 hover:bg-rose-50 transition-all">
                            <i data-lucide="shield-alert" class="w-5 h-5"></i>
                            <span class="font-medium text-slate-600">Lapor Pelanggaran</span>
                        </a>
                        <a href="#"
                            class="flex items-center space-x-3 px-4 py-3 rounded-xl text-amber-600 hover:bg-amber-50 transition-all">
                            <i data-lucide="hammer" class="w-5 h-5"></i>
                            <span class="font-medium text-slate-600">Lapor Kerusakan</span>
                        </a>
                    </div>
                </div>
            </nav>

            <div class="p-6 border-t border-slate-50">
                <div class="bg-slate-50 rounded-2xl p-4 flex items-center space-x-3 text-left">
                    <div
                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700 shrink-0">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-500">Siswa Aktif</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 w-full overflow-x-hidden">
            <header
                class="glass-effect sticky top-0 z-20 border-b border-slate-100 px-4 lg:px-8 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-3 lg:hidden">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i data-lucide="layout-grid" class="text-white w-5 h-5"></i>
                    </div>
                    <span class="font-bold text-slate-800">NELITASYNC</span>
                </div>
                <div class="hidden lg:block">
                    <h2 class="text-sm font-medium text-slate-500">Dashboard / Ringkasan</h2>
                </div>
                <div class="flex items-center space-x-3 lg:space-x-5">
                    <button class="relative p-2 text-slate-400 hover:bg-slate-50 rounded-xl transition">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button
                            class="flex items-center space-x-2 text-sm font-bold text-rose-500 hover:bg-rose-50 px-3 py-2 lg:px-4 rounded-xl transition">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span class="hidden sm:inline">Keluar</span>
                        </button>
                    </form>
                </div>
            </header>

            <div class="p-4 lg:p-8 max-w-6xl mx-auto">
                <div class="mb-6 lg:mb-10 text-left">
                    <h1 class="text-2xl lg:text-3xl font-bold text-slate-900 leading-tight">Dashboard Siswa</h1>
                    <p class="text-slate-500 mt-1 italic text-base lg:text-lg italic">Halo, {{ Auth::user()->name }} 👋</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8 lg:mb-10 text-left">
                    <div
                        class="group bg-gradient-to-br from-amber-500 to-orange-600 p-6 rounded-[1.5rem] lg:rounded-[2rem] text-white shadow-lg shadow-orange-100">
                        <div class="bg-white/20 w-10 h-10 rounded-xl flex items-center justify-center mb-4 text-white">
                            <i data-lucide="wrench" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg lg:text-xl font-bold">Lapor Kerusakan</h3>
                        <p class="text-white/80 text-sm mt-1">Laporkan fasilitas sekolah yang bermasalah.</p>
                    </div>

                    <div
                        class="group bg-gradient-to-br from-blue-600 to-indigo-700 p-6 rounded-[1.5rem] lg:rounded-[2rem] text-white shadow-lg shadow-blue-100">
                        <div class="bg-white/20 w-10 h-10 rounded-xl flex items-center justify-center mb-4 text-white">
                            <i data-lucide="user-plus" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg lg:text-xl font-bold">Point Karakter</h3>
                        <p class="text-white/80 text-sm mt-1">Lapor kebaikan atau pelanggaran siswa.</p>
                    </div>

                    <div
                        class="bg-white p-6 rounded-[1.5rem] lg:rounded-[2rem] border border-slate-100 shadow-sm flex flex-col justify-between sm:col-span-2 lg:col-span-1">
                        <div class="flex justify-between items-start">
                            <div
                                class="bg-emerald-50 text-emerald-600 w-10 h-10 rounded-xl flex items-center justify-center">
                                <i data-lucide="check-circle" class="w-5 h-5"></i>
                            </div>
                            <span
                                class="text-[10px] font-bold bg-emerald-100 text-emerald-700 px-2 py-1 rounded-lg uppercase tracking-wider">Tepat
                                Waktu</span>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-slate-800 font-bold text-lg leading-none">Kehadiran Hari Ini</h3>
                            <p class="text-slate-500 text-sm mt-1 italic">Absensi Anda sudah tercatat sistem.</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-[1.5rem] lg:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden mb-10 text-left">
                    <div class="px-6 lg:px-8 py-5 border-b border-slate-50 flex justify-between items-center bg-white">
                        <h3 class="font-bold text-slate-800 text-lg">Aktivitas Terbaru</h3>
                    </div>
                    <div class="overflow-x-auto no-scrollbar">
                        <table class="w-full text-left min-w-[500px]">
                            <thead class="bg-slate-50/50 text-slate-400 uppercase text-[10px] font-bold tracking-widest">
                                <tr>
                                    <th class="px-6 py-4">Tipe</th>
                                    <th class="px-6 py-4">Keterangan</th>
                                    <th class="px-6 py-4 text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                <tr class="hover:bg-slate-50/50 transition cursor-default">
                                    <td class="px-6 py-4 flex items-center space-x-3 font-bold text-slate-700">
                                        <div class="w-2 h-2 rounded-full bg-amber-500 shrink-0"></div>
                                        <span>Sarpras</span>
                                    </td>
                                    <td class="px-6 py-4 text-slate-600 text-sm">Kerusakan kursi di Kelas XI RPL</td>
                                    <td class="px-6 py-4 text-center">
                                        <span
                                            class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold uppercase border border-blue-100">Proses</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <footer class="mt-8 mb-4 text-center text-slate-400 text-[10px] uppercase tracking-[2px]">
                    &copy; 2026 NELITASYNC • SMKN 5 TANGERANG
                </footer>
            </div>
        </main>

        <nav
            class="lg:hidden fixed bottom-0 left-0 right-0 glass-effect border-t border-slate-100 px-6 py-3 flex justify-between items-center z-50">
            <a href="#" class="flex flex-col items-center text-blue-600">
                <i data-lucide="home" class="w-6 h-6"></i>
                <span class="text-[10px] font-bold mt-1 uppercase">Home</span>
            </a>
            <a href="#" class="flex flex-col items-center text-slate-400">
                <i data-lucide="calendar" class="w-6 h-6"></i>
                <span class="text-[10px] font-bold mt-1 uppercase">Jadwal</span>
            </a>
            <a href="#" class="flex flex-col items-center text-slate-400">
                <i data-lucide="plus-square"
                    class="w-8 h-8 -mt-6 bg-blue-600 text-white rounded-xl shadow-lg shadow-blue-200 flex items-center justify-center">
                    <i data-lucide="plus" class="w-6 h-6"></i>
                </i>
                <span class="text-[10px] font-bold mt-1 uppercase">Lapor</span>
            </a>
            <a href="#" class="flex flex-col items-center text-slate-400">
                <i data-lucide="award" class="w-6 h-6"></i>
                <span class="text-[10px] font-bold mt-1 uppercase">Poin</span>
            </a>
            <a href="#" class="flex flex-col items-center text-slate-400">
                <i data-lucide="user" class="w-6 h-6"></i>
                <span class="text-[10px] font-bold mt-1 uppercase">Profil</span>
            </a>
        </nav>

    </div>
@endsection

@push('scripts')
    <script>
        lucide.createIcons();
    </script>
@endpush
