<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Headless CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen p-6">
        {{ $slot }}
    </div>

    @livewireScripts
</body>
</html>