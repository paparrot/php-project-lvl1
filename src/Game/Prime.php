<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\startGame;

function primeCheck(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function start(): void
{
    $title = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $questions = [];
    $rightAnswers = [];
    for ($i = 0; $i < 3; $i++) {
        $currentNumber = rand(1, 99);
        $questions[$i] = $currentNumber;
        $rightAnswers[$i] = primeCheck($currentNumber) ? "yes" : "no";
    }
    startGame($title, $questions, $rightAnswers);
}
