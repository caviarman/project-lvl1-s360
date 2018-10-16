<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\run;

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
            'description' => 'Answer "yes" if number even otherwise answer "no".'
        ];
}


function game()
{
    return run(function () {
        return getData();
    });
}
