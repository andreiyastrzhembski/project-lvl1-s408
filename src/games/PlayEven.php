<?php
namespace BrainGames\Games\PlayEven;

use function BrainGames\GameEngine\runGame;

const GAME_RULES = 'Answer "yes" if number even otherwise answer "no".';
const MIN_NUMBER = 0;
const MAX_NUMBER = 99;

function isEven(int $num): bool
{
    return $num  % 2 === 0;
}

function playEven()
{
    runGame(GAME_RULES, function () {
        $question = rand(MIN_NUMBER, MAX_NUMBER);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    });
}
