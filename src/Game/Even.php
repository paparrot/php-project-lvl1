<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\startGame;

function start(): void
{
    $title = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $questions = [];
    $rightAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $questions[$i] = rand(1, 99);
        $rightAnswers[] = $questions[$i] % 2 == 0 ? 'yes' : 'no';
    }

    startGame($title, $questions, $rightAnswers);
}
