<?php

namespace App\Helper;

class Helpers
{
    public static function generateRandomCode($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Include letters and numbers
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1); // Get a random index
            $code .= $characters[$randomIndex]; // Append the character at the random index
        }

        return $code;
    }
}

// Example usage
//echo \App\Helper\Helpers::generateRandomCode(); // Output the generated 6-character code
