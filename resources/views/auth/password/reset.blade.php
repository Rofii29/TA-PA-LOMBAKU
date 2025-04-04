<!-- resources/views/auth/password/reset.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - LOMBAKU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md mx-4">
        <div class="flex justify-center mb-8">
            <img src="https://cdn-icons-png.flaticon.com/512/6681/6681204.png" alt="Reset Icon" class="w-20 h-20">
        </div>
        
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">
            Reset Your Password
        </h2>

        @if(session('status'))
            <div class="bg-emerald-50 text-emerald-700 px-4 py-3 rounded-lg mb-6">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <div class="relative">
                    <input type="email" id="email" name="email" required value="{{ old('email') }}" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 outline-none"
                           placeholder="Enter your email">
                </div>
                @error('email')
                    <p class="text-rose-500 text-sm mt-2 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 outline-none"
                           placeholder="Enter your new password">
                </div>
                @error('password')
                    <p class="text-rose-500 text-sm mt-2 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                <div class="relative">
                    <input type="password" id="password_confirmation" name="password_confirmation" required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 outline-none"
                           placeholder="Confirm your new password">
                </div>
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition duration-300">
                Reset Password
            </button>
        </form>
    </div>
</body>
</html>
