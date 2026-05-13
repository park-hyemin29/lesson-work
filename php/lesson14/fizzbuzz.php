<?php

class FizzBuzz{
    public function fizzBuzz(int $num): string
    {
        if ($num % 15 === 0) {
            return "FizzBuzz";
        }
        else if ($num % 5 === 0) {
            return "Buzz";
        }
        else if ($num % 3 === 0) {
            return "Fizz";
        }
        else {
            return (string)$num;
        }
    }
}

$fizzBuzz = new FizzBuzz();
echo $fizzBuzz->fizzBuzz(2);