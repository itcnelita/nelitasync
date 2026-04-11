@extends('layouts.base')

@section('title', 'Balasan Kawan | NELITASYNC')

@push('head')
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .thread-line {
            position: absolute;
            left: 19px;
            top: 45px;
            bottom: 0;
            width: 2px;
            @apply bg-slate-100;
        }
    </style>
@endpush

@section('content')
    <div class="min-h-screen bg-[#F8FAFC] pb-32 lg:pb-10 text-left">

        <header class="glass-effect sticky top-0 z-30 border-b border-slate-100 px-4 lg:px-8 py-4 flex items-center gap-4">
            <a href="/posts" class="p-2 hover:bg-slate-50 rounded-xl transition">
                <i data-lucide="arrow-left" class="w-6 h-6 text-slate-600"></i>
            </a>
            <h2 class="text-lg font-bold text-slate-800 tracking-tight italic">Balasan Kawan</h2>
        </header>

        <div class="max-w-2xl mx-auto p-4 lg:p-8">

            <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-6 mb-4">
                <div class="flex items-center space-x-3 mb-4">
                    <div
                        class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center font-bold text-amber-700">
                        G</div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-800 leading-none tracking-tight">Pak Budi (Guru RPL)</h4>
                        <p class="text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-widest italic text-left">Guru
                            Aktif • 2 Jam Lalu</p>
                    </div>
                </div>

                <p class="text-slate-700 text-base leading-relaxed font-medium italic">
                    "Selamat untuk tim lomba Web Design SMKN 5 Tangerang yang berhasil masuk ke babak final tingkat
                    Provinsi! Tetap semangat kawan-kawan Nelita Sync! 🚀💻"
                </p>

                <div class="mt-6 pt-4 border-t border-slate-50 flex items-center space-x-6">
                    <div class="flex items-center space-x-1.5 text-rose-500 font-bold text-xs uppercase tracking-tighter">
                        <i data-lucide="heart" class="w-4 h-4 fill-rose-500"></i>
                        <span>32 Kawan Suka</span>
                    </div>
                    <div class="flex items-center space-x-1.5 text-slate-400 font-bold text-xs uppercase tracking-tighter">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                        <span>2 Balasan</span>
                    </div>
                </div>
            </div>

            <div class="px-4 mb-4">
                <h3 class="text-[10px] font-extrabold text-slate-400 uppercase tracking-[2px] italic">Semua Balasan</h3>
            </div>

            <div class="space-y-4">

                <div class="relative flex space-x-4 px-2">
                    <div
                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700 shrink-0 z-10">
                        R</div>
                    <div
                        class="flex-1 bg-white border border-slate-100 p-4 rounded-2xl rounded-tl-none shadow-sm shadow-blue-50/50">
                        <div class="flex justify-between items-start mb-1">
                            <h5 class="text-xs font-bold text-slate-800 tracking-tight uppercase italic">Rizky Syahputra
                            </h5>
                            <span class="text-[9px] text-slate-300 font-bold uppercase tracking-widest">30 Menit Lalu</span>
                        </div>
                        <p class="text-sm text-slate-600 font-medium italic leading-relaxed">
                            Keren pak! Semoga kita bisa bawa pulang juara 1 ke Nelita! 🏆✨
                        </p>
                        <button
                            class="mt-2 text-[10px] font-bold text-blue-500 hover:underline uppercase tracking-widest">Sukai</button>
                    </div>
                </div>

                <div class="relative flex space-x-4 px-2">
                    <div
                        class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-500 shrink-0 z-10 text-xs">
                        S</div>
                    <div
                        class="flex-1 bg-white border border-slate-100 p-4 rounded-2xl rounded-tl-none shadow-sm shadow-blue-50/50">
                        <div class="flex justify-between items-start mb-1">
                            <h5 class="text-xs font-bold text-slate-800 tracking-tight uppercase italic">Siti Aminah</h5>
                            <span class="text-[9px] text-slate-300 font-bold uppercase tracking-widest">15 Menit Lalu</span>
                        </div>
                        <p class="text-sm text-slate-600 font-medium italic leading-relaxed">
                            Gas terus kawannn! NelitaSync emang beda! 🔥
                        </p>
                        <button
                            class="mt-2 text-[10px] font-bold text-blue-500 hover:underline uppercase tracking-widest">Sukai</button>
                    </div>
                </div>

            </div>
        </div>

        <div
            class="fixed bottom-0 left-0 right-0 bg-white border-t border-slate-100 p-4 lg:p-6 z-40 shadow-[0_-10px_20px_rgba(0,0,0,0.02)]">
            <div class="max-w-2xl mx-auto flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center font-bold text-blue-600 shrink-0 text-xs hidden sm:flex">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="relative flex-1">
                    <input type="text" placeholder="Tulis balasan kawan..."
                        class="w-full bg-slate-50 border-none rounded-2xl py-3 px-4 pr-12 text-sm font-medium focus:ring-2 focus:ring-blue-100 transition-all text-slate-700">
                    <button class="absolute right-2 top-1.5 p-1.5 text-blue-600 hover:bg-blue-100 rounded-xl transition">
                        <i data-lucide="send" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        lucide.createIcons();
    </script>
@endpush
