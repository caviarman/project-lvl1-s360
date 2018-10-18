<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Cli\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    $iter = function ($acc) use ($num, & $iter) {
        if ($acc > $num / 2) {
            return true;
        }
        if ($num % $acc === 0) {
            return false;
        }
        return $iter($acc + 1);
    };
    return $iter(2);
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
