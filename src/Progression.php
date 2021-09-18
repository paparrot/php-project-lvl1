<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\startGame;

function start()
{
    $title = "What number is missing in the progression?";
    $questions = [];
    $righgtAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $empty = rand(1, 9);
        $progressionStart = rand(1, 99);
        $progressionStep = rand(1, 10);
        $progression = "{$progressionStart}";
        $progressionCurrent = $progressionStart;
        for ($j = 1; $j < 10; $j += 1) {
            $progressionCurrent += $progressionStep;
            if ($j == $empty) {
                $righgtAnswers[] += $progressionCurrent;
                $progression .= " ..";
            } else {
                $progression .= " {$progressionCurrent}";
            }
        }
        $questions[$i] = $progression;
    }
    startGame($title, $questions, $righgtAnswers);
}
