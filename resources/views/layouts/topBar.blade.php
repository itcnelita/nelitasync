    {{--  //topbar  --}}
    <header
        class="glass-effect sticky top-0 z-20 border-b border-slate-100 px-4 lg:px-8 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-3 lg:hidden">
            <button onclick="toggleSidebar()" class="p-2 -ml-2 text-slate-600 hover:bg-slate-50 rounded-xl">
                {{--  <i data-lucide="menu" class="w-6 h-6"></i>  --}}
                <img class="w-6 h-6" src="{{ asset('assets/img/favicon.png') }}" alt="{{ __('') }}">
            </button>
            <span class="font-bold text-slate-800 tracking-tight text-lg">NELITASYNC</span>
        </div>
        <div class="hidden lg:block">
            <h2 class="text-sm font-medium text-slate-500 italic">@yield('title')</h2>
        </div>
        <div class="flex items-center space-x-3 lg:space-x-5">
            <div class="flex items-center space-x-3">
                <span id="liveClock"
                    class="text-sm font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-lg">00:00:00</span>
            </div>
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
