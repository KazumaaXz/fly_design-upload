<!doctype html>
<html lang="en">

<head>
    @include('layouts.frontend.head')
    @include('layouts.frontend.style')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        @if (!Request::is('user-dashboard'))
            @include('layouts.frontend.navbar')
        @endif

        <main class="flex-grow">
            @yield('content')
        </main>
    </div>

    <hr class="mt-5 mb-0 text-secondary">
    @include('layouts.frontend.footer')

    @include('layouts.frontend.script')
</body>

</html>