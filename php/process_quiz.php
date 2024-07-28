<?php
// Your quiz questions and answers can be defined here or retrieved from a database

// For simplicity, we'll use a sample set of questions
$questions = array(
    "What is the capital of France?",
    "What is 2 + 2?",
    // Add more questions here...
);

$answers = array(
    "Paris",
    "4",
    // Add more answers here...
);

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;

    foreach ($answers as $key => $answer) {
        if (isset($_POST['q' . $key]) && $_POST['q' . $key] === $answer) {
            $score++;
        }
    }

    // You can save the score in a database or show it on the page
    echo "Your score: " . $score;
}
?>
