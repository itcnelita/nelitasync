@extends('layouts.base')

@section('title', 'Presensi Siswa | NELITASYNC')

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
    </style>
@endpush

@section('content')
    <div class="flex min-h-screen bg-[#F8FAFC] pb-24 lg:pb-0 relative overflow-x-hidden">

        <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

        <aside id="mainSidebar"
            class="fixed inset-y-0 left-0 w-72 bg-white border-r border-slate-100 flex flex-col z-50 transform -translate-x-full lg:translate-x-0 lg:static lg:h-screen transition-transform duration-300 ease-in-out">
            <div class="p-8 flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                        <i data-lucide="layout-grid" class="text-white w-6 h-6"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-800">NELITA<span
                            class="text-blue-600">SYNC</span></span>
                </div>
                <button onclick="toggleSidebar()" class="lg:hidden p-2 text-slate-400 hover:bg-slate-50 rounded-lg">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <nav class="flex-1 px-6 space-y-2 overflow-y-auto no-scrollbar text-left">
                <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-[2px] px-4 italic">Menu
                    Utama</label>
                <a href="/dashboard"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-blue-50 hover:text-blue-600 transition-all">
                    <i data-lucide="home" class="w-5 h-5"></i>
                    <span class="font-medium">Beranda</span>
                </a>
                <a href="#"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl bg-blue-600 text-white shadow-lg shadow-blue-200 transition-all">
                    <i data-lucide="user-check" class="w-5 h-5"></i>
                    <span class="font-semibold">Presensi</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 w-full min-w-0 overflow-x-hidden">
            <header
                class="glass-effect sticky top-0 z-20 border-b border-slate-100 px-4 lg:px-8 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-3 lg:hidden">
                    <button onclick="toggleSidebar()" class="p-2 -ml-2 text-slate-600 hover:bg-slate-50 rounded-xl">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <span class="font-bold text-slate-800 tracking-tight text-lg">NELITASYNC</span>
                </div>
                <div class="hidden lg:block">
                    <h2 class="text-sm font-medium text-slate-500 italic">Akademik / Presensi</h2>
                </div>
                <div class="flex items-center space-x-3">
                    <span id="liveClock"
                        class="text-sm font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-lg">00:00:00</span>
                </div>
            </header>

            <div class="p-4 lg:p-8 max-w-4xl mx-auto">
                <div
                    class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-6 lg:p-8 mb-8 text-center lg:text-left flex flex-col lg:flex-row items-center justify-between gap-6">
                    <div class="flex flex-col lg:flex-row items-center gap-6">
                        <div
                            class="w-20 h-20 bg-emerald-50 text-emerald-600 rounded-3xl flex items-center justify-center shadow-inner">
                            <i data-lucide="map-pin" class="w-10 h-10"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-800 tracking-tight">Presensi Kehadiran</h3>
                            <p class="text-slate-500 text-sm italic">Lokasi: SMKN 5 Tangerang (Dalam Radius)</p>
                        </div>
                    </div>

                    <button
                        class="w-full lg:w-auto px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-bold shadow-xl shadow-blue-200 transition-all hover:scale-105 active:scale-95">
                        Absen Sekarang
                    </button>
                </div>

                <div class="grid grid-cols-2 gap-4 lg:gap-6 mb-8 text-left">
                    <div class="bg-white p-5 rounded-[1.5rem] border border-slate-100 shadow-sm">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Jam Masuk</p>
                        <h4 class="text-xl font-bold text-slate-800 mt-1">07:00 <span
                                class="text-xs font-normal text-slate-400 italic">WIB</span></h4>
                    </div>
                    <div class="bg-white p-5 rounded-[1.5rem] border border-slate-100 shadow-sm text-left">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Jam Keluar</p>
                        <h4 class="text-xl font-bold text-slate-800 mt-1">15:30 <span
                                class="text-xs font-normal text-slate-400 italic">WIB</span></h4>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden text-left">
                    <div class="px-6 lg:px-8 py-5 border-b border-slate-50 flex justify-between items-center bg-white">
                        <h3 class="font-bold text-slate-800 text-lg tracking-tight italic">Riwayat Pekan Ini</h3>
                        <i data-lucide="filter" class="w-5 h-5 text-slate-400 cursor-pointer"></i>
                    </div>
                    <div class="overflow-x-auto no-scrollbar">
                        <table class="w-full text-left min-w-[450px]">
                            <thead class="bg-slate-50/50 text-slate-400 uppercase text-[10px] font-bold tracking-widest">
                                <tr>
                                    <th class="px-8 py-4">Hari / Tanggal</th>
                                    <th class="px-8 py-4 text-center">Masuk</th>
                                    <th class="px-8 py-4 text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50 text-sm">
                                <tr>
                                    <td class="px-8 py-5">
                                        <p class="font-bold text-slate-700 leading-none">Senin, 24 Maret</p>
                                        <p class="text-[10px] text-slate-400 mt-1 font-medium">Semester Genap</p>
                                    </td>
                                    <td class="px-8 py-5 text-center font-semibold text-slate-600">06:45</td>
                                    <td class="px-8 py-5 text-center">
                                        <span
                                            class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-bold uppercase border border-emerald-100">Hadir</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-8 py-5">
                                        <p class="font-bold text-slate-700 leading-none">Selasa, 25 Maret</p>
                                        <p class="text-[10px] text-slate-400 mt-1 font-medium">Semester Genap</p>
                                    </td>
                                    <td class="px-8 py-5 text-center font-semibold text-slate-600">06:58</td>
                                    <td class="px-8 py-5 text-center">
                                        <span
                                            class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-bold uppercase border border-emerald-100">Hadir</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <nav
            class="lg:hidden fixed bottom-0 left-0 right-0 glass-effect border-t border-slate-100 px-6 py-3 flex justify-between items-center z-40">
            <a href="/dashboard" class="flex flex-col items-center text-slate-400">
                <i data-lucide="home" class="w-6 h-6"></i>
                <span class="text-[10px] font-bold mt-1 uppercase">Home</span>
            </a>
            <a href="#" class="flex flex-col items-center text-blue-600">
                <i data-lucide="user-check" class="w-6 h-6"></i>
                <span class="text-[10px] font-bold mt-1 uppercase">Absen</span>
            </a>
        </nav>
    </div>
@endsection

@push('scripts')
    <script>
        lucide.createIcons();

        // Real-time Clock
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', {
                hour12: false
            });
            document.getElementById('liveClock').textContent = timeString;
        }
        setInterval(updateClock, 1000);
        updateClock();

        function toggleSidebar() {
            const sidebar = document.getElementById('mainSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
@endpush
