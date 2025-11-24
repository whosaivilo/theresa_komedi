<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

class CreateUserDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // Loop untuk membuat 100 data user palsu
        foreach (range(1, 1000) as $index) {
            $verifiedAt = $faker->boolean(80) ? now() : null;
            $profilePicture = "https://i.pravatar.cc/200?img=" . rand(1, 70);

            DB::table('users')->insert([
                'name'              => $faker->name,
                'email'             => $faker->unique()->safeEmail,
                'password'          => Hash::make('password'), // Atur password default
                'email_verified_at' => $verifiedAt,                  // Anggap sudah terverifikasi
                'profile_picture'   => "https://i.pravatar.cc/200?img=" . rand(1,70),
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
    }
}
