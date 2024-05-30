<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slot;


class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slot::create([
            'name' => 'Morning Slot',
            'date' => '2024-06-01',
            'start_time' => '08:00',
            'end_time' => '12:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Slot::create([
            'name' => 'Afternoon Slot',
            'date' => '2024-06-01',
            'start_time' => '14:00',
            'end_time' => '18:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
