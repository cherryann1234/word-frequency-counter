<?php

// Function to count the number of words in a string
function wordCount($text) {
    $words = str_word_count($text);
    return $words;
}

// Prompt user for input
echo "Please enter the text for analysis (between 150 and 250 words):\n";

// Read user input
$text = trim(fgets(STDIN));

// Validate input length
$wordCount = wordCount($text);
if ($wordCount < 150 || $wordCount > 250) {
    echo "Error: Input must contain between 150 and 250 words.\n";
    exit();
}

// Perform analysis or further processing here
echo "Input accepted. Analyzing...\n";
// Your analysis or processing code goes here

?>
