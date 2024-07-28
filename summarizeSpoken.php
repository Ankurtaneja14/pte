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
      display: flex;
    width: 100%;
    background-color: rgb(216, 198, 250);
    padding: 10px 25px;
    border-radius: 64px;
    justify-content: center;
    margin: 10px;
}
#audio label{
  font-size: 15px;
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
      font-size: 15px;
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
    #voice-select-dropdown{
      padding: 5px;
      width: 15%;
      display: inline-block;
      margin: 0px 10px;
    }
    #rate-value{
      margin-right: 10px;
        }
        #audio button{
          padding: 0px 8px;
          margin: 0;
          margin: 0px 3px;
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
        <!-- <div class="timer" id="timer">3</div> -->
        <div class="timer" id="timer">Time Remaining: 10:00</div>
        <div class="timer" id="countdown-timer">Starting in 3...</div>
        <p>Total Tests: 74</p>
        <div class="card-body">
          <div id="audio">
              <button id="speak-answer-btn" class="btn btn-primary" style = "display: none;">Start</button>
              <button id="pause-answer-btn" class="btn btn-secondary" disabled>||</button>
              <button id="stop-answer-btn" class="btn btn-danger" disabled hidden>Stop</button>
            <!-- Add these buttons where you want them to appear, typically near your answer field -->
            <label for="voice-select-dropdown">Select Voice: </label>
            <select id="voice-select-dropdown"></select>
            <label for="rate-controller">Speed: </label>
            <input type="range" id="rate-controller" min="0.5" max="2" step="0.1" value="1">
            <span id="rate-value">1x</span>
            <label for="volume-controller">Volume: </label>
            <input type="range" id="volume-controller" min="0" max="1" step="0.1" value="1">
            <span id="volume-value">100%</span>
            
          </div>
        <div class="row">
            <div class="col-md-6">
              <textarea id="summary" class="form-control mt-3" rows="6"
                placeholder="Type your summary here..." disabled></textarea>
            </div>
            <div class="col-md-6">
              <textarea id="answer" placeholder="Correct answer will be shown here..." readonly style="display: none;"></textarea>
            </div>
          </div>
        </div>
        <div class="col-md-12" id="aiScore" style="display: none;">
          <h3>AI Scores</h3>
          <div id="Score">
            <p>Content: <span id="contentScore"></span></p>
            <p>Form: <span id="formScore"></span></p>
            <p>Spelling: <span id="spellingScore"></span></p>
            <p>Grammar: <span id="grammarScore"></span></p>
            <p>Vocabulary: <span id="vocabularyScore"></span></p>
            <p>Your Score: <span id="totalScore"></span></p>
            <p>Max Score: 10</p>
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
  const summaryInput = document.getElementById("summary");
  const answerInput = document.getElementById("answer");
  const submitBtn = document.getElementById("submit-btn");
  const viewAnswerBtn = document.getElementById("view-answer-btn");
  const prevBtn = document.getElementById("prev-btn");
  const nextBtn = document.getElementById("next-btn");
  const aiScore = document.getElementById("aiScore");
  const testIndex = document.getElementById("index");
  const totalAudioFiles = 74;
  const timerElement = document.getElementById("timer");
  const countdownTimerElement = document.getElementById("countdown-timer");
  const testIndexInput = document.getElementById("testIndex");
const goToTestButton = document.getElementById("goToTestButton");
  let timerInterval;
  let countdownSeconds = 3;
  let timerDuration = 600;
  let timerRunning = false; // Add a variable to track if the timer is running
  function triggerSpeakAnswer() {
  speakAnswerBtn.click(); // Simulate a click event on the "Speak Answer" button
}


      function updateTimerDisplay() {
        const minutes = Math.floor(timerDuration / 60);
        const seconds = timerDuration % 60;
        timerElement.textContent = `Time Remaining: ${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}`;
      }

      function startTimer() {
        updateTimerDisplay();
          timerInterval = setInterval(function () {
      if (timerDuration > 0) {
            timerDuration--;
            updateTimerDisplay();
          } else {
            clearInterval(timerInterval); // Clear the timer interval when time's up
        timerElement.textContent = "Time's up!";
        summaryInput.disabled = true; // Disable the text area
        submitBtn.disabled = true;
        timerRunning = false; // Update the timerRunning variable

            // You can add actions to take when the timer reaches 0 here
          }
        }, 1000);
      }

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
      speakAnswerBtn.style.display = "inline"
    }
  }, 1000);
}



      startCountdown();
      // Event listener for the play button
      speakAnswerBtn.addEventListener("click", function () {
    startTimer()
    timerRunning = true;
    summaryInput.disabled = false
    speakAnswerBtn.style.display = "none"
    });


  function updateAudioAndSummary() {

  // Fetch the answer from the JSON file
  fetch('summarizeSpoken.json') // Adjust the path as needed
    .then((response) => response.json())
    .then((answers) => {
      const answer = answers[currentAudioIndex];
      answerInput.value = answer;
    })
    .catch((error) => console.error('Error fetching answer:', error));

  // Disable the submit button by default when updating the content
  submitBtn.disabled = true;
}


      // Listen for input events in the summary textarea
      summaryInput.addEventListener("input", function () {
        // Enable the submit button if there is some content in the textarea
        submitBtn.disabled = summaryInput.value.trim() === "";
      });

      function displayScores(scores) {
    // Display the individual scores
    document.getElementById("contentScore").textContent = scores.content;
    document.getElementById("formScore").textContent = scores.form;
    document.getElementById("grammarScore").textContent = scores.grammar;
    document.getElementById("vocabularyScore").textContent = scores.vocabulary;
    document.getElementById("spellingScore").textContent = scores.spelling;
    // Calculate and display the total score
    const totalScore = parseInt(scores.content) + parseInt(scores.form) + parseInt(scores.grammar) + parseInt(scores.vocabulary) + parseInt(scores.spelling);
    document.getElementById("totalScore").textContent = totalScore;
}
submitBtn.addEventListener("click", function() {
    summaryInput.disabled = true;
    submitBtn.disabled = true;
    clearInterval(timerInterval); // Clear the timer interval when the submit button is pressed
    timerElement.textContent = "Time's up!"; // Update the timer display
    summaryInput.disabled = true; // Disable the text area
    submitBtn.disabled = true;
    // Implement logic to evaluate the user's summary based on the defined criteria
    const userSummary = summaryInput.value; // Get the user's summary

    // Example: Calculate scores (You can replace this with your scoring logic)
    const contentScore = calculateContentScore(userSummary);
    const formScore = calculateFormScore(userSummary);
    const grammarScore = calculateGrammarScore(userSummary);
    const vocabularyScore = calculateVocabularyScore(userSummary);
    const spellingScore = calculateSpellingScore(userSummary);
    // Display the scores
    const scores = {
        content: `${contentScore}/2`,
        form: `${formScore}/2`,
        grammar: `${grammarScore}/2`,
        spelling: `${spellingScore}/2`,
        vocabulary: `${vocabularyScore}/2`,
    };
    displayScores(scores);

    // Calculate the total score based on the individual scores
    const totalScore = contentScore + formScore + grammarScore + vocabularyScore +spellingScore;
    document.getElementById("totalScore").textContent = totalScore;

    clearInterval(timerInterval); // Stop the timer
    timerRunning = false;
    aiScore.style.display = "block";
});

function calculateContentScore(userSummary) {
    // Implement your content scoring logic here and return a score out of 2
    // You might check for relevance, inclusion of key points, etc.
    // For this example, let's assume a random score between 0 and 2.
    return Math.floor(Math.random() * 3); // Random score between 0 and 2
}

function calculateFormScore(userSummary) {
    // Implement your form scoring logic here and return a score out of 1
    // You might check for structure and coherence.
    // For this example, let's assume a random score of 0 or 1.
    return Math.floor(Math.random() * 3); // Random score 0 or 1
}

function calculateGrammarScore(userSummary) {
    // Implement your grammar scoring logic here and return a score out of 2
    // You might check for correctness of grammar and sentence structure.
    // For this example, let's assume a random score between 0 and 2.
    return Math.floor(Math.random() * 3); // Random score between 0 and 2
}

function calculateVocabularyScore(userSummary) {
    // Implement your vocabulary scoring logic here and return a score out of 2
    // You might check for the richness and appropriateness of vocabulary.
    // For this example, let's assume a random score between 0 and 2.
    return Math.floor(Math.random() * 3); // Random score between 0 and 2
}
function calculateSpellingScore(userSummary) {
    // Implement your vocabulary scoring logic here and return a score out of 2
    // You might check for the richness and appropriateness of vocabulary.
    // For this example, let's assume a random score between 0 and 2.
    return Math.floor(Math.random() * 3); // Random score between 0 and 2
}
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

    // Event listener for the "Previous" button
prevBtn.addEventListener("click", function () {
  if (currentAudioIndex > 1) {
    currentAudioIndex--;
    updateAudioAndSummary();
    testIndex.innerText = currentAudioIndex;
    summaryInput.value = "";
    summaryInput.disabled = true;
    aiScore.style.display = "none";
    clearInterval(timerInterval); // Clear the current timer interval
    timerDuration = 600; // Reset the timer duration
    countdownSeconds = 3; // Restart the countdown timer
    countdownTimerElement.style.display = "block";
    timerElement.textContent = "Time Remaining: 10:00";
    startCountdown(); // Restart the countdown timer
    stopAnswer();
  }
});

// Event listener for the "Next" button
nextBtn.addEventListener("click", function () {
  if (currentAudioIndex < totalAudioFiles) {
    currentAudioIndex++;
    updateAudioAndSummary();
    testIndex.innerText = currentAudioIndex;
    summaryInput.value = "";
    summaryInput.disabled = true;
    aiScore.style.display = "none";
    clearInterval(timerInterval); // Clear the current timer interval
    timerDuration = 600; // Reset the timer duration
    countdownSeconds = 3; // Restart the countdown timer
    countdownTimerElement.style.display = "block";
    timerElement.textContent = "Time Remaining: 10:00";
    startCountdown(); // Restart the countdown timer
    stopAnswer();
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
      timerDuration = 600; // Reset the timer duration
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
  <script>
  const speakAnswerBtn = document.getElementById("speak-answer-btn");
  const pauseAnswerBtn = document.getElementById("pause-answer-btn");
  const stopAnswerBtn = document.getElementById("stop-answer-btn");
  const answerInput = document.getElementById("answer");
  let voicesDropdown = document.getElementById("voice-select-dropdown");
  const rateController = document.getElementById("rate-controller");
const rateValue = document.getElementById("rate-value");
const volumeController = document.getElementById("volume-controller");
const volumeValue = document.getElementById("volume-value");


  // Initialize the text-to-speech synthesis
  const synthesis = window.speechSynthesis;
  let currentUtterance = null;
  let isPaused = false; // Track the pause state
  function populateVoiceList() {
    if (synthesis) {
      const voices = synthesis.getVoices();
      voicesDropdown.innerHTML = voices.map((voice, index) => {
        return `<option value="${index}">${voice.name}</option>`;
      }).join("");
    }
  }

  populateVoiceList();

  synthesis.onvoiceschanged = populateVoiceList;

  function generateUtterance(text, voiceIndex) {
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.voice = synthesis.getVoices()[voiceIndex];
    utterance.rate = parseFloat(rateController.value); // Adjust speech rate
        utterance.volume = parseFloat(volumeController.value); // Adjust speech volume
    utterance.pitch = 1; // Adjust speech pitch as needed
    return utterance;
  }

  function speakAnswer() {
    const answerText = answerInput.value;
    if (answerText.trim() === "") {
      return; // Don't speak if there's no answer
    }

    if (synthesis) {
      // Get the selected voice index from the dropdown
      const selectedVoiceIndex = voicesDropdown.value;

      // Generate a new utterance with the updated answer text and selected voice
      const utterance = generateUtterance(answerText, selectedVoiceIndex);

      if (isPaused) {
        synthesis.resume();
        isPaused = false;
        pauseAnswerBtn.textContent = "||";
      } else {
        synthesis.speak(utterance);
      }

      currentUtterance = utterance; // Update the current utterance
      // Enable and disable control buttons
      speakAnswerBtn.disabled = true;
      pauseAnswerBtn.disabled = false;
      stopAnswerBtn.disabled = false;
    }
  }



  function pauseOrResumeAnswer() {
    if (synthesis) {
      if (currentUtterance) {
        if (!isPaused) {
          synthesis.pause(); // Pause the utterance
          isPaused = true;
          pauseAnswerBtn.textContent = "▶︎"; // Change the button label to "Play"
        } else {
          synthesis.resume(); // Resume the utterance
          isPaused = false;
          pauseAnswerBtn.textContent = "||"; // Change the button label back to "Pause"
        }
      }
    }
  }

  function stopAnswer() {
    if (synthesis) {
      if (currentUtterance) {
        synthesis.cancel();
        speakAnswerBtn.disabled = false;
        pauseAnswerBtn.disabled = true;
        stopAnswerBtn.disabled = true;
      }
    }
  }
  rateController.addEventListener("input", () => {
    rateValue.textContent = rateController.value + "x";
  })
  volumeController.addEventListener("input", () => {
    volumeValue.textContent = Math.round(volumeController.value * 100) + "%";
});
  speakAnswerBtn.addEventListener("click", speakAnswer);
  pauseAnswerBtn.addEventListener("click", pauseOrResumeAnswer);
  stopAnswerBtn.addEventListener("click", stopAnswer);
</script>

  <script src="js/side.js"></script>
</body>

</html>