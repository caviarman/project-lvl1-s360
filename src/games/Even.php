<?php

namespace BrainGames\Games\Even;

function isEven($num)
{
    return $num % 2 === 0 ? 'yes' : 'no';
}
function game()
{
        $question = rand(1, 100);
        $answer = isEven($question);
        return [
            'question' => $question,
            'answer' => $answer,
            'description' => 'Answer "yes" if number even otherwise answer "no".'
        ];
}
