<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to our platform.">
    <title>@yield('title', 'Welcome to Our Platform')</title>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">

    <!-- Navbar -->
    <nav class="bg-gray-900 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="{{ url('/') }}" class="text-2xl font-bold">Funcade</a>
            <div>
                <a href="{{ route('account.login') }}" class="text-gray-300 hover:text-white px-4">Login</a>
                <a href="{{ route('account.register') }}" class="bg-blue-600 px-4 py-2 rounded-md text-white hover:bg-blue-700 transition">Register</a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="min-h-screen">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="container mx-auto text-center">
            <p class="text-sm">&copy; 2025 Funcade. All Rights Reserved.</p>
            <div class="mt-4">
                <a href="{{ route('privacy-policy') }}" class="text-gray-400 hover:text-white transition">Privacy Policy</a> |
                <a href="{{ route('terms-of-service') }}" class="text-gray-400 hover:text-white transition">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>
</html>
