<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function welcome(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    return $name;
}

function greeting(string $title): string
{
    $name = welcome();
    line($title);
    return $name;
}

function printQuestion(string $question): void
{
    line("Question: {$question}");
}

function promptAnswer(): string
{
    return prompt("Your answer");
}

function checkAnswer(string $answer, string $rightAnswer): bool
{
    return strtolower($answer) == $rightAnswer;
}

function printCorrectMessage(): void
{
    line("Correct!");
}

function printWrongMessage(string $answer, string $rightAnswer, string $name): void
{
    line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
    line("Let's try again, {$name}!");
}

function printCongratulationsMessage(string $name): void
{
    line("Congratulations, {$name}!");
}

function startGame(string $title, array $questions, array $rightAnswers): void
{
    $START_SCORES = 0;
    $RIGHT_SCORE = 1;
    $WIN_SCORES = 3;
    $name = greeting($title);
    $scores = $START_SCORES;
    while ($scores < $WIN_SCORES) {
        printQuestion($questions[$scores]);
        $answer = promptAnswer();
        $rightAnswer = $rightAnswers[$scores];
        if (checkAnswer($answer, $rightAnswer)) {
            printCorrectMessage();
            $scores += $RIGHT_SCORE;
        } else {
            printWrongMessage($answer, $rightAnswer, $name);
            break;
        }
    }
    if ($scores == $WIN_SCORES) {
        printCongratulationsMessage($name);
    }
}
