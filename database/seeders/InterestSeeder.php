<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $interests = [
            'music',
            'sports',
            'reading',
            'lego',
            'drawing',
            'building',
            'climbing',
            'role-playing',
            'dolls',
            'playgrounds'
        ];

        foreach ($interests as $interest) {
            Interest::firstOrCreate(['slug' => $interest]);
        }
    }
}
