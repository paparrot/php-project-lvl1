<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function welcome()
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

function getQuestion($question)
{
    line("Question: {$question}");
}

function setAnswer()
{
    return prompt("Your answer");
}

function checkAnswer(string $answer, string $rightAnswer)
{
    return strtolower($answer) == $rightAnswer;
}

function getCorrectMessage()
{
    line("Correct!");
}

function getWrongMessage(string $answer, string $rightAnswer, string $name)
{
    line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
    line("Let's try again, {$name}!");
}

function getCongratulationsMessage(string $name)
{
    line("Congratulations, {$name}!");
}

function startGame(string $title, array $questions, array $rightAnswers)
{
    $START_SCORES = 0;
    $RIGHT_SCORE = 1;
    $WIN_SCORES = 3;
    $name = greeting($title);
    $scores = $START_SCORES;
    while ($scores < $WIN_SCORES) {
        getQuestion($questions[$scores]);
        $answer = setAnswer();
        $rightAnswer = $rightAnswers[$scores];
        if (checkAnswer($answer, $rightAnswer)) {
            getCorrectMessage();
            $scores += $RIGHT_SCORE;
        } else {
            getWrongMessage($answer, $rightAnswer, $name);
            break;
        }
    }
    if ($scores == $WIN_SCORES) {
        getCongratulationsMessage($name);
    }
}
