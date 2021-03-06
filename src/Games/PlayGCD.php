<?php
namespace BrainGames\Games\PlayGCD;

use function BrainGames\GameEngine\runGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN_NUMBER = 0;
const MAX_NUMBER = 99;

function getGCD(int $num1, int $num2): int
{
    while ($num2 != 0) {
        $mod = $num1 % $num2;
        $num1 = $num2;
        $num2 = $mod;
    }
    return abs($num1);
}

function playGCD()
{
    $getQuestionAndAnswer = function () {
        $num1 = rand(MIN_NUMBER, MAX_NUMBER);
        $num2 = rand(MIN_NUMBER, MAX_NUMBER);
        $question = "{$num1} {$num2}";
        $correctAnswer = (string) getGCD($num1, $num2);
    
        return [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    };
    runGame(DESCRIPTION, $getQuestionAndAnswer);
}
