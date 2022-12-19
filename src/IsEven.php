<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function playIsEven(): void
{
    $name = welcome();
    var_dump($name);
    $tries = 0;
    while ($tries < 3) {
        $tries++;
        if (!isEven($name)) {
            break;
        }
    }
}

function isEven(string $name): bool
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $number = rand(0, 25);
    line("Question: %s", $number);
    $answer = prompt('Your answer: ');

    $isCorrect = false;
    switch ($answer) {
        case 'yes':
            if ($number % 2 === 0) {
                $isCorrect = true;
                line('Correct!');
            } else {
                line("'yes' is wrong answer ;(. Correct answer was 'no'. Let's try again, $name!");
            }
            break;
        case 'no':
            if ($number % 2 !== 0) {
                $isCorrect = true;
                line('Correct!');
            } else {
                line("'no' is wrong answer ;(. Correct answer was 'yes'. Let's try again, $name!");
            }
            break;
        default:
            line($answer . " is wrong answer ;(. Correct answer was 'yes'. Let's try again, $name!");
            break;
    }
    return $isCorrect;
}
