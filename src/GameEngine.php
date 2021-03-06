<?php
namespace BrainGames\GameEngine;

use function \cli\line;
use function \cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function runGame($description, $getQuestionAndAnswer)
{
    line('Welcome to the Brain Games!');
    line($description . "\n");
    $name = prompt('May I have your name?');
    line("Hello, {$name}!\n");

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $questionAndAnswer = $getQuestionAndAnswer();
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $questionAndAnswer;

        line("Question: {$question}");
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!\n");
            return;
        }
    }

    line("Congratulations, {$name}!\n");
}
