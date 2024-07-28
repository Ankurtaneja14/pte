<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Galaxy Carrer | PTE</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://unpkg.com/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/side.js"></script>
  <style>
    .heading {
      background-color: #3841E6;
      font-size: 3rem;
      padding: 40px;
      border-radius: 40px;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      background-color: #8488e0;
      width: 80%;
      border-radius: 40px;
      padding: 30px;
      margin: auto;
      margin-top: 10px;
    }
    #audio{
      display: block;
      width: 100%;
      margin: 10px;
    }
    .container h3 {
      font-size: 2rem;
      color: white;
      background-color: #0610d4;
      width: fit-content;
      margin: auto;
      padding: 20px;
      margin-top: 10px;
      border-radius: 20px;
    }

    #question-container {
      background-color: rgb(212, 211, 211);
      width: 90%;
      height: fit-content;
      padding: 20px;
      margin: auto;
      margin-top: 10px;
      border-radius: 20px;
      font-size: 25px;
    }
    .container button{
      font-size: 20px;
      padding: 10px 17px;
      background-color: #0a0b22;
      margin: 10px;
      color: white;
      border-radius: 22px;
      cursor: pointer;
    }
    .container button:hover{
      background-color: #0c1397;
    }
    .container button:disabled{
      opacity: .5;
      cursor: default;
    }
    .container button:disabled:hover{
      background-color: #0a0b22;
    }
    .buttons{
      display: flex;
      width: fit-content;
      margin: auto;
      align-items: center;
      justify-content: center;
    }
    #audioPlayer{
      display: block;
      width: 100%;
      margin: 10px;
    }
    nav{
      height: 100%;
      position: fixed;
    }
    #results{
      background-color: #3841E6;
      border: 2px solid rgb(0, 0, 0);
      border-radius: 25px;
      color: wheat;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin: 15px;
    }
    #results {
      font-size: 28px;

    }
    .test{
  margin: auto;
  width: fit-content;
}
#testIndex{
  padding: 5px;
  border-radius: 15px;
  box-shadow : 0px;
}
    .Instructions{
      background-color: rgb(212, 211, 211);
      margin: 10px;
      padding: 25px;
      border-radius: 22px;
      font-size: 20px;
    }
  </style>
</head>
<body>
  <aside>
  <nav>
    <div class="sidebar-top">
      <a href="dashboard.php" class="logo__wrapper">
        <img src="assets/logo.svg" alt="Logo" class="logo">
        <h1 class="hide">PTE Practice</h1>
      </a>
      <div class="expand-btn">
        <img src="assets/chevron.svg" alt="Chevron">
      </div>
    </div>
    <div class="sidebar-links">
      <ul>
        <li>
          <a href="dashboard.php" title="Dashboard" class="tooltip">
            <img src="assets/dashboard.svg" alt="Dashboard">
            <span class="link hide">Dashboard</span>
            <span class="tooltip__content">Dashboard</span>
          </a>
        </li>
        <li>
          <div class="dropdown">
            <a href="practice_test.php" title="PTE Practice" class="tooltip">
              <img src="assets/analytics.svg" alt="Analytics">
              <span class="link hide">PTE Practice</span>
              <span class="tooltip__content">PTE Practice</span>
            </a>
            <div class="dropdown-content">
              <a href="practice_test.php #speaking">Speaking</a>
              <a href="practice_test.php #reading">Reading</a>
              <a href="practice_test.php #listening">Listening</a>
              <a href="practice_test.php #writing">Writing</a>
            </div>
          </div>
        </li>

        <li>
          <a href="#performance" title="Performance" class="tooltip">
            <img src="assets/performance.svg" alt="Performance">
            <span class="link hide">Performance</span>
            <span class="tooltip__content">Performance</span>
          </a>
        </li>
        <li>
          <a href="#funds" title="Funds" class="tooltip">
            <img src="assets/funds.svg" alt="Funds">
            <span class="link hide">Funds</span>
            <span class="tooltip__content">Funds</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidebar-bottom">
      <div class="sidebar-links">
        <ul>
          <li>
            <a href="#help" title="Help" class="tooltip">
              <img src="assets/help.svg" alt="Help">
              <span class="link hide">Help</span>
              <span class="tooltip__content">Help</span>
            </a>
          </li>
          <li>
            <a href="#settings" title="Settings" class="tooltip">
              <img src="assets/settings.svg" alt="Settings">
              <span class="link hide">Settings</span>
              <span class="tooltip__content">Settings</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="sidebar__profile">
        <div class="user-dropdown" id="avatar">
            <img class="avatar" src="assets/avatar.svg" alt="Profile">
            <div class="online__status"></div>
        </div>
        <div class="user-dropdown">
            <span class="dropdown-btn hide" id="username"><?php echo $_SESSION['user_name']; ?></span>
            <div class="user-dropdown-content" id="dropdown">
                <a href="#profile" class="user-dropdown-menu">Profile</a>
                <a href="logout.php" class="user-dropdown-menu" onmou>Logout</a>
            </div>
        </div>
    </div>
  </nav>
</aside>
<main>
      <h1 class="heading">Fill in the Blanks</h1>
      <div class="container">
        <div class = "Instructions">
          <h1>Instructions:</h1>
          <ol>
          <li>There are some words missing in the following text. Please select the correct word in the drop-down box.</li>
          </ol>
        </div>
        <h3>Test <span id = "index">1</span></h3>
        <audio controls id="audio">
        <source src="audioFill/audio1.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
      </audio>
        <div id="question-container">
          <!-- Questions will be loaded here dynamically -->
        </div>
        <div id="aiScore" style="display: none;">
          <h3>AI Score</h3>
          <div id="results">

          </div>
        </div>
          <div class="buttons">

          <button id="prev-button" onclick="showPrevious()">Previous</button>
          <button id="submit-button" onclick="checkAnswer()">Submit Answer</button>
          <button id="next-button" onclick="showNext()">Next</button>
        </div>
        <div class="test">  
          <input type="number" id="testIndex" min="1">
          <button id="goToTestButton">Go to Test</button>
        </div>
      </div>
      <script>
        const testIndex = document.getElementById("index");
const result = document.getElementById("results");
const audio = document.getElementById("audio");
const Score = document.getElementById("aiScore");
const testIndexInput = document.getElementById("testIndex");
    const goToTestButton = document.getElementById("goToTestButton");

let currentQuestionIndex = 0; // Track the current question index

const questions = [
    {
        text: "The Internet has revolutionized the way we ________ information and communicate. It has connected people from ________ corners of the globe, making the world a smaller and more interconnected place. It has connected people from ________ corners of the globe, making the world a smaller and more interconnected place.",
        answers: ["gather", "various", "connected"],
    },
    {
        text: "However, with this convenience comes the need for ________ precautions. Cybersecurity is a critical aspect of our digital lives. It involves protecting our ________ and personal data from unauthorized access, theft, and malicious activities.",
        answers: ["essential", "privacy"],
    },
    {
        text: "However, with this convenience comes the need for ________ precautions. Digital lives. It involves protecting our ________ and personal data from unauthorized access, theft, and malicious activities.",
        answers: ["essential", "privacy"],
    }
];

// Function to load and display the current question
function loadQuestion(index) {
    const question = questions[index];
    const questionContainer = document.getElementById('question-container');
    const text = question.text;

    questionContainer.innerHTML = ''; // Clear the container

    const parts = text.split('________');

    // Create a fragment to hold the elements
    const fragment = document.createDocumentFragment();

    // Loop through the parts and add the text and input elements
    for (let i = 0; i < parts.length - 1; i++) {
        fragment.appendChild(document.createTextNode(parts[i]));

        // Create an input element for each blank
        const input = document.createElement('input');
        input.type = 'text';
        input.placeholder = 'Enter your answer';
        input.id = `blank-${i}`; // Assign a unique ID to each input
        fragment.appendChild(input);
    }

    // Append the last text part (after the last blank)
    fragment.appendChild(document.createTextNode(parts[parts.length - 1]));

    questionContainer.appendChild(fragment);
}

// Load the initial question
loadQuestion(0);

function updateQuestion(currentQuestionIndex) {
    audio.src = `audioFill/audio${currentQuestionIndex + 1}.mp3`;
    result.innerHTML = ''; // Clear feedback
    Score.style.display = "none";
    index.innerText = currentQuestionIndex + 1;
}

// Function to show the next question
function showNext() {
    currentQuestionIndex++;
    if (currentQuestionIndex >= questions.length) {
        currentQuestionIndex = 0; // Loop back to the first question
    }
    loadQuestion(currentQuestionIndex);
    result.innerText = "";
    Score.style.display = "none";
    testIndex.innerText = currentQuestionIndex + 1;
    updateQuestion(currentQuestionIndex);
}

// Function to show the previous question
function showPrevious() {
    currentQuestionIndex--;
    if (currentQuestionIndex < 0) {
        currentQuestionIndex = questions.length - 1; // Loop to the last question
    }
    loadQuestion(currentQuestionIndex);
    testIndex.innerText = currentQuestionIndex + 1;
    result.innerText = "";
    Score.style.display = "none";
    updateQuestion(currentQuestionIndex);
}

// Function to check the answer for the current passage
function checkAnswer() {
    const selectedAnswers = [];
    for (let i = 0; i < questions[currentQuestionIndex].answers.length; i++) {
        const input = document.querySelector(`input#blank-${i}`);
        selectedAnswers.push(input.value);
    }
    const correctAnswers = questions[currentQuestionIndex].answers;
    const questionScore = calculateQuestionScore(selectedAnswers, correctAnswers);

    result.innerHTML = `Your score for this question: ${questionScore} / ${selectedAnswers.length}`;
    Score.style.display = "block";
}

// Function to calculate the question score
function calculateQuestionScore(selectedAnswers, correctAnswers) {
    let questionScore = 0;

    for (let i = 0; i < selectedAnswers.length; i++) {
        if (selectedAnswers[i].toLowerCase() === correctAnswers[i].toLowerCase()) {
            questionScore++; // Increment the question score for each correct answer
        }
    }

    return questionScore;
}
function goToTestByIndex(index) {
        if (index >= 1 && index <= questions.length) {
            currentQuestionIndex = index - 1;
            loadQuestion(currentQuestionIndex);
            testIndex.innerText = currentQuestionIndex + 1;
            aiScore.style.display = "none";
        } else {
            alert("Invalid test index. Please enter a valid test index.");
        }
    }

    // Event listener for the "Go to Test" button
    goToTestButton.addEventListener("click", function () {
        const index = parseInt(testIndexInput.value);
        testIndex.innerText = currentQuestionIndex + 1;
        goToTestByIndex(index);
    });
      </script>
  </body>
  </html>
  