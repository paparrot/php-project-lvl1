<?php

namespace Brain\Games\GCD;

use function Brain\Games\Engine\startGame;

function gcd(int $a, int $b): int
{
    while ($a != $b) {
        $a > $b ? $a -= $b : $b -= $a;
    }
    return $a;
}

function start(): void
{
    $title = "Find the greatest common divisor of given numbers.";
    $questions = [];
    $rightAnswers = [];
    for ($i = 0; $i < 3; $i++) {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $questions[$i] = "{$firstNumber} {$secondNumber}";
        $rightAnswers[$i] = gcd($firstNumber, $secondNumber);
    }
    startGame($title, $questions, $rightAnswers);
}
