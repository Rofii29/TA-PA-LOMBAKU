<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOMBAKU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-[Poppins]">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg px-4 sm:px-6 py-4">
        <div class="container mx-auto max-w-7xl flex flex-col md:flex-row gap-4 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <img src={{ asset('lombaku.png') }} alt="Logo" class="h-12 w-auto transform hover:scale-105 transition duration-300">
                <span class="text-xl font-bold text-yellow-300 hidden sm:block">LOMBAKU</span>
            </div>

            <!-- Auth Navigation -->
            <div class="relative flex items-center space-x-4">
                @auth
                    <!-- User Section -->
                    <div class="flex items-center space-x-2">
                        <div class="h-10 w-10 rounded-full bg-yellow-500 text-white flex items-center justify-center font-semibold">
                            {{ Auth::user()->name[0] }}
                        </div>

                        <!-- Profile Dropdown Trigger -->
                        <button onclick="toggleDropdown()" class="flex items-center space-x-1 text-gray-700 hover:text-yellow-600 transition-colors relative" aria-haspopup="true" aria-expanded="false">
                            <div class="flex flex-col items-start">
                                <span class="font-semibold text-base leading-tight">{{ Auth::user()->name }}</span>
                                <span class="text-xs text-gray-500 font-medium">{{ Auth::user()->role }}</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200" :class="{ 'rotate-180': dropdownOpen }" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <!-- Profile Dropdown -->
                    <div id="dropdown-menu" class="hidden absolute right-0 mt-14 w-48 bg-white rounded-lg shadow-xl border border-gray-100 transform origin-top transition-all duration-200 opacity-0 scale-95 z-50">
                        <div class="py-2">
                            <!-- Profile Button -->
                            <a href="{{ route('mahasiswa.profile') }}" class="w-full block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-yellow-600 transition-colors flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.364 4.636 9 9 0 015.12 17.804z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Profile</span>
                            </a>

                            <!-- Logout Button -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-600 transition-colors flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="px-6 py-2 text-white bg-yellow-600 rounded-xl hover:bg-yellow-700 transition duration-300">Login</a>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Section Banner (Under Navbar) -->
    <section class="flex flex-col md:flex-row items-center justify-between px-4 sm:px-6 py-16 bg-white shadow-lg mt-10">
        <div class="flex flex-col md:w-1/2 space-y-4 text-center md:text-left">
            <h1 class="text-4xl font-extrabold text-gray-800">Mau cari lomba seru?</h1>
            <p class="text-xl text-gray-600">Di <strong>LOMBAKU</strong> kamu bisa daftar lomba, upload prestasi, dan jadi juara!</p>
            <p class="text-lg text-gray-500">Ayo, tunjukkan bakatmu dan buktikan kemampuanmu di berbagai kompetisi keren!</p>
            <div class="mt-4">
                <span class="text-sm text-gray-400">Trending lomba keyword :</span>
                <span class="font-bold text-yellow-600">UI/UX Designer</span>
            </div>
            <div class="mt-6 flex flex-col md:flex-row gap-4">
                <input type="text" placeholder="Lowongan lomba" class="px-4 py-2 rounded-lg border border-gray-300 w-full md:w-2/3 focus:outline-none focus:ring-2 focus:ring-yellow-500" />
                <button class="mt-4 md:mt-0 w-full md:w-1/3 px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition duration-300">Cari Lomba</button>
            </div>
        </div>
        <div class="mt-8 md:mt-0 md:w-1/2">
            <img src="{{ asset('gambar1.png') }}" alt="Lomba Illustration" class="w-500 h-auto rounded-lg shadow-xl">
        </div>
    </section>
    <section class="bg-gray-100 py-16 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Lomba Terbaru Untuk Kamu</h2>
        <p class="text-lg text-gray-600 mt-4">Temukan Lomba Sesuai Dengan Minat Anda</p>
    </section>
    
    <script>
        // Toggle Profile Dropdown
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown-menu');
            const isHidden = dropdown.classList.contains('hidden');

            // Reset state
            dropdown.classList.remove('opacity-0', 'scale-95', 'opacity-100', 'scale-100');

            if (isHidden) {
                dropdown.classList.remove('hidden');
                setTimeout(() => {
                    dropdown.classList.add('opacity-100', 'scale-100');
                }, 10);
            } else {
                dropdown.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    dropdown.classList.add('hidden');
                }, 150);
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            const dropdown = document.getElementById('dropdown-menu');
            const trigger = document.querySelector('[aria-haspopup="true"]');

            if (!trigger.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    dropdown.classList.add('hidden');
                }, 150);
            }
        });
    </script>
</body>

</html>
