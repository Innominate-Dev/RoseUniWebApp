<?php

namespace App\Interface;

interface ClassificationStrategyInterface
{
    /**
     * Calculate the overall classification
     *
     * @param float $level5Avg
     * @param float $level6Avg
     * @return string
     */
    public function calculate(float $level5Avg, float $level6Avg): string;
}