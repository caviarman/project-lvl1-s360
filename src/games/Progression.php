<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\run;

const DESCRIPTION = 'What number is missing in this progression?';
const SIZE = 10;

function getData()
{
    $hiddenElementPosition = rand(0, SIZE - 1);
    $start = rand(1, 100);
    $step = rand(1, 100);
    $arr = [];
    for ($i = 0; $i < SIZE; $i += 1) {
        $arr[$i] = $start + ($step * $i);
    }
    $answer = $arr[$hiddenElementPosition];
    $arr[$hiddenElementPosition] = '..';
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
