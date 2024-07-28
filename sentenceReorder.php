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

    #sentence-container {
      background-color: rgb(212, 211, 211);
      width: 98%;
      height: fit-content;
      padding: 20px;
      margin: auto;
      margin-top: 10px;
      border-radius: 20px;
      font-size: 18px;
    }
    #sentence-list{
        padding: 20px;
        border: 2px dashed black;
    }
    .sentence{
        padding: 10px;
        border: 2px solid rgb(82, 77, 77);
        margin: 2px;
        cursor: all-scroll;
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

    #score-container {
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

#score-container {
  font-size: 28px;
  color: white; /* Change to your desired text color */
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
    <h1 class="text-center mb-4 heading">Reorder Sentences</h1>
    <div class="container mt-5">
        <div class = "Instructions">
            <h1>Instructions:</h1>
            <ol>
            <li>The text boxes in the left panel have been placed in a random order. Restore the original order by dragging the text boxes from the left panel to the right panel.</li>
            </ol>
          </div>
          <h3>Test <span id = "index">1</span></h3>
          <p>Total Tests: 71</p>
        <div id="sentence-container">
            <ul id="sentence-list">
                <!-- Sentences will be loaded here -->
            </ul>
        </div>
        <div id="aiScore">
            <h3>Score</h3>
            <div id="score-container"></div>
        </div>        
        <div class="btn-container buttons">
            <button id="prev-btn" class="btn btn-secondary mt-3" onclick="hideScore()">Previous</button>
            <button id="check-btn" class="btn btn-primary mt-4" onclick="showScore()">Submit</button>
            <button id="next-btn" class="btn btn-secondary mt-3" onclick="hideScore()">Next</button>
        </div>  
        <div class="test">  
            <input type="number" id="testIndex" min="1">
            <button id="goToTestButton">Go to Test</button>
          </div>
        </div>  
    </main>
  <script src="js/side.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
   // ...
   const scoreBox = document.getElementById("aiScore")
   const testIndex = document.getElementById("index")
const testIndexInput = document.getElementById("testIndex");
    const goToTestButton = document.getElementById("goToTestButton");
    const checkBtn = document.getElementById("check-btn")
    const prevBtn = document.getElementById("prev-btn")
    const nextBtn = document.getElementById("next-btn")
    var currentQuestion = 0;
    var questions = [];
    var originalOrder = [];

    // Load questions from JSON
    $.getJSON('sentenceReorder.json', function(data) {
        questions = data;
        loadQuestion(currentQuestion);
    });

    function loadQuestion(index) {
        var question = questions[index];
        originalOrder = question.sentences.slice(); // Make a copy of the original order
        shuffleArray(question.sentences);
        loadSentences(question.sentences);
    }

    function loadSentences(sentences) {
        var sentenceHtml = "";
        sentences.forEach(function(sentence, index) {
            sentenceHtml += '<li class="sentence" data-index="' + index + '">' + sentence + '</li>';
        });
        $('#sentence-list').html(sentenceHtml);
    }

    $('#sentence-list').sortable({
        update: function(event, ui) {
            $('#result-container').empty();
        }
    });

    checkBtn.addEventListener("click", function(){
        var currentOrder = getCurrentOrder();
        var score = calculateScore(currentOrder, originalOrder);
        displayScore(score);
        checkBtn.disabled = true;
    }) 

    function getCurrentOrder() {
        var currentOrder = [];
        $('#sentence-list li').each(function() {
            currentOrder.push($(this).text());
        });
        return currentOrder;
    }

    function calculateScore(currentOrder, originalOrder) {
        var score = 0;
        for (var i = 0; i < currentOrder.length; i++) {
            if (currentOrder[i] === originalOrder[i]) {
                score += 1;
            }
        }
        return score;
    }

    function displayScore(score) {
        score = Math.min(score, 3); // Ensure the score doesn't exceed 3
        var scoreContainer = document.getElementById('score-container');
        scoreContainer.innerHTML = '<p>Your Score: ' + score + ' / 3</p>';
    }

nextBtn.addEventListener("click", function(){
    if (currentQuestion < questions.length - 1) {
            currentQuestion++;
            loadQuestion(currentQuestion);
            $('#result-container').empty();
            checkBtn.disabled = false;
            testIndex.innerText = currentQuestion+1
            
        }
}) 

    prevBtn.addEventListener("click", function (){
        if (currentQuestion > 0) {
            currentQuestion--;
            loadQuestion(currentQuestion);
            $('#result-container').empty();
            checkBtn.disabled = false;
            testIndex.innerText = currentQuestion+1

        }
    }) 
    function updateIndex(){
        testIndex.innerText = currentQuestion+1
    }
hideScore()
    function hideScore() {
        scoreBox.style.display = "none"
    }
    function showScore(){
        scoreBox.style.display = "block"
    }
    // Shuffle array function
    function shuffleArray(array) {
        for (var i = array.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }
    function goToTestByIndex(index) {
        if (index >= 1 && index <= questions.length) {
            currentQuestion = index - 1;
            loadQuestion(currentQuestion);
            scoreBox.style.display= "none"
            checkBtn.disabled = false;
            testIndex.innerText = currentQuestion+1

        } 
        else {
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