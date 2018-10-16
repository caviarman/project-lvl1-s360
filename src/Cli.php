<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const ATTEMPTS = 3;

function run($game)
{
    line('Welcome to the Brain Game!');
    $data = $game();
    $description = $data['description'];
    print_r("{$description}\n");
    $name = prompt('May I have your name?');
    $count = 0;
    while ($count < ATTEMPTS) {
        $gameData = $game();
        $question = $gameData['question'];
        $rightAnswer = $gameData['answer'];
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
