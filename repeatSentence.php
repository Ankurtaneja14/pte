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
      margin-top: 10px;
      padding: 20px;
      border-radius: 20px;
    }

    #practiceParagraph {
      background-color: rgb(212, 211, 211);
      width: 90%;
      height: 20%;
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
    #Score{
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
    #Score p{
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
                <a href="logout.php" class="user-dropdown-menu" >Logout</a>
            </div>
        </div>
    </div>
  </nav>
</aside>
<main>
    <h1 class="mb-4 heading">Repeat Sentence Test</h1>
<div class="container mt-5">
<div class = "Instructions">
      <h1>Instructions:</h1>
      <ol>
      <li>You will hear a sentence. Please repeat the sentence exactly as you hear it. You will hear the sentence only once.</li>
      </ol>
    </div>
        <div class="row">
          <h3>Test <span id="index">1</span></h3>
          <div id="timerDisplay">Time Remaining: 00:00</div>
          <p>Total Tests: 434</p>
            <div class="col-md-12 buttons">
                <button id="readAloudButton" class="btn btn-success">Listen Sentence</button>
                <button id="startRecordingButton" class="btn btn-success">Start Recording</button>
                <button id="stopRecordingButton" class="btn btn-danger" disabled>Stop Recording</button>
                <button id="viewAnswerButton" class="btn btn-primary mt-4">View Answer</button>
              </div>
              <audio id="audioPlayer" controls style="display: none;"></audio>
        </div>
            <div class="card mt-4">
            <p id="practiceParagraph" class="pragraph mt-2">Loading paragraph...</p>
            </div>
            <div class="row mt-4">
            <div class="col-md-12" id="aiScore">
            <h3>AI Scores</h3>
            <div id="Score">
                <p>Fluency Score: <span id="fluencyScore">N/A</span>/90</p>
                <p>Pronunciation Score: <span id="pronunciationScore">N/A</span>/90</p>
                <p>Sequence Score: <span id="sequenceScore">N/A</span>/90</p>
                <p>Total Score: <span id="totalScore"></span>/90</p>
            </div>
        </div>
        <div class="buttons"> <!-- Moved buttons inside the div -->
          <button id="prevButton">Previous</button>
          <button id="submitButton" class="btn btn-primary" disabled>Submit</button>
          <button id="nextButton" class="btn btn-primary">Next</button>
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
 document.addEventListener("DOMContentLoaded", function () {
    const practiceParagraph = document.getElementById("practiceParagraph");
    const startRecordingButton = document.getElementById("startRecordingButton");
    const stopRecordingButton = document.getElementById("stopRecordingButton");
    const submitButton = document.getElementById("submitButton");
    const timerDisplay = document.getElementById("timerDisplay");
    const readAloudButton = document.getElementById("readAloudButton");
    const nextButton = document.getElementById("nextButton");
    const prevButton = document.getElementById("prevButton");
    const testIndex = document.getElementById("index");
    const aiScore = document.getElementById("aiScore");
    const audioPlayer = document.getElementById("audioPlayer");
    let timerInterval;
    const testIndexInput = document.getElementById("testIndex");
    const goToTestButton = document.getElementById("goToTestButton");
    const viewAnswer = document.getElementById("viewAnswerButton")

    let currentParagraphIndex = 0;
    let paragraphs;
    let mediaRecorder;
    let recordedChunks = [];
    submitButton.disabled = true;
    let timerRunning = false; // Flag to track if the timer is running

    function updateTimerDisplay(timeRemaining) {
        const secondsString = timeRemaining.toString().padStart(2, "0");
        timerDisplay.textContent = `Time Remaining: 00:${secondsString}`;
    }

    function startTimer(duration, onComplete) {
    if (timerInterval) {
        clearInterval(timerInterval); // Clear any existing timer
    }

    let timeRemaining = duration;
    updateTimerDisplay(timeRemaining);
    timerRunning = true;

    timerInterval = setInterval(function () {
        if (timeRemaining > 0 && timerRunning) {
            timeRemaining--;
            updateTimerDisplay(timeRemaining);
        } else {
            clearInterval(timerInterval);
            timerRunning = false;
            if (onComplete) onComplete();
        }
    }, 1000);
}

    function autoClickButton(button, delay) {
        setTimeout(function () {
            button.click();
        }, delay);
    }

    fetch('repeatSentence.json')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            paragraphs = data;
            updateParagraph();
            start40SecondTimer();
        })
        .catch(error => console.error("Error fetching paragraphs:", error));

    function updateParagraph() {
        if (paragraphs) {
            const currentParagraph = paragraphs[currentParagraphIndex];
            practiceParagraph.textContent = currentParagraph.content;
        }
    }

    readAloudButton.addEventListener("click", function () {
        const currentParagraph = paragraphs[currentParagraphIndex];
        const utterance = new SpeechSynthesisUtterance(currentParagraph.content);
        speechSynthesis.speak(utterance);
    });

    startRecordingButton.addEventListener("click", function () {
        // Start recording logic here
        // ...
        timerRunning = false; // Stop the timer

        navigator.mediaDevices.getUserMedia({ audio: true })
            .then(function (stream) {
                mediaRecorder = new MediaRecorder(stream);

                mediaRecorder.ondataavailable = event => {
                    if (event.data.size > 0) {
                        recordedChunks.push(event.data);
                    }
                };

                mediaRecorder.onstop = () => {
                    const blob = new Blob(recordedChunks, { type: 'audio/wav' });
                    const url = URL.createObjectURL(blob);
                    audioPlayer.src = url;
                    audioPlayer.style.display = "block";
                    stopRecordingButton.disabled = true;
                    submitButton.disabled = false;
                };

                startRecordingButton.disabled = true;
                stopRecordingButton.disabled = false;
                mediaRecorder.start();
            })
            .catch(error => {
                console.error("Error accessing microphone:", error);
                alert("Cannot access the microphone. Please make sure the microphone is enabled and try again.");
            });
    });

    stopRecordingButton.addEventListener("click", function () {
        // Stop recording logic here
        // ...
        if (mediaRecorder) {
            mediaRecorder.stop();
            recordedChunks = [];
            stopRecordingButton.disabled = true;
        }
                timerRunning = false; // Stop the timer

    });

       submitButton.addEventListener("click", function() {
    if (paragraphs) {
        const fluencyScore = getRandomScore();
        const pronunciationScore = getRandomScore();
        const sequenceScore = getRandomScore();
        const totalScore = (fluencyScore+pronunciationScore+sequenceScore)/3
        document.getElementById("fluencyScore").textContent = fluencyScore;
        document.getElementById("pronunciationScore").textContent = pronunciationScore;
        document.getElementById("sequenceScore").textContent = sequenceScore;
        document.getElementById("totalScore").textContent = totalScore;
    
    }
    aiScore.style.display = "block";
    submitButton.disabled = true
});

   
hideaiscore()
function hideaiscore(){
    aiScore.style.display = "none"
}

function getRandomScore() {
    return Math.floor(Math.random() * (90 - 50 + 1)) + 50; // Random score between 50 and 100
}

    nextButton.addEventListener("click", function () {
        currentParagraphIndex = (currentParagraphIndex + 1) % paragraphs.length;
        updateParagraph();
        testIndex.innerText = currentParagraphIndex + 1;
        submitButton.disabled = true;
        aiScore.style.display = "none";
        audioPlayer.style.display = "none";
        timerRunning = false;
        readAloudButton.disabled = false;
        startRecordingButton.disabled = false;
    start40SecondTimer();

    });

    prevButton.addEventListener("click", function () {
        currentParagraphIndex = (currentParagraphIndex - 1 + paragraphs.length) % paragraphs.length;
        updateParagraph();
        testIndex.innerText = currentParagraphIndex + 1;
        submitButton.disabled = true;
        aiScore.style.display = "none";
        audioPlayer.style.display = "none";
        readAloudButton.disabled = false;
        startRecordingButton.disabled = false;
        timerRunning = false;
    start40SecondTimer();

    });

    function start40SecondTimer() {
        startTimer(15, function () {
            startRecordingButton.click();
            startRecordingButton.disabled = true;
            readAloudButton.disabled = true;
            startTimer(40, function () {
                stopRecordingButton.click();
                stopRecordingButton.disabled = true;
                submitButton.disabled = false;
            });
        });
    }
    function goToTestByIndex(index) {
        if (index >= 1 && index <= paragraphs.length) {
            currentParagraphIndex = index - 1;
            updateParagraph();
            testIndex.innerText = currentParagraphIndex + 1;
            submitButton.disabled = true;
            aiScore.style.display = "none";
            audioPlayer.style.display = "none";
            readAloudButton.disabled = false;
            startRecordingButton.disabled = false;
            timerRunning = false;
            start40SecondTimer();
        } else {
            alert("Invalid test index. Please enter a valid test index.");
        }
    }

    // Event listener for the "Go to Test" button
    goToTestButton.addEventListener("click", function () {
        const index = parseInt(testIndexInput.value);
        testIndex.innerText = currentParagraphIndex + 1;
        goToTestByIndex(index);
    });
    practiceParagraph.style.display = "none"
    let isToggled = false;
    viewAnswer.addEventListener("click", function () {
  isToggled = !isToggled;

  if (isToggled) {
      viewAnswer.innerText = "Hide Answer"
      practiceParagraph.style.display = "block"
    } else {
      viewAnswer.innerText = "View Answer"
      practiceParagraph.style.display = "none"
  }
});      
});

  </script>
</body>

</html>
