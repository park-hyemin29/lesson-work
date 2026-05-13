<?php

$scores = [72, 88, 95, 64, 81];

function sumScores(array $scores): int
{
    $scores_sum = 0;

    foreach ($scores as $score) {
        $scores_sum += $score;
    }

    return $scores_sum;
}

function average(array $scores): float
{
    return sumScores($scores) / count($scores);
}

function maxScore(array $scores): int
{
    $max_score = $scores[0];

    foreach ($scores as $score) {
        if ($score > $max_score) {
            $max_score = $score;
        }
    }

    return $max_score;
}

function report(array $scores): string
{
    $scores_sum = sumScores($scores);
    $scores_avg = average($scores);
    $scores_max = maxScore($scores);

    return "sum: {$scores_sum}, avg: {$scores_avg}, max: {$scores_max}";
}

echo report($scores);

/*
class ScoreReport
{
    public array $scores;
    public int $sum;
    public float $avg;
    public int $max;

    public function __construct(array $scores)
    {
        $this->scores = $scores;
        $this->sum = $this->calcSum($scores);
        $this->avg = $this->sum / count($scores);
        $this->max = $this->calcMax($scores);
    }

    private function calcSum(array $scores): int
    {
        $total = 0;

        foreach ($scores as $score) {
            $total += $score;
        }

        return $total;
    }

    private function calcMax(array $scores): int
    {
        $max = $scores[0];

        foreach ($scores as $score) {
            if ($score > $max) {
                $max = $score;
            }
        }
            
        return $max;
    }
    
    public function report(): string
    {
        return "sum: {$this->sum}, avg: {$this->avg}, max: {$this->max}";
    }
}
*/