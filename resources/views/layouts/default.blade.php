<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kleninm</title>
    <meta name="description" content="Full-stack Laravel developer">

    <meta property="og:type" content="website"/>

    <link rel="icon" href="">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="min-h-screen flex flex-col bg-white dark:bg-gray-900 selection:bg-indigo-500 selection:text-white" x-data="{ open: false }">
<x-header/>
{{ $slot }}
</body>
</html>
