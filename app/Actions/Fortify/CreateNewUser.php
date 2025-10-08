<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validasi dan buat user baru saat registrasi.
     *
     * @param  array<string, mixed>  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'gender' => ['required', Rule::in(['Laki-laki', 'Perempuan', 'Lainnya'])],
            'phone' => ['required', 'string', 'max:15'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ])->validate();

        // Upload gambar jika ada
        $imagePath = null;
        if (isset($input['image']) && $input['image'] instanceof \Illuminate\Http\UploadedFile) {
            $fileName = Str::random(10) . '.' . $input['image']->getClientOriginalExtension();
            $imagePath = $input['image']->storeAs('users', $fileName, 'public');
        }

        // Simpan data ke database
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'gender' => $input['gender'] ?? null,
            'phone' => $input['phone'],
            'instagram' => $input['instagram'] ?? null,
            'role' => 'user',
            'image' => $imagePath,
            'email_verified_at' => now(), 
        ]);
    }
}
