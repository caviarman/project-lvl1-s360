<?php

namespace BrainGames\Games\Calc;

const OPERATORS = ['+', '-', '*'];
function game()
{
        $index = rand(0, 2);
        $firstNum = rand(1, 100);
        $secondNum = rand(1, 100);
        switch(OPERATORS[$index]) {
            case '+':
                $question = ("{$firstNum} + {$secondNum}");
                $answer = $firstNum + $secondNum;
                break;
            case '-':
                $question = ("{$firstNum} - {$secondNum}");
                $answer = $firstNum - $secondNum;
                break;
            case '*':
                $question = ("{$firstNum} * {$secondNum}");
                $answer = $firstNum * $secondNum;
                break;
            default:
                break;     
        }
        return ['question' => $question, 'answer' => (string)$answer]; 
}
