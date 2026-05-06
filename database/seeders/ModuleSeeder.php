<?php

namespace Database\Seeders;

use App\Models\Award;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::insert([
            // BSc Software Development - Level 5
            ['id' => 1, 'name' => 'Software Engineering',         'module_level' => 5],
            ['id' => 2, 'name' => 'Web Development',              'module_level' => 5],
            ['id' => 3, 'name' => 'Database Systems',             'module_level' => 5],
            // BSc Software Development - Level 6
            ['id' => 4, 'name' => 'Advanced Software Engineering','module_level' => 6],
            ['id' => 5, 'name' => 'Cloud Computing',              'module_level' => 6],
            ['id' => 6, 'name' => 'Final Year Project',           'module_level' => 6],
            // BSc Computer Science - Level 5
            ['id' => 7, 'name' => 'Algorithms and Data Structures','module_level' => 5],
            ['id' => 8, 'name' => 'Computer Networks',             'module_level' => 5],
            ['id' => 9, 'name' => 'Operating Systems',             'module_level' => 5],
            // BSc Computer Science - Level 6
            ['id' => 10, 'name' => 'Machine Learning',            'module_level' => 6],
            ['id' => 11, 'name' => 'Cybersecurity',               'module_level' => 6],
            ['id' => 12, 'name' => 'Final Year Project',          'module_level' => 6],
        ]);

        // Link modules to awards via award_modules
        DB::table('award_modules')->insert([
            // BSc Software Development (award_id 1)
            ['award_id' => 1, 'module_id' => 1],
            ['award_id' => 1, 'module_id' => 2],
            ['award_id' => 1, 'module_id' => 3],
            ['award_id' => 1, 'module_id' => 4],
            ['award_id' => 1, 'module_id' => 5],
            ['award_id' => 1, 'module_id' => 6],
            // BSc Computer Science (award_id 2)
            ['award_id' => 2, 'module_id' => 7],
            ['award_id' => 2, 'module_id' => 8],
            ['award_id' => 2, 'module_id' => 9],
            ['award_id' => 2, 'module_id' => 10],
            ['award_id' => 2, 'module_id' => 11],
            ['award_id' => 2, 'module_id' => 12],
        ]);
    }
}
