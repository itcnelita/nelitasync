<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- PWA CORE -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#1F4ED8">
    <link rel="icon" href="/assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>


<body>

    {{--  Import SideBar  --}}
    @include('layouts.sideBar')
    {{--  Import TopBar  --}}
    @include('layouts.topBar')


    {{--  Menerima Section Content  --}}
    @yield('content')

    {{--  Import BottomBar  --}}
    @include('layouts.bottomBar')


    <script>
        //Start ServiceWorker
        if ('serviceWorker' in navigator) {

            window.addEventListener('load', () => {

                navigator.serviceWorker.register('/sw.js')
                    .then(reg => console.log("SW registered"))
                    .catch(err => console.log("SW error", err));

            });
        }
        //End


        //Start Icon & Bar
        lucide.createIcons(); // Inisialisasi Icon Lucide
        function toggleSidebar() { // Fungsi Buka Tutup Sidebar Mobile
            const sidebar = document.getElementById('mainSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
        //End

        //Live Time for Attendance
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', {
                hour12: false
            });
            document.getElementById('liveClock').textContent = timeString;
            document.getElementById('liveClock-presensi').textContent = timeString;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
    @stack('scripts')


</body>

</html>
