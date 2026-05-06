<?php

namespace Database\Seeders;

use App\Models\Assignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assignment::insert([
            // Software Engineering (module 1)
            ['module_id' => 1, 'name' => 'Requirements Analysis Report', 'weighting' => 40, 'max_marks' => 100],
            ['module_id' => 1, 'name' => 'System Design & Implementation','weighting' => 60, 'max_marks' => 100],
            // Web Development (module 2)
            ['module_id' => 2, 'name' => 'Frontend Development Task',    'weighting' => 50, 'max_marks' => 100],
            ['module_id' => 2, 'name' => 'Full Stack Application',       'weighting' => 50, 'max_marks' => 100],
            // Database Systems (module 3)
            ['module_id' => 3, 'name' => 'Database Design Report',       'weighting' => 30, 'max_marks' => 100],
            ['module_id' => 3, 'name' => 'SQL Implementation',           'weighting' => 70, 'max_marks' => 100],
            // Advanced Software Engineering (module 4)
            ['module_id' => 4, 'name' => 'Architecture Design',          'weighting' => 40, 'max_marks' => 100],
            ['module_id' => 4, 'name' => 'Implementation & Testing',     'weighting' => 60, 'max_marks' => 100],
            // Cloud Computing (module 5)
            ['module_id' => 5, 'name' => 'Cloud Architecture Report',    'weighting' => 50, 'max_marks' => 100],
            ['module_id' => 5, 'name' => 'Deployment Project',           'weighting' => 50, 'max_marks' => 100],
            // Final Year Project SD (module 6)
            ['module_id' => 6, 'name' => 'Project Proposal',             'weighting' => 20, 'max_marks' => 100],
            ['module_id' => 6, 'name' => 'Final Dissertation',           'weighting' => 80, 'max_marks' => 100],
            // Algorithms (module 7)
            ['module_id' => 7, 'name' => 'Algorithm Analysis Report',    'weighting' => 40, 'max_marks' => 100],
            ['module_id' => 7, 'name' => 'Implementation Task',          'weighting' => 60, 'max_marks' => 100],
            // Computer Networks (module 8)
            ['module_id' => 8, 'name' => 'Network Design Report',        'weighting' => 50, 'max_marks' => 100],
            ['module_id' => 8, 'name' => 'Practical Implementation',     'weighting' => 50, 'max_marks' => 100],
            // Operating Systems (module 9)
            ['module_id' => 9, 'name' => 'OS Concepts Report',           'weighting' => 40, 'max_marks' => 100],
            ['module_id' => 9, 'name' => 'Scheduling Simulation',        'weighting' => 60, 'max_marks' => 100],
            // Machine Learning (module 10)
            ['module_id' => 10,'name' => 'ML Model Report',              'weighting' => 40, 'max_marks' => 100],
            ['module_id' => 10,'name' => 'Implementation Project',       'weighting' => 60, 'max_marks' => 100],
            // Cybersecurity (module 11)
            ['module_id' => 11,'name' => 'Security Audit Report',        'weighting' => 50, 'max_marks' => 100],
            ['module_id' => 11,'name' => 'Penetration Testing Task',     'weighting' => 50, 'max_marks' => 100],
            // Final Year Project CS (module 12)
            ['module_id' => 12,'name' => 'Project Proposal',             'weighting' => 20, 'max_marks' => 100],
            ['module_id' => 12,'name' => 'Final Dissertation',           'weighting' => 80, 'max_marks' => 100],
        ]);
    }
}
