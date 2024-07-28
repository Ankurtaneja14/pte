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
    #summaryInput{
      width: 90%;
      display: block;
      margin: auto;
      height: 30%;
      border-radius: 25px;
      margin-top: 20px;
      padding: 25px;
      font-size: 20px;
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
                <a href="logout.php" class="user-dropdown-menu">Logout</a>
            </div>
        </div>
    </div>
  </nav>
</aside>
<main>
    <h1 class="mb-4 heading">Write Essay Test</h1>
<div class="container mt-5">
<div class = "Instructions">
      <h1>Instructions:</h1>
      <ol>
      <li>You will have 20 minutes to plan, write and revise an essay about the topic below. Your response will be judged on how well you develop a position, organize your ideas, present supporting details, and control the elements of standard written English. You should write 200-300 words.</li>
      </ol>
    </div>
<h3>Test <span id = "index">1</span></h3>
        <div class="timer">Time Left: <span id="timer">20:00</span></div>
        <p>Total Tests: 68</p>
        <div class="row">
            <div class="col-md-12">
                
                <p id="text" class="pragraph mt-2">Loading text...</p>
                <textarea id="summaryInput" class="form-control mt-3" required rows="4" placeholder="Your summary..." oninput="EnableSubmit()"></textarea>
            </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-12" id="aiScore">
            <h3>AI Scores</h3>
            <div id="Score">
            <p>Content: <span id="contentScore"></span></p>
            <p>Form: <span id="formScore"></span></p>
            <p>Grammar: <span id="grammarScore"></span></p>
            <p>Spelling: <span id="spellingScore"></span></p>
            <p>Vocabulary range: <span id="vocabularyScore"></span></p>
            <p>General linguistic range: <span id="linguisticScore"></span></p>
            <p>Development, structure and coherence: <span id="developmentScore"></span></p>
            <p>Your Score: <span id="totalScore"></span></p>
            <p>Max Score: 15</p>
            </div>
        </div>
                <div class="buttons">
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
const textElement = document.getElementById("text");
const summaryInput = document.getElementById("summaryInput");
const submitButton = document.getElementById("submitButton");
const nextButton = document.getElementById("nextButton");
const prevButton = document.getElementById("prevButton"); // Add the previous button
const timerElement = document.getElementById("timer");
const testIndexInput = document.getElementById("testIndex");
const goToTestButton = document.getElementById("goToTestButton");
const aiScore = document.getElementById("aiScore");
const testIndex = document.getElementById("index");
let timerDuration = 1200; // 5 minutes in seconds
let timerInterval;
let timerRunning = false;

const texts = [
"As the urban population grows, traffic is heavy and public areas such as parking lots are packed. What solutions do you think can address such problem?",
"cientists have been debating the impact of nature and nurture on people’s personality and behavior. Which one do you think has a greater influence?",
"Some people claim that competition improves the quality of our private and professional lives. Others believe that hyper competition is bad for society in general. What is your opinion?",
"As dealing money is such an important skill, all children should be taught financial management at school. Do you agree with it or not?",
"There is a current trend of paying teachers for students' achievements. Some people agree that it is an incentive for teachers to link students' achievements to teachers' salaries, while others disagree. What is your opinion?",
"Some people say the older are unsuitable to take part in some activities. Please give an example of the activities, and give the maximum age for it.",
"Exercise is essential for health, and exercise in the workplace makes employees less absent from work. All employers should provide exercise facilities in the workplace. What is your opinion?",
"Some people feel that success lies in achieving professional and economic targets, while others say that success lies in spending quality time with family and friends. What is your opinion?",
"Some believe the value of travel is overrated. Some talented people know things across the world without travel. People argue whether travel is or not a necessary part of education. To what extent do you agree with it?",
"While artificial intelligence becomes so advanced, people can use computers to translate foreign languages. That makes learning a foreign language unnecessary. Do you agree with it? Give examples or your experiences to support.",
"Living in the countryside or living in cities, which one do you prefer? Please use examples or your personal experience to support your opinion.",
"What are the advantages and the disadvantages of being over-competitive to individuals and society?",
"Advanced technology such as artificial intelligence can translate a foreign language easily. Do you think learning a foreign language is still necessary? Support your point of view with your own experience.",
"Should there be maximum wage for highly-paid people? Is it good or bad?",
"It is harder for children living in the 21st century than that in the past. How far do you agree with this statement? Give your opinions.",
"More and more countries spend large amount of money on the restoration of buildings instead of on modern housing. To what extent do you agree or disagree with this analysis? Support your writing with your experience or examples.",
"Some people think learning a foreign language at school should be compulsory. Do you agree with it? Use your experience or examples to support your viewpoint.",
"More and more women are raising a family with a career. Some people believe this is a challenge for women. Please give your opinions and suggestions about this challenge on a personal level and a national level.",
"Unemployment among young people is a serious problem.One solution has been suggested is to shorten the working week. What do you think are the advantages and disadvantages? Do you think this policy should apply to just young workers or the whole workforce？",
"People who are famous entertainers or sportspeople should give up the right to privacy, because this is the price of fame. To what extent do you agree/disagree with this point of view? Give your opinion with your experiences.",
"“In the future, people will work less hours at their jobs.” To what extent do you agree with it? Please support your opinion with your own experience.",
"Television serves many useful functions. It helps people to relax. Besides, it can also be seen as a companion for lonely people. To what extent do you agree with this? Explain it with your own experience.",
"In our technological world, the number of new inventions has been evolving on a daily basis. Please describe a new invention, and determine whether it will bring advantages or disadvantages.",
"Nowadays, more and more people engage in dangerous activities, such as skydiving, skiing and extreme motorcycling. Are you in favor of such activities or not? Why?",
"Nowadays, people believe that the environment influences their accomplishments. Some people think their success and accomplishment were influenced by the places where they grew up. Do you think the environment does or does not affect people’s accomplishment and how it affects? Please give an example of a famous person to support your statement.",
"For less developed countries, the disadvantages of tourism are as great as the advantages. What is your opinion?",
"Some people think human behavior can be changed by laws, while others think laws have little effect. What is your opinion?",
"Should marketing in companies which produce consumer goods like food and clothing, place emphasis on reputation of the company or short-term strategies like the discounts and special offers? Why?",
"Imagine you have been assigned on the study of climate change. Which area of climate change will you choose and why? Use examples.",
"Exams are commonly used in most schools and universities. Some people think exams should be replaced by other forms of assessment. Do you agree or disagree?",
"Wealthy nations are required to share their wealth with poorer countries. What is your opinion?",
"It is often argued that studying overseas is overrated. There are many scholars who study locally. To what extent do you agree with this？",
"Governments should not put too much attention on arts, such as theaters. Instead, they should allocate more funds to areas of concern, such as the technology research. Do you agree with this opinion or not? Use your own experience to support your idea.",
"What are the advantages of cheaper public transportation?",
"Some people argue that young people should concentrate on study or work, but some people think it is better to put energy in activities designed to broaden their experience, such as international travel and volunteering. Discuss with examples or cases.",
"Effective study requires time, comfort and peace. it is impossible to combine learning with employment because one may distract the other. To what extent do you think the statements are realistic? Give your opinion with examples.",
"Experience is the best teacher. Some people think life experiences teach people more effectively than books or formal education can. How far do you agree with this statement? Give your reason or provide your personal experience.",
"In a cashless society, people use more credit cards instead of cash. Cashless society seems to be a reality. How realistic do you think it might be? What are the benefits or problems of this phenomenon?",
"Being a journalist is one of the most difficult jobs in the world. To what extent, you agree with it?",
"Do you think that young people should be restricted on certain things that they cannot do until they reach the age of 25, such as driving or smoking? Give your opinion with your own experience.",
"Tourism is good for some less developed countries, but also has some disadvantages. Discuss.",
"With the increase of digital information available online, the role of the library has become obsolete. Universities should only procure the new materials rather than constantly update textbooks. Discuss both the advantages and disadvantages of this position and give your own point of view.",
"Do you think the design of buildings affects positively or negatively where people live and work?",
"Teenagers should receive lessons on principles of personal finance, such as investing and debt. To what extent do you agree with this statement?",
"Some people point that experiential learning (i.e. learning by doing it) can work well in formal education. However, others think a traditional form of teaching is the best. Do you think experiential learning can work well in high schools or colleges?",
"Some people claim that digital age has made us lazier, others claim it has made us more knowledgeable. Discuss both opinions, use examples to support.",
"Nowadays television has become an essential part of life. It is a medium for disseminating news and information, and for some it acts as a companion. What is your opinion about this?",
"Many people choose to emigrate to other countries. What are the advantages and disadvantages of living in a foreign country? Discuss with your own experience.",
"In your opinion, what are the advantages and disadvantages of extreme or adventure sports?",
"Many education systems assess students using formal written examinations. Those kinds of exams are a valid method. To what extent do you agree or disagree? Give examples with your own experience.",
"Nowadays, work leaves little time to people's personal life. How widespread do you think it is? How can we solve the problems caused by the shortage of time?",
"Employers involve workers in decision making process about products and services. What are the advantages and disadvantages of such a policy?",
"The world's governments and organizations confront a multitude of global problems. Which do you think is the most pressing problem for the inhabitants of our planet and give the solution?",
"It is argued that getting married before finishing studying or getting established in a good job is foolish. To what extent do you agree or disagree?",
"Climate change is a concerning global issue, and many people hold a negative attitude towards it. Who should take the responsibilities, governments, big companies or individuals?",
"Should parents be held legally responsible for the actions of their children? Support your opinion with personal examples.",
"Some universities deduct marks from students' work if it is given in late. What is your opinion? Suggest some alternative actions.",
"There are both problems and benefits for high school students to study plays and other works for theater that were written centuries ago. Use your own experience to discuss it.",
"Nowadays, people devote too much time to their job. This leaves very little time for their personal life. How widespread is the problem? What problem will this shortage of time cause?",
"Medical technology is responsible for increasing the average life expectancy. Do you think it is a blessing or a curse?",
"In many towns and cities, large shopping malls are replacing small local shops. Do you think this is a positive development? Give your reasons and examples.",
"Should marketing for consumer goods companies like clothing and food emphasize reputation or shortterm strategies like discounts and special offers?",
"Mass media, such as TV, radio and newspapers, has an influence on people, particularly on younger generations. It plays a pivotal role in shaping the opinions of people, especially teenagers and young people. Do you agree with this? Please give examples.",
"As cities expand, governments should look forwards to creating better networks of public transport available for everyone rather than building more roads for vehicle owning population. To what extent do you agree or disagree？Give some examples or experience to support your opinion.",
"The information revolution brought about by modern mass media has both positive and negative consequences to individuals and society. To what extent do you agree with this statement? Discuss with your own experience.",
"In the past 100 years, there have been many inventions such as antibiotics, airplanes and computers. What do you think is the most important one? Why?",
"Nowadays, it is increasingly more difficult to maintain the right balance between work and the other aspects of one’s life, such as leisure pursuits with family members. How important do you think this balance is? What are the reasons that make some people think that this is hard to achieve？",
"In many countries, the birth rates are low, and the problems of ageing are serious. What are the causes and the effects of this phenomenon? What are the solutions?"

];

let currentTextIndex = 0;

function startTimer() {
    timerRunning = true; // Timer is running
    timerInterval = setInterval(updateTimer, 1000);
}

function updateTimer() {
    const minutes = Math.floor(timerDuration / 60);
    const seconds = timerDuration % 60;
    const formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    timerElement.textContent = formattedTime;

    if (timerDuration === 0) {
        clearInterval(timerInterval);
        timerElement.textContent = "Time's up!";
        submitButton.disabled = false;
        summaryInput.disabled = true;
        timerRunning = false; // Timer is not running
    }

    timerDuration--;
}

function updateText() {
    if (texts) {
        const currentText = texts[currentTextIndex];
        textElement.textContent = currentText;
    }
}
function displayScores(scores) {
    // Display the individual scores
    document.getElementById("contentScore").textContent = scores.content;
    document.getElementById("formScore").textContent = scores.form;
    document.getElementById("grammarScore").textContent = scores.grammar;
    document.getElementById("vocabularyScore").textContent = scores.vocabulary;
    document.getElementById("spellingScore").textContent = scores.spelling;
    document.getElementById("linguisticScore").textContent = scores.linguistic;
    document.getElementById("developmentScore").textContent = scores.development;
    // Calculate and display the total score
    const totalScore = parseInt(scores.content) + parseInt(scores.form) + parseInt(scores.grammar) + parseInt(scores.vocabulary) + parseInt(scores.spelling) + parseInt(scores.linguistic) + parseInt(scores.development);
    document.getElementById("totalScore").textContent = totalScore;
}
submitButton.addEventListener("click", function() {
    summaryInput.disabled = true;
    submitButton.disabled = true;

    // Implement logic to evaluate the user's summary based on the defined criteria
    const userSummary = summaryInput.value; // Get the user's summary

    // Example: Calculate scores (You can replace this with your scoring logic)
    const contentScore = calculateContentScore(userSummary);
    const formScore = calculateFormScore(userSummary);
    const grammarScore = calculateGrammarScore(userSummary);
    const vocabularyScore = calculateVocabularyScore(userSummary);
    const spellingScore = calculateSpellingScore(userSummary);
    const linguisticScore = calculateLinguisticScore(userSummary);
    const developmentScore = calculateDevelopmentScore(userSummary);
    // Display the scores
    const scores = {
        content: `${contentScore}/3`,
        form: `${formScore}/2`,
        grammar: `${grammarScore}/2`,
        vocabulary: `${vocabularyScore}/2`,
        spelling: `${spellingScore}/2`,
        linguistic: `${linguisticScore}/2`,
        development: `${developmentScore}/2`
    };
    displayScores(scores);

    // Calculate the total score based on the individual scores
    const totalScore = contentScore + formScore + grammarScore + vocabularyScore;
    document.getElementById("totalScore").textContent = totalScore;

    clearInterval(timerInterval); // Stop the timer
    timerRunning = false;
    aiScore.style.display = "block";
});

function calculateContentScore(userSummary) {
    // Implement your content scoring logic here and return a score out of 2
    // You might check for relevance, inclusion of key points, etc.
    // For this example, let's assume a random score between 0 and 2.
    return Math.floor(Math.random() * 4); // Random score between 0 and 2
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
function calculateLinguisticScore(userSummary) {
    // Implement your vocabulary scoring logic here and return a score out of 2
    // You might check for the richness and appropriateness of vocabulary.
    // For this example, let's assume a random score between 0 and 2.
    return Math.floor(Math.random() * 3); // Random score between 0 and 2
}
function calculateDevelopmentScore(userSummary) {
    // Implement your vocabulary scoring logic here and return a score out of 2
    // You might check for the richness and appropriateness of vocabulary.
    // For this example, let's assume a random score between 0 and 2.
    return Math.floor(Math.random() * 3); // Random score between 0 and 2
}
function EnableSubmit() {
    submitButton.disabled = false;
}

nextButton.addEventListener("click", function () {
    currentTextIndex = (currentTextIndex + 1) % texts.length;
    updateText();
    timerDuration = 1200; // Reset timer
    summaryInput.value = ""; // Clear textarea
    summaryInput.disabled = false; // Enable textarea
    clearInterval(timerInterval);
    startTimer();
    hideaiscore();
    testIndex.innerText = currentTextIndex + 1;
    submitButton.disabled = true;
});

prevButton.addEventListener("click", function () {
    currentTextIndex = (currentTextIndex - 1 + texts.length) % texts.length;
    updateText();
    timerDuration = 1200; // Reset timer
    summaryInput.value = ""; // Clear textarea
    summaryInput.disabled = false; // Enable textarea
    clearInterval(timerInterval);
    startTimer();
    hideaiscore();
    testIndex.innerText = currentTextIndex + 1;
    submitButton.disabled = true;
});

updateText();
startTimer();

function hideaiscore() {
    aiScore.style.display = "none";
}

function getRandomScore() {
    return Math.floor(Math.random() * (100 - 50 + 1)) + 50; // Random score between 50 and 100
}

hideaiscore();

function goToTestByIndex(index) {
    if (index >= 1 && index <= texts.length) {
        currentTextIndex = index - 1;
        updateText();
        timerDuration = 1200; // Reset timer
        summaryInput.value = ""; // Clear textarea
        summaryInput.disabled = false; // Enable textarea
        clearInterval(timerInterval);
        startTimer();
        hideaiscore();
        testIndex.innerText = currentTextIndex + 1;
        submitButton.disabled = true;
    } else {
        alert("Invalid test index. Please enter a valid test index.");
    }
}

// Event listener for the "Go to Test" button
goToTestButton.addEventListener("click", function () {
    const index = parseInt(testIndexInput.value);
    testIndex.innerText = currentTextIndex + 1;
    goToTestByIndex(index);
});

  </script>
</body>

</html>