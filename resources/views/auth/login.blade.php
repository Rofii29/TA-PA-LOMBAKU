<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LOMBAKU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md mx-4 transition-all duration-300 hover:shadow-3xl">
        <div class="flex justify-center mb-8">
            <img src="https://cdn-icons-png.flaticon.com/512/6681/6681204.png" alt="Login Icon" class="w-20 h-20">
        </div>
        
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">
            Welcome Back
            <span class="block text-xl font-medium text-gray-500 mt-2">Login to continue</span>
        </h2>

        @if(session('status'))
            <div class="bg-emerald-50 text-emerald-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                <i class="fas fa-check-circle"></i>
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <div class="relative">
                    <input type="email" id="email" name="email" required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 outline-none"
                           placeholder="Enter your email">
                    <i class="fas fa-envelope absolute right-3 top-4 text-gray-400"></i>
                </div>
                @error('email')
                    <p class="text-rose-500 text-sm mt-2 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 outline-none"
                           placeholder="••••••••">
                    <i class="fas fa-lock absolute right-3 top-4 text-gray-400"></i>
                </div>
                @error('password')
                    <p class="text-rose-500 text-sm mt-2 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">Forgot Password?</a>
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-[1.02]">
                Sign In
            </button>

         

            <p class="text-center text-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Sign up</a>
            </p>
        </form>
    </div>
</body>
</html>