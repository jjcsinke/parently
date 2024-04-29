<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\Child;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate([
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'type' => UserType::Admin
        ], [
            'name' => 'admin'
        ]);

        $admin->markEmailAsVerified();

        $parent = User::firstOrCreate([
            'email' => 'parent@example.com',
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'type' => UserType::Parent
        ],[
            'name' => 'parent'
        ]);
        $parent->markEmailAsVerified();

        $parent->children()->sync(Child::factory()->withInterests()->count(3)->create());

        User::factory()->count(25)
            ->state(['type' => UserType::Parent])
            ->create()
            ->each(fn($user) => $user->children()->sync(Child::factory()->count(random_int(0, 5))->create()));
    }
}
