<?php

namespace BrainGames\Games\Balance;

use function BrainGames\Cli\run;

const DESCRIPTION = 'Balance the given number.';

function getArrFromNum($num)
{
    return str_split((string)$num);
}

function getBalancedNum($num)
{
    $arr = getArrFromNum($num);
    $size = count($arr);
    $points = array_reduce($arr, function ($acc, $item) {
        return $acc + (int)$item;
    }, 0);
    $baseNum = (int)($points / $size);
    $restNum = $points % $size;
    $balancedArr = array_map(function ($item) use ($baseNum) {
        return (int)$item - (int)$item + $baseNum;
    }, $arr);
    if ($restNum > 0) {
        for ($i = 0; $i < $size; $i += 1) {
            $balancedArr[$i] += 1;
            $restNum -= 1;
            if ($restNum === 0) {
                break;
            }
        }
    }
    return implode('', array_reverse($balancedArr));
}

function getData()
{
    $question = rand(100, 1000);
    $answer = getBalancedNum($question);
    return [
        'question' => $question,
        'answer' => $answer,
    ];
}

function game()
{
    $balanceGame = function () {
        return getData();
    };
    return run($balanceGame, DESCRIPTION);
}
