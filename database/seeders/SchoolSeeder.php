<?php

namespace Database\Seeders;

use App\Models\Child;
use App\Models\City;
use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Hilversum' => [
                'School 1',
                'School 2',
            ],
            'Amsterdam' => [
                'School 3',
                'School 4'
            ]
        ];

        foreach ($cities as $city => $schools) {
            $city = City::firstOrCreate([
                'name' => $city
            ]);
            foreach ($schools as $school) {
                School::firstOrCreate([
                    'name' => $school,
                    'city_id' => $city->id
                ]);
            }
        }

        $schools = School::get();

        Child::chunk(100, function($children) use ($schools) {
            $children->each(fn($child) => $child->school()->associate($schools->random(1)->first())->save());
        });
    }
}
