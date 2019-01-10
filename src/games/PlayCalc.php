<?php
namespace BrainGames\Games\PlayCalc;

function getOperationAndResult($num1, $num2)
{
    $operation = rand(1, 3);
    $result = null;
    switch ($operation) {
        case 1:
            $operation = '+';
            $result = $num1 + $num2;
            break;
        case 2:
            $operation = '-';
            $result = $num1 - $num2;
            break;
        case 3:
            $operation = '*';
            $result = $num1 * $num2;
            break;
    }
    return [
        'operation' => $operation,
        'result' => $result
    ];
}

function playCalc()
{
    $MIN_NUMBER = 0;
    $MAX_NUMBER = 99;
    
    return function () use ($MIN_NUMBER, $MAX_NUMBER) {
        $num1 = rand($MIN_NUMBER, $MAX_NUMBER);
        $num2 = rand($MIN_NUMBER, $MAX_NUMBER);
        $operationAndResult = getOperationAndResult($num1, $num2);
        $operation = $operationAndResult['operation'];

        $question = "{$num1} {$operation} {$num2}";
        $correctAnswer = (string) $operationAndResult['result'];

        return [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    };
}
