<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Tampilkan halaman profil user
     */
    public function edit(Request $request)
    {
        return view('home.users.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update profil user
     */
    public function update(Request $request)
    {
        $user = $request->user();

        // Validasi input
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255|unique:users,email,' . $user->id,
            'password'    => 'nullable|string|min:8|confirmed',
            'gender'      => 'nullable|string|max:20',
            'phone'       => 'nullable|string|max:20',
            'instagram'   => 'nullable|string|max:50',
            'role'        => 'nullable|string|max:20', // hati-hati, jangan diubah sembarangan
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'address'     => 'nullable|string|max:255',
            'city'        => 'nullable|string|max:100',
            'province'    => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:10',
        ]);

        // Kalau password diisi, hash
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        // Kalau upload foto
        if ($request->hasFile('image')) {
            // Hapus foto lama kalau ada
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            // Simpan foto baru
            $validated['image'] = $request->file('image')->store('profiles', 'public');
        }

        // Update data user
        $user->update($validated);

        return redirect()->route('user.profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
