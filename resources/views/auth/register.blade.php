<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LOMBAKU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md mx-4 transition-all duration-300 hover:shadow-3xl">
        <div class="flex justify-center mb-8">
            <div class=" ">
                <img src="{{ asset('lombaku.png') }}" alt="Register Icon" class="w-12 h-12">
            </div>
        </div>

        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">
            Create Account
        </h2>

        @if(session('status'))
            <div class="bg-emerald-50 text-emerald-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                <i class="fas fa-check-circle"></i>
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <div class="relative">
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 outline-none"
                           placeholder="John Doe">
                    <i class="fas fa-user absolute right-3 top-4 text-gray-400"></i>
                </div>
                @error('name')
                    <p class="text-rose-500 text-sm mt-2 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <div class="relative">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 outline-none"
                           placeholder="email@example.com">
                    <i class="fas fa-envelope absolute right-3 top-4 text-gray-400"></i>
                </div>
                @error('email')
                    <p class="text-rose-500 text-sm mt-2 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                <div class="relative">
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 outline-none"
                           placeholder="0812-3456-7890">
                    <i class="fas fa-phone absolute right-3 top-4 text-gray-400"></i>
                </div>
                @error('phone')
                    <p class="text-rose-500 text-sm mt-2 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi</label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation" required 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 outline-none"
                               placeholder="••••••••">
                        <i class="fas fa-key absolute right-3 top-4 text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Peran</label>
                <div class="relative">
                    <select id="role" name="role" required 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 outline-none appearance-none">
                        <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        <option value="dosen" {{ old('role') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                        <!-- <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option> -->
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3">
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </div>
                </div>
                @error('role')
                    <p class="text-rose-500 text-sm mt-2 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-[1.02]">
                Daftar Sekarang
            </button>

            <p class="text-center text-gray-600">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Masuk disini</a>
            </p>
        </form>
    </div>
</body>
</html>