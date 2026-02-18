<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="bg-space-950 text-gray-100 antialiased">
 <div
  class="min-h-screen flex items-center justify-center bg-cover bg-center"
  style="background-image: url('/images/welcome-bg.jpg');"
>
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

   
    <div class="relative bg-white/90 backdrop-blur-lg rounded-2xl shadow-xl max-w-md w-full p-8 text-center">
        
        

        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-800 mb-2">
            Welcome  to The CRUD application👋
        </h1>
        <!-- Subtitle -->
        <p class="text-gray-600 mb-8">
            Start your journey with us in just one click.
        </p>
        <!-- Actions -->
        <div class="space-y-3">
            <a href="{{ route('login') }}"
               class="block w-full rounded-lg bg-indigo-600 px-4 py-3 text-white font-medium hover:bg-indigo-700 transition">
                Get Started
            </a>
        </div>

    </div>
</div>

</body>

</html>