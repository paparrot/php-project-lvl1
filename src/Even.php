<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\welcome;

function start()
{

    $name = welcome();
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    $scores = 0;
    while ($scores < 3) {
        $randomInt = rand(1, 99);
        $isEven = $randomInt % 2 == 0;
        line("Question: {$randomInt}");
        $answer = prompt("Your answer");
        $rightAnswer = $isEven ? 'yes' : 'no';
        $isCorrect = strtolower($answer) == $rightAnswer;

        if (!$isCorrect) {
            line("'{$answer}' is wrong answer ;(. Correct answer was {$rightAnswer}.");
            line("Let's try again, {$name}!");
            break;
        } else {
            line("Correct!");
            $scores += 1;
        }
    }

    if ($scores == 3) {
        line("Congratulations, {$name}");
    }
}
