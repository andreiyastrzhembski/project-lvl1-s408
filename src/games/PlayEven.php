<?php
namespace BrainGames\Games\PlayEven;

use function \cli\line;
use function \cli\prompt;

function isEven(int $num): bool
{
    return $num  % 2 === 0;
}

function playEven()
{
    $MIN_NUMBER = 0;
    $MAX_NUMBER = 99;
    
    return function () use ($MIN_NUMBER, $MAX_NUMBER) {
        $question = rand($MIN_NUMBER, $MAX_NUMBER);
        $correctAnswer = isEven($question) ? 'yes' : 'no';

        return [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    };
}
