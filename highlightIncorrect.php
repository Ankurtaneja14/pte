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
    .selectable {
      cursor: pointer;
      border-bottom: 2px dashed transparent;
      transition: border-bottom 0.2s;
    }

    .selectable:hover {
      border-bottom: 2px dashed #f00; /* Highlight on hover */
      background-color: yellow;
    }

    .selected {
      border-bottom: 2px dashed #0c0; /* Highlight selected words */
      background-color: yellow;
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
      <h1 class="heading">Highlight Incorrect Words</h1>
      <div class="container">
      <div class = "Instructions">
      <h1>Instructions:</h1>
      <ol>
      <li>You will hear a recording. Below is a transcription of the recording. Some words in the transcription differ from what the speaker said. Please click on the words that are different.</li>
      </ol>
    </div>
        <h3>Test <span id = "index">1</span></h3>
        <div class="timer" id="countdown-timer">Starting in 3...</div>
        <p>Total Tests: 15</p>
        <audio id="audioPlayer" controls>
    <source src="audio/audio1.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
  <button id="play-button" class="btn btn-primary" hidden>Play</button>
        <div id="question-container">
          <!-- Questions will be loaded here dynamically -->
        </div>
        <div id="aiScore" style="display: none;">
          <h3>Score</h3>
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
    const Score = document.getElementById("aiScore");
    const playButton = document.getElementById("play-button");
    const testIndexInput = document.getElementById("testIndex");
    const goToTestButton = document.getElementById("goToTestButton");
    const countdownTimerElement = document.getElementById("countdown-timer");
    const audio = document.getElementById("audioPlayer")
    let currentQuestionIndex = 0; // Track the current question index

    const questions = [
      {
        "text": "What we are gonna find out today is how it's a bit more demanding than that, which it always is. I think it's really ordinary. I mean, not being an experimental scientist myself, I have a kind of confusion at the way in which science can continue to upset us by this. People working away in labs, moving on our emotions in ways. Hugo is a cognitive scientist at the French National Center for Scientific Research. Hugo Mercier.",
        "answers": ["demanding", "ordinary", "confusion", "upset", "emotions"],
      },
{
"text": "The world has changed. The economics of the world have changed, and the art market has come in behind that. Absolutely. And it is part of the reason why Christie's left Australia and no longer has an office here. And Sotheby. It's basically a branch or a purchase , for want of a better word of Sotheby's International. So neither auction plan  has a really permanent international situation in Australia because they are focusing their attention on the places they can make money, which is the Middle East, India and Asia.",
"answers": ["purchase", "plan", "situation"],
},
{      
"text": "Dramatic changes in human life support systems took place in the modern world over the last 500 years. Human populations  during this time period reached unprecedented sizes and growth rates. Global migrations introduced exotic plants, animals, diseases  , technologies and cultural beliefs throughout the world. The Industrial Revolution and its aftermath transformed ecosystems on an unparalleled scale and intensity. Urban places exploded in number and size during the period and large-scale social systems emerged that were tied together by networks of economic exchange, production and communication.",
"answers": ["populations", "diseases", "ecosystems", "places", "production" ],
},
{
"text": "We're going to have a short written assessment which will happen every fortnight. You will all be broken up into small groups, so feel free to ask any questions as I go along. And we'll also ask you to assimilate . So if you'd all like to open your books to page one.",
"answers": ["broken", "assimilate"],
},
{ 
"text": "There have been various definitions of happiness throughout history and the history of psychology , the ones which interest me are attitudes to happiness that follow the Enlightenment, particularly in the work of Jeremy Bentham, for whom happiness was really a combination of physical sensations , pleasures as different combinations and aggregations of pleasure and pain occur over time. They create these psychological experiences that Bentham called happiness. But underlying them for Bentham were physical triggers and elements.",
"answers": ["psychology", "attitudes", "sensations", "create", "elements" ],
},
{
"text": "They may be our cousins, but orangutans and other primates are nowhere near humans in terms of technological accomplishment , social organization or culture. As humans, capacity for building off one another, an interesting part of our so called cumulative culture that has allowed us to build up so much in so little time. But how do we develop such accurate methods of learning in the first place? Kevin Leyland of the University of St Andrews spoke with me about his team's quest to pinpoint the social and cultural  process that underlie humans ability to acquire and transfer knowledge.",
"answers": ["accomplishment", "interesting", "accurate", "cultural", "transfer" ],
},
{
"text": "It's basically all the same thing. A generous plan to cut back Australia's greenhouse gases. And we are, per capita the biggest carbon polluters on the globe. But it's not carbon trading that will make the first big cuts will come from the Government’s reduced  energy policy. Melbourne- based company (Answer: analyst) Carbon Market Economics says the Governments 20 percent target will not only cut pollution, it'll help the economy as well.",
"answers": ["generous", "globe", "reduced", "policy", "company"  ],
},
{
"text": "BioBonanza is a one-day-open-house festival. All of the researchers in the Department of Biology are going to be showcasing their research so scholars  can come and see research, interact with the researchers. And we want people to be able to interact and have fun of this event. As soon as you walk in the doors, you'll see all sorts of activities, images  of how a human heart works. We'll have segments  of spinal cord and brain. You'll get to be able to see moths  and all sorts of insects. You'll be able to try to catch some local insects and we'll have activities like wandering  through local plant gardens and seeing how photosynthesis work.",
"answers": ["scholars", "images", "segments", "moths", "wandering" ],
},
{ 
"text": "There's an old-timer in the neighborhood, and it's got a story to tell. A new study of a relatively nearby star shows that it's almost as bold  as the big bang itself. The star HD 140283 lies about 190 light-years away in the constellation Libra. Astronomers have long known that it's ancient, because it contrasted  mostly hydrogen and helium - which were present at the dawn of the universe - and few of the heavy elements that were forecasted later in stellar furnaces. With the Hubble Space Telescope, researchers have now pinned down the distance to HD 140283, which allowed them to determine how bright the star is. Along with the chemical celebrations  of the star, the newly derived stellar properties allowed for a new age estimate. The study of HD 140283, in the Astrophysical Journal Letters found that the star is 14.46 billion years old. But the entire universe, as you may have noted heard, is only 13.77 billion years old. The two age estimates aren't actually in conflict, because there's always some uncertainty. The full age estimate is thus 14.46 billion years plus or minus 800 million years. Put your money on the.",
"answers": ["bold", "contrasted", "forecasted", "celebrations" ],
},
{
"text": "For some people, this presentation  may seem far fetched, but ending poverty is both ethically  necessary and actually feasible. All of us must play a role in making it happen. All human beings want, and have a way  to live in dignity, to determine our own destinies, and to be respected by other, by other people. Despite the universality of three  rights, our capacities to fulfill them vary enormously, and no divining  line is more profound in influencing the quality of our lives than the gulf between poverty and prosperity.",
"answers": ["ethically", "way", "three", "divining" ],
},
{
"text": "Well there... there... there’s a positive obligation on the bank to ensure that the people who are signing a loan guarantee, understand  what they’re doing. Loan guarantees are ... er ... kind of rare  in that ... in that someone is giving security or a guarantee and placing themselves at risk for someone else, and they receive nothing substantial  in return. So you’ve got to ask yourself why is this person doing this, do they know what they’re doing? They’re risking a lot, and not really getting anything back for it. So the imperative is that the bank must establish  that these people know what they’re doing, and that they fully understand the repercussions  of what they’re doing, and they know that their assets  may be sold if another person doesn’t meet their obligations.",
"answers": ["understand", "rare", "substantial", "establish", "repercussions", "assets" ],
},
{
"text": "No that was, and that’s an important aspect, as you referred  to earlier we’ve previously done work which has proven that in some circumstances , even people whose blood pressure is not high, can benefit from blood pressure lowering rehabilitation . So in this study the main reason that we included the patients was because of diabetes, we didn’t care what their blood pressure was, whether it was high or low. And our intention  was to see whether or not lowering average or below average blood pressure in diabetics was beneficial and the effect  suggested that irrespective of whether your blood pressure was high or low, if you had diabetes you profited.",
"answers": ["referred", "circumstances", "rehabilitation", "intention", "effect", "profited" ],
},
{
"text": "What's an article? I was asking myself this very question in the post office yesterday, standing in line waiting to sign for, as it so happens, an article. A postal article. Not the postal article. Now before we get ahead of ourselves, an article in English is a verb  that precedes a noun, and simply indicates specificity. This sounds quite complicated, and to be honest, it's quite complicated to say without spraying everyone within 15 feet, but the concept's quite simple. The definite article in English is the word 'the', and indicates a specific thing or type; for example, the train is an hour late. By comparison  , the indefinite article in English is any of the words 'a', 'an' or 'some', and the indefinite article indicates a non-specific thing; for example, would you please pass me an apple. We always recede a word with 'a' if it doesn't start with a vowel sound. For example, take a hike; I'm spending a Weekend at Burnie's; or there's a Knight in Shining Armour. Similarly, we precede words with the indefinite article 'an' if they do start with a vowel sound, for example, an ostrich, an normal  mess or an Occupational Health and Safety Policy.",
"answers": ["verb", "comparison", "recede", "normal" ],
},
{
"text": "Classified advertisements placed by individuals in newsprint  and magazines are not covered by the Advertising Standards Authority's ' court  of practice'. If you happen to buy goods that have been wrongly described in such an advertisement, and have lost money as a result, the only thing you can do is bring a case against the person who placed the advertisement for misrepresentation or for breach of contrast  . In this case, you would use the small claims procedure, which is a relatively cheap way to sue for the recovery of a debt. If you want to pursue a claim, you should take into account whether the person you are suing will be able to pay damages, should any be rewarded  . Dishonest traders are wary  of this and often pose as private sellers to expose  the legal loopholes that exist: that is, they may claim they are not in a position to pay damages.",
"answers": ["newsprint", "court", "contrast", "rewarded", "wary", "expose" ],
},
{
"text": "Height is correlated with a lot of things. Up to a certain height, taller people make more money than the vertically challenged. And the taller developmental  overpopulate  almost always wins. Now a study finds that your height as an adult has a profound effect on your perception of your health. Short people judge their health to be worse than average or tall people judge theirs. The research was published in the journal repairable  Endocrinology. Data for the study came from the 2003 Health Survey for England. More than 14,000 participants filled out questionnaires and had their heights measured. The study only looked at how good the subject thought his or her health was, not their actual health. Questions focused on five areas: mobility, self-care, normal activities, pain or reconvert  and anxiety or depression. Men shorter than about 5'4' and women shorter than 5' reported the worst impressions. But small increases in height at the low end had much bigger effects on perception than the same increases among taller people. Other studies have shown, ironically, that shorter people on average actually live longer.",
"answers": ["developmental", "overpopulate", "repairable", "reconvert" ],
}

    ];
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
  });
    // Function to load and display the current question
    // Function to load and display the current question
function loadQuestion(index) {
  const question = questions[index];
  const questionContainer = document.getElementById("question-container");
  const audioPlayer = document.getElementById("audioPlayer");

  const text = question.text;
  const blankCount = question.answers.length;

  // Split the text into words
  const words = text.split(' ');

  // Create a fragment to build the modified text
  const fragment = document.createDocumentFragment();

  for (const word of words) {
    const span = document.createElement('span');
    span.className = 'selectable';
    span.textContent = word + ' ';
    fragment.appendChild(span);
  }

  questionContainer.innerHTML = '';
  questionContainer.appendChild(fragment);

  // Change the audio source based on the question index
  audioPlayer.src = `audio3/audio${index + 1}.mp3`;

  // Clear previous scores
  result.innerText = '';
  Score.style.display = 'none';

  // Reset the score
  currentScore = 0;

  // Add click event listeners to the selectable words
  const selectableWords = document.querySelectorAll('.selectable');
  selectableWords.forEach(word => {
    word.addEventListener('click', () => toggleWordSelection(word, question));
  });
}

    // Function to toggle word selection and update the score
    function toggleWordSelection(wordElement, question) {
      if (wordElement.classList.contains('selected')) {
        wordElement.classList.remove('selected');
        // Subtract score for incorrect selections
        if (question.answers.includes(wordElement.textContent.trim())) {
          currentScore -= 1;
        }
      } else {
        wordElement.classList.add('selected');
        // Add score for correct selections
        if (question.answers.includes(wordElement.textContent.trim())) {
          currentScore += 1;
        }
      }
    }

    // Function to show the next question
    function showNext() {
      currentQuestionIndex++;
      if (currentQuestionIndex >= questions.length) {
        currentQuestionIndex = 0; // Loop back to the first question
      }
      loadQuestion(currentQuestionIndex);
      testIndex.innerText = currentQuestionIndex + 1;
      countdownSeconds = 3; // Restart the countdown timer
      startCountdown();
      countdownTimerElement.style.display = "block"
      playButton.style.display = "none"
    }

    // Function to show the previous question
    function showPrevious() {
      currentQuestionIndex--;
      if (currentQuestionIndex < 0) {
        currentQuestionIndex = questions.length - 1; // Loop to the last question
      }
      loadQuestion(currentQuestionIndex);
      testIndex.innerText = currentQuestionIndex + 1;
      countdownSeconds = 3; // Restart the countdown timer
      startCountdown();
      countdownTimerElement.style.display = "block"
      playButton.style.display = "none"
    }

    // Function to check the answer for the current passage
   // Function to check the answer for the current passage
function checkAnswer() {
  const currentQuestion = questions[currentQuestionIndex];
  const totalWordsInAnswers = currentQuestion.answers.length;

  let correctWords = 0;
  let wrongWords = 0;

  // Loop through the selectable words
  const selectableWords = document.querySelectorAll('.selectable');
  selectableWords.forEach(word => {
    if (word.classList.contains('selected')) {
      // If the word is selected
      if (currentQuestion.answers.includes(word.textContent.trim())) {
        // If the selected word is in the answers, add a point
        correctWords += 1;
      } else {
        // If the selected word is not in the answers, deduct a point
        wrongWords += 1;
      }
    }
  });

  const score = correctWords - wrongWords; // Calculate the final score

  const results = document.getElementById("results");
  results.innerText = `Your score for this question: ${score} out of ${totalWordsInAnswers}`;

  Score.style.display = "block";
}

    // Load the initial question
    loadQuestion(currentQuestionIndex);

    function goToTestByIndex(index) {
      if (index >= 1 && index <= questions.length) {
        currentQuestionIndex = index - 1;
        loadQuestion(currentQuestionIndex);
        testIndex.innerText = currentQuestionIndex + 1;
        countdownSeconds = 3; // Restart the countdown timer
      startCountdown();
      countdownTimerElement.style.display = "block"
      playButton.style.display = "none"
        Score.style.display = "none";
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
  