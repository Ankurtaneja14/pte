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

    .container h3 {
      font-size: 2rem;
      color: white;
      background-color: #0610d4;
      width: fit-content;
      margin: auto;
      padding: 20px;
      border-radius: 20px;
    }

    #quiz-container {
      background-color: rgb(212, 211, 211);
      width: 90%;
      height: fit-content;
      padding: 20px;
      margin: auto;
      margin-top: 10px;
      border-radius: 20px;
      font-size: 20px;
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
    .text-success{
         background-color: rgb(139, 218, 139);
         font-size: 25px;
         text-align: center;
         width: 90%;
         padding: 10px;
         border: 2px solid green;
         border-radius: 22px;
         margin: auto;
         color: rgb(2, 82, 2);
         margin-top: 10px;

    }
    #results {
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

.score {
  font-size: 28px;
  color: white; /* Change to your desired text color */
}

    .text-danger{
         background-color: rgb(223, 136, 125);
         font-size: 25px;
         text-align: center;
         width: 90%;
         padding: 10px;
         border: 2px solid rgb(156, 14, 3);
         border-radius: 22px;
         margin: auto;
         color: rgb(102, 25, 1);
         margin-top: 10px;

    }
    /* Add styles for highlighting */
.form-check.correct-answer {
  background-color: rgb(113, 233, 113); /* Light green background */
  padding: 0px 10px;
  margin-top: 5px;
  border-radius:22px;
}

.form-check.wrong-answer {
  background-color: rgb(241, 101, 101); /* Light green background */
  padding: 0px 10px;
  margin-top: 5px;
  border-radius:22px;
}

.form-check.unselected-answer {
  border: 2px solid #B0BEC5; /* Grey for unselected correct answers */
  background-color: #ECEFF1; /* Light grey background */
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
    <h1 class="quiz-title text-center heading">Multiple Choice Questions(Multiple)</h1>
    <div class="container mt-5">
      <div class = "Instructions">
        <h1>Instructions:</h1>
        <ol>
        <li>Read the text and answer the question by selecting all the correct responses. More than one response is correct.</li>
        </ol>
      </div>
    <h3>Test <span id = "index">1</span></h3>
            <div id="quiz-container">
                <p id="question-paragraph" class="lead"></p>
                <h4 id="question-text" class="mb-4"></h4>
                <div id="options-container"></div>
            </div>
            <div id="result-container" class="mt-4"></div>
            <div class="btn-container buttons">
                <button id="prev-btn" class="btn btn-secondary mr-3">Previous</button>
                <button id="submit-btn" class="btn btn-primary">Submit</button>
                <button id="next-btn" class="btn btn-secondary">Next</button>
            </div>
            <div class="test">  
              <input type="number" id="testIndex" min="1">
              <button id="goToTestButton">Go to Test</button>
            </div>
        </div>
    </div>
    </main>
  <script src="js/side.js"></script>
  <script>
const submitBtn = document.getElementById("submit-btn");
const nextBtn = document.getElementById("next-btn");
const prevBtn = document.getElementById("prev-btn");
const questionParagraph = document.getElementById("question-paragraph");
const questionText = document.getElementById("question-text");
const optionsContainer = document.getElementById("options-container");
const resultContainer = document.getElementById("result-container");
const testIndex = document.getElementById("index")
const testIndexInput = document.getElementById("testIndex");
    const goToTestButton = document.getElementById("goToTestButton");
let currentQuestion = 0;
let questions = [];

// Load questions from JSON
const xhr = new XMLHttpRequest();
xhr.open("GET", "mcqMultiple.json", true);
xhr.onreadystatechange = function () {
  if (xhr.readyState === 4 && xhr.status === 200) {
    questions = JSON.parse(xhr.responseText);
    loadQuestion(currentQuestion);
  }
};
xhr.send();

// Load and display question
function loadQuestion(index) {
  const question = questions[index];
  questionParagraph.textContent = question.paragraph;
  questionText.textContent = question.question;

  let optionsHtml = "";
  for (let i = 0; i < question.options.length; i++) {
    optionsHtml += `<div class="form-check">
                       <input class="form-check-input" type="checkbox" name="q${index}" id="q${index}a${i}" value="${question.options[i]}">
                       <label class="form-check-label" for="q${index}a${i}">${question.options[i]}</label>
                     </div>`;
  }
  optionsContainer.innerHTML = optionsHtml;
}

// Submit button click
// Add a variable to keep track of the score
let score = 0;

// ...
submitBtn.addEventListener("click", function () {
  const selectedOptions = document.querySelectorAll('input[type="checkbox"]:checked');
  let resultHtml = '<div class="alert">';
  let isCorrect = true;

  const selectedCorrectOptions = Array.from(selectedOptions).filter(function (input) {
    return questions[currentQuestion].answer.includes(input.value);
  });

  // Remove existing classes to reset styling
  const allOptions = document.querySelectorAll('input[type="checkbox"]');
  allOptions.forEach(function (option) {
    option.parentElement.classList.remove("correct-answer");
    option.parentElement.classList.remove("wrong-answer");
  });

  // Highlight only the selected correct answers
  for (const selectedOption of selectedCorrectOptions) {
    selectedOption.parentElement.classList.add("correct-answer");
  }
  for (const selectedOption of selectedOptions) {
    if (!selectedCorrectOptions.includes(selectedOption)) {
      selectedOption.parentElement.classList.add("wrong-answer");
      isCorrect = false;
    }
  }
  // Calculate the score
  let score = selectedCorrectOptions.length;
  resultHtml += '<div id="results">';
  resultHtml += `<p>Your score:<span class = "score"> ${score} out of ${questions[currentQuestion].answer.length}</span></p>`;
  resultHtml += "</div>";

  resultHtml += "</div>";
  resultContainer.innerHTML = resultHtml;
  submitBtn.disabled = true;
});





// Next button click
nextBtn.addEventListener("click", function () {
  currentQuestion = (currentQuestion + 1) % questions.length;
  loadQuestion(currentQuestion);
  resultContainer.innerHTML = "";
  submitBtn.disabled = false;
  testIndex.innerText = currentQuestion+1
});

// Previous button click
prevBtn.addEventListener("click", function () {
  currentQuestion = (currentQuestion - 1 + questions.length) % questions.length;
  loadQuestion(currentQuestion);
  resultContainer.innerHTML = "";
  submitBtn.disabled = false;
  testIndex.innerText = currentQuestion+1
});
function goToTestByIndex(index) {
        if (index >= 1 && index <= questions.length) {
            currentQuestion = index - 1;
            loadQuestion(currentQuestion);
            testIndex.innerText = currentQuestion + 1;
            resultContainer.innerHTML = "";
        } else {
            alert("Invalid test index. Please enter a valid test index.");
        }
    }

    // Event listener for the "Go to Test" button
    goToTestButton.addEventListener("click", function () {
        const index = parseInt(testIndexInput.value);
        testIndex.innerText = currentQuestion + 1;
        goToTestByIndex(index);
    });
  </script>
</body>

</html>