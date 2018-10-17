<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Cli\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function iter($acc, $n)
{
    if ($acc > $n / 2) {
        return true;
    }
    if ($n % $acc === 0) {
        return false;
    }
    return iter($acc + 1, $n);
}

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    return iter(2, $num);
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
