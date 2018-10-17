<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\run;

const DESCRIPTION = 'What number is missing in this progression?';
const SIZE = 10;

function getData()
{
    $index = rand(0, 9);
    $start = rand(1, 100);
    $step = rand(1, 100);
    $arr = [];
    for ($i = 0; $i < SIZE; $i += 1) {
        $arr[$i] = $start + ($step * $i);
        $start += $step;
    }
    $answer = $arr[$index];
    $arr[$index] = '..';
    $question = implode(' ', $arr);
    
    return [
        'question' => $question,
        'answer' => (string)$answer
    ];
}

function game()
{
    $progressionGame = function () {
        return getData();
    };
    return run($progressionGame, DESCRIPTION);
}
