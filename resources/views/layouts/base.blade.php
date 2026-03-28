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

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>


<body>

    @yield('content')

    @yield('body')

    <!-- SERVICE WORKER -->
    <script>
        if ('serviceWorker' in navigator) {

            window.addEventListener('load', () => {

                navigator.serviceWorker.register('/sw.js')
                    .then(reg => console.log("SW registered"))
                    .catch(err => console.log("SW error", err));

            });

        }
    </script>
    @stack('scripts')


</body>

</html>
