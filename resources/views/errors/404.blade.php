<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Campaint</title>
</head>
<body>
{{-- 404 Start --}}
<div class="flex items-center justify-center bg-gray-900 text-white min-h-screen px-4">
    <div class="text-center max-w-xl">
        <i class="ri-error-warning-fill text-red-500 text-[5rem] animate-pulse"></i>
        <h1 class="text-7xl font-extrabold">404</h1>
        <h2 class="text-2xl font-semibold mb-4">Page Not Found</h2>
        <p class="mb-6 text-gray-300">We’re sorry, the page you have looked for does not exist on our website! Maybe go to our home page or try to use a search?</p>
        <a href="{{ url('/') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-6 rounded-full transition-all">
            Go Back To Home
        </a>
    </div>
</div>
{{-- 404 End --}}
</body>
</html>
{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}