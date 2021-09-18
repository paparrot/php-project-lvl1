<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\startGame;

function start(): void
{
    $title = "What is the result of the expression?";

    $questions = [];
    $rightAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $first = rand(1, 99);
        $second = rand(1, 99);
        $operators = ['+', '-', '*'];
        $j = rand(0, 2);
        $currentOperator = $operators[$j];
        $questions[$i] = "{$first} {$currentOperator} {$second}";
        switch ($currentOperator) {
            case "+":
                $rightAnswers[$i] = $first + $second;
                break;
            case "-":
                $rightAnswers[$i] = $first - $second;
                break;
            case "*":
                $rightAnswers[$i] = $first * $second;
                break;
        }
    }

    startGame($title, $questions, $rightAnswers);
}
