<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\run;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function isEven($num)
{
    return $num % 2 === 0;
}

function getData()
{
    $question = rand(1, 100);
    $answer = isEven($question) ? 'yes' : 'no';
    return [
        'question' => $question,
        'answer' => $answer,
    ];
}

function game()
{
    $evenGame = function () {
        return getData();
    };
    return run($evenGame, DESCRIPTION);
}
