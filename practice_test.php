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
    .head{
  width: 90%;
  color: white;
  margin: auto;
  padding: 20px;
  display: flex;
  flex-direction: column;
  background-color: #3841E6;
  justify-content: center;
  align-items: center;
  border-radius: 41px;
 }
 .head h1{
  font-size: 3rem;
 }
 .test-list{
  display: flex;
  flex-direction: column;
  width: 50%;
  margin: auto;
  background-color: #aaade6;
  padding: 25px;
  border-radius: 22px;
  margin-top: 10px;
 }
 .test-category{
  font-size: 2rem;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  color: rgb(255, 255, 255);
  width: fit-content;
  margin: auto;
  background-color: #0a15ee;
  padding: 10px;
  border-radius: 18px;
 }
 .test-group{
  display: flex;
  flex-direction: column;
 }
 .test-link{
  text-decoration: none;
  color: rgb(7, 43, 163);
  font-size: 1.5rem;
  padding: 10px;
  width: fit-content;
  margin: 5px auto;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  font-weight: bold;
  text-decoration: underline;
 }
 .test-link:hover{
  background-color: #11133d;
  border-radius: 22px;
  color: white;
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
  <div class="container mt-5">
    <div class="head">
      <h1 class="heading">Practice Test</h1>
      <p class="lead">Welcome to the practice test page. Start practicing now!</p>
    </div>
      <div class="test-list">
          <div class="test-group" id = "speaking">
              <h3 class="test-category">Speaking</h3>
              <a href="readAloud.php" class="test-link">Read Aloud Test</a>
              <a href="repeatSentence.php" class="test-link">Repeat Sentence Test</a>
              <a href="describeImage.php" class="test-link">Describe Image Test</a>
              <a href="retellLecture.php" class="test-link">Retell Lecture Test</a>
              <a href="shortAnswer.php" class="test-link">Answer Short Question Test</a>
          </div>
          <div class="test-group" id = "writing">
              <h3 class="test-category">Writing</h3>
              <a href="summarizeText.php" class="test-link">Summarize Written Text</a>
              <a href="writeEssay.php" class="test-link">Write Essay</a>
          </div>
          <div class="test-group" id = "reading">
              <h3 class="test-category">Reading</h3>
              <a href="fillBlanks.php" class="test-link">Fill in the Blanks (Reading & Writing)</a>
              <a href="mcqMultiple.php" class="test-link">Multiple Choice (Multiple)</a>
              <a href="mcqSingle.php" class="test-link">Multiple Choice (Single)</a>
              <a href="sentenceReorder.php" class="test-link">Re-order Paragraphs</a>
              <a href="fillBlanksReading.php" class="test-link">Fill in the Blanks (Reading)</a>
          </div>
          <div class="test-group" id = "listening">
              <h3 class="test-category">Listening</h3>
              <a href="summarizeSpoken.php" class="test-link">Summarize Spoken Text</a>
              <a href="mcqMultipleListening.php" class="test-link">Multiple Choice (Multiple)</a>
              <a href="mcqSingleListening.php" class="test-link">Multiple Choice (Single)</a>
              <a href="fillBlanksListening.php" class="test-link">Fill in the Blanks</a>
              <a href="highlightSummary.php" class="test-link">Highlight Correct Summary</a>
              <a href="selectMissing.php" class="test-link">Select Missing Word</a>
              <a href="highlightIncorrect.php" class="test-link">Highlight Incorrect Words</a>
              <a href="writeDictation.php" class="test-link">Write From Dictation</a>
              <!-- Add more test links here as needed -->
          </div>
      </div>
  </div>
    </main>
  <script src="js/side.js"></script>
</body>

</html>