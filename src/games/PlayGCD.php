<?php
namespace BrainGames\Games\PlayGCD;

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
    $MIN_NUMBER = 0;
    $MAX_NUMBER = 99;
    
    return function () use ($MIN_NUMBER, $MAX_NUMBER) {
        $num1 = rand($MIN_NUMBER, $MAX_NUMBER);
        $num2 = rand($MIN_NUMBER, $MAX_NUMBER);
        $question = "{$num1} {$num2}";
        $correctAnswer = (string) getGCD($num1, $num2);

        return [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    };
}
