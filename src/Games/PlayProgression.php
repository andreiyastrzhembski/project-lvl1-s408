<?php
namespace BrainGames\Games\PlayProgression;

use function BrainGames\GameEngine\runGame;

const DESCRIPTION = 'What number is missing in the progression?';
const MIN_NUMBER = 0;
const MAX_NUMBER = 20;
const MIN_STEP = 1;
const MAX_STEP = 10;
const PROGRESSION_LENGTH = 10;

function playProgression()
{
    $getQuestionAndAnswer = function () {
        $startNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $step = rand(MIN_STEP, MAX_STEP);
        $questionPosition = rand(0, PROGRESSION_LENGTH - 1);

        $progression = [];
        for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
            if ($i === $questionPosition) {
                $progression[] = '..';
            } else {
                $progression[] = $startNumber + ($step * $i);
            }
        }

        $correctAnswer = (string) ($startNumber + ($step * $questionPosition));
        $question = join(' ', $progression);
        
        return [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    };
    runGame(DESCRIPTION, $getQuestionAndAnswer);
}
