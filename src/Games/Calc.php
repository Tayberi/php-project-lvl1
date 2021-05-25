<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\run as runEngine;

const DESCRIPTION = 'What is the result of the expression?';

function run(): void
{
    $generateData = function (): array {
        $numberFirst = rand(1, 100);
        $numberSecond = rand(1, 100);

        switch (rand(1, 3)) {
            case 1:
                $operator = '+';
                $correctAnswer = $numberFirst + $numberSecond;
                break;
            case 2:
                $operator = '-';
                $correctAnswer = $numberFirst - $numberSecond;
                break;
            case 3:
                $operator = '*';
                $correctAnswer = $numberFirst * $numberSecond;
                break;
        }

        $numberFirstStr = strval($numberFirst);
        $numberSecondStr = strval($numberSecond);
        $correctAnswerStr = strval($correctAnswer);

        return [
            'question' => $numberFirstStr . $operator . $numberSecondStr,
            'answer' => $correctAnswerStr
        ];
    };

    runEngine($generateData, DESCRIPTION);
}
