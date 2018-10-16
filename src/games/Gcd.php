<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Cli\run;

function gcd($firstNum, $secondNum)
{
    if ($secondNum === 0) {
        return $firstNum;
    }
    return gcd($secondNum, $firstNum % $secondNum);
}

function getData()
{
    $firstNum = rand(1, 100);
    $secondNum = rand(1, 100);
    $question = ("{$firstNum} {$secondNum}");
    $answer = gcd($firstNum, $secondNum);
    return [
       'question' => $question,
        'answer' => (string)$answer
    ];
}
function game()
{
    return run(function () {
        return getData();
    }, 'Find the greatest common divisor of given numbers.');
}
