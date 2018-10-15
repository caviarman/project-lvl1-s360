<?php

namespace BrainGames\Games\Even;

use function \cli\line;
use function \cli\prompt;

const ATTEMPTS = 3;

function isEven($num)
{
    return $num % 2 === 0 ? 'yes' : 'no';
}
function run()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no".');
    $name = prompt('May I have your name?');
    $count = 0;
    while ($count < ATTEMPTS) {
        $question = rand(1, 100);
        $answer = prompt("Question: {$question}");
        line("Your answer: {$answer}");
        $rightAnswer = isEven($question);
        if ($answer === $rightAnswer) {
            line('Correct!');
            $count += 1;
        } else {
            line("${$answer} is wrong answer ;(. Correct answer was {$rightAnswer}.");
            line("Let's try again, {$name}");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
