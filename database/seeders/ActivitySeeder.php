<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;


class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::create([
            'name' => 'Attività di Babidoiu',
            'description' => 'Corsi di diverso livello di Babidoiu.',
        ]);
        Activity::create([
            'name' => 'Attività di Culo Gym',
            'description' => 'Corsi di diverso livello di Mulo Gym.',
        ]);
    }
}
