@extends('layouts.base')

@section('title', 'KawanNelita | NELITASYNC')
@section('page', 'kawanNelita')

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

        .post-card {
            @apply bg-white border border-slate-100 rounded-[1.5rem] lg:rounded-[2rem] shadow-sm mb-6;
        }
    </style>
@endpush

@section('content')
    <div class="flex min-h-screen bg-[#F8FAFC] pb-24 lg:pb-0 relative overflow-x-hidden text-left">

        <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

        <main class="flex-1 w-full min-w-0 overflow-x-hidden">
            <div class="p-4 lg:p-8 max-w-2xl mx-auto">
                <div class="post-card p-6 mb-8 border-none shadow-md shadow-blue-100/50">
                    <div class="flex items-start space-x-4">
                        <div
                            class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700 shrink-0">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <textarea placeholder="Bagikan info atau sapa kawan nelita lainnya..."
                                class="w-full bg-slate-50 border-none rounded-2xl p-4 text-sm focus:ring-2 focus:ring-blue-100 resize-none min-h-[100px] text-slate-700 font-medium"></textarea>
                            <div class="mt-4 flex justify-between items-center border-t border-slate-50 pt-4">
                                <div class="flex space-x-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                        <i data-lucide="camera" class="w-5 h-5"></i>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                        <i data-lucide="smile" class="w-5 h-5"></i>
                                    </button>
                                </div>
                                <button
                                    class="px-6 py-2 bg-blue-600 text-white font-bold rounded-xl text-sm shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all">Bagikan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="post-card overflow-hidden">
                    <div class="p-6 text-left">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center font-bold text-indigo-700">
                                    A</div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800 leading-none">Admin ITC Nelita</h4>
                                    <p class="text-[10px] text-slate-400 mt-1 uppercase tracking-wider font-bold">Baru saja
                                        • Info Club</p>
                                </div>
                            </div>
                            <button class="text-slate-300 hover:text-slate-600"><i data-lucide="more-vertical"
                                    class="w-5 h-5"></i></button>
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed font-medium mb-4 italic">
                            "Rapat persiapan Nelita Sync versi 2.0 dimulai sore ini di Lab RPL. Pastikan semua fitur sudah
                            dipush ke Git ya kawans! 💻⚡"
                        </p>
                    </div>

                    <div class="px-6 py-4 border-t border-slate-50 bg-slate-50/20 flex items-center space-x-6">
                        <button
                            class="flex items-center space-x-2 text-slate-400 hover:text-rose-500 transition-colors group">
                            <i data-lucide="heart" class="w-5 h-5 group-hover:fill-rose-500 transition-all"></i>
                            <span class="text-xs font-bold tracking-tight">32 Kawan Suka</span>
                        </button>
                        <button class="flex items-center space-x-2 text-slate-400 hover:text-blue-600 transition-colors">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                            <span class="text-xs font-bold tracking-tight">8 Balasan</span>
                        </button>
                    </div>
                </div>

                <footer class="mt-8 mb-4 text-center text-slate-300 text-[10px] uppercase tracking-widest font-bold">
                    KawanNelita Community &copy; 2026
                </footer>
            </div>
        </main>

        <nav
            class="lg:hidden fixed bottom-0 left-0 right-0 glass-effect border-t border-slate-100 px-6 py-3 flex justify-between items-center z-40">
            <a href="/dashboard" class="flex flex-col items-center text-slate-400">
                <i data-lucide="home" class="w-6 h-6"></i>
                <span class="text-[10px] font-bold mt-1 uppercase tracking-tighter">Beranda</span>
            </a>
            <a href="#" class="flex flex-col items-center text-blue-600">
                <i data-lucide="users" class="w-6 h-6"></i>
                <span class="text-[10px] font-bold mt-1 uppercase tracking-tighter italic text-[8px]">Kawan</span>
            </a>
            <a href="/attendance" class="flex flex-col items-center text-slate-400">
                <i data-lucide="user-check" class="w-6 h-6"></i>
                <span class="text-[10px] font-bold mt-1 uppercase tracking-tighter">Absen</span>
            </a>
            <a href="#" class="flex flex-col items-center text-slate-400">
                <i data-lucide="user" class="w-6 h-6"></i>
                <span class="text-[10px] font-bold mt-1 uppercase tracking-tighter text-[8px]">Profil</span>
            </a>
        </nav>
    </div>
@endsection

@push('scripts')
    <script>
        lucide.createIcons();

        function toggleSidebar() {
            const sidebar = document.getElementById('mainSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
@endpush
