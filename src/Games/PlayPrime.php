<?php
namespace BrainGames\Games\PlayPrime;

use function BrainGames\GameEngine\runGame;

const GAME_RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_NUMBER = 0;
const MAX_NUMBER = 99;

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function playPrime()
{
    $getQuestionAndAnswer = function () {
        $question = rand(MIN_NUMBER, MAX_NUMBER);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    };
    runGame(GAME_RULES, $getQuestionAndAnswer);
}
