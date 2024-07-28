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
    .welcome {
    background-color: #3841E6;
    color: white;
    padding: 40px;
    text-align: center;
    border-radius: 10px;
    margin: 5%;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
}

.welcome h2 {
    font-size: 32px;
    margin-bottom: 10px;
}

/* Practice tests section styles */
.practice-tests {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 30px;
}

.test-card {
    background-color: #ffffff;
    color: #333;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    flex-basis: calc(50% - 20px); /* Two cards per row */
    text-align: center;
    transition: transform 0.2s ease-in-out;
}

.test-card:hover {
    transform: scale(1.05); /* Hover effect to slightly scale up the card */
}

.test-card h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.test-card p {
    font-size: 16px;
}

.start-test {
    background-color: #3841E6;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s;
}
.start-test a{
  color: white;
  text-decoration: none;
}

.start-test:hover {
    background-color: #00C896; /* Change color on hover */
}

/* Progress section styles */
.progress {
    margin-top: 30px;
}

.progress-bar {
    background-color: #ffffff;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
}

.progress-fill {
    height: 20px;
    border-radius: 10px;
    background-color: #3841E6;
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
<section class="welcome animate__animated animate__fadeIn">
    <h2>Welcome, <?php echo $_SESSION['user_name']; ?></h2>
    <p>Practice Your PTE Skills.</p>
</section>

<h2>Practice Tests</h2>
<section class="practice-tests">
    <div class="test-card animate__animated animate__fadeIn" id="listening-test">
        <h3>Listening Test</h3>
        <button class="start-test"><a href="practice_test.php #listening">Start Test</a></button>
    </div>
    <div class="test-card" id="reading-test">
                <h3>Reading Test</h3>
                <button class="start-test"><a href="practice_test.php #reading">Start Test</a></button>
            </div>
            <div class="test-card" id="writing-test">
                <h3>Writing Test</h3>
                <button class="start-test"><a href="practice_test.php #writing">Start Test</a></button>
            </div>
            <div class="test-card" id="speaking-test">
                <h3>Speaking Test</h3>
                <button class="start-test"><a href="practice_test.php #speaking">Start Test</a></button>
            </div>
        </section>

        <!-- <section class="progress">
            <h2>Your Progress</h2>
            <h3>Listening</h3>
            <div class="progress-bar" id="progress-listening">
                <div class="progress-fill" style="width: 75%;"></div>
            </div>
            <h3>Reading</h3>
            <div class="progress-bar" id="progress-reading">
                <div class="progress-fill" style="width: 60%;"></div>
            </div>
            <h3>Writing</h3>
            <div class="progress-bar" id="progress-writing">
                <div class="progress-fill" style="width: 85%;"></div>
            </div>
            <h3>Speaking</h3>
            <div class="progress-bar" id="progress-speaking">
                <div class="progress-fill" style="width: 70%;"></div>
            </div>
        </section> -->  
    </main>
  <script src="js/side.js"></script>
</body>

</html>