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
    .help-title {
    font-weight: bold;
    margin-bottom: 10px;
}
.help-box{
  background-color: rgb(26, 0, 73);
      width: 90%;
      height: fit-content;
      padding: 20px;
      margin: auto;
      color: white;
      margin-top: 10px;
      border-radius: 20px;
      font-size: 25px;
      align-items: center;
      text-align: center;
    }
.question-container {
    margin-bottom: 20px;
    border: 1px solid #ccc;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.question-container p {
    margin: 0;
}

.options {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}

.option {
    display: inline-block;
    margin: 5px;
    padding: 5px 10px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    cursor: pointer;
    border-radius: 5px;
    color: black;
}

.button-container {
    text-align: center;
}

#result-container {
    text-align: center;
    margin-top: 20px;
}

/* Disable pointer events for submit button when disabled */
#submit-btn:disabled {
    pointer-events: none;
}
.blank {
    margin: -6px;
    margin-left: 10px;
    margin-right: 10px;
    height: 48px;
    margin-top: 8px;
    padding: 5px;
    width: 105px;
    display: inline-block;
    flex-direction: row;
    border: 2px dashed black;
}
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
      margin-top: 10px;
      padding: 20px;
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
    
    nav{
      height: 100%;
      position: fixed;
    }
    #result-container{
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
    #result-container{
      font-size: 28px;

    }
    .alert-success{
    background-color: rgb(139, 218, 139);
    font-size: 25px;
    text-align: center;
    width: 90%;
    padding: 10px;
    border: 2px solid green;
    border-radius: 22px;
    margin: auto;
    color: rgb(2, 82, 2);
    margin-top: 10px
    }
    .alert-danger{
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
    <h1 class="text-center mb-4 heading">Fill in the Blanks</h1>
<div class="container mt-5">
  <div class = "Instructions">
    <h1>Instructions:</h1>
    <ol>
      <li>In the text below some words are missing. Drag words from the box below to the appropriate place in the text. To undo an answer choice, drag the word back to the box below the text.</li>
    </ol>
  </div>
  <h3>Test <span id = "index">1</span></h3>
        <div id="question-container">
            <!-- Questions will be loaded here -->
        </div>
        <div class="help-box mt-4">
            <p class="help-title">Drag and drop the options to the blanks:</p>
            <div id="options-container" class="options">
                <!-- Options will be loaded here -->
            </div>
        </div>
        <div id="aiScore" style="display: none;">
          <h3>AI Score</h3>
          <div id="result-container">

          </div>
        </div>
        <div class="button-container mt-4 buttons">
            <button id="prev-btn" class="btn btn-secondary">Previous</button>
            <button id="submit-btn" class="btn btn-primary">Submit</button>
            <button id="next-btn" class="btn btn-secondary">Next</button>
        </div>
        <div class="test">  
          <input type="number" id="testIndex" min="1">
          <button id="goToTestButton">Go to Test</button>
        </div>
    </div>
    </main>
    <script>
            document.addEventListener("DOMContentLoaded", function () {
    var currentQuestion = 0;
    var questions = [];
    var submitBtn = document.getElementById("submit-btn");
    var resultContainer = document.getElementById("result-container");
    const testIndex = document.getElementById("index")
    const scoreBox = document.getElementById("aiScore")
    const testIndexInput = document.getElementById("testIndex");
    const goToTestButton = document.getElementById("goToTestButton");
    // Load questions from JSON
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fillBlanksReading.json", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            questions = JSON.parse(xhr.responseText);
            loadQuestion(currentQuestion);
        }
    };
    xhr.send();

    function loadQuestion(index) {
        var question = questions[index];
        var questionContainer = document.getElementById("question-container");
        var optionsContainer = document.getElementById("options-container");

        questionContainer.innerHTML = '<p>' + question.text.replace(/_______/g, '<span class="blank"></span>') + '</p>';

        var optionsHtml = '';
        question.options.forEach(function (option) {
            optionsHtml += '<div class="option">' + option + '</div>';
        });
        optionsContainer.innerHTML = optionsHtml;

        var options = document.querySelectorAll(".option");
        var blanks = document.querySelectorAll(".blank");

        options.forEach(function (option) {
            option.draggable = true;
            option.addEventListener("dragstart", function (e) {
                e.dataTransfer.setData("text/plain", e.target.textContent);
            });
        });

        blanks.forEach(function (blank) {
            blank.addEventListener("dragover", function (e) {
                e.preventDefault();
            });

            blank.addEventListener("drop", function (e) {
                e.preventDefault();
                var optionText = e.dataTransfer.getData("text/plain");
                blank.textContent = optionText;
                blank.setAttribute("readonly", true);
                checkSubmitButton();
            });
        });

        checkSubmitButton();
    }

    function checkSubmitButton() {
    var blanks = document.querySelectorAll(".blank");
    var allBlanksFilled = Array.from(blanks).every(function (blank) {
        return blank.textContent.trim() !== "";
    });

    submitBtn.disabled = !allBlanksFilled;
}

    submitBtn.addEventListener("click", function () {
        var blanks = document.querySelectorAll(".blank");
        var correctBlanks = 0;
        var totalBlanks = blanks.length;

        blanks.forEach(function (blank, index) {
            var userAnswer = blank.textContent.trim();
            if (userAnswer === questions[currentQuestion].answers[index]) {
                correctBlanks++;
            }
        });

        var scoreText = correctBlanks + '/' + totalBlanks;
        displayScore(scoreText);
    });

    function displayScore(scoreText) {
        resultContainer.innerHTML = 'Score: ' + scoreText;
        scoreBox.style.display = "block"
    }

    var nextBtn = document.getElementById("next-btn");
    var prevBtn = document.getElementById("prev-btn");

    nextBtn.addEventListener("click", function () {
        if (currentQuestion < questions.length - 1) {
            currentQuestion++;
            loadQuestion(currentQuestion);
            resultContainer.innerHTML = ''; // Clear the result
            scoreBox.style.display = "none"
            testIndex.innerText = currentQuestion + 1
        }
    });

    prevBtn.addEventListener("click", function () {
        if (currentQuestion > 0) {
            currentQuestion--;
            loadQuestion(currentQuestion);
            resultContainer.innerHTML = ''; // Clear the result
            scoreBox.style.display = "none"
            testIndex.innerText = currentQuestion + 1
        }
    });
    function goToTestByIndex(index) {
        if (index >= 1 && index <= questions.length) {
            currentQuestion = index - 1;
            loadQuestion(currentQuestion);
            testIndex.innerText = currentQuestion + 1;
            resultContainer.innerHTML = "";
            scoreBox.style.display = "none";
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
});

        </script>
    <script src="js/side.js"></script>
</body>
</html> 
  
