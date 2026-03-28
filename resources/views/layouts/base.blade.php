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

    @stack('head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

        @stack('scripts')
    </script>


</body>

</html>
