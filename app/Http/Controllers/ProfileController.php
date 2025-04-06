<?php
// app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProfileMahasiswa;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profileMahasiswa;

        return view('mahasiswa.profile', compact('user', 'profile'));
    }
    
public function edit()
{
    $user = Auth::user();
    $profile = $user->profileMahasiswa;

    return view('mahasiswa.edit_profile', compact('user', 'profile'));
}

public function update(Request $request)
{
    $request->validate([
        'nim' => 'nullable|string|max:20',
        'universitas' => 'nullable|string|max:255',
        'program_studi' => 'nullable|string|max:255',
        'fakultas' => 'nullable|string|max:255',
        'tanggal_lahir' => 'nullable|date',
        'headline' => 'nullable|string|max:255',
        'deskripsi_diri' => 'nullable|string',
        'alamat' => 'nullable|string',
        'sosial_media' => 'nullable|string|max:255',
        'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user = Auth::user();
    $profile = $user->profileMahasiswa;

    if (!$profile) {
        $profile = new ProfileMahasiswa();
        $profile->user_id = $user->id;
    }

    $profile->fill($request->except('foto_profil'));

    // Upload foto jika ada
    if ($request->hasFile('foto_profil')) {
        $file = $request->file('foto_profil');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('foto_profil', $filename, 'public');
        $profile->foto_profil = $path;
    }

    $profile->save();

    return redirect()->route('mahasiswa.profile')->with('status', 'Profil berhasil diperbarui.');
}
}
