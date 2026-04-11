@extends('layouts.base')

@section('title', 'Presensi Siswa | NELITASYNC')
@section('page', 'attendance')

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

        <main class="flex-1 w-full min-w-0 overflow-x-hidden">
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
                    <form action="/attendance" method="post">
                        @csrf
                        <input type="hidden" id="liveClock-presensi" name="time">
                        <p class="text-sm text-slate-500 mt-2">
                            <span name="presensi-time" id="clockDisplay" class="font-semibold text-slate-700 hidden"></span>
                        </p>

                        @if (session('success'))
                            <button
                                class="w-full lg:w-auto px-10 py-4 bg-green-600 text-white rounded-2xl font-bold shadow-xl shadow-blue-200 transition-all hover:scale-105 active:scale-95"
                                disabled>Absen
                                Berhasil
                            </button>
                        @else
                            <button
                                class="w-full lg:w-auto px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-bold shadow-xl shadow-blue-200 transition-all hover:scale-105 active:scale-95">Absen
                                Sekarang
                            </button>
                        @endif
                    </form>
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
                                    <th class="px-8 py-4 text-center">Waktu</th>
                                    <th class="px-8 py-4 text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50 text-sm">
                                @foreach ($logs as $log)
                                    <tr>
                                        <td class="px-8 py-5">
                                            <p class="font-bold text-slate-700 leading-none">Senin, 24 Maret</p>
                                            <p class="text-[10px] text-slate-400 mt-1 font-medium">Semester Genap</p>
                                        </td>
                                        <td class="px-8 py-5 text-center font-semibold text-slate-600">{{ $log->time }}
                                        </td>
                                        <td class="px-8 py-5 text-center">
                                            <span
                                                class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-bold uppercase border border-emerald-100">Hadir</span>
                                        </td>
                                    </tr>
                                @endforeach
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
        function updateClock() {
            const now = new Date();

            // Format untuk database (YYYY-MM-DD HH:mm:ss)
            const formattedDB =
                now.getFullYear() + '-' +
                String(now.getMonth() + 1).padStart(2, '0') + '-' +
                String(now.getDate()).padStart(2, '0') + ' ' +
                String(now.getHours()).padStart(2, '0') + ':' +
                String(now.getMinutes()).padStart(2, '0') + ':' +
                String(now.getSeconds()).padStart(2, '0');

            // Format untuk display (Indonesia)
            const formattedDisplay = now.toLocaleString('id-ID', {
                timeZone: 'Asia/Jakarta'
            });

            // Set ke input hidden (buat dikirim ke Laravel)
            document.getElementById('liveClock-presensi').value = formattedDB;

            // Tampilkan ke user
            document.getElementById('clockDisplay').innerText = formattedDisplay;
        }

        // jalan tiap detik
        setInterval(updateClock, 1000);
        updateClock();
    </script>
@endpush
