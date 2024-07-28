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
    .timer {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
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

    #text {
      background-color: rgb(212, 211, 211);
      width: 90%;
      height: 20%;
      padding: 20px;
      margin: auto;
      margin-top: 10px;
      border-radius: 20px;
      font-size: 25px;
    }

    .container button {
      font-size: 20px;
      padding: 10px 17px;
      background-color: #0a0b22;
      margin: 10px;
      color: white;
      border-radius: 22px;
      cursor: pointer;
    }

    .container button:hover {
      background-color: #0c1397;
    }

    .container button:disabled {
      opacity: .5;
      cursor: default;
    }

    .container button:disabled:hover {
      background-color: #0a0b22;
    }

    .buttons {
      display: flex;
      width: fit-content;
      margin: auto;
      align-items: center;
      justify-content: center;
    }

    #audio {
      display: block;
      width: 100%;
      margin: 10px;
    }

    nav {
      height: 100%;
      position: fixed;
    }

    #play-button {
      width: fit-content;
      margin: auto;
    }

    #Score {
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

    #Score p {
      font-size: 28px;

    }

    #summary,
    #answer {
      width: 90%;
      display: block;
      margin: auto;
      border-radius: 25px;
      margin-top: 20px;
      padding: 25px;
      font-size: 20px;
    }

    .alert-success {
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

    .alert-danger {
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

    .test {
      margin: auto;
      width: fit-content;
    }

    #testIndex {
      padding: 5px;
      border-radius: 15px;
      box-shadow: 0px;
    }

    .Instructions {
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
            <span class="dropdown-btn hide" id="username">
              <?php echo $_SESSION['user_name']; ?>
            </span>
            <div class="user-dropdown-content" id="dropdown">
              <a href="#profile" class="user-dropdown-menu">Profile</a>
              <a href="logout.php" class="user-dropdown-menu" onmou>Logout</a>
            </div>
          </div>
        </div>
    </nav>
  </aside>
  <main>
    <h2 class="heading">Summarize Spoken Text</h2>
    <div class="container mt-5">
      <div class="Instructions">
        <h1>Instructions:</h1>
        <ol>
          <li>Read the passage below and summarize it using one sentence. Type your response in the box at the bottom of
            the screen. You have 10 minutes to finish this task. Your response will be judged on the quality of your
            writing and on how well your response presents the key points in the passage.</li>
        </ol>
      </div>
      <div class="card">
        <div class="card-header">
          <h3>Test <span id="index">1</span></h3>
        </div>
        <div class="timer" id="countdown-timer">Starting in 3...</div>
        <p>Total Tests: 140</p>
        <div class="card-body">
          <audio id="audio" controls>
            <source src="audio/audio1.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
          <button id="play-button" class="btn btn-primary" hidden>Play</button>
          <div class="row">
            <div class="col-md-6">
              <textarea id="summary" class="form-control mt-3" rows="6"
                placeholder="Type your summary here..." disabled></textarea>
            </div>
            <div class="col-md-6">
              <textarea id="answer" class="form-control mt-3" rows="1"
                placeholder="Correct answer will be shown here..." readonly style="display: none;"></textarea>
            </div>
          </div>
        </div>
        <div class="col-md-12" id="aiScore" style="display: none;">
          <h3>AI Scores</h3>
          <div id="Score">
          <p>Word Score: <span id="wordScore">0.00</span></p>
          </div>
        </div>
        <div class="card-footer">
        </div>
        <center><button id="view-answer-btn" class="btn btn-success mt-3">View Answer</button>
          <hr>
        </center>
        <div class="buttons">
          <button id="prev-btn" class="btn btn-secondary mr-2">Previous</button>
          <button id="submit-btn" class="btn btn-primary mt-3">Submit</button>
          <button id="next-btn" class="btn btn-primary">Next</button>
        </div>
      </div>
      <div class="test">  
        <input type="number" id="testIndex" min="1">
        <button id="goToTestButton">Go to Test</button>
      </div>
    </div>
  </main>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      let currentAudioIndex = 1;
  let isAnswerVisible = false;
  const audio = document.getElementById("audio");
  const summaryInput = document.getElementById("summary");
  const answerInput = document.getElementById("answer");
  const submitBtn = document.getElementById("submit-btn");
  const viewAnswerBtn = document.getElementById("view-answer-btn");
  const prevBtn = document.getElementById("prev-btn");
  const nextBtn = document.getElementById("next-btn");
  const aiScore = document.getElementById("aiScore");
  const testIndex = document.getElementById("index");
  const totalAudioFiles = 277;
  const countdownTimerElement = document.getElementById("countdown-timer");
  const playButton = document.getElementById("play-button");
  const testIndexInput = document.getElementById("testIndex");
const goToTestButton = document.getElementById("goToTestButton");
  let timerInterval;
  let countdownSeconds = 3;
  let timerRunning = false; // Add a variable to track if the timer is running


      function updateCountdownDisplay() {
        countdownTimerElement.textContent = `Starting in ${countdownSeconds}...`;
      }

      function startCountdown() {
    updateCountdownDisplay();
    const countdownInterval = setInterval(function () {
      if (countdownSeconds > 0) {
        countdownSeconds--;
        updateCountdownDisplay();
      } else {
        clearInterval(countdownInterval);
        countdownTimerElement.style.display = "none";
        playButton.style.display = "block";
        playButton.disabled = false; // Enable the play button
        // Start the timer when the countdown ends
        
      }
    }, 1000);
  }


      startCountdown();
      // Event listener for the play button
      playButton.addEventListener("click", function () {
    audio.play().then(() => {
      // Start the timer only if it's not already running
      if (!timerRunning) {
        startTimer();
        timerRunning = true;
      }
    }).catch((error) => {
      console.error('Error playing audio:', error);
    });
    playButton.hidden = true;
    playButton.disabled = true;
    summaryInput.disabled = false
  });


  function updateAudioAndSummary() {
        audio.src = `audio/audio${currentAudioIndex}.mp3`;

        // Fetch the answers from the JSON file
        fetch("writeDictation.json")
            .then((response) => response.json())
            .then((answers) => {
                // Update the answer input with the answer for the current test
                answerInput.value = answers[currentAudioIndex];
            })
            .catch((error) => console.error('Error fetching answers:', error));

        // Disable the submit button by default when updating the content
        submitBtn.disabled = true;
    }

      // Helper function to count words in a given string
      function calculateScore(userSummary, correctAnswer) {
        // Split the user's summary and the correct answer into words
        const userWords = userSummary.toLowerCase().match(/\b\w+\b/g);
        const answerWords = correctAnswer.toLowerCase().match(/\b\w+\b/g);

        if (!userWords || !answerWords) {
            return "N/A"; // Handle cases where there are no words in either the user's input or the answer
        }

        const totalWordsInAnswer = answerWords.length;
        let matchingWords = 0;

        // Count the number of matching words
        userWords.forEach((userWord) => {
            if (answerWords.includes(userWord)) {
                matchingWords++;
            }
        });

        // Calculate the score as a fraction (e.g., 3/4)
        const score = `${matchingWords}/${totalWordsInAnswer}`;

        return score;
    }
    function updateSubmitButtonState() {
        submitBtn.disabled = summaryInput.value.trim() === ""; // Disable if the summary input is empty
    }

    // Listen for input events in the summary textarea
    summaryInput.addEventListener("input", updateSubmitButtonState);

    // Initial state setup
    updateSubmitButtonState();
    submitBtn.addEventListener("click", function () {
        summaryInput.disabled = true;
        submitBtn.disabled = true;
        aiScore.style.display = "block";

        // Fetch and set the correct answer from the JSON file
        fetch("writeDictation.json")
            .then((response) => response.json())
            .then((answers) => {
                answerInput.value = answers[currentAudioIndex];

                // Calculate and display the score
                const userSummary = summaryInput.value;
                const score = calculateScore(userSummary, answers[currentAudioIndex]);
                document.getElementById("wordScore").textContent = score;
            })
            .catch((error) => console.error('Error fetching answers:', error));
    });



viewAnswerBtn.addEventListener("click", function () {
        isAnswerVisible = !isAnswerVisible;

        if (isAnswerVisible) {
            viewAnswerBtn.classList.remove("btn-success");
            viewAnswerBtn.classList.add("btn-primary");
            viewAnswerBtn.innerText = "Hide Answer";
            answerInput.style.display = "block";
        } else {
            viewAnswerBtn.classList.remove("btn-primary");
            viewAnswerBtn.classList.add("btn-success");
            viewAnswerBtn.innerText = "View Answer";
            answerInput.style.display = "none";
        }
    });

      prevBtn.addEventListener("click", function () {
    if (currentAudioIndex > 1) {
      currentAudioIndex--;
      updateAudioAndSummary();
      testIndex.innerText = currentAudioIndex;
      summaryInput.value = "";
      summaryInput.disabled = true;
      aiScore.style.display = "none";
      playButton.style.display = "none"
      countdownSeconds = 3; // Restart the countdown timer
      startCountdown();
      countdownTimerElement.style.display = "block"
      timerElement.textContent = "Time Remaining: 10:00"

    }
  });

  nextBtn.addEventListener("click", function () {
    if (currentAudioIndex < totalAudioFiles) {
      currentAudioIndex++;
      updateAudioAndSummary();
      testIndex.innerText = currentAudioIndex;
      summaryInput.value = "";
      summaryInput.disabled = true;
      aiScore.style.display = "none";
      playButton.style.display = "none"
      countdownSeconds = 3; // Restart the countdown timer
      startCountdown(); // Restart the countdown timer
      countdownTimerElement.style.display = "block"
      timerElement.textContent = "Time Remaining: 10:00"
    }
  });

      // Initialize with the first audio and summary
      updateAudioAndSummary();
    
    function goToTestByIndex(index) {
    if (index >= 1 && index) {
        currentAudioIndex = index - 1;
        updateAudioAndSummary();
      testIndex.innerText = currentAudioIndex+1;
      summaryInput.value = "";
      summaryInput.disabled = true;
      aiScore.style.display = "none";
      playButton.style.display = "none"
      countdownSeconds = 3; // Restart the countdown timer
      startCountdown(); // Restart the countdown timer
      countdownTimerElement.style.display = "block"
      timerElement.textContent = "Time Remaining: 10:00"
    } else {
        alert("Invalid test index. Please enter a valid test index.");
    }
}

// Event listener for the "Go to Test" button
goToTestButton.addEventListener("click", function () {
    const index = parseInt(testIndexInput.value);
    testIndex.innerText = currentAudioIndex+1;
    goToTestByIndex(index);
});
});
  </script>
  <script src="js/side.js"></script>
</body>

</html>