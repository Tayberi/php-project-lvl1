<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\run as runEngine;

const DESCRIPTION = 'What number is missing in the progression?';
const LENGTH_OF_PROGRESSION = 10;
const STEP = 2;
const FIRST_NUMBER_OF_PROGRESSION = 1;


function makeProgression($firstNumberGfProgression, $step, $lengthOfProgression): array
{
    $progression = [];
    for ($i = 0; $i < $lengthOfProgression; $i++) {
        $progression[] = $firstNumberGfProgression + $i * $step;
    }
    return $progression;
}

function run(): void
{
    $generateData = function (): array {
        $missingElementIndex = mt_rand(0, LENGTH_OF_PROGRESSION - 1);
        $progression = makeProgression(FIRST_NUMBER_OF_PROGRESSION, STEP, LENGTH_OF_PROGRESSION);

        $correctAnswer = strval($progression[$missingElementIndex]);

        $replacement = array($missingElementIndex => "..");

        $progressionText = array_replace($progression, $replacement);

        $questions = implode(' ', $progressionText);

        return [
            'question' => $questions,
            'answer' => $correctAnswer
        ];
    };
    runEngine($generateData, DESCRIPTION);
}
