<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Profil Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet>  
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-50 min-h-screen font-[Poppins]">

    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="bg-white rounded-2xl shadow-lg p-8 transition-all duration-300 hover:shadow-xl">
            <!-- Header Section -->
            <div class="border-b border-gray-200 pb-6 mb-8">
                <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Edit Profil Mahasiswa
                </h2>
                <p class="mt-2 text-gray-600">Lengkapi data diri Anda dengan informasi terbaru</p>
            </div>

            <!-- Status Notification -->
            @if(session('status'))
            <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-lg shadow-sm">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    {{ session('status') }}
                </div>
            </div>
            @endif

            <!-- Form Section -->
            <form action="{{ route('mahasiswa.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Grid Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- NIM -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Mahasiswa</label>
                            <input type="text" name="nim" value="{{ old('nim', $profile->nim ?? '') }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                            @error('nim')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- University Info -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Universitas</label>
                                <input type="text" name="universitas" value="{{ old('universitas', $profile->universitas ?? '') }}"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Program Studi</label>
                                <input type="text" name="program_studi" value="{{ old('program_studi', $profile->program_studi ?? '') }}"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Fakultas</label>
                                <input type="text" name="fakultas" value="{{ old('fakultas', $profile->fakultas ?? '') }}"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Profile Picture -->
                        <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                <img class="h-24 w-24 object-cover rounded-full border-4 border-white shadow-lg"
                                    id="previewImage"
                                    src="{{ $profile->foto_profil ? asset('storage/'.$profile->foto_profil) : 'https://via.placeholder.com/150' }}"
                                    alt="Current profile photo">
                            </div>
                            <div class="w-full">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                                <input type="file" name="foto_profil" id="foto_profil"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                <p class="mt-1 text-xs text-gray-500">Format: JPEG, PNG (Maks. 2MB)</p>
                            </div>
                        </div>

                        <!-- Personal Info -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $profile->tanggal_lahir ?? '') }}"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Headline</label>
                                <input type="text" name="headline" value="{{ old('headline', $profile->headline ?? '') }}"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Sosial Media</label>
                                <input type="text" name="sosial_media" value="{{ old('sosial_media', $profile->sosial_media ?? '') }}"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                    placeholder="Contoh: linkedin.com/in/nama-anda">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Full Width Fields -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Diri</label>
                    <textarea name="deskripsi_diri" rows="4"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">{{ old('deskripsi_diri', $profile->deskripsi_diri ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                    <textarea name="alamat" rows="3"
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">{{ old('alamat', $profile->alamat ?? '') }}</textarea>
                </div>

                <!-- Action Buttons -->
                <div class="pt-8 flex justify-end space-x-4 border-t border-gray-200">
                    <a href="{{ route('mahasiswa.profile') }}"
                        class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Image Preview Handler
        document.getElementById('foto_profil').addEventListener('change', function(e) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('previewImage').setAttribute('src', reader.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>

</body>

</html>