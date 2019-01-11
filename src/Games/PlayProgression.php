<?php
namespace BrainGames\Games\PlayProgression;

use function BrainGames\GameEngine\runGame;

const GAME_RULES = 'What number is missing in the progression?';
const MIN_NUMBER = 0;
const MAX_NUMBER = 9;

function playProgression()
{
    $getQuestionAndAnswer = function () {
        $startNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $step = rand(MIN_NUMBER, MAX_NUMBER);
        $missingPosition = rand(MIN_NUMBER, MAX_NUMBER);

        $progression = [$startNumber];
        for ($i = 1; $i <= MAX_NUMBER; $i++) {
            $progression[] = $progression[$i - 1] + $step;
        }

        $question = '';
        foreach ($progression as $key => $num) {
            if ($key === $missingPosition) {
                $question .= '.. ';
            } else {
                $question .= "{$num} ";
            }
        }

        $correctAnswer = (string) $progression[$missingPosition];

        return [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    };
    runGame(GAME_RULES, $getQuestionAndAnswer);
}
