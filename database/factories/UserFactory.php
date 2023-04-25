<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake('id_ID')->name();
        return [
            'name' => $name,
            'username' => $name,
            'email' => fake('id_ID')->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            if ($user->id == 1) {
                $user->assignrole('superadmin');
            } elseif ($user->id == 2) {
                $user->assignRole('owner');
            } elseif ($user->id == 3) {
                $user->assignRole('admin');
            } elseif ($user->id == 4) {
                $user->assignRole('valet');
            } elseif ($user->id == 5) {
                $user->assignRole('valet');
            } elseif ($user->id == 6) {
                $user->assignRole('pegawai');
            } else {
                $user->assignRole('hotel');
            }
            $user->user_detail()->create([
                'address' => fake('id_ID')->address(),
                'phone_number' => fake('id_ID')->phoneNumber(),
            ]);
        });
    }
}
