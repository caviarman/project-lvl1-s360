<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const ATTEMPTS = 3;

function run($game, $description)
{
    line('Welcome to the Brain Game!');
    print_r("{$description}\n");
    $name = prompt('May I have your name?');
    $count = 0;
    while ($count < ATTEMPTS) {
        $result = $game();
        $question = $result['question'];
        $rightAnswer = $result['answer'];
        $userAnswer = prompt("Question: {$question}");
        line("Your answer: {$userAnswer}");
        
        if ($userAnswer === $rightAnswer) {
            line('Correct!');
            $count += 1;
        } else {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$rightAnswer}.");
            line("Let's try again, {$name}");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
