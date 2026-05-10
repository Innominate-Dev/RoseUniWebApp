<?php

namespace App\Interface;

use App\Interface\ClassificationStrategyInterface;

class UKClassificationStrategy implements ClassificationStrategyInterface
{
    public function calculate(float $level5Avg, float $level6Avg): string
    {
        if ($level5Avg === 0.0) {
            $overall = $level6Avg;
        } else {
            $overall = ($level6Avg * 0.70) + ($level5Avg * 0.30);
        }

        return match(true) {
            $overall >= 70 => 'First',
            $overall >= 60 => '2:1',
            $overall >= 50 => '2:2',
            $overall >= 40 => 'Third',
            default        => 'Fail',
        };
    }
}