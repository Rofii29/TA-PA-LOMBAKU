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
                <img src="logo.png" alt="Logo" class="h-12 w-auto transform hover:scale-105 transition duration-300">
                <span class="text-xl font-bold text-blue-600 hidden sm:block">LOMBAKU</span>
            </div>

            <!-- Auth Navigation -->
            <div class="relative flex items-center space-x-4">
                @auth
                <!-- User Section -->
                <div class="flex items-center space-x-2">
                    <div class="h-10 w-10 rounded-full bg-blue-500 text-white flex items-center justify-center font-semibold">
                        {{ Auth::user()->name[0] }}
                    </div>

                    <!-- Profile Dropdown Trigger -->
                    <button onclick="toggleDropdown()" 
                        class="flex items-center space-x-1 text-gray-700 font-semibold 
                            hover:text-blue-600 transition-colors relative"
                        aria-haspopup="true" aria-expanded="false">
                        <span>{{ Auth::user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200" 
                            :class="{ 'rotate-180': dropdownOpen }" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Profile Dropdown -->
                <div id="dropdown-menu" 
                    class="hidden absolute right-0 mt-14 w-48 bg-white rounded-lg shadow-xl 
                        border border-gray-100 transform origin-top transition-all duration-200 
                        opacity-0 scale-95 z-50">
                    <div class="py-2">
                        <!-- Tombol Profile -->
                        <a href="{{ route('mahasiswa.profile') }}" 
                            class="w-full block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 
                            hover:text-blue-600 transition-colors flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5.121 17.804A9 9 0 1118.364 4.636 9 9 0 015.12 17.804z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Profile</span>
                        </a>

                        <!-- Tombol Logout -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="w-full px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 
                                    hover:text-red-600 transition-colors flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}" 
                        class="px-6 py-2 text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition duration-300">
                        Login
                    </a>
                @endguest
            </div>
        </div>
    </nav>

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
