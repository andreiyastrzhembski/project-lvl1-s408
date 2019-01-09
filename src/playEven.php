<?php
namespace BrainGames\playEven;

use function \cli\line;
use function \cli\prompt;

function playEven()
{
    $numberOfRounds = 3;
    $minNumber = 0;
    $maxNumber = 99;
    
    line('Welcome to the Brain Games!');
    line('Answer "yes" if number even otherwise answer "no".' . "\n");
    $name = prompt('May I have your name?');
    line("Hello, {$name}!\n");

    for ($i = 0; $i < $numberOfRounds; $i++) {
        $question = rand($minNumber, $maxNumber);
        $correctAnswer = $question % 2 === 0 ? 'yes' : 'no';
        line("Question: {$question}");
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            line("\"{$answer}\" is wrong answer ;(. Correct answer was \"{$correctAnswer}\".");
            line("Let's try again, {$name}!\n");
            return;
        }
    }
    line("Congratulations, {$name}!\n");
}
