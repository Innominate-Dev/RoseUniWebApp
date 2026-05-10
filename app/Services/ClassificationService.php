<?php

namespace App\Services;

use App\Interface\ClassificationStrategyInterface;
use App\Interface\UKClassificationStrategy;

class ClassificationService
{
    protected ClassificationStrategyInterface $strategy;

    public function __construct(?ClassificationStrategyInterface $strategy = null)
    {
        $this->strategy = $strategy ?? new UKClassificationStrategy();
    }

    public function calculateModuleResult(array $marks): float
    {
        if (empty($marks)) return 0.0;

        $totalScore = 0;
        foreach ($marks as $mark) {
            $totalScore += $mark['score'] * ($mark['weighting'] / 100);
        }

        return round($totalScore, 2);
    }

    public function calculateOverallClassification(float $level5Avg, float $level6Avg): string
    {
        return $this->strategy->calculate($level5Avg, $level6Avg);
    }

    public function predictClassification(float $level5Avg, float $level6Avg): string
    {
        return $this->strategy->calculate($level5Avg, $level6Avg);
    }

    public function marksNeededForGrade(float $currentWeightedScore, float $remainingWeight): array
    {
        $grades = [
            'First' => 70,
            '2:1'   => 60,
            '2:2'   => 50,
            'Third' => 40,
        ];

        $needed = [];
        foreach ($grades as $grade => $threshold) {
            if ($remainingWeight <= 0) {
                $needed[$grade] = 'Completed';
            } else {
                $required = ($threshold - $currentWeightedScore) / ($remainingWeight / 100);
                if ($required <= 0) {
                    $needed[$grade] = 'Already achieved';
                } elseif ($required > 100) {
                    $needed[$grade] = 'Not achievable';
                } else {
                    // Convert percentage needed to marks out of 100
                    $needed[$grade] = round($required) . '/100';
                }
            }
        }

        return $needed;
    }
}