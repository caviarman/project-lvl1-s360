<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Cli\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function getData()
{
    $question = rand(2, 100);
    $answer = isPrime($question) ? 'yes' : 'no';
    return [
        'question' => $question,
        'answer' => $answer
    ];
}

function game()
{
    $primeGame = function () {
        return getData();
    };
    return run($primeGame, DESCRIPTION);
}
