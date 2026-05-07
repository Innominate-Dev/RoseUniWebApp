<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ClassificationService;
use App\Models\User;
use App\Models\Award;
use App\Models\Module;
use App\Models\Assignment;
use App\Models\Mark;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClassificationServiceTest extends TestCase
{
    use RefreshDatabase;

    protected ClassificationService $service;

    /** @test */
    public function student_with_first_class_marks_gets_first()
    {
        $service = new ClassificationService();
        $this->assertEquals('First', $service->calculateOverallClassification(75, 75));
    }

    /** @test */
    public function student_with_2_1_marks_gets_upper_second()
    {
        $service = new ClassificationService();
        $this->assertEquals('2:1', $service->calculateOverallClassification(65, 65));
    }

    /** @test */
    public function student_with_2_2_marks_gets_lower_second()
    {
        $service = new ClassificationService();
        $this->assertEquals('2:2', $service->calculateOverallClassification(55, 55));
    }

    /** @test */
    public function marks_needed_returns_not_achievable_when_impossible()
    {
        $service = new ClassificationService();
        $result = $service->marksNeededForGrade(10, 20);
        $this->assertEquals('Not achievable', $result['First']);
    }
}