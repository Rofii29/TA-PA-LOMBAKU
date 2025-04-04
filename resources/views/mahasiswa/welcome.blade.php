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

                        <button onclick="toggleDropdown()" 
                            class="flex items-center space-x-1 text-gray-700 font-semibold 
                                hover:text-blue-600 transition-colors"
                            aria-haspopup="true" aria-expanded="false">
                            <span>{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <!-- Profile Dropdown -->
                    <div id="dropdown-menu" 
                        class="hidden absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-xl 
                            border border-gray-100 transform origin-top-right transition-transform duration-200">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="block w-full text-left px-4 py-3 text-gray-600 hover:bg-gray-50 
                                    hover:text-red-600 transition-colors">
                                Logout
                            </button>
                        </form>
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
            dropdown.classList.toggle('hidden');
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const profileDropdown = document.getElementById('dropdown-menu');
            if (!event.target.closest('[aria-haspopup="true"]')) {
                profileDropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
