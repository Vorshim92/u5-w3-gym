<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name' => 'Corso di Smerdamento',
            'description' => 'Un corso introduttivo allo smerdamento delle persone.',
            'location' => 'Building A, Room 101',
            'activity_id' => 1,
            'slot_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Course::create([
            'name' => 'Corso di Culi Ballare',
            'description' => 'Il corso di culi ballare, un modo per imparare a ballare con i culi.',
            'location' => 'Building B, Room 111',
            'activity_id' => 1,
            'slot_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
