<?php

namespace App\Services;

class ClassificationService
{
    /**
     * Calculate module result from completed assignments
     * $marks = [['score' => 70, 'weighting' => 60, 'max_marks' => 100], ...]
     */
    public function calculateModuleResult(array $marks): float
    {
        if (empty($marks)) return 0.0;

        $totalScore = 0;
        foreach ($marks as $mark) {
            $totalScore += $mark['score'] * ($mark['weighting'] / 100);
        }

        return round($totalScore, 2);
    }

    /**
     * Calculate overall classification using Staffs 70/30 weighting rule
     * Level 6 = 70%, Level 5 = 30%
     */
    public function calculateOverallClassification(float $level5Avg, float $level6Avg): string
    {
        if ($level5Avg === 0.0) {
            $overall = $level6Avg;
        } else {
            $overall = ($level6Avg * 0.70) + ($level5Avg * 0.30);
        }

        return $this->getClassification($overall);
    }

    /**
     * Predict classification based on hypothetical module averages
     */
    public function predictClassification(float $level5Avg, float $level6Avg): string
    {
        return $this->calculateOverallClassification($level5Avg, $level6Avg);
    }

    /**
     * Calculate marks needed in remaining assignments to hit each grade boundary
     */
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
                $needed[$grade] = $required <= 100
                    ? round($required, 2) . '%'
                    : 'Not achievable';
            }
        }

        return $needed;
    }

    /**
     * Private helper — converts percentage to classification string
     * Used by calculateOverallClassification and predictClassification
     */
    private function getClassification(float $average): string
    {
        if ($average >= 70) return 'First';
        if ($average >= 60) return '2:1';
        if ($average >= 50) return '2:2';
        if ($average >= 40) return 'Third';
        return 'Fail';
    }
}