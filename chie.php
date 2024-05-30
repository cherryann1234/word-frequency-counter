<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Word Frequency Checker</title>

</head>

<body>

    <h2>Word Frequency Checker</h2>

    <p>Type a sentence below:</p>

    <form action="" method="post">

        <textarea name="sentence" rows="4" cols="50"></textarea><br>

        <input type="submit" value="Check">

    </form>



    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Get the input sentence from the form

        $inputSentence = $_POST["sentence"];



        // Check if the input sentence is provided

        if (empty($inputSentence)) {

            echo "Please enter a sentence.";

        } else {

            // Run the word checker function

            wordChecker($inputSentence);

        }

    }



    function wordChecker($input) {

        // Count words in the input

        $wordCount = str_word_count($input);

        

        // Check if the word count is within the specified range

        if ($wordCount < 150 || $wordCount > 250) {

            echo "The text must contain between 150 and 250 words. Your text has $wordCount words.<br>";

            return;

        }

        

        // Preprocess the input text

        // Remove punctuation and special characters, convert to lowercase

        $processedText = strtolower(preg_replace('/[^\w\s]/', '', $input));

        

        // Remove extra whitespace

        $processedText = preg_replace('/\s+/', ' ', $processedText);

        

        // Split the text into words

        $words = explode(' ', $processedText);

        

        // Count the occurrences of each word

        $wordOccurrences = array_count_values($words);

        

        // Sort the words by the number of occurrences in descending order

        arsort($wordOccurrences);

        

        // Display the words with their occurrences

        echo "<h3>Word occurrences:</h3>";

        foreach ($wordOccurrences as $word => $count) {

            echo "$word: $count<br>";

        }

    }

    ?>

</body>

</html>
