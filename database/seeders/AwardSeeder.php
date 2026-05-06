<?php

namespace Database\Seeders;

use App\Models\Award;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Award::insert([
            ['id' => 1, 'name' => 'BSc Software Development'],
            ['id' => 2, 'name' => 'BSc Computer Science'],
        ]);
    }
}
