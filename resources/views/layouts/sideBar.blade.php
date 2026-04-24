<div class="flex min-h-screen bg-[#F8FAFC] pb-24 lg:pb-0 relative overflow-x-hidden">
    <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/50 z-40 hidden lg:hidden transition-opacity duration-300"
        onclick="toggleSidebar()"></div>
    <aside id="mainSidebar"
        class="fixed inset-y-0 left-0 w-72 bg-white border-r border-slate-100 flex flex-col z-50 transform -translate-x-full lg:translate-x-0 lg:static lg:h-screen transition-transform duration-300 ease-in-out shadow-2xl lg:shadow-none">
        <div class="p-8 flex justify-between items-center">
            <div class="flex items-center space-x-3 text-left">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <img class="w-6 h-6" src="{{ asset('assets/img/favicon.png') }}" alt="NelitaSync">
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

            <a href="{{ route('dashboard') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ Route::is('dashboard*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200 transition-all font-semibold' : 'text-slate-500 hover:bg-blue-50 hover:text-blue-600 transition-all' }}">
                <i data-lucide="home" class="w-5 h-5"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('attendance') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ Route::is('attendance*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200 transition-all font-semibold' : 'text-slate-500 hover:bg-blue-50 hover:text-blue-600 transition-all' }}">
                <i data-lucide="user-check" class="w-5 h-5"></i>
                <span class="font-medium">Attendance</span>
            </a>

            <a href="{{ route('ekstrakulikuler.index') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ Route::is('ekstrakulikuler.index') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200 transition-all font-semibold' : 'text-slate-500 hover:bg-blue-50 hover:text-blue-600 transition-all' }}">
                <i data-lucide="ghost" class="w-5 h-5"></i>
                <span class="font-medium">Ekstrakurikuler</span>
            </a>

            <a href="#"
                class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-500 hover:bg-blue-50 hover:text-blue-600 transition-all">
                <i data-lucide="calendar-range" class="w-5 h-5"></i>
                <span class="font-medium">Jadwal & KBM</span>
            </a>

            <a href="{{ route('kawanNelita') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ Route::is('kawanNelita*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200 transition-all font-semibold' : 'text-slate-500 hover:bg-blue-50 hover:text-blue-600 transition-all' }}">
                <i data-lucide="hand-metal" class="w-5 h-5"></i>
                <span class="font-medium">KawanNelita</span>
            </a>

            <div class="pt-6">
                <label
                    class="text-[10px] font-extrabold text-slate-400 uppercase tracking-[2px] px-4 italic">Laporan</label>
                <div class="mt-2 space-y-1">
                    <a href="#"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl text-emerald-600 hover:bg-emerald-50 transition-all">
                        <i data-lucide="award" class="w-5 h-5"></i>
                        <span class="font-medium">Poin Kebaikan</span>
                    </a>
                    <a href="#"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl text-rose-600 hover:bg-rose-50 transition-all">
                        <i data-lucide="shield-alert" class="w-5 h-5"></i>
                        <span class="font-medium">Lapor Pelanggaran</span>
                    </a>
                    <a href="#"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl text-amber-600 hover:bg-amber-50 transition-all">
                        <i data-lucide="hammer" class="w-5 h-5"></i>
                        <span class="font-medium">Lapor Kerusakan</span>
                    </a>
                </div>
            </div>

            <div class="pt-6">
                <label
                    class="text-[10px] font-extrabold text-slate-400 uppercase tracking-[2px] px-4 italic">Manage</label>
                <div class="mt-2 space-y-1">
                    <a href="{{ route('ManageUser.index') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ Route::is('ManageUser*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200 transition-all font-semibold' : 'text-slate-500 hover:bg-blue-50 hover:text-blue-600 transition-all' }}">
                        <i data-lucide="user-round" class="w-5 h-5"></i>
                        <span class="font-medium">User</span>
                    </a>

                    {{-- Menu Manage Ekstrakurikuler --}}
                    <a href="{{ route('ManageEkstrakulikuler.index') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ Route::is('ManageEkstrakulikuler.index') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200 transition-all font-semibold' : 'text-slate-500 hover:bg-blue-50 hover:text-blue-600 transition-all' }}">
                        <i data-lucide="component" class="w-5 h-5"></i>
                        <span class="font-medium">Ekstrakulikuler</span>
                    </a>

                    <a href="#"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl text-amber-600 hover:bg-amber-50 transition-all">
                        <i data-lucide="user-round-key" class="w-5 h-5"></i>
                        <span class="font-medium">Hak Akses</span>
                    </a>
                </div>
            </div>
        </nav>

        <div class="p-6 border-t border-slate-50">
            <div class="bg-slate-50 rounded-2xl p-4 flex items-center space-x-3 text-left">
                @if (Auth::check())
                    <div
                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-700 shrink-0">
                        {{ substr(Auth::user()->fullName, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->fullName }}</p>
                        <p class="text-xs text-slate-500">{{ ucfirst(Auth::user()->role) }} Nelita</p>
                    </div>
                @else
                    <p class="text-sm font-bold text-slate-800">Guest</p>
                @endif
            </div>
        </div>
    </aside>

    <main class="flex-1 w-full min-w-0 overflow-x-hidden">
