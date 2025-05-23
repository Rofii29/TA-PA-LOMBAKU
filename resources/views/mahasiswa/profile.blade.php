<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <button onclick="toggleDropdown()" 
                        class="flex items-center space-x-1 text-gray-700 hover:text-yellow-600 transition-colors relative"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="flex flex-col items-start">
                            <span class="font-semibold text-base leading-tight">{{ Auth::user()->name }}</span>
                            <span class="text-xs text-gray-500 font-medium">{{ Auth::user()->role }}</span>
                        </div>
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
                        <a href="{{ route('mahasiswa.profile')}}" 
                            class="w-full block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 
                            hover:text-yellow-600 transition-colors flex items-center space-x-2">
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
                        class="px-6 py-2 text-white bg-yellow-600 rounded-xl hover:bg-yellow-700 transition duration-300">
                        Login
                    </a>
                @endguest
            </div>
        </div>
    </nav>
    <!-- Konten Profil -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header Profil -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-6">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <h1 class="text-2xl font-bold text-white">Profil Mahasiswa</h1>
                    <a href="{{ route('mahasiswa.profile.edit') }}" 
                       class="mt-4 md:mt-0 px-6 py-2 bg-white text-blue-600 rounded-lg font-semibold 
                              hover:bg-gray-100 transition-all flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Edit Profil
                    </a>
                </div>
            </div>

            <!-- Body Profil -->
            <div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Kolom Kiri (Foto & Info Kontak) -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Foto Profil -->
                    <div class="relative group">
                        @if($profile && $profile->foto_profil)
                            <img src="{{ asset('storage/' . $profile->foto_profil) }}" 
                                 class="w-48 h-48 rounded-full object-cover mx-auto border-4 border-white shadow-lg">
                        @else
                            <div class="w-48 h-48 rounded-full bg-gray-200 mx-auto flex items-center justify-center
                                      border-4 border-white shadow-lg text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Info Kontak -->
                    <div class="space-y-4 bg-gray-50 p-4 rounded-xl">
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <span class="font-medium">{{ $user->phone ?? 'Belum diisi' }}</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <span class="font-medium">{{ $user->email }}</span>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan (Data Profil) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Bagian Data Pribadi -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold border-b-2 border-blue-100 pb-2">Data Pribadi</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm text-gray-600">Nama Lengkap</label>
                                <p class="font-medium">{{ $user->name }}</p>
                            </div>
                            <div>
                                <label class="text-sm text-gray-600">Tanggal Lahir</label>
                                <p class="font-medium">
                                    @if($profile && $profile->tanggal_lahir)
                                        {{ \Carbon\Carbon::parse($profile->tanggal_lahir)->isoFormat('D MMMM Y') }}
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                            <div>
                                <label class="text-sm text-gray-600">Alamat</label>
                                <p class="font-medium">{{ $profile->alamat ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Data Akademik -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold border-b-2 border-blue-100 pb-2">Data Akademik</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm text-gray-600">NIM</label>
                                <p class="font-medium">{{ $profile->nim ?? '-' }}</p>
                            </div>
                            <div>
                                <label class="text-sm text-gray-600">Universitas</label>
                                <p class="font-medium">{{ $profile->universitas ?? '-' }}</p>
                            </div>
                            <div>
                                <label class="text-sm text-gray-600">Program Studi</label>
                                <p class="font-medium">{{ $profile->program_studi ?? '-' }}</p>
                            </div>
                            <div>
                                <label class="text-sm text-gray-600">Fakultas</label>
                                <p class="font-medium">{{ $profile->fakultas ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Lainnya -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold border-b-2 border-blue-100 pb-2">Profil Lainnya</h3>
                        <div>
                            <label class="text-sm text-gray-600">Headline</label>
                            <p class="font-medium">{{ $profile->headline ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600">Deskripsi Diri</label>
                            <p class="font-medium leading-relaxed text-gray-700">
                                {{ $profile->deskripsi_diri ?? '-' }}
                            </p>
                        </div>
                        <div>
                        <div>
    <label class="text-sm text-gray-600">Sosial Media</label>
    <p class="font-medium text-gray-700">
        {{ $profile->sosial_media ?? '-' }}
    </p>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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