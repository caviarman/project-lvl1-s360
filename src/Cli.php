<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const ATTEMPTS = 3;

function run($game, $description)
{
    line('Welcome to the Brain Game!');
    line("{$description}");
    $name = prompt('May I have your name?');
    for ($i = 0; $i < ATTEMPTS; $i += 1) {
        ['question' => $question, 'answer' => $rightAnswer] = $game();
        $userAnswer = prompt("Question: {$question}");
        line("Your answer: {$userAnswer}");
        if ($userAnswer === $rightAnswer) {
            line('Correct!');
        } else {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$rightAnswer}.");
            line("Let's try again, {$name}");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
