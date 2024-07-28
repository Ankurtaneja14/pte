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
      font-size: 18px;
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
      <h1 class="heading">Fill in the Blanks</h1>
      <div class="container">
      <div class = "Instructions">
      <h1>Instructions:</h1>
      <ol>
      <li>There are some words missing in the following text. Please select the correct word in the drop-down box.</li>
      </ol>
    </div>
        <h3>Test <span id = "index">1</span></h3>
        <p>Total Tests: 194</p>
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
        const testIndex = document.getElementById("index")
          const result = document.getElementById("results")
          const Score = document.getElementById("aiScore")
          const testIndexInput = document.getElementById("testIndex");
    const goToTestButton = document.getElementById("goToTestButton");
          let currentQuestionIndex = 0; // Track the current question index
          const questions = [
    {
    text: "Crime prevention has a long history in Australia, and in other parts of the world. In all societies, people have tried to ________ themselves and those close to them from assaults and other abuses. Every time someone locks the door to their house or their car, they practice in ________ of prevention. Most parents want their children to learn to be law abiding and not spend extended periods of their lives in prison. In this country, at least, most ________ . Only a small minority of young people become recidivist offenders. In a functioning society, crime prevention is part of everyday life. While prevention can be all- pervasive at the grassroots, it is oddly neglected in mass media and political discourses. When politicians, talkback radio hosts and newspaper editorialists pontificate about crime and ________ remedies, it is comparatively rare for them to mention prevention. Overwhelmingly, emphasis is on policing, sentencing and other 'law and order' responses ."",
    options: [
    ["promote", "respect", "protect", "enhance"],
    ["part of", "a form of", "relation to", "addition to"],
    ["succeeding", "success", "succeed", "successful"],
    ["default", "possible", "articulate", "absolute"]
    ],
    answer: []
    },
    {
    text: ""International trade allows countries to expand their markets and access goods and services that ________  may not have been available domestically. As a ________ of international trade, the market is more efficient. This ultimately leads to more competitive pricing and brings ________  products to consumers."",
    options: [
    ["either", "thus", "otherwise", "likey"],
    ["result", "prelude", "degree", "delegation"],
    ["heaper", "newer", "all", "novel"]
    ],
    answer: []
    },
    {
    text: ""Steven Pinker, a cognitive psychologist best known for his book The Language Instinct, has called music auditory cheesecake, an exquisite confection crafted to tickle the sensitive spots of at least six of our mental faculties. If it vanished from our species, he said, the rest of our lifestyle would be ________  unchanged. Others have argued that, on the ________  , music, along with art and literature, is part of what makes people human; its absence would have a brutalizing effect. Philip Ball, a British science writer and an ________ music enthusiast, comes down somewhere in the middle. He says that music is ________ in our auditory, cognitive and motor functions. We have a music instinct as much as a language instinct, and could not rid ourselves of it if we tried .",
    options: [
    ["rarely", "cynically", "nearing", "virtually"],
    ["end", "contrary", "whole", "top"],
    ["pretentious", "presumptuous", "ambitious", "avid"],
    ["enacted", "installed", "empowered", "ingrained"]
    ],
    answer: []
    },
    {
    text: "The Plains Indians were people who did not like to live in one place. They liked to travel around and moved camps ________ three times a year. For this reason they lived in tepees. These were ________ big tents and were easy to put up and take down. These tepees were transported by horses. Inside the tepee you would find all the items that people needed to live with. The Plains Indians would decorate the insides with pictures, and store their weapons and food. The Indians would also have a fire ________ of the tepee to cook the food. The Sioux people ________  put buffalo skins on the floor to use as carpets. You would also find their beds. In the Indian camp everyone had a job to do. The men had to hunt for food, and keep the families safe. The women had to cook all the meals, make the clothes, ________  the children and whenever the camp moved they had to take down and put up the tepees.",
    options: [
    ["at least", "fewer than", "at most", "less than"],
    ["both", "alike", "like", "otherwise"],
    ["On the top", "In spite", "in the middle", "in terms"],
    ["akin to", "preferred", "used to", "have yet to"],
    ["stand for", "take care", "look after", "sit about"]
    ],
    answer: []
    },
    {
    text: "The Dag Hammarskjold Library at United Nations Headquarters in New York is a library designated to facilitate the work of the United Nations and ________ mainly on the needs of the UN Secretariat and diplomatic missions. Anyone with a valid United Nations Headquarters grounds ________  , including specialized agencies, accredited media and NGO staff, are able to visit the library. Due to ________  constraints in place at the United Nations Headquarters complex, the library is not open to the general ________ ",
    options: [
    ["falls", "depends", "focuses", "pelts"],
    ["pass", "cover", "deposit", "brochure"],
    ["security", "economic", "scale", "health"],
    ["view", "aim", "public", "category"]
    ],
    answer: []
    },
    {
    text: ""Coral reefs ________ more marine life than any other ocean ecosystem and are, not ________ , a favorite pursuit for many divers. But as well as being physically and biologically spectacular, coral reefs also sustain the livelihoods of over half a billion people . What is more, this number is expected to ________  in the coming decades while the area of high-quality reef is expected to halve. In combination with the very real threat of climate change, which could lead to increased seawater temperatures and ocean acidification , we start to arrive at some quite frightening scenarios .",
    options: [
    ["curb", "harvest", "support", "cultivate"],
    ["seemingly", "specifically", "demandingly", "surprisingly"],
    ["appear", "double", "countdown", "unravel"]
     ],
     answer: []
     },
    {
    text: "There has been a great variety of critical approaches to Shakespeare's work since his death. During the 17th and 18th century, Shakespeare was both admired and condemned. Since then, much of the adverse criticism ________ considered relevant, although certain issues have continued to interest critics throughout the years. For instance, charges against his moral propriety were made by Samuel Johnson in the 18th century and by George Bernard Shaw in the 20th. Early criticism was directed ________ at questions of form. Shakespeare was criticized for mixing comedy and tragedy and failing to observe the unities of time and place ________  by the rules of classical drama. Dryden and Johnson were among the critics claiming that he had ________ the language with false wit, puns, and ambiguity. ________ some of his early plays might justly be charged with a frivolous use of such devices, 20th-century criticism has tended to praise their use in later plays as adding depth and resonance of meaning.",
    options: [
    ["not being", "would have not been", "has not been", "was not"],
    ["consecutively", "primarily", "hardly", "solely"],
    ["subscribed", "documented", "described", "prescribed"],
    ["versed", "referred", "transverse", "corrupted"],
    ["Since", "Because", "That", "While"]
    ],
    answer: []
    },
    {
    text: "Bhutan used to be one of the most isolated nations in the world. Developments including direct international flights, the Internet, mobile phone networks, and cable television have ________  modernized the urban areas of the country. Bhutan has ________ modernization with its ancient culture and traditions under the guiding philosophy of Gross National Happiness (GNH). Rampant ________ of the environment has been avoided. The government takes great ________ to preserve the nation's traditional culture, identity and the environment. In 2006, Business Week magazine rated Bhutan the happiest country in Asia and the eighth-happiest in the world, ________ a global survey conducted by the University of Leicester in 2006 called the 'World Map of Happiness'.",
    options: [
    ["spontaneously", "increasingly", "contemporarily", "mechanically"],
    ["juggled", "opted", "balanced", "altered"],
    ["destruction", "embodiment", "vanity", "execution"],
    ["pride", "measures", "effects", "allowance"],
    ["submitting", "citing", "reviewing", "proving"]
    ],
    answer: []
    },
    {
    text: "Spanish is spoken by more than 300 million people in over 20 countries and is rapidly becoming one of the most popular ________  for language learners around the world. A popular course for beginners, Suenos World Spanish is designed to ________ the varied needs of adult learners, ________ learning at home or in a class. From the very beginning it encourages you to develop your listening and speaking skills with confidence and provides many opportunities to practice reading in Spanish. Using the extensive ________ of media available, from the course book to the audio CDs or cassettes, to the popular accompanying television series and free online ________ , Suenos World Spanish can help you reach the equivalent level of a first qualification, such as GCSE.",
    options: [
    ["commodities", "choices", "records", "improvements"],
    ["record", "meet", "choose", "satisfies"],
    ["as", "whether", "nor", "not"],
    ["series", "range", "rate", "wisdom"],
    ["actions", "activities", "breaches", "binge"]
    ],
    answer: []
    },
    {
    text: "An important corollary of this focus on language as the window to legal epistemology is the central role of ________ to law and other sociocultural processes. In particular, the ________ that people hold about how language works combine with ________  structuring to create powerful, often unconscious effects. In recent years, linguistic anthropologists have made much progress in developing more precisely analytic tools for tracking those effects .",
    options: [
    ["discourse", "epoch", "dialect", "acquaintance"],
    ["deviation", "besmirch", "consent", "ideas"],
    ["mandatory", "linguistic", "legitimate", "customary"]
    ],
    answer: []
    },
    {
    text: "The widespread use of artificial light in modern societies means that light pollution is an increasingly common feature of the environments humans inhabit. This type of pollution is ________ high in coastal regions of tropic and temperate zones, as these are areas of high rates of human population growth and settlement. Light pollution is a threat for many species that inhabit these locations, particularly those whose ecology or behavior depends , ________ , on natural cycles of light and dark. Artificial light is known to have detrimental effects on the ecology of sea turtles, particularly at the hatchling stage when they emerge from nests on natal beaches and head towards the sea. Under natural conditions, turtles hatch predominantly at night (although some early morning and late afternoon emergence occurs) and show an innate and well-directed orientation to the water, ________ mostly on light cues that attract them toward the brighter horizon above the sea surface. Artificial lighting on beaches is strongly attractive to hatchlings and can cause ________ from the sea and interfere with their ability to orient in a constant direction. Ultimately, this disorientation due to light pollution can lead to death of hatchlings from exhaustion, dehydration and predation .",
    options: [
    ["exceptionally", "absolutely", "completely", "rarely"],
    ["in no way", "in some way", "by the way", "in some ways"],
    ["imposing", "figuring", "relying", "pouring"],
    ["them to move", "it to move", "which to move", "that to move"]
    ],
    answer: []
    },
    {
    text: "Kathryn Mewes does not meet bohemian, hippy parents in her line of work. Typically one, or both, of the parents she sees work in the City of London. 'Professionals seek professionals,'' she says. Originally a nanny, Mewes is now a parenting consultant, advising couples privately on changing their child's behavior, ________ doing corporate seminars for working parents. Her clients find they are unprepared for the chaos and unpredictability that having a child can entail .'Parents are getting older, they have been in control their ________ lives and been successful. Suddenly a baby turns up and life turns on its head.' Nicknamed the 'Three-Day Nanny ' ________ her pledge to fix behavioral problems in children under the age of 12 within three days, she is filming a new Channel 4 television series demonstrating her techniques. The ________ of the parenting consultant - distinct from that of a nanny - has developed, she says, as people are used to buying in expertise, such as personal trainers or, in her case, parenting advice .",
    options: [
    ["as long as", "in order to", "in spite of", "as well as"],
    ["whole", "all", "full", "every"],
    ["related with", "together with", "because of", "according to"],
    ["percentage", "performance", "role", "belief"]
    ],
    answer: []
    },
    {
    text: "Bhutan is the last standing Buddhist Kingdom in the World and, until recently, has preserved much ________ their culture since the 17th century by avoiding globalization and staying isolated from the world. Internet, television, and western dress were ________ from the country up until ten years ago. But over the past ten years globalization has begun to change in Bhutan, but things remain perfectly balanced. Bhutan is the only country in the world that has a 'GNH.' You may think GNH is just another ________  based term with no real-life application, but it refers to 'Gross National Happiness.' The process of measuring GNH began when Bhutan opened to globalization. It measures people's quality of life, and makes sure that 'material and spiritual development happen together.' Bhutan has done an amazing Job of finding this balance. Bhutan has continually been ranked as the happiest country in all of Asia, and the eighth Happiest Country in the world according to Business Week. In 2007 Bhutan had the second fastest growing GDP in the world, at the same time as ________  their environment and cultural identity.",
    options: [
    ["of", "about", "to", "for"],
    ["summoned", "observed", "displayed", "banned"],
    ["statistically", "barely", "overwhelmingly", "roughly"],
    ["demeaning", "intruding", "maintaining", "mourning"]
    ],
    answer: []
    },
    {
    text: "Dance has played an important role in many musicals. In some ________ , dance numbers are included as an excuse to add to the color and spectacle of the show, but dance is more effective when it forms an integral part of the ________ . An early example is Richard Rodgers On Your Toes(1936) in which the story about classical ballet meeting the world of jazz enabled dance to be introduced in a way that ________ , rather than interrupting the drama .",
    options: [
    ["dimensions", "cases", "brief", "extent"],
    ["prowess", "plot", "phenomenon", "roundabout"],
    ["encumbers", "enhances", "levels", "crumples"]
    ],
    answer: []
    },
    {
    text: "Your teenage daughter gets top marks in school, captains the debate team, and volunteers at a shelter for homeless people. But while driving the family car, she text-messages her best friend and rear-ends another vehicle. How can teens be so clever, accomplished, and responsible-and reckless ________  Easily, according to two physicians at Children's Hospital Boston and Harvard Medical School (HMS) who have been ________  the unique structure and chemistry of the adolescent brain .The teenage brain is not just an ________ brain with fewer miles on it, says Frances E. Jensen, a professor of neurology. It's a paradoxical time of ________ . These are people with very sharp brains, but they're not quite sure what to do with them. Research during the past 10 years, powered by technology such as functional magnetic resonance imaging, has revealed that young brains have ________ fast-growing synapses and sections that remain unconnected . This leaves teens easily influenced by their environment and more prone to impulsive behavior, even without the ________ of souped-up hormones and any genetic or family predispositions.",
    options: [
    ["for the time being", "at the same time", "as ever", "in good time"],
    ["exposing", "exploring", "enumerating", "explaining"],
    ["ample", "adult", "adulthood", "abundant"],
    ["enrichment", "development", "adornment", "adoration"],
    ["both", "few", "whole", "either"],
    ["impact", "impress", "impair", "impose"]
    ],
    answer: []
    },
    {
    text: "Digital media and the internet have made the sharing of texts, music and images easier than ever, and the ________ of copyright restriction harder. This situation has encouraged the growth of IP law, and ________  increased industrial concentration on extending and 'policing' IP protection, while also leading to the growth of an 'open access', or 'creative commons' movement which ________ such control of knowledge and ________", 
    options: [
    ["detriment", "solstice", "enforcement", "commissary"],
    ["straggled", "prompted", "equated", "grappled"],
    ["challenges", "hankered", "allows", "compelled"],
    ["comparison", "penmanship", "quotient", "creativity"]
    ],
    answer: []
    },
    {
    text: "Because the instructional methods, expected class participation and the nature of the courses vary, no fixed number of absences is ________  to all situations. Each instructor is ________  for making clear to the class at the beginning of the semester his or her ________ and procedures in ________ to class attendance and the reasons for them.",
    options: [
    ["applicable", "exceptional", "ubiquitous", "exempt"],
    ["respectful", "sensitive", "responsible", "negligible"],
    ["stereotypes", "policies", "features", "tempers"],
    ["addition", "regard", "proportion", "correspondence"]
     ],
     answer: []
     },
    {
    text: "The speed of sound (otherwise known as Mach 1) varies with temperature. At sea level on a 'standard day', the temperature is 59°F, and Mach 1 is approximately 761 mph. As the altitude increases, the temperature and speed of sound ________ decrease until about 36,000 feet, after which the temperature ________ steady until about 60,000 feet. Within that 36,000 – 60,000 foot range, Mach 1 is about 661 mph. Because of the ________  , it is possible for an airplane flying supersonic at high altitude to be slower than a subsonic flight at sea level. The transonic band (the 'sound barrier') extends ________ around Mach 0.8 — when the first supersonic shock waves ________ the wing — to Mach 1.2, when the entire wing has gone supersonic .",
    options: [
    ["not", "yet", "none", "both"],
    ["opposes", "remains", "plots", "mutates"],
    ["variety", "variation", "ventilation", "vibration"],
    ["near", "from", "with", "over"],
    ["diverge from", "add to", "prevent from", "form on"],
    ],
    answer: []
    },
    {
    text: "A creature may have fine physical defenses such as hard armor or sharp spines. It may have powerful chemical defenses such as an ________ smell or a foul taste but non of these defenses is much used in the ________ for survival unless the animal also has the right behavior to go with it. Evolution ________ a living creature’s size and color, and it also shapes an animal’s actions and behavioral patterns. The most ________ behaviors are instinctive or in-built. In other words, the creatures can perform the actions without having to learn what to do by ________  and error.",
    options: [
    ["agreeable", "enchanting", "ordinary", "appalling"],
    ["struggle", "march", "game", "campaign"],
    ["shapes", "pieces", "features", "aspects"],
    ["dangerous", "automatic", "difficult", "ascetic"],
    ["attempt", "doing", "trial", "tasting"]
    ],
    answer: []
    },
    {
    text: "Research demonstrates that facial appearance affects social perceptions. The current research investigates the reverse ________ : Can social perceptions influence facial appearance? We examine a social tag that is associated with us early in life — our given name. The hypothesis is that name stereotypes can be manifested in facial appearance, producing a face-name matching effect, ________  both a social perceiver and a computer are able to accurately match a person’s name to his or her face. In 8 studies we demonstrate the ________ of this effect, as participants examining an unfamiliar face accurately select the person’s true name from a list of several names, significantly above chance level. We replicate the effect in 2 countries and find that it extends ________ the limits of socioeconomic cues. We also find the effect using a computer-based paradigm and 94,000 faces. In our exploration of the underlying mechanism, we show that existing name stereotypes produce the effect, as its occurrence is culture-dependent. A self-fulfilling ________ seems to be at work, as initial evidence shows that facial appearance regions that are controlled by the individual (e.g., hairstyle) are ________ to produce the effect, and socially using one’s given name is necessary to generate the effect. Together, these studies suggest that facial appearance represents social expectations of how a person with a specific name should look. In this way a social tag may influence one’s facial appearance.",
    options: [
    ["link", "possibility", "oddness", "polarity"],
    ["notwithstanding", "ever", "whereby", "despite"],
    ["indolence", "evanescence", "existence", "transience"],
    ["into", "beyond", "within", "by"],
    ["prophecy", "observation", "preference", "stipulation"],
    ["sufficient", "proficient", "efficient", "scant"]
    ],
    answer: []
    },
    {
    text: "First, the scientific community that studies climate change is quietly panic-stricken, because things are moving much faster than they expected. Greenhouse gas emissions are going up faster than ________  both from industrializing countries in Asia and from melting permafrost in Siberia and Canada. The Arctic Sea ice is melting so fast that the whole ocean may be ice-free in late summer in five years' time. Most climate scientists now see last year's report of the Intergovernmental Panel on Climate Change, whose forecasts are used by most governments for planning purposes, as a ________ historical document. Second, the biggest early impact of global warming will be on the food supply, both locally and globally. When the global average temperature hits one and a half degrees hotter - and it will; the carbon dioxide already in the atmosphere ________ us to that much warming - some countries will no longer be able to feed their people. Others, further from the equator, will still have enough food for themselves, but none to ________",
    options: [
    ["prediction", "predictability", "predicted", "predicts"],
    ["purely", "evenly", "disproportionately", "seemingly"],
    ["commits", "commit", "committing", "committed"],
    ["spare", "end", "apply", "span"]
    ],
    answer: []
    },
    {
    text: "Short-term memory (STM) can hold information anywhere between 15-30 seconds. According to Miller's Magical Number Seven (1956), short-term memory has a limited capacity, ________ to store 5 to 9 items simultaneously . ________ , if we hear concepts or ideas repeatedly in an audio form we can acoustically encode the information. It is a process referred to as "rehearsal", thereby ________ it to our long-term memories .",
    options: [
    ["being able", "is able", "unable", "be able"],
    ["Somewhere", "Moreover", "However", "So"],
    ["commit", "committing", "committed", "commits"]
     ],
     answer: []
     },
    {
    text: "As digitalization and smart automation progress, many will see their jobs altered. Advances in automation technologies will mean that people will ________ work side by side with robots, smart automation and artificial intelligence. Businesses will look for employees who are good at the tasks that smart automation ________ to do and that add value to the use of smart automation. In the past, technological progress has had a positive impact on our society, increasing labour productivity, wages and prosperity. Right now, a new technological wave of digitalization and smart automation — ________ of artificial intelligence, robotics and other technologies — is fundamentally transforming the way we work, at an unprecedented pace. ________ , data analytics, the Internet of Things and drones are already used in many industries to make production processes better, faster, and cheaper. We already see shifts in the structure of employment: in industries, tasks, educational levels and skills.",
    options: [
    ["increase", "increasingly", "increasing", "increased"],
    ["struggled", "struggling", "struggles", "used to struggle"],
    ["combinations", "combines", "combining", "combine"],
    ["Instead", "Of course", "No wonder", "For example"]
    ],
    answer: []
    },
    {
    text: "Disadvantage in early childhood poses multiple risks to children's development. Factors such as low socioeconomic status, long-term unemployment of parents, and social isolation may have lasting ________  on a child's chance of reaching their full potential. Whilst not eliminating disadvantage, preschool education can help to ________ the effects of these risk factors and can provide children with a better start in school. However, some of these factors may also be ________ to preschool attendance for groups that would benefit most from preschool education. In Australia, the early years of children's education is the responsibility of many government and non-government agencies and it occurs in a range of settings. Preschool is aimed at children around four years of age to ________ them for compulsory schooling from the age of six years. In most states and territories, children can start full- time schooling at five years of age, when they enroll in a kindergarten or preparatory year. In 2001, just over half of five-year olds (57%) were at school with about a third (34%) attending preschool. While in some states and territories children can ________  preschool before they turn four, participation rates for three-year olds are much lower than four-year olds (24% compared with 56% for four-year olds in 2001). The preschool participation rate of four-year olds in 2001 (56%) was similar to the rate in 1991 (58%).",
    options: [
    ["impressions", "impacts", "affects", "variations"],
    ["lessen", "hold", "hoist", "enlarge"],
    ["barriers", "roundabouts", "accesses", "assessments"],
    ["undo", "fix", "tie", "prepare"],
    ["commence", "alter", "delay", "escape"]
    ],
    answer: []
    },
    {
    text: "In this role, due to their working heritage, Border Collies are very demanding, playful, and energetic. They thrive best in households that can provide them with plenty of play and exercise, either with humans or other dogs. Due to their demanding personalities and need for mental ________ and exercise, many Border Collies develop problematic behaviors in households that are not able to provide for their needs. They are infamous for chewing holes in walls and furniture, and ________ scraping and hole digging, due to boredom. Border Collies may exhibit a strong desire to herd, a trait they may show with small children, cats, and other dogs. The breed's herding trait has been deliberately encouraged, as it was in the dogs from which the Border Collie was developed, by selective breeding for many generations. However, being ________ trainable, they can live amicably with other pets if given proper socialization training. The American Border Collie Association recommends that potential owners, before taking on the breed as a household pet, should be sure they can provide regular exercise ________ with the collie's high energy and prodigious stamina. A working collie may run many miles a day, using its experience, personality and intelligence to control challenging livestock. These dogs will become ________ and frustrated if left in isolation, ignored or inactive. Like many working breeds, Border Collies can be motion-sensitive and may chase moving vehicles and bicycles, but this behavior can be modified by training. Some of the more difficult behaviors require patience, as they are developmental and may disappear as the dog matures.",
    options: [
    ["establishment", "estimation", "stimulation", "condition"],
    ["abrupt", "mild", "destructive", "periodical"],
    ["whole", "mostly", "eminently", "minor"],
    ["commensurate", "collaborative", "collective", "evenly"],
    ["tossed", "pinched", "distressed", "consistent"]
    ],
    answer: []
    },
    {
    text: "The primary goal for this year-long campaign, founded by the English lawyer Peter Benenson and a small group of writers, academics and lawyers including Quaker peace activist Eric Baker, was to identify individual prisoners of conscience around the world and then campaign for their release. In early 1962, the campaign had received enough public support to become a permanent organization and was ________  Amnesty International. Under British law, Amnesty International was classed as a political organization and therefore excluded from tax-free charity status. To work around this, the Fund for the Persecuted was established in 1962 to receive donations to support prisoners and their families. The name was later changed to the Prisoners of Conscience Appeal Fund and is now a separate and independent charity which provides relief and ________ grants to prisoners of conscience in the UK and around the world. Amnesty International has, since its founding, pressured governments to release those persons it considers to be prisoners of conscience. Governments, conversely, tend to deny that the specific prisoners identified by Amnesty International are, in fact, being held on the grounds Amnesty claims; they allege that these prisoners pose ________ threats to the security of their countries. The concept of Prisoners of conscience became a controversy around Nelson Mandela's ________ ",
    options: [
    ["recharged", "renamed", "refunded", "erased"],
    ["engagement", "measurement", "illusion", "rehabilitation"],
    ["raw", "genuine", "radiated", "trivial"],
    ["imprisonment", "felon", "redemption", "redundancy"]
    ],
    answer: []
    },
    {
    text: "Research from the Terry College of Business reveals ________ a happy, helpful employee takes effort and, eventually, that effort ________  the energy needed to do one’s job. It could lead to quiet quitting – the new term for just doing your job but not going above and beyond – or even actual quitting. The more people adjust their moods to be happy, the fewer emotional resources they have ________ the end of the day. That means they are less able to handle challenging tasks and interactions and have a harder time staying on task. Their tank is empty despite being in a good mood, Frank explained. For managers, this means it may make more sense to meet employees ________ they are emotionally and not force upbeat attitudes in the office. For employees, it may mean letting bad days happen and leaving more mood- demanding work — such as sales calls or tough conversations — for better days.",
    options: [
    ["becomes", "becoming", "become", "become to"]
    ["concludes", "erodes", "expects", "collects"],
    ["at", "since", "by", "for"],
    ["where", "which", "what", "that"]
    ],
    answer: []
    },
    {
    text: "Team Lab's digital mural at the entrance to Tokyo’s Skytree, one of the world’s monster skyscrapers, is 40 meters long and immensely detailed. But ________ massive this form of digital art becomes — and it's a form ________ rampant inflation — Inoko's theories about seeing are based on more modest and often pre-digital sources. An early devotee of comic books and cartoons (no surprises there), then computer games, he recognized when he started to look at traditional Japanese art that all those forms had something ________ : something about the way they captured space. In his discipline of physics, Inoko had been taught that photographic lenses , ________ the conventions of western art, were the logical way of transforming three dimensions into two, conveying the real world onto a flat surface. ________ Japanese traditions employed 'a different spatial logic', as he said in an interview last year with j- collabo.org, that is 'uniquely Japanese'.",
    options: [
    ["however", "whatever", "whenever", "wherever"],
    ["subject to", "related with", "apart from", "based on"],
    ["in fact", "as whole", "in common", "in the same terms"],
    ["apart from", "further afield", "along with", "out of"],
    ["Thus", "So", "Therefore", "But"]
    ],
    answer: []
    },
    {
    text: "Some birds of prey have learned to control fire, a ________  previously thought to be unique to humans. The birds appear to deliberately spread wildfires in order to ________ out prey. The finding suggests that birds may have ________  us to the use of fire.",
    options: [
    ["question", "profile", "tale", "skill"],
    ["prevent", "limit", "span", "flush"],
    ["prophesied", "beaten", "transmitted", "forced"]
    ],
    answer: []
    },
    {
    text: "Light is usually described as a form of energy and it is indeed a kind of electromagnetic energy, not much different from radio waves, television signals, heat, and X-rays. All of these are made up of waves that ________  , bend, interfere with one another, and react with obstacles in their path, rather like waves in water. A physicist might tell you that light, along with all its electromagnetic relatives, is really a form of matter, little different from more ________ matter such as houses and, like them, it is made up of individual particles. Light particles, called photons, travel in streams, similar to the way in which water pours through a hose. To most people, this might sound paradoxical or illogical, as many things to do with physics seem to these days. How can light be both energy and matter, wave and particle? The reason it can be is, in fact, not at all ________  : all energy is a form of matter. Almost everybody recognizes — even if they do not understand — Einstein’s famous equation, E =mc2, which spells it out: E refers to energy and m to the mass of matter. Furthermore, all matter has some of the characteristics of waves and some of the particles, but the waves of such solid-seeming things as houses are not ________ and can generally be ignored because ordinary matter acts as if it were made up of particles.",
    options: [
    ["spread", "curve", "occur", "inflict"],
    ["invisible", "valuable", "abstract", "substantial"],
    ["apparent", "complicated", "abrupt", "implicit"],
    ["responsible", "accurate", "discernible", "consecutive"]
    ],
    answer: []
    },
    {
    text: "The heart functions as a pump at the centre of the circulatory system. In humans it is located in the chest cavity, between the lungs, ________ to the left. The heart consists of four chambers surrounded by a very strong muscular wall, the myocardium. The upper chambers, the right and left atria, ________  blood entering the heart, and the lower chambers, the right and left ventricles pump the blood out of the heart, via the pulmonary and the systemic circulatory systems. The two systems work as ________ . Blood from the body enters the right atrium, ________ passed into the right ventricle and from there is propelled through the pulmonary artery to the lungs. In the lungs the blood releases carbon dioxide and absorbs oxygen and is then ________ back to the heart into the left atrium. From here it passes into the left ventricle, which pumps the oxygenated blood around the body.",
    options: [
    ["compared", "rather than", "a bit", "less than"],
    ["lower", "receive", "repel", "transfer"],
    ["well", "followed", "follows", "follow"],
    ["being", "is", "has", "had"],
    ["transporting", "transported", "transport", "having transported"]
    ],
    answer: []
    },
    {
    text: "Many people today think of culture in the way that it was thought of in Europe during the 18th and early 19th centuries. This ________ of culture reflected inequalities within European societies and their colonies around the world. This understanding of culture equates culture with civilization and contrasts both with nature or non-civilization. According to this understanding of culture, some countries are more civilized than others, and some people are more cultured than others. Anything that doesn’t ________ into this category is labeled as chaos or anarchy. From this perspective, culture is closely tied to cultivation, which is the progressive refinement of human ________ . In practice, culture referred to elite goods and activities such as haute cuisine, high fashion or haute couture, museum-caliber art and classical music. The word cultured referred to people who knew about and took part in these activities. For example, someone who used culture in this sense might ________ that classical music is more refined than music by working-class people, such as jazz or the indigenous music traditions of aboriginal peoples .",
    options: [
    ["classification", "concept", "renovation", "identity"],
    ["cut", "dismiss", "fit", "solve"],
    ["blessing", "curse", "habit", "behavior"],
    ["argue", "doubt", "pretend", "reveal"]
    ],
    answer: []
    },
    {
    text: "Finnish researchers have installed the world's first fully working sand battery, which can store green power for months at a time. The developers say this could solve the problem of year-round supply, a major issue for green energy. Using low-grade sand, the device ________ with heat made from cheap electricity from solar or wind. The sand stores the heat at around 500 C, ________ can then warm homes in winter when energy is more expensive. Because of climate change and now thanks to the rapidly rising price of fossil fuels, there's a surge of investment in new renewable energy production. But ________  new solar panels and wind turbines can be quickly added to national grids, these extra sources also present huge challenges. ________ , most batteries are made with lithium and are expensive with a large, physical footprint, and can only cope with a limited amount of excess power. One of the big challenges now is whether the technology can be scaled up to really make a difference — and will the developers be able to use it to get electricity out ________ heat? The efficiency falls dramatically when the sand is used to just return power to the electricity grid.",
    options: [
    ["substitutes for", "is caught up with", "lives up to", "is charged up with"],
    ["which", "however", "what", "that"],
    ["except", "therefore", "while", "then"],
    ["Of course", "Besides", "Apart from", "Right now"],
    ["as well as", "inside", "despite", "along"]
    ],
    answer: []
    },
    {
    text: "Giant exoplanets, like the so-called 'hot Jupiters' that are similar in ________ to the solar system's biggest ________  and orbit very close to their host stars, are excellent targets for ________  in their search for their extrasolar worlds. The size and proximity of these planets is easy to ________ as they create a large decrease in brightness when passing in front of their parent stars .",
    options: [
    ["borders", "expressions", "characteristics", "shapes"],
    ["frame", "subordinate", "planet", "comet"],
    ["members", "astronomers", "parties", "makers"],
    ["denounce", "detect", "deflect", "determine"],
     ],
     answer: []
     },
    {
    text: "To better understand selfies and how people form their identities online, the researchers combed through 2.5 million selfie posts ________ Instagram to determine what kinds of identity statements people make by taking and sharing the photos. Nearly 52 percent of all selfies ________ into the appearance category: pictures of people showing off their make-up, clothes, lips, etc. ________ , an overwhelming 57 percent of selfies on Instagram were posted by the 18-35-year-old crowd, something the researchers say isn't too surprising ________ the demographics of the social media platform. The under-18 age group posted about 30 percent of selfies.",
    options: [
    ["of", "in", "above", "on"],
    ["fall", "fallen", "fell", "falls"],
    ["Along with", "Although", "Overall", "Moreover"],
    ["consider", "considered", "considering", "to consider"]
    ],
    answer: []
    },
    {
    text: "Over the past two decades around a third of the world’s mangrove swamps have been ________ for human use, with many turned into valuable shrimp farms. In 2007 an economic study of such shrimp farms in Thailand showed that the commercial profits per hectare were $9,632. If that were the only ________ would seem an excellent idea. However, proper ________ shows that for each hectare government subsidies formed $8,412 of this figure and there were costs, too: $1,000 for pollution and $12,392 for losses to ecosystem services. These ________  damage to the supply of foods and medicines that people had taken from the forest, the loss of habitats for fish, and less buffering against storms. And because a given shrimp farm only stays ________ for three or four years, there was the additional cost of restoring them afterwards: if you do so with mangroves themselves, add another $9,318 per hectare. The overall lesson is that what looks ________ only does so because the profits are retained by the private sector, while the problems are spread out across society at large, appearing on no specific balance sheet.",
    options: [
    ["deserved", "exchanged", "conserved", "converted"],
    ["index", "element", "choice", "factor"],
    ["accounting", "percentage", "aggregation", "division"],
    ["comprised", "uneven", "neglected", "augmented"],
    ["productive", "interactive", "distinctive", "collective"],
    ["beneficial", "immediate", "moderate", "modest"]
    ],
    answer: []
    },
    {
    text: "Green spaces contribute significantly to a ________ in soil and aerial temperatures during spells of hot weather, contributing to human wellbeing. In the garden ________ , there is, however, little information as to what extent various types of plants ________ in their cooling potential and how certain planting combinations may maximize cooling under a scenario of ________  rainfall and minimal water inputs.",
    options: [
    ["genesis", "conclusion", "purification", "reduction"],
    ["background", "level", "context", "volume"],
    ["confer", "differ", "alternate", "defer"],
    ["total", "low", "parallel", "dropped"]
    ],
    answer: []
    },
    {
    text: "Once an organization has its product to sell, it must then ________ the appropriate price to sell it at. The price is set by ________ many factors including supply-and-demand, cost, desired profit competition, perceived value, and market behavior. Ultimately, the final price is determined by what the market is willing to ________ for the product. Pricing theory can be quite complex because so many factors influence what the purchaser decides is a fair ________  . It also should be ________  that, in addition to monetary exchange, price can be the exchange of goods or services as in a barter agreement, or an exchange of specific behavior, such as a vote in a political campaign.",
    options: [
    ["tolerate", "determine", "fabricate", "fancy"],
    ["comparing", "begetting", "balancing", "offsetting"],
    ["consign", "design", "exchange", "prepare"],
    ["addition", "shape", "content", "value"],
    ["explained", "enlarged", "overrated", "noted"]
    ],
    answer: []
    },
    {
    text: "From the earliest civilisations, plants and animals have been portrayed as a means of understanding and recording the potential uses, such as their economic and healing properties. From the first illustrated ________ of medicinal plants, De Materia Medica by Dioscorides, in the first century through to the late fourteenth century the illustration of plants and animals changed very little. Woodcuts in instructional manuals and herbals were often repeatedly copied over the centuries, resulting in a loss of definition and accuracy so that they became little more than stylized decoration. With the growing ________ of copperplate engravings, the traditional use of woodcuts declined and the representation of plants and animals became more accurate. Then, with the ________ of artists such as Albrecht Durer and Leonardo Da Vinci, naturalists such as Otto Brunfels, Leonhard Fuchs in botany and Conrad Gesner and Ulisse Aldrovandi in zoology, nature began to be depicted in a more realistic style. Individual living plants or animals ________  directly and their likeness rendered onto paper or vellum",
    options: [
    ["catalog", "calculation", "formation", "figuration"],
    ["popularity", "popular", "singularity", "resilience"],
    ["emergence", "descent", "havoc", "omniscience"],
    ["observed", "observe", "had observed", "were observed"]
    ],
    answer: []
    },
    {
    text: "It is tempting to try to prove that good looks win votes, and many academics have tried. The ________ is that beauty is in the eye of the ________ , and you cannot behold a politician’s face without a veil of extraneous prejudice getting in the way. Does George Bush possess a disarming grin, or a facetious ________ ? It’s hard to find anyone who can look at the president without assessing him politically as well as ________", 
    options: [
    ["principle", "idea", "difficulty", "concept"],
    ["people", "beholder", "builder", "audience"],
    ["smell", "complexion", "smirk", "binge"],
    ["culturally", "physically", "economically", "individually"]
    ],
    answer: []
    },
    {
    text: "A mini helicopter modeled on flying tree seeds could soon be flying overhead. Evan Ulrich and colleagues at the University of Maryland in College Park ________ the biological world for inspiration to build a scaled-down helicopter that could mimic the properties of full-size aircraft. The complex ________ of full-size helicopters gets less efficient when shrunk, meaning that standard mini helicopters expend most of their power simply fighting to stay stable in the air. The researchers realized that a simpler aircraft designed to stay stable passively would use much less power and reduce manufacturing costs to boot. It turns out that nature ________ them to it. The seeds of trees such as the maple have a single-blade structure that ________ them to fly far away and drift safely to the ground. These seeds, known as samaras, need no engine to ________ through the air, thanks to a process called autorotation. By analyzing the behavior of the samara with high-speed cameras, Ulrich and his team were able to copy its design.",
    options: [
    ["turned to", "turned for", "turned in", "turned off"],
    ["overhaul", "gauge", "imagination", "design"],
    ["is beating", "was beaten", "had beaten", "beaten"],
    ["had allowed", "allowed", "allows", "will allow"],
    ["spin", "fluctuate", "drift", "bob"]
    ],
    answer: []
    },
    {
    text: "Comparing the intelligence of animals of different species is difficult, how do you compare a dolphin and a horse? Psychologists have a technique for looking at intelligence that ________ not require the cooperation of the animal involved. The relative size of an individual's brain is a reasonable indication of intelligence. Comparing ________ species is not as simple as generally expected. An elephant will have a larger brain than a human has simply because it is a large beast. ________ , we use the Cephalization index, which compares the size of an animal's brain with the size of its body. Based on the Cephalization index, the brightest animals on the planet are humans, ________ by great apes, porpoises and elephants. As a general ________ , animals that hunt for a living (like canines) are smarter than strict vegetarians (you don't need much intelligence to outsmart a leaf of lettuce). Animals that live in social groups are always smarter and have larger EQ's than solitary animals.",
    options: [
    ["can", "do", "did", "does"],
    ["across", "to", "through", "with"],
    ["Then", "Instead", "Because", "Otherwise"],
    ["followed", "follows", "follow", "following"],
    ["theory", "principal", "rule", "principle"]
    ],
    answer: []
    },
    {
    text: "Students at the University of Leicester have recently whizzed up a storm of eco-friendly smoothies. This comes as part of a week of events aimed at promoting environmental initiatives ________ campus. A range of events and activities were organized by the University Environment Team and the Students Union to encourage students to waste less, recycle ________ , travel sustainably and save energy to contribute to the University's target of cutting its carbon footprint ________ 60% by the year 2020. The highlight of the week was a cycle-powered smoothie maker. Students rescued fruit from Leicester market which would ________  have been thrown away and salvaged it to create delicious smoothies.' ________ electricity was used as the fruit was whizzed up in a blender attached to the back of a bike pedaled by enthusiastic student volunteers.",
    options: [
    ["off", "on", "in", "at"],
    ["few", "many", "more", "less"],
    ["throughout", "by", "through", "about"],
    ["ever", "also", "otherwise", "never"],
    ["No", "A little", "None", "Nonetheless"]
    ],
    answer: []
    },
    {
    text: "Conservationists have long debated whether the koala should go on the Australian national threatened species list. ________  the koala is clearly in trouble in some parts of the country – in Queensland, for example, high numbers ________ by disease – in other parts such as Victoria and South Australia the problem is not that koala populations ________ , but that they have grown to the point where they are almost too numerous. For a species to be classed as vulnerable, its population ________ by more than 30 percent over the last three generations or 10 years. The problem is that when such a stipulation is applied to koalas, the Victorian boom offsets the Queensland bust, and the species stays off the list. This has repercussions because northern koalas are different to southern ones. They are smaller, for example, and they contain a genetic ________ not represented in the South. ________ , a split listing has been devised of koalas from New South Wales, the ACT and Queensland are now officially 'Vulnerable'; those from Victoria and South Australia are not considered threatened.",
    options: [
    ["But", "While", "Like", "Because"],
    ["have afflicted", "are afflicted", "are afflicting", "afflicted"],
    ["are falling", "are fallen", "falls", "fallen"],
    ["must have decreased", "decreased", "decrease", "must decrease"],
    ["expansion", "extension", "explanation", "variation"],
    ["Nonetheless", "For example", "As an addition", "For this reason"]
    ],
    answer: []
    },
    {
    text: "One of the most ________ psychologists, Clark Hull, claimed that the essence of reasoning lies in the putting together of two 'behavior segments' in some ________ way, never actually performed before, so as to reach a ________  . Two followers of Clark Hull, Howard and Tracey Kendler, devised a test for children that was ________ based on Clark Hull's principles. The children were given the ________ of learning to operate a machine so as to get a toy. In order to succeed they had to go through a two-stage sequence.",
    options: [
    ["radical", "eminent", "elementary", "ideal"],
    ["novel", "broad", "stingy", "ordinary"],
    ["goal", "category", "description", "rate"],
    ["collectively", "explicitly", "approximately", "randomly"],
    ["multiplication", "task", "area", "volume"]
    ],
    answer: []
    },
    {
    text: "Those were his halcyon days when his music was constantly heard in Venice, and his influence ________  Europe. He spent much of his time on the road , ________ and overseeing productions of his music. In Germany, Bach studied Vivaldi's scores, copied them for performance and ________ some for other instruments .",
    options: [
    ["dented", "vanished", "touted", "blanketed"],
    ["collecting", "outperforming", "performing", "preparing"],
    ["repeated", "arranged", "underscored", "derived"]
    ],
    answer: []
    },
    {
    text: "To learn the speech of alchemy, an early form of chemistry in which people attempted to turn metals into gold, it helps to think back to a time when there was no science: no atomic number or weight, no periodic chart, no list of elements. To the alchemists the ________ was not made of leptons, bosons, gluons, and quarks. Instead it was made of substances, and one substance-say, walnut oil-could be just as ________ as another-say, silver-even though modern ________  would say one is heterogeneous and the other homogeneous. Without knowledge of atomic structures, how would it be ________ to tell elements from compounds?",
    options: [
    ["universe", "metallurgy", "material", "spirit"],
    ["all", "completed", "pure", "wholesome"],
    ["affidavits", "laws", "scientists", "medicines"],
    ["proper", "necessary", "capable", "possible"]
    ],
    answer: []
    },
    {
    text: "While many mothers-to-be are advised about the ________ of breastfeeding, what they may not be told is that the effects go well beyond physical health. A new study finds babies breastfed for long periods have better performance on intelligence tests, greater school achievement, and higher monthly incomes as 30-year-olds. While past research has found higher intelligence ________ among breastfed babies, what is so significant about this study is that the researchers were able to collect more complete information on breastfeeding duration and also followed for a longer period. And, by using a population- based birth ________ , the breast feeding practices had no association ________ income level. Most of the evidence of higher intelligence test scores among breastfed babies comes from high-income countries, where middle-class and higher-class mothers are more likely to breastfeed their babies than lower income mothers- certainly in the United States, breastfeeding rates ________  this trend. With evidence coming from first-world countries 'Where breastfeeding is positively associated with higher socioeconomic status'. Horta explained, 'There is always a question of whether the effect that has been observed in other studies is a consequence of breastfeeding by itself or has the result been ________ by socioeconomic status.' Specifically, higher income babies are most likely eating better quality food and this could be impacting IQ test scores.",
    options: [
    ["benefits", "configurations", "flaws", "patterns"],
    ["scores", "expectations", "additions", "scales"],
    ["fellow", "sibling", "companion", "cohort"],
    ["with", "on", "at", "within"],
    ["multiply", "channel", "reflect", "deceive"],
    ["transformed", "confounded", "revealed", "conformed"]
    ],
    answer: []
    },
    {
    text: "With about one and a half billion non-native speakers, English has become the world's own language. Such ________ has its downside, of course. There are now about 6,800 languages left in the world, compared with perhaps ________ that number back at the dawn of agriculture. Thanks in ________ to the rise of über-languages, most importantly English, the remaining languages are now dying at the ________  of about one a fortnight. Want to learn Busuu, anyone? Then you'd better head to Cameroon fast, before one of the language's last eight speakers kicks the bucket (as the Busuu-nese presumably doesn't say).",
    options: [
    ["facet", "dominance", "deficit", "paradox"],
    ["many", "twice", "few", "as"],
    ["respect", "addition", "part", "connection"],
    ["hardness", "rate", "cost", "coverage"]
    ],
    answer: []
    },
    {
    text: "Genius, in the popular conception, is inextricably tied up with precocity - doing something truly creative, we're inclined to think, requires the freshness and exuberance and energy of youth. Orson Welles made his masterpiece, 'Citizen Kane,' at twenty-five. Herman Melville wrote a book a year ________ his late twenties, culminating, at the ________ of thirty-two, with Moby-Dick. Mozart wrote his breakthrough Piano Concerto No. 9 in E-Flat-Major at the age of twenty-one. In some creative forms, like lyric poetry, the ________ of precocity has hardened into an iron law. How old was T. S. Eliot when he wrote The Love Song of J. Alfred Prufrock (I grow old ... I grow old)? Twenty-three. Poets peak young, the creativity researcher James Kaufman maintains. Mihály Csíkszentmihályi, the author of Flow, agrees: The most creative lyric verse is believed to be that written by the young. According to the Harvard psychologist Howard Gardner, a leading ________ on creativity, Lyric poetry is a domain where ________ is discovered early, burns brightly, and then peters out at an early age.",
    options: [
    ["on", "without", "through", "over"],
    ["proportion", "rate", "age", "cost"],
    ["junction", "inferiority", "importance", "structure"],
    ["syntax", "supremacy", "authority", "atheist"],
    ["fire", "clerk", "offender", "talent"]
    ],
    answer: []
    },
    {
    text: "Water is involved in almost all the ________ in our body such as digestion, elimination, assimilation, respiration, maintaining body temperature, etc.. It is required to ________ the thirst of our body. We can live for days without food, however, cannot imagine living without water for more than a day. The level of useful drinking water on the earth is very less and other water is salty and not useful to the living beings. Water is ________ by everything like plants, animals, microorganisms, human being, etc., to fulfill the body requirements. Do we imagine what will ________ if the drinking water gets ________ a day or gets polluted? Yes, it is the main question which has opened the eyes of everyone and starts saving water at every place we belong like home, surrounding area, office, school, college, etc..",
    options: [
    ["processes", "procedure", "developments", "methods"],
    ["confiscated", "eliminated", "add", "remove"],
    ["required", "compulsory", "essential", "obligatory"],
    ["occurs", "happen", "made", "come"],
    ["refined", "over", "end", "finished"]
    ],
    answer: []
    },
    {
    text: "Cells are now ________ as a unifying concept. A cell is the smallest ________ of structure and function. Thus, cells are the basic building blocks of all organisms. Cells vary in size. With few exceptions, individual cells are ________ small they cannot be seen unaided. In 1665, a British scientist named Robert Hooke observed cells for the ________  time using a microscope. A microscope is an instrument that magnifies an object. Most images of cells are taken with a microscope and are called micrographs.",
    options: [
    ["determined", "revised", "claimed", "accepted"],
    ["unification", "uniting", "unity", "unit"],
    ["much", "ever", "so", "very"],
    ["earliest", "first", "last", "latest"]
     ],
     answer: []
     },
    {
    text: "San Francisco’s Golden Gate Bridge, a stunning technological and artistic achievement, ________ to the public after five years of construction. ________ opening day–"Pedestrian Day"–some 200,000 bridge walkers ________ at the 4,200-foot-long suspension bridge, which spans the Golden Gate Strait at the entrance to San Francisco Bay and ________ San Francisco and Marin County. On May 28, the Golden Gate Bridge opened to ________ traffic.On May 27, 1937, the Golden Gate Bridge was opened to great acclaim, a ________ of progress in the Bay Area during a time of economic crisis. At 4,200 feet, it was the longest bridge in the world ________ the completion of New York City’s Verrazano-Narrows Bridge in 1964. Today, the Golden Gate Bridge remains one of the world’s most recognizable architectural structures.",
    options: [
    ["opens", "closes", "appears", "equals"],
    ["On", "During", "Since", "When"],
    ["stationed", "looked", "marveled", "laughed"],
    ["separates", "connects", "channels", "differentiates"],
    ["aquatic", "vehicular", "airborne", "watertight"],
    ["denial", "symbol", "technique", "yield"],
    ["since", "until", "along", "within"]
    ],
    answer: []
    },
    {
    text: "Families provide emotional, physical and financial care and support to their members and are often the basis on which government assistance is determined and administered. Australians have ________  experienced three main living arrangements over a lifecycle: living with parents, living with a partner (for some of this period with children) and living alone in old age if that partner died. Now and into the future, living arrangements ________ a lifecycle may also include living alone or in a group household before perhaps forming a long-term partnership, or living as a ________ parent or alone after divorce or separation. These changes in living arrangements and family ________  are the outcome of various demographic and social trends, such as declining fertility, increased rates of divorce and longer life ________", 
    options: [
    ["traditionally", "respectively", "tradition", "traditionary"],
    ["thought", "throughout", "thorough", "though"],
    ["lonely", "lone", "alone", "full"],
    ["devotions", "commitments", "characters", "characteristics"],
    ["quality", "expectancy", "donation", "expiration"]
    ],
    answer: []
    },
    {
    text: "Chemicals used to control weeds in crops such as corn and soybeans may sometimes run off farmland and enter surface water bodies such as lakes and streams. If a surface water body that is used as a ________  water supply receives excess amounts of these herbicides, then the municipal water treatment plant must ________ them out in order for the water to be safe to drink. This added filtration process can be expensive. Farmers can help control excess herbicides in runoff by choosing chemicals that bind with ________  more readily, are less toxic, or degrade more quickly. Additionally, selecting the best tillage practice can help minimize herbicide pollution .",
    options: [
    ["drinking", "dimming", "stingy", "lacquering"],
    ["fill", "fulfil", "filter", "fancy"],
    ["air", "crops", "solid", "soil"],
    ["connectivity", "weight", "pollution", "latitude"]
    ],
    answer: []
    },
    {
    text: "An economic depression is a period of sustained, long-term ________ in economic activity in one or more economies. It is more severe than a recession, which is a slowdown in economic activity over ________  of a normal business cycle. Economic depressions are characterized by their length, and by abnormally large increases in unemployment ________", 
    options: [
    ["variation", "promotion", "downturn", "reduction"],
    ["an era", "the course", "a phase", "the year"],
    ["calculation", "bias", "ratio", "rate"]
    ],
    answer: []
    },
    {
    text: "No matter whether you speak English or Urdu, Waloon or Waziri, Portuguese or Persian, the roots of your language are the same. Proto-Indo-European (PIE) is the mother tongue _ shared by several hundred contemporary languages, as well as many now extinct, and spoken by people ________ lived from about 6,000 to 3,500 BC on the steppes to the north of the Caspian Sea. They left no written texts and ________  historical linguists have, since the 19th century, painstakingly reconstructed the language from daughter languages, the question of how it actually sounded was assumed to be permanently out of reach. Now, researchers at the Universities of Cambridge and Oxford have developed a sound-based method to move back through the family tree of languages that stem from PIE. They can simulate how certain words ________  when they were spoken 8,000 years ago. Remarkably, at the ________  of the technology is the statistics of shape. 'Sounds have shape,' explains Professor John Aston, from Cambridge's Statistical Laboratory. 'As a word is uttered it vibrates air, and the shape of this soundwave can be measured and turned into a series of numbers. Once we have these stats, and the stats of another spoken word, we can start asking how similar they are and what it would take to shift from one to another.'",
    options: [
    ["where", "which", "what", "who"],
    ["despite", "until", "however", "although"],
    ["would have sounded", "would sound", "have sounded", "sound"],
    ["cost", "heart", "end", "moment"]
    ],
    answer: []
    },
    {
    text: "Gunpowder and fireworks might have been invented independently in Europe, but they probably reached Europe via the Mongols, who spread west from China as far as central Europe by the mid-13th century. In 1267, the English monk Roger Bacon ________  what were very likely firecrackers, which he compared with the flash of lightning and growl of thunder. In 1377 fireworks accompanied a religious mystery play by the bishop's palace in Vicenza, and were soon used to add sparks to figures of doves, representing the Holy Spirit, or angels, made to ascend and descend from the heavens on ropes. By the 15th century, rockets were being used in Europe for military and peaceful purposes. Italian and Spanish cities in particular ________ fireworks for outdoor celebrations. The Italian metallurgist Vannoccio Biringuccio described festivities in Florence and Siena for feast days. These included 'girandoles' or whirling decorated wheels packed with fireworks which ________  a rope hung across a street or square. Fireworks were also used in the German lands. An elaborate colour-painted book ________ the Schembart carnival of Nuremberg, which saw men dressed in brightly-coloured costumes parading through the town. Often these included some kind of pyrotechnics. One image shows a man wearing a hat in the form of a castle with fireworks and smoke shooting up from the towers, and interestingly, what looks like a smoking artichoke.",
    options: [
    ["recorded seeing", "recorded seen", "recording seeing", "took sight of"],
    ["initially using", "began use", "began to use", "beginning to using"],
    ["were suspending by", "was suspended within", "were suspended from", "suspending from"],
    ["souvenirs", "commemorates", "calculates", "communicates"]
    ],
    answer: []
    },
    {
    text: "Mischel is the creator of the marshmallow test, one of the most famous experiments in the history of psychology, which is often cited as evidence of the importance of self-control. In the original test, which was administered at the Bing Nursery School, at Stanford, in the nineteen-sixties, Mischel's team would present a child with a treat (marshmallows were just one option) and tell her that she could either eat the one treat ________ or wait alone in the room for several minutes until the researcher returned, at which point she could have two treats. The promised treats were always visible and the child knew that all she had to do to stop the agonizing ________ was ring a bell to call the experimenter back--although in that ________  she wouldn't get the second treat. The longer a child delayed gratification, Mischel found– that is, the longer she was able to wait--the better she would fare later in life at numerous measures of what we now call executive function. She would ________ better academically, earn more money, and be healthier and happier. She would also be more likely to avoid a number of negative outcomes, including jail time, obesity, and drug use.",
    options: [
    ["ironically", "impressively", "immediately", "imaginatively"],
    ["sleep", "wait", "walk", "time"],
    ["quantity", "case", "span", "consumption"],
    ["slump", "heave", "slumber", "perform"]
    ],
    answer: []
    },
    {
    text: "Antarctic plants can be important indicators of subtle changes in environmental conditions, including climate change. Traditional ground-based assessments of vegetation health are, however, not ideal in Antarctica, as they can destroy the vegetation and are physically ________ in the harsh weather conditions. Co-author Professor Sharon Robinson from UOW’s School of Biological Sciences said the study found drone-based monitoring of vegetation health produced similar results to traditional techniques, but with much greater efficiency and with no damage to the vegetation. "Drones are a powerful tool for monitoring fragile Antarctic vegetation," Professor Robinson said. "They could be used to provide timely warnings about specific environmental stress events, ________ monitoring the longer- term impacts of climate change. "These methods could also be adapted to monitor the health of other small-stature, patchy plant communities, including in alpine or desert regions." The researchers found that drones ________ with sensors were able to detect vegetation health indicators more accurately than satellite imagery. Mosses are one of the key Antarctic vegetation types that need to be monitored. However, they tend to occur in patches among rocks, ice and soil, ________ it important that the imagery used to assess their health is as accurate and spatially detailed as possible.",
    options: [
    ["demanding", "demand", "demanded", "having demanded"],
    ["except", "as well as", "despite", "as long as"],
    ["toppled", "equipped", "assessed", "dealt"],
    ["made", "to make", "making", "make"]
    ],
    answer: []
    },
    {
    text: "London's National Portrait Gallery is currently celebrating the fifty-year ________ of photographer Sandra Lousada. The twenty one portraits on display depict key ________ in literature, film and fashion from the early 1960s. Subsequent to the acquisition of forty portraits by Lousada, the display at The National Portrait Gallery highlights shots taken between 1960 and 1964, many of which feature in Lousada's book Public Faces Private Places (2008). Formal commissioned portraits are shown alongside behind-the- scenes photographs taken on films ________  and unguarded portraits of sitters captured at home.",
    options: [
    ["invitation", "promotion", "training", "career"],
    ["figures", "gadgets", "fashions", "genres"],
    ["gists", "sets", "tickets", "aisles"]
    ],
    answer: []
    },
    {
    text: "Many parents want their children to grow up with a love of reading. However, recent research ________  that children nowadays spend far more of their time using their phones or computers than reading books. Of course, technology brings children many advantages, but books are as important ________ computers. For instance, when children read storybooks, they imagine the characters and practise their language skills, too. Many British schools run an event called World Book Day. This event ________ to promote reading to pupils using various fun activities. Some pupils come to school in costumes inspired by their favourite book. Other schools organise World Book Day activities where pupils create music, artor plays about books. But it's also important for children to read at home, too. At the moment, ________ parents spend time reading with their children regularly. Unfortunately, this means that these children are missing an opportunity to develop the reading habit at an early age.",
    options: [
    ["shown", "has shown", "show", "showing"],
    ["so", "as", "very", "such"],
    ["differs", "defers", "aims", "disagrees"],
    ["very few", "a little", "a few", "less"]
    ],
    answer: []
    },
    {
    text: "Assessments of language learning in 18-month-olds suggest that children are better at grasping the names of objects with repeated syllables, over words with non-identical syllables. Researchers say the study may help explain ________ some words or phrases, such as 'train' and 'good night', have given rise to versions with repeated syllables, such as choo-choo and night-night. The researchers say such words are easier for infants to learn, and may provide them ________ a starter point for vocabulary learning. A team from the University of Edinburgh assessed the infants' language learning behavior in a series of visual and attention tests ________ pictures on a computer screen of two unfamiliar objects. The two objects were named with made-up words which were ________ to the infants by a recorded voice - one with two identical syllables, for example neenee, and the other without repeated syllables, such as bolay. The infants were then tested for their recognition of ________ made-up word. Recordings of their eye movements showed they looked more reliably at the object labeled with repeated syllables, than the other object. Researchers validated their results with a control test, in which the infants responded to pictures of familiar objects - such as a dog or an apple.",
    options: [
    ["that", "whether", "however", "why"],
    ["as", "for", "in", "with"],
    ["having", "doing", "applying", "using"],
    ["communicated", "expressed", "accommodated", "accelerated"],
    ["another", "dual", "each", "one"]
    ],
    answer: []
    },
    {
    text: "A novel invention for helping farmers to dry out hay more quickly has won a University of Glasgow graduate a prestigious design award.Gavin Armstrong, 23, from Kippen, Stirlingshire ________ the Glasgow 1999 Design Medal for his design for a swath inverter— a ________ for flipping over a hay crop to help dry out the damp underside. Dry hay is an essential farmyard food source for sheep and cows. Gavin came up with the design as part of his Product Design Engineering degree course, run in ________  with Glasgow School of Art. He built a working prototype of the device which is powered and towed by a tractor and uses a pair of parallel belts to invert the swath. The rollers are driven from one hydraulic motor and are geared so as to spin at the same speed and in opposite directions ________ that the touching inner two faces of the belt that perform the inversion move rearwards at the same speed.",
    options: [
    ["forged", "consigned", "renewed", "scooped"],
    ["suggestion", "prediction", "situation", "device"],
    ["coordinate", "accordance", "conjunction", "contrast"],
    ["denying", "supposing", "imposing", "ensuring"]
    ],
    answer: []
    },
    {
    text: "Can dogs tell when we are happy, sad or angry? As a dog owner, I feel ________ not only that I can tell what kind of ________ state my pets are in, but also that they respond to my emotions. Yet as a hard- headed scientist, I try to take a more ________ and pragmatic view. These ________ observations seem more likely to result from my desire for a good relationship with my dogs.",
    options: [
    ["relieved", "sententious", "embarrassed", "confident"],
    ["political", "emotional", "financial", "physical"],
    ["irregular", "chaste", "stoical", "rational"],
    ["communal", "discrete", "absurd", "personal"]
    ],
    answer: []
    },
    {
    text: "Participating regularly in physical activity has been shown to benefit an individual's health and ________  Regular physical activity is important in reducing the risk of ________ diseases, such as heart disease and stroke, obesity, diabetes and some forms of cancer. The National Physical Activity Guidelines for Adults ________ at least 30 minutes of moderate-intensity physical activity, ________ every day of the week, to ________  health benefits.",
    options: [
    ["values", "immortality", "expectation", "wellbeing"],
    ["chronic", "contraindicated", "untouched", "detectable"],
    ["excludes", "recommends", "denotes", "defies"],
    ["relatively", "absolutely", "preferably", "namely"],
    ["charge", "obtain", "weigh", "estimate"]
    ],
    answer: []
    },
    {
    text: "It is important to emphasize the need for hard work as an essential part of studying law, because far too many students are tempted to think that they can succeed by relying on what they imagine to be their natural ability, without bothering to add the ________ of effort. To take an analogy, some people prefer the more or less instant ________  which comes from watching a television adaptation of a classic novel to the rather more ________ process of reading the novel itself. Those who ________ watching television to reading the book are less likely to study law successfully, unless they rapidly acquire a ________ for text- based materials.",
    options: [
    ["expenditure", "exhaustion", "explanation", "exclusion"],
    ["gratification", "excitement", "temptation", "obsession"],
    ["simple", "complex", "effortless", "laborious"],
    ["prefer", "Enjoy", "interest", "like"],
    ["knowledge", "idea", "motivation", "taste"]
    ],
    answer: []
    },
    {
    text: "Two decades ago, Kashmiri houseboat-owners rubbed their hands every spring at the prospect of the annual influx of ________ . From May to October, the hyacinth-choked ________ of Dal Lake saw flotillas of vividly painted Shikaras carrying Indian families, boho westerners, young travellers and wide-eyed Japanese. Carpet-sellers ________ their skills, as did purveyors of anything remotely embroidered while the house boats initiated by the British Raj provided unusual accommodation. Then, in 1989, separatist and Islamist militancy ________ and everything changed. Hindus and countless Kashmiri business people bolted, at least 35,000 people were killed in a decade, the lake stagnated, and the houseboats rotted. Any foreigners venturing there risked their ________ , proved in 1995 when five young Europeans were kidnapped and murdered.",
    options: [
    ["volunteers", "watchdogs", "employees", "tourists"],
    ["waters", "connection", "atmosphere", "volume"],
    ["enacted", "registered", "honed", "wasted"],
    ["fell", "enacted", "followed", "attacked"],
    ["credits", "insurances", "lives", "contributions"]
    ],
    answer: []
    },
    {
    text: "Understanding the number of species we have in our marine environment is a ________ need if we are to protect and conserve our biodiversity. This is ________ in today's rapidly changing world, not just here in Hong Kong, but ________ in Southeast Asia which holds the world's most diverse marine habitats. SWIMS is playing a major role in trying to measure and conserve these important resources, both within Hong Kong but also, together with its regional collaborators, in Southeast Asia. said Professor Gray A. Williams, the leader of this study and the Director of HKU SWIMS. The enormous ________ of marine life in Hong Kong, however, has yet to receive its desirable level of conservation as currently only less than 2% of Hong Kong's marine area is protected as marine parks or reserve as compared with approximately 40 % of our terrestrial area. The Government has committed to designate more new marine parks in the coming years. The Brothers Marine Park in the northern Lantau waters will be launched soon, which will bring Hong Kong's total protected marine area to more than 2%. The research team welcomed the initiative of the new marine park ________ also urging the Hong Kong government to move towards the global target of at least 10% marine protected area by the year 2020 under United Nations Convention on Biological Diversity (CBD).",
    options: [
    ["far-fetched", "visual", "basic", "residual"],
    ["lethal", "changeable", "overlooked", "vital"],
    ["surprisingly", "unexpectedly", "strangely", "especially"],
    ["array", "distinction", "danger", "distribution"],
    ["despite", "while", "if", "even"]
    ],
    answer: []
    },
    {
    text: "More than simply putting flowers in a ________ ,Ikebana is a ________ art form in which nature and humanity are brought together. Contrary to the idea of a particolored or multicolored ________ of blossoms, Ikebana often emphasizes other areas of the ________ , such as its stems and leaves, and puts emphasis on shape, line, and form. Though Ikebana is an expression of creativity, certain rules govern its form. The artist's intention is shown through a piece's color combinations, natural shapes, graceful lines, and the implied meaning of the arrangement.",
    options: [
    ["shape", "way", "container", "fashion"],
    ["restricted", "random", "disciplined", "fleeting"],
    ["garden", "arrangement", "duplication", "augmentation"],
    ["flora", "plant", "organism", "fauna"]
     ],
     answer: []
     },
    {
    text: "In the fast-changing world of modern healthcare, the job of a doctor is more like the job of chief executive. The people who run hospitals and physicians' practices don't just need to know ________  They must also be able to balance budgets, motivate a large and diverse ________ and make difficult marketing and legal ________",
     options: [
    ["dosage", "techniques", "treatments", "medicine"],
    ["gang", "staff", "employment", "mass"],
    ["decisions", "reactions", "recommendations", "actions"]
    ],
    answer: []
    },
    {
    text: "In these distant times the sun was seen to make its daily ________ across the sky. At night the moon appeared. Every new night the moon waxed or waned a little and on a few nights it did not appear at all. At night the great dome of the heavens was dotted with tiny specks of light. They ________ known as the stars. It was thought that every star in the heavens had its own purpose and that the ________ of the universe could be discovered by making a study of them. It was well known that there were wandering stars, they appeared in different nightly positions against their neighbours and they became known as planets. It took centuries, in fact it took millennia, for man to ________ the true nature of these wandering stars and to evolve a model of the world to accommodate them and to ________  their positions in the sky.",
    options: [
    ["plan", "level", "journey", "line"],
    ["are", "have", "become", "became"],
    ["tales", "secrets", "views", "imaginations"],
    ["distort", "discuss", "charge", "determine"],
    ["draw", "predict", "dictate", "save"]
    ],
    answer: []
    },
    
    {
    text: "But look beyond fossil fuels for the most intriguing trends. One is that the energy intensity of the world economy - the amount of energy it takes to produce one dollar's ________ of income - keeps falling, at a rate of about 2 percent. What this means is that even without any change in the ________ shares of fossil-based and fossil-free sources in the world's energy mix, we could have 2 percent annual economic growth without increasing carbon emissions from energy use. Of course that is not enough to ________  climate change and we need more economic growth than that. It is ________  a stunning number, which refutes the claim by some environmentalists that permanent economic growth is fundamentally incompatible ________  finite physical resources.",
    options: [
    ["plenty", "money", "value", "worth"],
    ["relevant", "related", "communal", "relative"],
    ["outline", "address", "point", "highlight"],
    ["thus", "thereby", "also", "nonetheless"],
    ["over", "with", "within", "by"]
    ],
    answer: []
    },
    {
    text: "Paraphrasing is often defined as putting a passage from an author into your own words. However, what are your own words? How different must your paraphrase be from the original? The answer is it should be ________  different. The whole point of paraphrasing is to show you have read and understood another person's ideas, and can summarize them in your own writing style rather than borrowing their phrases. If you just change a few words, or add some bits ________ your own to an otherwise reproduced passage, you will probably ________ for plagiarism. You should aim to condense and simplify a writer's ideas and describe them using different sentence structures and expressions. ________ also important to credit the original writer by referencing.",
    options: [
    ["considerable", "considerate", "considering", "considerably"],
    ["despite", "of", "on", "off"],
    ["be penalizing", "be penalized", "have penalized", "penalize"],
    ["That has", "It is", "There is", "That is"]
    ],
    answer: []
    },
    {
    text: "The study of objects constitutes a relatively new field of academic enquiry, commonly referred to as material culture studies. Students of material culture seek to understand societies, both past and present, through careful study and ________ of the physical or material objects generated by those societies. The source material for study is exceptionally wide, ________ not just human-made artefacts but also natural objects and even preserved body parts (as you saw in the film 'Encountering a body'). Some specialists in the field of material culture have made bold claims for its pre-eminence. In certain disciplines, it reigns ________  . It plays a critical role in archaeology, for example, especially in circumstances where written evidence is either patchy or non-existent. ________ , objects are all scholars have to rely on in forming an understanding of ancient peoples. Even where written documents survive, the physical remains of literate cultures often help to provide new and interesting insights into how people once lived and thought________ the case of medieval and post-medieval archaeology. In analyzing the physical remains of societies, both past and present, historians, archaeologists, anthropologists and others have been careful to remind us that objects mean different things to different people.",
    options: [
    ["experiment", "modification", "consumption", "observation"],
    ["includes", "including", "included", "had included"],
    ["at all", "supreme", "everywhere", "far and wide"],
    ["By no means", "In such cases", "In this time", "In this way"],
    ["as long as", "as if", "as a result of", "as in"]
    ],
    answer: []
    },
    {
    text: "Psychology as a subject of study has largely developed in the West since the late nineteenth century. During this period there has been an ________ on scientific thinking. Because of this, there have been many scientific studies in psychology which ________ different aspects of human nature. These include studies into how biology (physical factors) influences human experience, how people use their ________  (touch, taste, smell, sight and hearing) to get to know the world, how people develop, why people behave in certain ways, how memory works, how people develop language, how people understand and think about the world, what motivates people, why people have emotions and how personality develops. These scientific ________ all contribute to an understanding of human nature. What do we mean by the practical applications of these studies? An ________ of psychology is useful in many different areas in life, such as education, the workplace, social services and medicine. This means that people who have knowledge of psychology can ________  or apply that knowledge in areas such as the ones listed above.",
    options: [
    ["emphasis", "emphases", "emphasize", "emphasizing"],
    ["exceed", "excel", "separate", "explore"],
    ["brains", "skins", "minds", "senses"],
    ["assumptions", "correlations", "investigations", "stimulations"],
    ["ideology", "empowerment", "understanding", "equivalence"],
    ["register", "classify", "use", "learn"]
    ],
    answer: []
    },
    {
    text: "Scientists have discovered the cause of a mass extinction of sea-floor marine organisms 800,000 years ago — which also provides insight into how climate change can impact ________ deep ocean biota. In a new study ________ in the journal Nature Communications, scientists from the universities of Nottingham and Durham and the British Geological Survey (BGS), have discovered the cause of a mass extinction within marine organisms called foraminifera. Foraminifera are an important group in relation to biomass in the deep ocean and the cause of their extinction was ________ unknown. Scientists tested various possible ________ for the mass extinction and were able to discount others such as ocean cooling. ________ , they discovered that the extinction was caused by a global change in plankton at the surface of the ocean.",
    options: [
    ["in", "of", "on", "off"],
    ["publishing", "has published", "published", "be publishing"],
    ["occasionally", "necessarily", "previously", "currently"],
    ["causes", "consequences", "elements", "factors"],
    ["However", "Thus", "So", "Instead"]
    ],
    answer: []
    },
    {
    text: "Some students say that they need complete quiet to read and study. Others study best in a crowded, noisy room because the noise actually ________ them concentrate. Some students like quiet music playing; others ________ not. The point is, you should know the level of noise that is optimal for your own studying. However, one general rule for all students is that the television seems to be more of a distraction than music or other background noise, so ________  the TV off when you are reading or studying. ________  , don't let yourself become distracted by computer games, email, or Internet surfing.",
    options: [
    ["helps", "stops", "aids", "gives"],
    ["have", "doing", "do", "are"],
    ["make", "put", "leave", "cut"],
    ["Thus", "However", "Yet", "Also"]
    ],
    answer: []
    },
    {
    text: "It's that time again! Exams looming, essays or reports outstanding and you wonder where the years have gone already. You start ________ how you're going to cope with it all. A limited amount of anxiety can help you to be more motivated and more ________ . It can help you to plan your work and to think more clearly and ________ about it. In other words, it can help you stay on top of things. Sit down at your desk and make a start on writing down all the things you have to do to ________  for the exams.",
    options: [
    ["warning", "wondering", "believing", "defying"],
    ["intelligent", "excitable", "grateful", "purposeful"],
    ["wantonly", "logically", "extensively", "thoroughly"],
    ["behave", "prepare", "apply", "substitute"]
    ],
    answer: []
    },
    {
    text: "Small lakes with a surface area of less than 100 square meters represent the majority of global freshwater ecosystems. Many of these lakes are found in remote, often mountainous areas with no inflow and outflow. Yet in most of these lakes, there are fish. So how do fish reach lakes and ponds that are not connected to other bodies of water? This question was already addressed by some of the leading natural scientists of the 19th century such as Charles Darwin, Alfred Russel Wallace and Charles Lyell, who all came to the same conclusion—water birds must be responsible for fish dispersal. And they had a plausible explanation for this: fish eggs of some species are sticky and can survive for some time out of water. The theory is thus that the fish eggs stick to water birds' feathers or feet; the birds then fly from one body of water to the next, where the fish hatch from their eggs.",
    options: [
    ["had found", "are found", "were found", "have found"],
    ["how", "why", "whether", "where"],
    ["has already", "has yet", "is also", "was already"],
    ["responsibility to", "responding to", "responsible to", "responsible for"],
    ["stick", "were stuck", "stuck", "sticking"]
    ],
    answer: []
    },
    {
    text: "Cultural studies is a new way of engaging in the study of culture. In the past, many academic subjects including anthropology, history, literary studies, human geography and sociology have brought their own disciplinary concerns to the study of culture. ________ , in recent decades there has been a renewed interest in the study of culture that has crossed disciplinary ________ . The ________ activities and cultural studies have emerged as an intriguing and exciting area of intellectual inquiry which has already shed important new life on the character of human cultures and which ________  to continue to do so. While there is a little doubt that cultural studies are coming to ________ as an important and distinctive field of study, it does seem to encompass a potentially enormous area. This is because the term 'culture' has a complex history and range of usages, which have provided a legitimate ________ of inquiry for several academic disciplines.",
    options: [
    ["However", "Then", "Subsequently", "Consistently"],
    ["renewed", "refunded", "renowned", "irresistible"],
    ["discriminations", "similarities", "boundaries", "differentiations"],
    ["simultaneous", "spontaneous", "resulting", "derivative"],
    ["have promised", "promising", "promises", "would have promised"],
    ["phase out", "pull together", "be widely recognized", "be narrowly reduced"],
    ["dispersion", "focus", "heart", "center"]
    ],
    answer: []
    },
    {
    text: "Daniel Harris, a scholar of consumption and style, has observed that until photography did finally ________ illustration as the primary means of ________ clothing in the 1950s, glamour inhered ________ in the face of the drawing, which was by necessity schematic and generalized, than in the sketch's ________ , posture, and gestures, especially in the strangely dainty positions of the hands. Glamour once resided so emphatically in the stance of the model that the faces in the illustrations cannot really be said to have ________ at all, but angles or tilts. The chin raised upwards in a haughty look; the eyes lowered in an attitude of introspection; the head cocked at an inquisitive or coquettish angle: or the profile presented in sharp outline, emanating power of the severity like an emperor's bust ________  on a Roman coin.",
    options: [
    ["surmount", "deplete", "supplant", "use"],
    ["everlasting", "endurable", "luminous", "advertising"],
    ["least", "few", "yet", "less"],
    ["attitude", "altitude", "magnitude", "analogue"],
    ["expressions", "exceptions", "expectations", "experiences"],
    ["encircled", "embodied", "embossed", "encrypted"]
    ],
    answer: []
    },
    {
    text: "Barrie Finning's, a professor at Monash University's college of pharmacy in Melbourne, and PhD student Anita Schneider, recently tested a new wrinkle cure. Twice daily, 20 male and female volunteers applied a liquid containing Myoxinol, a patented ________ of okra (Hibiscus esculentus) seed, to one side of their faces. On the other side they applied a similar liquid without Myoxinol. Every week for a month their wrinkles were tested by self-assessment, photography and the size of depressions made in silicon moulds. The results were impressive. After a month the ________ and number of wrinkles on the Myoxinol- treated side were reduced by approximately 27 per cent. But Finnin's research, commissioned by a cosmetics company, is unlikely to be published in a scientific ________ . It's hard to even find studies that show the active ingredients in cosmetics penetrate the skin, let alone more comprehensive research on their effects. Even when ________ studies are commissioned, companies usually control whether the work is published in the traditional scientific literature.",
    options: [
    ["example", "exertion", "explanation", "extract"],
    ["concentration", "depth", "prowess", "strength"],
    ["encyclopedia", "publicity", "publication", "enclosure"],
    ["ritual", "erratic", "rough", "rigorous"]
    ],
    answer: []
    },
    {
    text: "One of the Supreme Court's most important ________ is to decide cases that raise questions of constitutional interpretation. The Court decides if a law or government ________ violates the Constitution. This is known as judicial review and enables the Court to invalidate both federal and state laws when they ________ with the Constitution. Since the Supreme Court stands as the ultimate authority in constitutional interpretation, its decisions can be ________  only by another Supreme Court decision or by a constitutional amendment.",
    options: [
    ["legislations", "purviews", "permissions", "responsibilities"],
    ["auction", "action", "state", "speculation"],
    ["tally", "conflict", "accord", "amend"],
    ["charged", "changed", "followed", "altered"]
    ],
    answer: []
    },
    {
    text: "Whether you want to exercise and stay ________ , train professionally with like-minded people, or indulge your competitive streak, Trinity Sport and Fitness ________ . We've got a dedicated support development team on campus to support every student ________  part in sports. You might want to participate in sports competitions volunteer with a local sports class or simply play for ________ with our social sport program. Trinity fitness members of our public-facing sports facility will also ________ you to discounts when you are booking a sports facility and fitness class. You will also get an opportunity to ________ from tailored personal training, free activities events, and lots more.",
    options: [
    ["healthy", "wealthy", "humble", "hungry"],
    ["has it covered", "makes covering", "have covered", "does it covering"],
    ["taking", "taken", "have taken", "were taking"],
    ["idle", "fun", "kidding", "exchange"],
    ["enact", "encourage", "entitle", "allow"],
    ["win", "upgrade", "benefit", "proceed"]
    ],
    answer: []
    },
    {
    text: "The electrons that orbit closest to the nucleus are ________  attracted. They are called bound electrons. The electrons that are farther away from the pull of nucleus can be forced out of their orbits. These are called free electrons. Free electrons can move from one atom to another. This movement is known as electron flow. Electricity is the movement or flow of electrons from one atom to another. A ________ of imbalance is necessary to have a movement of electrons. In a ________ atom, the positively charged nucleus balances the negatively charged electrons. This holds them in orbit. If an atom loses electrons, it becomes positive in charge. It attracts more electrons in order to get its balance. A conductor is any ________ that allows a good electron flow and conducts electricity. A good conductor must be made of atoms that give off free electrons easily. Also, the atoms must be close enough to each other so that the free electron orbits ________  . Ignition systems use copper and aluminum wires to conduct electricity. They allow good electron flow.",
    options: [
    ["least", "strongly", "weakly", "unexpectedly"],
    ["superstition", "judgment", "condition", "presumption"],
    ["varied", "normal", "strange", "singular"],
    ["metal", "molecule", "chemical", "material"],
    ["collapse", "diverge", "appear", "overlap"]
    ],
    answer: []
    },
    {
    text: "For a start, we need to change our ________ of 'retirement', and we need to change mind-sets arising from earlier government policy which, in the face of high unemployment levels, encouraged mature workers to take early retirement. Today, the government encourages them to ________ their retirement. We now need to think of retirement as a phased process, where mature age workers ________ reduce their hours, and where they have considerable flexibility in how they combine their work and non work time. We also need to recognise the broader change that is occurring in how people work, learn, and live. Increasingly we are moving away from a linear relationship between education, training, work, and retirement, as people move in and out of jobs, careers, caregiving, study, and leisure. Employers of choice remove the ________  between the different segments of people's lives, by creating flexible conditions of work and a range of leave entitlements. They take an individualized approach to workforce planning and development so that the needs of employers and employees can be met ________  . This approach supports the different transitions that occur across the life course - for example, school to work, becoming a parent, becoming responsible for the care of older relatives, and moving from work to retirement.",
    options: [
    ["contempt", "confrontation", "concept", "conclusion"],
    ["delay", "replay", "relay", "drag"],
    ["radically", "disruptively", "abruptly", "gradually"],
    ["hinges", "barriers", "nexus", "bans"],
    ["condescendingly", "simultaneously", "hypocritically", "spontaneously"]
    ],
    answer: []
    },
    {
    text: "Agrarian parties are political parties chiefly representing the interests of peasants or, more broadly, the rural sector of society. The extent to ________ they are important, or ________ they even exist, depends mainly on two factors. One, obviously, is the size of an identifiable peasantry, or the size of the rural relative to the urban population. The other is a matter of social integration: for agrarian parties to be important, the representation of countryside or peasantry must not be integrated with the other major sections of society. ________ , a country might possess a sizable rural population, but have an economic system in which the interests of the voters were predominantly related to their incomes, ________ than their occupations or location; and in such a country the political system would be unlikely to include an important agrarian party.",
    options: [
    ["where", "which", "what", "that"],
    ["that", "how", "when", "whether"],
    ["Since", "Though", "Thus", "Because"],
    ["even", "more", "rather", "ever"]
    ],
    answer: []
    },
    {
    text: "In the developed world, home appliances have greatly reduced the need for physical labour. ________  people need to be involved in tasks that once left them little time to do much else. For example, the word processor and email have, to a great ________ replaced the dedicated secretarial staff that briefly flourished with the rise of the typewriter. At ________ time all copies were made with manual scribes, carefully duplicating what they read. Then we had carbon paper. Then photocopiers. Then printers. Then the requirement for physical copy reduced. An entire stream of labour appeared and disappeared as technology advanced. We freed ourselves of one kind of work; we just replaced it ________  another.",
    options: [
    ["Fewer", "More", "Less", "Many"],
    ["extension", "possibility", "range", "extent"],
    ["once", "some", "one", "a"],
    ["with", "as", "for", "by"]
    ],
    answer: []
    },
    {
    text: "Decision making is central to the management of an enterprise. The manager of a profit making business has to decide on the manner of implementation of the objectives of the business, at least one of which may ________ relate to allocating resources so as to maximize profit. A non-profit-making enterprise (such as a department of central or local government) will be making decisions on resource allocation so as to be economical, efficient and effective in ________ of finance. All organizations, whether in the private sector or the public sector, ________ decisions which have financial implications. Decisions will be about resources, which may be people, products, services or long-term and short-term investment. Decisions will also be about activities, including whether and how to undertake them. Most decisions will at some stage involve consideration of financial matters, ________  cost.",
    options: [
    ["well", "better", "best", "thereby"],
    ["its use of", "its using of", "using of", "accordance with"],
    ["beget", "uplift", "adapt", "take"],
    ["eventually", "consequently", "particularly", "spontaneously"]
    ],
    answer: []
    },
    {
    text: "Twenty years ago, not so long before B-15 broke off from Antarctica, 'we didn't even know that icebergs made noise,' says Haru Matsumoto, an ocean engineer at NOAA who has studied these sounds. But in the past ________  years, scientists have started to learn to distinguish the eerie, haunting sounds of iceberg life — ice cracking, icebergs grinding against each other, an iceberg grounding on the seafloor — and measure the extent to ________ those sounds contribute to the noise of the ocean. While they're just now learning to listen, the sounds of ice could help them understand the behavior and breakup of icebergs and ice shelves as the poles warm ________  ",
    options: [
    ["for", "more", "much", "few"],
    ["which", "that", "what", "whether"],
    ["away", "out", "up", "off"]
    ],
    answer: []
    },
    {
    text: "Managing performance is about getting people into action so that they achieve planned and agreed results. It focuses on what has to be done, how it should be done and what is to be achieved. But it is equally concerned with ________ people - helping them to learn - and providing them with the support they need to do well, now and in the future. The framework for performance management is provided by the performance agreement, ________ is the outcome of performance planning. The agreement provides the basis for managing performance throughout the year and for ________ improvement and development activities. It is used as reference point when reviewing performance and the achievement of improvement and development plans.",
    options: [
    ["developing", "evaluating", "recruiting", "alerting"],
    ["what", "this", "which", "it"],
    ["guiding", "reassuring", "heralding", "concluding"]
    ],
    answer: []
    },
    {
    text: "At the end of the last ice age, the melting ice disrupted the ocean currents in the North Atlantic and ________ a drop in temperature of almost 5 degrees. ________ the rest of the planet was warming ________  , the North Atlantic region remained in a cold period for 1300 years. The same thing happened ________  8000 years ago, when the cooling lasted about a hundred years, and it could happen again today. Even a short period of cooling in the North Atlantic could have a dramatic effect on the wildlife, and the human populations, living there.",
    options: [
    ["featured", "denied", "reflected", "caused"],
    ["Contrasting to", "Even though", "As if", "Now that"]
    ["in", "off", "up", "back"],
    ["on", "before", "after", "around"],
    ["could", "can", "should", "could have"]
    ],
    answer: []
    },
    {
    text: "One of Australia's most remarkable natural gifts, the Great Barrier Reef is blessed with the breathtaking beauty of the world' s largest coral reef. The reef contains an ________ of marine life and comprises of over 3000 individual reef systems and coral cays and literally hundreds of ________ tropical islands with some of the world's most beautiful sun-soaked, golden beaches. Because of its natural beauty, the Great Barrier Reef has become one of the world's most ________ -after tourist destinations. A visitor to the Great Barrier Reef can enjoy many ________ including snorkeling, scuba diving, aircraft or helicopter tours, bare boats (self- sail) glass-bottomed boat viewing, semi-submersibles and educational trips, cruise ship tours, whale watching and swimming with dolphins.",
    options: [
    ["access", "acquaintance", "equivalence", "abundance"],
    ["illusionary", "exterritorial", "picturesque", "visionary"],
    ["sought", "thought", "caught", "met"],
    ["expeditions", "experiences", "expectations", "emporiums"]
    ],
    answer: []
    },
    {
    text: "The economic ________ of globalization involves international financial institutions i.e. the IMF & WB. Stabilization and adjustment are sponsored by the two respectively and are rooted in the ideology of the free market. At the other end of the spectrum, protesters see globalization in a very different light than the treasury secretary of the United States, or the finance or trade ministers of most of the advanced industrial countries. The difference in ________ is so great that one wonders, are the protesters and the policy makers talking about the same ________ ? Are they looking at the same data? Are the visions of those in ________  so clouded by special and particular ________  ?'",
    options: [
    ["demonstration", "definition", "dimension", "depression"],
    ["views", "exception", "expectation", "conclusion"],
    ["substance", "phenomenon", "philosophy", "explanation"],
    ["tandem", "powder", "conjugation", "power"],
    ["interests", "efforts", "achievements", "detestation"]
    ],
    answer: []
    },
    {
    text: "Over sixty years after Amelia Earhart vanished mysteriously in the Pacific during her attempt to become the first person to circumnavigate the world along the equator, Linda Finch, a San Antonio businesswoman, accomplished pilot, and aviation historian, recreated and completed her idol's last flight as a ________ to the aviation pioneer's spirit and vision. On March 17, 1997, Ms. Finch and a navigator took off from Oakland International Airport, California, in a restored Lockheed Electra 10E, the same make and model ________ that Earhart used on her last journey. The mission to fulfill Amelia Earhart's dream was called ' World Flight 1997.' Although Ms. Finch was not the first to ________ Earhart's around-the- world journey, she was the first to do it in a historic airplane. Linda Finch closely followed the same route that Earhart flew, stopping in 18 countries before finishing the trip two and a half months later when she ________ back at the Oakland Airport on May 28. Over a million school children and others were able to follow the flight ________  through an ________  web site part of a free multimedia ________ program called 'You Can Soar', provided by the project's sponsor.",
    options: [
    ["tribute", "retribution", "contribution", "turbulence"],
    ["shuttle", "aircraft", "vessel", "rocket"],
    ["acquire", "claim", "obtain", "attempt"],
    ["ditched", "settled", "landed", "detoured"],
    ["inadvertently", "gradually", "daily", "likely"],
    ["inherent", "inactive", "interactive", "intractable"],
    ["improvisational", "compositional", "educational", "additional"]
    ],
    answer: []
    },
    {
    text: "The writer, or, for that matter, the speaker conceives his thought whole, as a unity, but must express it in a line of words; the reader, or listener, must take this line of symbols and from it ________  the original wholeness of thought. There is ________ difficulty in conversation, because the listener receives innumerable cues from the physical expressions of the speaker; there is a dialogue, and the listener can ________  in at any time. The advantage of group discussion is that people can overcome linear sequence of words by ________ on ideas from different directions; which makes for wholeness of thought. But the reader is confronted by line upon line of printed symbols, without benefits of physical ________ and emphasis or the possibility of dialogue or discussion.",
    options: [
    ["recover", "respect", "reconstruct", "reduce"],
    ["little", "much", "more", "few"],
    ["lean", "cut", "intrude", "get"],
    ["conveying", "combining", "collecting", "converging"],
    ["tune", "thumb", "tone", "tile"]
    ],
    answer: []
    },
    {
    text: "Since the last papal reform, several ________ have been ________ to make the Western calendar more useful or ________ . Very few reforms, such as the rather different decimal French Republican and Soviet calendars, had gained official ________  , but each was put out of use shortly after its introduction.",
    options: [
    ["arguments", "essays", "assumptions", "proposals"],
    ["expected", "accomplished", "overthrown", "offered"],
    ["portable", "strict", "regular", "abnormal"],
    ["accepted", "accept", "acceptance", "accepting"]
    ],
    answer: []
    },
    {
    text: "Interior design is a professionally conducted, practice-based process of planning and realization of interior spaces and the elements within. Interior design is ________ with the function and operation of the aesthetics and its ________ . The work of an interior designer draws upon many other ________ , such as environmental psychology, architecture, product design and, aesthetics, in relation to a wide range of building spaces including hotels, corporate and public spaces, schools, hospitals, private residences, shopping malls, restaurants, theaters and airport terminals.",
    options: [
    ["concerned", "conflicted", "concentrated", "corresponded"],
    ["capability", "environment", "sustainability", "deniability"],
    ["disciplines", "course", "principals", "functions"]
    ],
    answer: []
    },
    {
    text: "Developing computational thinking helps students to better understand the world around them. Many of us happily drive a car without understanding what ________  under the bonnet. So is it necessary for children to learn how to program computers? ________  , some experts say coding is one of the human skills that will become obsolete as artificial intelligence grows. Nevertheless, governments believe coding is an essential skill. Since 2014, the principles of computer programming ________ on England's curriculum for children from the age of five or six, when they start primary school. While not all children will become programmers, Mark Martin, a computing teacher at Sydenham High School, London, argues that they should learn to understand what ________  computers work and try to solve problems as a computer might.",
     
    options: [
    ["leads in", "raises up", "sets off", "goes on"],
    ["Till now", "Nevertheless", "However", "After all"],
    ["have featured", "were featured", "featuring", "features"],
    ["endows", "makes", "glosses", "sheers"]
    ],
    answer: []
    },
    {
    text: "The Petrified Forest is home to some of the most impressive fossils ever found and more are being discovered each year as erosion ________ new evidence. Fossils found here show the Forest was once a tropical region, ________ towering trees and extraordinary creatures we can only imagine. ________ more than 150 different species of fossilized plants have been discovered by paleontologists, species of reptiles, such as Desmatosuchus, similar to the armadillo, have also been discovered. Archaeologists have found ________ evidence to indicate that ancient native people inhabited this region about 10,000 years ago. Petroglyph drawings on rock surfaces, gives a glimpse of the past and you can see the marks of a solar calendar at Puerco Pueblo near the time of the summer solstice.",
    options: [
    ["exposes", "makes", "distributes", "forges"],
    ["connected to", "filled with", "restored with", "treated by"],
    ["While", "Thus", "However", "Once"],
    ["full", "entire", "much", "somewhat"]
    ],
    answer: []
    },
    {
    text: "Timing is important for revision. Have you noticed that during the school day you get times when you just don't care any longer? I don't mean the lessons you don't like, but the ones you usually find OK, but on some occasions, you just can't be bothered with it. You ________ have other things on your mind, be tired, restless or looking forward to what comes next. Whatever the reason, that particular lesson doesn't get 100 percent ________ from you. The same is true of revision. Your mental and physical ________ are important. If you try to revise when you are tired or totally occupied with something else, your revision will be inefficient and just about worthless. If you approach it feeling fresh, alert and happy, it will be so much easier, and you will learn more, faster. However, if you make no plans and just slip in a little bit of revision when you feel like it, you probably won't do much revision! You need a revision timetable, so you don't keep putting it off .",
    options: [
    ["may", "never", "do", "hardly"],
    ["effort", "afford", "affect", "effect"],
    ["shortcomings", "concerns", "attitudes", "health"],
    ["stopping", "putting it off", "giving it up", "putting out"]
    ],
    answer: []
    },
    {
    text: "Seminars are not designed to be mini-lectures. Their educational ________ is to provide an opportunity for you to discuss interesting and/or difficult aspects of the course. This is founded on the ________ that it is only by actively trying to use the knowledge that you have acquired from lectures and texts that you can achieve an adequate understanding of the subject. If you do not understand a point it is highly ________  that you will be the only person in the group in that position; you will invariably be undertaking a ________   for the entire group if you come to the seminar equipped with questions on matters which you feel you did not fully understand. The seminar is to ________  discussion.",
    options: [
    ["result", "team", "role", "regulation"],
    ["awareness", "information", "consolation", "assumption"],
    ["similarly", "likely", "possible", "unlikely"],
    ["service", "bearing", "reservation", "education"],
    ["stir", "provoke", "rinse", "commit"]
    ],
    answer: []
    },
    {
    text: "Most important of all is the fact that for each new ballet-pantomime created at the Paris Opera during the July Monarchy, a new score was produced. The reason for this is simple: these ballet-pantomimes told stories — elaborate ones — and music was considered an indispensable tool in getting them across to the audience. ________ , music had to be newly created to fit each story. Music tailor-made for each new ballet-pantomime, however, was only one weapon in the Opera's explanatory arsenal. ________ was the ballet-pantomime libretto, a printed booklet of fifteen to forty pages in length, which was sold in the Operas lobby(like the opera libretto), and which laid out the plot in painstaking detail, scene by scene. Critics also took it upon themselves to recount the plots (of both ballet-pantomimes and operas) in their ________ of premieres. So did the publishers of souvenir albums, which also featured pictures of famous ________  and of scenes from favorite ballet-pantomimes and operas.",
    options: [
    ["However", "Nevertheless", "In fact", "Therefore"],
    ["Another", "Others", "It", "Also"],
    ["views", "reviews", "overviews", "supervisions"],
    ["teachers", "students", "performers", "drivers"]
    ],
    answer: []
    },
    {
    text: "The environmental impact of the global textile industry is hard to overstate. One-third of the water used worldwide is spent fashioning fabrics. For every ton of cloth ________ , 200 tons of water is polluted with chemicals and heavy metals. An estimated 1 trillion kilowatt-hours of electricity powers the factories that card and comb, spin and weave, and cut and stitch materials into everything from T-shirts to towels, ________ behind mountains of solid waste and a massive carbon footprint. 'Where the industry is today is not really sustainable for the long term,' says Shreyaskar Chaudhary, chief executive of Pratibha Syntex, a textile manufacturer based outside Indore, India. With something of an "if you build it, they will come" attitude, Mr.Chaudhary has steered Pratibha ________ the leading edge of eco-friendly textile production. Under his direction, Pratibha began making clothes with organic cotton in 1999. Initially, the company couldn't find enough organic farms growing cotton in central India ________ its factories. To meet production demands, Chaudhary's team had to convince conventional cotton farmers to change their growing methods. Pratibha provided seeds, cultivation instruction, and a guarantee of fair-trade prices for their crops. Today, Pratibha has a network of 28,000 organic cotton growers across the central states of Madhya Pradesh, Maharashtra, and Orissa.",
    options: [
    ["produced", "has produced", "producing", "is produced"],
    ["moving", "leaving", "processing", "looking into"],
    ["against", "over", "toward", "behind"],
    ["have supplied", "supply", "to supply", "is supplied"],
    ["their", "some", "mine", "them"]
    ],
    answer: []
    },
    {
    text: "What is the significance of instinct in business? Does a reliable gut feeling separate winners from losers? And is it the most valuable emotional tool any entrepreneur can possess? My ________ of successful company owners lead me to believe that a highly analytical attitude can be a drawback. At critical junctures in commercial life, risk-taking is more an ________  of faith than a carefully balanced choice. Frequently, such moments require ________ and absolute conviction above all else. There is simply no time to wait for all the facts, or room for doubt. A computer program cannot tell you how to invent and launch a new product. That ________ involves too many unknowns, too much luck — and too much sheer intuition, rather than the infallible ________ that machines deliver so well. As Chekhov said: An artist’s flair is sometimes worth a scientist's brains — entrepreneurs need right-brain thinking. When I have been considering whether to buy a company and what price to offer, I have been ________ too often by reams of due diligence from the accountants and lawyers. Usually it pays to stand back from such mountains of grey data and weigh up the really important issues-and decide how you feel about the opportunity.",
    options: [
    ["ideas", "thoughts", "observations", "researches"],
    ["act", "importance", "art", "emphasis"],
    ["decisiveness", "patience", "confidence", "courage"],
    ["journey", "mindset", "prototype", "answer"],
    ["rationale", "rule", "principle", "logic"],
    ["blinded", "attracted", "allured", "deceived"]
    ],
    answer: []
    },
    {
    text: "Music was as important to the ancient Egyptians as it is in our modern society. Although it is thought that music played a ________  throughout the history of Egypt, those that ________ the Egyptian writings have discovered that music ________ to become more important in what is called the ‘pharaonic’ ________ of their history. This was the ________ when the Egyptian dynasties of the pharaohs were ________ (around 3100 BCE) and music was ________  many parts of everyday Egyptian life.",
    options: [
    ["role", "game", "response", "situation"],
    ["need", "require", "confirm", "study"],
    ["predicted", "seemed", "like", "thought"],
    ["period", "people", "place", "race"],
    ["result", "range", "time", "group"],
    ["contributed", "established", "constructed", "raised"],
    ["found at", "found", "found from", "found in"]
    ],
    answer: []
    },
    {
    text: "Paris is very old—there has been a settlement there for at least 6000 years and its shape has been determined in part by the River Seine, and in part by the edicts of France’s rulers. But the great boulevards we admire today are relatively new, and were constructed to prevent any more barricades ________ by the rebellious population; that work was carried out in the middle 19th century. The earlier Paris had been ________ a maze of narrow streets and alleyways. But you can imagine that the work was not only highly expensive, but caused great distress among the half a million or so residents whose houses were ________ razed, and whose neighborhoods disappeared. What is done cannot usually be undone, especially when buildings are torn ________ .",
    options: [
    ["being created", "to be created", "creating", "been created"]
    ["as if", "in part", "just as", "relative"],
    ["evenly", "rarely", "simply", "equally"],
    ["up", "across", "between", "down"]
    ],
    answer: []
    },
    {
    text: "The world’s atmosphere is forever on the move. Wind is air in motion. Sometimes air moves slowly, giving a gentle breeze. At other times it moves rapidly, creating gales and hurricanes. ________ or fierce, wind always starts in the same way. As the sun moves through the sky, it heats up some parts of the sea and land more than others. The air above these ________  spots is warmed, becomes lighter than the surrounding air, and begins to rise. Elsewhere, cool air sinks, because it is ________ . Winds blow because air squeezed out by sinking, cold air is sucked in under rising, warm air. Winds will blow wherever there is a ________ n air temperature and pressure, always flowing from high to low pressure. Some winds blow in one place, and have a local name - North America’s chinook and France's mistral. Others are part of a huge circulation pattern that sends winds over the ________  globe.",
    options: [
    ["Gentle", "Wild", "Chill", "Aloud"],
    ["cold", "hot", "cool", "warm"],
    ["heavier", "deeper", "larger", "colder"],
    ["convergence", "diversity", "discretion", "difference"],
    ["entire", "all", "total", "wholesome"]
    ],
    answer: []
    },
    {
    text: "Pidgins are languages that are born after contact between at least two languages. As many pidgins developed during the period of empire and international trade, one of the language parents was frequently a European language such as French or English, and the other language parent was the language of the people with whom the Europeans were ________ or whom they were colonizing. Usually one of the languages provided the majority of ________ items and the other provided the grammatical structure. When pidgins become learned as a mother tongue, they become ________ as creoles. I am not going to discuss pidgins and creoles and contact languages as such in this book in ________", 
    options: [
    ["trading", "connecting", "speaking", "talking"],
    ["grammar", "vocabulary", "knowledge", "verbal"],
    ["disguised", "captured", "known", "recommended"],
    ["any width", "any depth", "further", "next time"]
    ],
    answer: []
    },
    {
    text: "Rudman looks at how a poor understanding of Maths has led historians to false conclusions about the Mathematical sophistication of early societies. Rudman's final observation-that ancient Greece ________  unrivaled progress in the subject while ________  to teach it at school-leads to a ________  punchline:Mathematics could be better learnt after we ________  school.",
    options: [
    ["marked", "enjoyed", "reviewed", "expected"],
    ["waiting", "hesitating", "hoping", "failing"],
    ["radical", "rational", "radish", "radius"],
    ["enter", "graduate", "leave", "go"]
    ],
    answer: []
    },
    {
    text: "Deciding to go to business school is perhaps the simplest part of what can be a complicated process. With nearly 600 accredited MBA programs on ________ around the world, the choice of where to study can be overwhelming. Here we explain how to ________ the right school and course for you and unravel the application and funding process. Probably the ________ of people applying to business school are at a point in their careers where they know they ________ to shake things up, but they don't know exactly what they would like to do with their professional lives, says Stacy Blackman, an MBA admissions consultant based in Los Angeles. If that's the case with you, look at other ________ : culture, teaching method, location, and then pick a place that’s a good fit for you with a strong general management program. Super-defined career goals don’t have to be a part of this process.",
    options: [
    ["offer", "provide", "give", "take"],
    ["elect", "choose", "identify", "recognize"],
    ["few", "many", "majority", "most"],
    ["enjoy", "hesitate", "want", "choose"],
    ["standards", "factors", "rules", "criteria"]
    ],
    answer: []
    },
    {
    text: "Equitable and sustainable management of water resources is a major global challenge. About one third of the world’s population lives in countries with moderate to high water stress, with ________ high impacts on the poor. With respect to the ________  projected human population growth, industrial development and the expansion of irrigated agriculture in the next two years, water demand is expected to rise to levels that will make the task of providing water for human ________ more difficult. Since its establishment, the United Nations Environment Programme (UNEP) has worked to promote sustainable water resources management practices through ________ approaches at the national, regional and global levels. After more than 30 years, water resources management continues to be a strong pillar of UNEP’s work. UNEP is actively participating in addressing water issues together with partner UN ________ , other organizations and donors; they facilitate and catalyze water resource assessments in various developing countries; implement projects that assist countries in developing integrated water resource management plans; create awareness of innovative alternative technologies and assist the development, implementation and enforcement of water resource management policies, laws and regulations.",
    options: [
    ["proportionately", "disproportionately", "largely", "scarcely"],
    ["reactionary", "current", "few", "past"],
    ["substitute", "sustenance", "substance", "sustains"],
    ["united", "cooperation", "collaborative", "collaborating"],
    ["sectors", "agencies", "companies", "businesses"]
    ],
    answer: []
    },
    {
    text: "In The Origin of Species, Darwin provided abundant evidence that life on Earth has evolved over time, and he proposed natural selection as the primary mechanism for that change. He observed that individuals ________ in their inherited traits and that selection acts on such differences, leading to ________ change. Although Darwin realized that variation in heritable traits is a prerequisite for ________ , he did not know precisely how organisms pass heritable traits to their offspring. Just ________ years after Darwin published The Origin of Species, Gregor Mendel wrote a groundbreaking paper on inheritance in pea plants. ________ that paper, Mendel proposed a model of inheritance in which organisms transmit discrete heritable units (now called genes) to their offspring. ________ Darwin did not know about genes, Mendel’s paper set the stage ________  understanding the genetic differences on which evolution is based.",
    options: [
    ["differ", "difference", "different", "same"],
    ["tremendous", "evolutionary", "unrivaled", "enormous"],
    ["evolution", "development", "growth", "maturity"],
    ["a few", "little", "a little", "few"],
    ["On", "In", "For", "With"],
    ["Although", "Despite", "However", "Even"],
    ["for", "as", "in", "on"]
    ],
    answer: []
    },
    {
    text: "With the increase in women's ________ in the labour force, many mothers have less time ________ to undertake domestic activities. At the same time, there has been increasing ________ that the father's role and ________ with a child is important. A father can have many roles in the family, ranging from income provider to teacher, carer, playmate and role model. Therefore, balancing paid work and family responsibilities can be an important issue for both fathers and mothers in families.",
    options: [
    ["anticipation", "substitution", "participation", "definition"],
    ["available", "related", "consumable", "useful"],
    ["recognition", "discrimination", "resolution", "recreation"],
    ["scholarship", "relationship", "worship", "employment"]
    ],
    answer: []
    },
    {
    text: "France was still essentially a feudal nation with lords, due to a range of ancient and modern rights from their peasants who comprised about 80 percent of the population and the majority lived in rural contexts. France was a predominantly agricultural nation, even though this agriculture was low in productivity, wasteful, and using out of date methods. An attempt to introduce modern techniques from Britain had not succeeded. Inheritance laws, ________ estates were divided up among all the heirs, had ________ France divided into many tiny farms; ________ the large estates were small when compared to other European nations. The only major region ________ large-scale farming was around Paris, where the always hungry capital city provided a convenient market. Harvests were critical but fluctuating, causing famine, high prices, and riots.",
    options: [
    ["what", "whose", "whereby", "which"],
    ["urged", "caused", "left", "created"],
    ["never", "so", "because", "even"],
    ["of", "without", "within", "apart"]
    ],
    answer: []
    },
    {
    text: "Music is an important part of our lives. We connect and interact with it daily and use it as a way of projecting our self-identities to the people around us. The music we enjoy - whether it' s country or classical, rock n' roll or rap - ________ who we are. But where did music, at its core, first come from? It's a puzzling question that may not have a definitive answer. One ________ researcher, however, has proposed that the key to understanding the origin of music is nestled snugly in the loving bond between mother and child. In a lecture at the University of Melbourne, Richard Parncutt, an Australian-born professor of systematic musicology, endorsed the idea that music originally spawned from ' motherese' -- the playful voices mothers ________ when speaking to infants and toddlers. As the theory goes, increased human brain sizes caused by evolutionary changes occurring between one and 2,000,000 years ago resulted in earlier births, more fragile infants and a ________ need for stronger relationships between mothers and their newborn babies. According to Parncutt, who is based at the University of Graz in Austria, ' motherese' arose as a way to strengthen this maternal bond and to help ________  an infant's survival.",
    options: [
    ["means", "convinces", "shows", "reflects"],
    ["freelance", "best", "unanimous", "leading"],
    ["adapt", "adopt", "sing", "forge"],
    ["clinical", "chronic", "critical", "fallow"],
    ["confirm", "improve", "ensure", "enquire"]
    ],
    answer: []
    },
    {
    text: "At the beginning of the twenty-first century, the relationship between standard and nonstandard language is, evidently, still an uncertain one. We are at a ________ point between two eras. We seem to be leaving an era when the rules of Standard English, as elected and defined by prescriptive grammarians, totally conditioned our sense of ________ usage, so that all other usages and varieties were considered to be inferior or corrupt, and ________ from serious consideration. And we seem to be ________  an era when nonstandard usages and varieties, previously denigrated or ignored, are achieving a new presence and ________ within society, reminiscent of that found in Middle English, when dialect variation in literature was widespread and uncontentious. But we are not there ________ . The rise of Standard English has resulted in a confrontation between the standard and nonstandard dimensions of the language which has lasted for over 200 years, and this has had traumatic ________  which will take some years to eliminate. Once people have been given an inferiority complex about the way they speak or write, they find it difficult to shake off.",
    options: [
    ["transcendent", "separative", "distinctive", "transitional"],
    ["notable", "irreversible", "acceptable", "preferential"],
    ["isolated", "suffered", "excluded", "separated"],
    ["be approached", "be approaching", "approaching", "approach"],
    ["stagnation", "respectability", "overestimation", "discrimination"],
    ["too", "yet", "neither", "either"],
    ["sources", "consequences", "reasons", "orientations"]
    ],
    answer: []
    },
    {
    text: "To qualify as a conservancy, a committee must define the conservancy' s boundary, elect a ________ conservancy committee, negotiate a legal constitution, prove the committee's ability to ________  funds, and produce an acceptable plan for ________  distribution of wildlife-related benefits. Once approved, registered conservancies acquire the ________ to a sustainable wildlife ________ set by the ministry. ________ information, representative, parliamentary, management",
    options: [
    ["attract", "freeze", "borrow", "manage"],
    ["moral", "equitable", "equal", "stable"],
    ["integrity", "agreement", "rights", "tools"],
    ["limit", "segment", "quota", "quotation"]
    ],
    answer: []
    },
    {
    text: "Everybody needs fresh water. ________ water, people, animals and plants cannot live. Although a few plants and animals can make do with saltwater, all humans need a constant supply of fresh water if they are to stay ________ and healthy. Of the total supply of water on the Earth, only about 3 percent of it is fresh, and most of that is stored as ice and snow at the poles, or is so ________ under the surface of the Earth that we cannot get to it. Despite so much of the water being out of reach, we still have a million cubic miles of it that we ________ use. That's about 4,300,000 cubic kilometers of freshwater to share out between most of the plants, animals and people on the planet.",
    options: [
    ["Without", "Despite", "As", "With"],
    ["excited", "here", "up", "fit"],
    ["wide", "hard", "deep", "common"],
    ["can", "won't","don't", "cannot"]
    ],
    answer: []
    },
    {
    text: "Colorful poison frogs in the Amazon owe their great ________ to ancestors that leapt into the region from the Andes Mountains several times during the last 10 million years, a new study from The University of Texas at Austin suggests. This is the first study to show that the Andes have been a ________ of diversity for the Amazon basin, one of the largest ________ of biological diversity on Earth. The finding runs ________  to the ________  that Amazonian diversity is the ________  of evolution only within the tropical forest itself.  Basically, the Amazon basin is 'melting pot' for South American frogs, says graduate student Juan Santos, lead author of the study. Poison frogs there have come from multiple places of ________ notably the Andes Mountains, over many millions of years. We have shown that you cannot understand Amazonian biodiversity by looking only in the basin. Adjacent regions have played a major role.",
    options: [
    ["division", "diversity", "diversification", "diversify"],
    ["important", "major", "essential", "special"],
    ["gap", "source", "stem", "dump"],
    ["pool", "reservoirs", "tank", "territories"],
    ["along", "counter", "through", "thoroughly"],
    ["myth", "idea", "situation", "condition"],
    ["link", "result", "trigger", "usher"],
    ["living", "result", "origin", "species"]
    ],
    answer: []
    },
    {
    text: "The narrative of law and order is located fundamentally at the level of individual guilt and responsibility. Criminal acts are seen as individual issues of personal responsibility and ________ , to which the state responds by way of policing, ________ , adjudication and punishment. This is but one level at which crime and criminal justice can be analyzed. The problem is that so often analysis ends there, at the level of individual action, ________ in terms of responsibility, guilt, evil. In few other areas of social life does individualism have this hold. To take but one ________ ,it would be absurd to restrict analysis of obesity, to individual greed. It should similarly be widely seen as absurd to restrict analysis of criminal justice issues to the culpability of individuals.",
    options: [
    ["stability", "capability", "culpability", "reliability"],
    ["persecution", "prosecution", "execution", "inspection"],
    ["combined", "characterized", "chosen", "concluded"],
    ["method", "exemplify", "instance", "reason"]
    ],
    answer: []
    },
    {
    text: "A sustainable transportation system is one in which people's needs and desires for access to jobs, commerce, recreation, culture and home are accommodated using a minimum of resources. Applying principles of ________ to transportation will reduce pollution generated by gasoline-powered engines, noise, traffic congestion, land devaluation, urban sprawl, economic segregation, and injury to drivers, pedestrians and cyclists. In addition, the costs of commuting, shipping, housing and goods will be ________  . Ultimately in a sustainable San Francisco, almost all trips to and ________ the City will be on public transit, foot or bicycle-as will a good part of trips to the larger Bay Region. Walking through streets designed for pedestrians and bicycles will be more pleasant than walking through those designed for the automobile. Street-front retail and commercial establishments will ________ from the large volume of foot traffic drawn to an environment enhanced by trees, appropriately designed 'street furniture' ( street lights, bicycle racks, benches, and the like) and other people. Rents and property costs will be lowered as land for off-street parking is no ________  required or needed.",
    options: [
    ["reliability", "sustainability", "sustain", "sustainable"],
    ["reduced", "enhance", "seduced", "reducing"],
    ["apart", "within", "among", "away"],
    ["origins", "inject", "control", "prosper"],
    ["smaller", "longer", "most", "best"]
    ],
    answer: []
    },
    {
    text: "The APS supports the development of an Australian curriculum for psychological science. The APS Division of Psychological Research, Education and Training, in ________ with teacher and curriculum representatives from every State and Territory in Australia, ________ a proposed framework for senior secondary school studies in psychological science. This framework ________ on the current senior science curricula that were developed and published by the Australian Curriculum, Assessment and Reporting Authority. The APS hopes that this framework will ________ a dialogue between educators and their local curriculum authority, with the aim of working towards a more ________ approach to the teaching of psychological science at secondary school level and optimizing the preparation for students going on to undergraduate psychology studies at university, as well as the effective use of psychological principles in everyday life.",
    options: [
    ["criticism", "consultation", "consolation", "condolence"],
    ["is developed", "develops", "had been developing", "developed"],
    ["has modeled", "to model", "is modeled", "modeled"],
    ["fertilize", "facilitate", "fascinate", "fabricate"],
    ["conjunctive", "constituent", "consistent", "consequent"]
    ],
    answer: []
    },
    {
    text: "The purpose of this paper is to consider the claim, often made, that computer simulation exercises provide an excellent source of speaking practice. In so doing I shall first consider the properties of computer simulations from a theoretical ________  , then describe the experience of ________ a particular simulation with a general EFL class. On the basis of this experience, and of some very straightforward pedagogical considerations, I shall argue that the claim is justified, ________ to a very important caveat: computer simulations can form the basis of excellent speaking exercises, provided you do not expect the computer to do all the work. Put in another way, many computer simulations only ________ their full potential as language exercises if they are ________  into a larger, planned, teacher-managed activity.",
    options: [
    ["shape or form", "state of mind", "point of view", "status quo"],
    ["used", "being used", "using", "having been used"],
    ["subject", "reject", "expect", "inject"],
    ["obtain", "attain", "retain", "remain"],
    ["separated", "included", "participated", "integrated"]
    ],
    answer: []
    },
    {
    text: "Bones also protect the organs in our bodies. The skull protects the brain and forms the shape of the face. The spinal cord, a pathway for messages between the brain and the body, is protected by the backbone, or spinal column. The ribs form a cage that shelters ________ heart and lungs, and the pelvis helps protect the bladder, part of the intestines, and in women, the reproductive organs. Bones are made up of a framework of a protein called collagen , with a mineral called calcium phosphate that makes the framework hard and strong. Bones store calcium and release some into the bloodstream when it's needed by other parts of the body. The amounts of certain vitamins and minerals that you eat, especially vitamin D and calcium, directly affect how much calcium is stored in the bones. Joints are where ________ bones meet. They make the skeleton flexible — without them, movement would be impossible. Joints allow our bodies to move in many ways. Some joints open and close like a hinge (such as knees and elbows), whereas others allow for more complicated movement — a shoulder or hip joint, for example, allows for backward, forward, sideways, and rotating movement. Joints are classified by their range of movement: Immovable, or fibrous, joints don't move. The dome of the skull, for example, is made of bony plates, which move slightly during birth and then fuse together as the skull finishes growing. Between the edges of these plates are links, or joints, of fibrous tissue. Fibrous joints also hold the teeth in the jawbone. Partially movable, or cartilaginous, joints move a little. They are linked by cartilage, as in the spine. Each of the vertebrae in the spine moves in relation to the one above and below it, and together these movements give the spine its flexibility. Freely movable, or synovial (pronounced: sih-NO-vee-ul), joints move in many directions. The ________ joints of the body — such as those found at the hip, shoulders, elbows, knees, wrists, and ankles — are freely movable. They are filled with synovial fluid, which acts as a lubricant to help the joints move easily. ________ kinds of freely movable joints play a big part in voluntary movement: Hinge joints allow movement in one direction, as seen in the knees and elbows. Pivot joints allow a rotating or twisting motion, like that of the head moving from side to side. Ball-and-socket joints allow the greatest freedom ________  movement. The hips and shoulders have this type of joint, in which the round end of a long bone fits into the hollow of another bone.",
    options: [
    ["a", "that", "our", "the"],
    ["that", "which", "one", "two"],
    ["whole", "entire", "individual", "main"],
    ["All", "Two", "One", "Three"],
    ["with", "to", "during", "of"]
    ],
    answer: []
    },
    {
    text: "A new interdisciplinary centre for the study of the frontiers of the universe, from the tiniest subatomic particle to the largest chain of galaxies, has been formed at The University of Texas at Austin. The Texas Cosmology Centre will be a way for the university' s departments of Astronomy and Physics to ________ on research that concerns them both. 'This centre will bring the two departments together in an area where they ________ — in the physics of the very early universe,' said Dr. Neal Evans, Astronomy Department chair. Astronomical observations have ________ the presence of dark matter and dark energy, discoveries that challenge our knowledge of fundamental physics. And today's leading theories in physics involve energies so high that no Earth-bound particle accelerator can test them. They need the universe as their ________  . Steven Weinberg, Nobel laureate and professor of physics at the university, called the Centre' s ________  a very exciting development for that department.",
    options: [
    ["separate", "collaborate", "participate", "cooperative"],
    ["overlapped", "overload", "overlap", "folded"],
    ["enhanced", "released", "revealed", "deluded"],
    ["workshop", "library", "laboratory", "basement"],
    ["adventure", "movement", "advent", "approach"]
    ],
    answer: []
    },
    {
    text: "Books and articles highlighting intractable debt, poverty and development abound in both the academic and popular literature. This addition to the debate is both timely and interesting ________ it subsumes the economic debate to the broader social, political, environmental and institutional context of debt in developing countries. Debt-for-Development Exchanges: History and New Applications ________ for a wide audience including: academics from a range of disciplines (including accounting and finance); non- Government organizations (NGOs); civil society groups; and, both debtor and creditor governments and public sector organizations. Professor Ross Buckley, author and editor, ________ an international profile in the area of debt relief and this book is the outcome of an Australian Research Council (ARC) Discovery grant to explore debt-for development mechanisms that relieve debt, improve development outcomes ________  aid, are practically and politically attractive to creditors and ________  to regional security. ________ due to, as, so, whereas",
    options:  [
    ["has intended", "intends", "is intending", "is intended"],
    ["develops", "has developed", "have developed", "developed"]
    ["to", "for", "from", "as"],
    ["contribution", "contributed", "contributing", "contribute"]
    ],
    answer: []
    },
    {
    text: "Our analysis of the genetic structure of northern spotted owls across most of the range of the subspecies allowed us to test for genetic discontinuities and identify landscape features that influence the subspecies' genetic structure. Although no ________ genetic breaks were found in northern spotted owls, ________  landscape features were important in structuring genetic variation. Dry, low elevation valleys and the high elevation Cascade and Olympic Mountains restricted gene flow, while the lower Oregon Coast Range ________  gene flow, acting as a ' genetic corridor.' The Columbia River did not act as a barrier, ________ owls readily fly over this large river. Thus, even in taxa such as northern spotted owls with potential for long distance dispersal, landscape features can have an important impact on gene flow and genetic structure.",
    options: [
    ["distinct", "transparent", "oblivious", "rare"],
    ["few", "several", "much", "many"],
    ["hindered", "embedded", "enabled", "facilitated"],
    ["suggesting", "demonstrating", "telling", "proposing"]
    ],
    answer: []
    },
    {
    text: "Learning is a process by which behavior or knowledge changes as a result of experience. Learning from experience plays a major role ________ enabling us to do many things that we clearly were not born to do, from the simplest tasks, such as flipping a light switch, to the more ________ , such as playing a musical instrument. To many people, the term ' learning' signifies the ________ that students do reading, listening, and taking tests in order to acquire new information. This process, which is known as cognitive learning, is just one type of learning, however. Another way that we learn is by associative learning, which is the focus of this module. You probably associate ________  holidays with specific sights, sounds, and smells, or foods with specific flavors and textures. We are not the only ________  with this skill even the simplest animals such as the earthworm can learn by association.",
    options: [
    ["for", "above", "in", "despite"],
    ["composite", "compound", "complex", "manifold"],
    ["activities", "matters", "actions", "routines"],
    ["one", "the", "any", "each"],
    ["certain", "few", "uncountable", "dependent"],
    ["species", "class", "types", "categories"]
    ],
    answer: []
    },
    {
    text: "Progressive enhancement is a design practice based on the idea that instead of ________ the least capable browser, or mangling our code to make a site look the same in every browser, we should provide a core set of functionality and information to all users, and then ________ the appearance and behavior of the site for users of more capable browsers. It's a very productive development practice. ________ hours working out how to add drop shadows to the borders of an element in every browser, we simply use the standards-based approach for browsers that support it and don't even attempt to implement it in browsers that don't. After all, the users of older and less capable browsers won't know what they are missing. The ________  to progressive enhancement is the belief among developers and clients that websites should look the same in every browser. As a developer, you can simplify your life and dedicate your time to more interesting challenges if you let go of this outdated notion and embrace progressive enhancement.",
    options: [
    ["conflicting with", "designing for", "comparing with", "confining within"],
    ["progressive enhance", "progressively enhance", "progressively enhancing", "progressive enhancement"],
    ["In addition to taking", "With respect to assuming", "Instead of spending", "Thanks to conserving"],
    ["biggest challenge", "finest opportunity", "easiest issue", "least assurance"]
    ],
    answer: []
    },
    {
    text: "The Classic era of Mayan ________ came to an end around 900 AD. Why this happened is unclear; the cities were probably over-farming the land, so that a ________ of drought led to famine. Recent geological ________  supports this, as there appears to have been a 200-year drought around this time.",
    options: [
    ["community", "society", "civilisation", "class"],
    ["time", "period", "range", "phase"],
    ["research", "test", "examination", "exploitation"]
    ],
    answer: []
    },
    {
    text: "Snails are not traditionally known for quick thinking, but new research shows they can make complex decisions using just two brain cells in ________ that could help engineers design more efficient robots. Scientists at the University of Sussex attached electrodes to the heads of freshwater snails as they searched for lettuce. They found that just one cell was used by the mollusc to tell if it was hungry or not, while another let it know when food was present. Foodsearching is an example of goal-directed behavior, ________  which an animal must integrate information about both its external environment and internal state while using as little energy as possible. Lead researcher Professor George Kemenes, say This will eventually help us design the' brain' of robots based on the principle of using the ________ possible components necessary to perform complex tasks. What goes on in our brains when we make complex behavioral decisions and carry them out is poorly understood.  Our study reveals for the first time how just two neurons ________  create a mechanism in an animal's brain which drives and optimizes complex decision-making tasks.",
    options: [
    ["findings", "results", "recommendations", "decisions"],
    ["because", "although", "but", "as"],
    ["that", "if", "neither", "how"],
    ["through", "about", "during", "to"],
    ["least", "less", "fewest", "fewer"],
    ["shall", "should", "can", "ought"]
    ],
    answer: []
    },
    {
    text: "English has been changing throughout its lifetime and it's still changing today. For most of us, these changes are fine as long as they' re well and truly in the past. Paradoxically, we can be ________ about word origins and the stories behind the ________ we find in our language, but we ________ a queasy distaste for any change that might be happening right under our noses. There are even language critics who are ________ that English is dying, or if not dying at least being progressively ________ through long years of mistreatment.",
    options: [
    ["scared", "cranky", "worried", "curious"],
    ["ruptures", "indications", "values", "structures"],
    ["enlarge", "expect", "deal", "experience"],
    ["satisfied", "persuaded", "reassured", "convinced"],
    ["crippled", "lost", "disabled", "dented"]
    ],
    answer: []
    },
    {
    text: "SpaceX's Falcon 9 rocket lifted off from Cape Canaveral, Florida, on Friday at 1845 GMT (1445 EDT), reaching orbit 9 minutes later. The rocket lofted an uncrewed ________ of SpaceX's Dragon capsule, which is designed to one-day carry both crew and cargo to orbit. 'This has been a good day for SpaceX and a ________ development for the US human space flight program,' said Robyn Ringuette of SpaceX in a webcast of the launch. In a teleconference with the media on Thursday, SpaceX's CEO, Paypal co- founder Elon Musk, said he would consider the flight 100 percent successful if it reached ________ . ' Even if we prove just that the first stage functions correctly, I'd still say that's a good day for a test,' he said. It's a great day if both stages work correctly.' SpaceX hopes to win a NASA ________  to launch astronauts to the International Space Station using the Falcon 9. US government space shuttles, which currently make these trips, are scheduled to be ________  for safety reasons at the end of 2010.",
    options: [
    ["replication", "mockup", "setting", "base"],
    ["promising", "hopefully", "rapid", "encouraging"],
    ["track", "orbit", "circulation", "trajectory"],
    ["award", "contract", "case", "bid"],
    ["ceased", "fixed", "removed", "retired"]
    ],
    answer: []
    },
    {
    text: "What history books tell us about the past is not everything that happened, but what historians ________ .They cannot put in everything: choices have to be made. Choices must similarly be made about which aspects of the past should be formally taught to the next generation in the shape of school history lessons. So, ________ ,when a national school curriculum for England and Wales was first discussed at the end of the 1980s, the history curriculum was the subject of considerable public and media ________ . Politicians argued about it; people wrote letters to the press about it; the Prime Minister of the time, Margaret Thatcher, ________ in the debate. Let us think first about the question of content. There were two main camps on this issue: those who thought the history of Britain should take pride of ________ , and those who favored what was referred to as 'world history'.",
    options: [
    ["be selected", "have selected", "been selected", "select"],
    ["nevertheless", "shall we say", "for example", "likewise"],
    ["realization", "knowledge", "interest", "tastes"],
    ["had intervened", "intervened", "was intervened", "did intervene"],
    ["location", "place", "culture", "opportunity"]
    ],
    answer: []
    },
    {
    text: "Scientists make observations, have assumptions and do experiments . After these were done, he got his results. Then there is a lot of data from scientists. Scientists around the world have a picture of the world.",
    options: [
    ["thinking", "hyperbole", "principles", "assumptions"],
    ["experiments", "essays", "assignments", "thesis"],
    ["proofs", "evidence", "numbers", "results"],
    ["digits", "static", "figure", "data"],
    ["look", "idea", "view", "picture"]
    ],
    answer: []
    },
    {
    text: "Children have ________ sleep patterns. They can ________ sleep for 8-9 hours and get up at a fixed time. But teenagers don't. Their need for an early start to school or other schedules can ________ their sleep patterns. ________ these ________ , they actually need longer sleep. So, parents should try and speak to their children, who are ________  to help them understand that a night of sound sleep is always helpful.",
    options: [
    ["sound", "expressive", "erratic", "soundly"],
    ["periodically", "successfully", "hardly", "barely"],
    ["effect", "influence", "gained", "diverge"],
    ["Regardless", "Despite", "As", "Unless"],
    ["probabilities", "factors", "particles", "forms"],
    ["reinforced", "suitable", "lucky", "linking"]
     ],
     answer: []
     },
    {
    text: "This course provides students with an in-depth understanding of the exciting disciplines of politics and international relations and commerce. Students will learn about the ________ of political institutions in countries around the world and explore the complex field of relations between nations. Topics in governance, public policy, public administration, national security, border control and commerce ensure that students receive a ________ and current education in the range of issues which are covered under the label of politics and international relations and commerce. In ________ to acquiring specialist ________  and competencies in Politics and International Relations and Commerce, students will graduate with a range of generic skills such as critical thinking, enhanced communication abilities, problem solving and strong capacities to work with others. They will also develop ethically based and socially ________  attitudes and behaviors.",
    options: [
    ["workings", "understanding", "handing", "agency"],
    ["whole", "confined", "narrow", "broad"],
    ["order", "according", "addition", "term"],
    ["information", "experience", "knowledge", "intelligence"],
    ["responsible", "accountability", "responsibility", "liable"]
    ],
    answer: []
    },
    {
    text: "In the literary world, it was an accepted assumption that the 1970s was a time of unprecedented growth in homegrown Australian fiction. And everybody was reading and talking about books by young Australian women. But it was ________ recently that a researcher was able to measure just how many novels were published in that decade, and she found that ________ a decline in novels by Australian writers overall, but confirmed an increase in women' s novels. It is this sort of research - testing ideas about literary history - that ________ possible with the spread of 'Digital Humanities.' The intersection of Humanities and digital technologies ________ opportunities in the fields of literature, linguistics, history and language that ________ without computational methods and digitized resources to ________ information together in an accessible way. Transcription software is being developed for turning scans of books and documents into text, as the field of digital humanities really takes ________  .",
    options: [
    ["not until", "until", "impossible", "till"]
    ["there will have been", "there may be", "there had been", "there being"],
    ["should become", "must become", "is becoming", "will become"],
    ["is opened to", "is opening up", "is opened up", "is opening to"],
    ["were not possible", "was not possible", "could be possible", "can be possible"],
    ["squeeze", "bring", "muddle", "stow"],
    ["in", "off", "on", "over"]
    ],
    answer: []
    },
    {
    text: "One distinguishing feature of business is its economic character. In the world of business, we interact with each other not as family members, friends, or neighbors, but as buyers and ________ ,employers and employees, and the like. Trading, for example, is often ________ by hard bargaining, in which both sides conceal their full hand and perhaps ________ in some bluffing. And a skilled salesperson is well- ________  in the art of arousing a customer' s attention (sometimes by a bit of puffery) to ________  the sale. Still, there is an ethics of trading that prohibits the use of false or deceptive claims and tricks such as bait-and-switch advertising.",
    options: [
    ["sellers", "solicitors", "tellers", "traders"],
    ["accompanied", "customized", "complimented", "accomplished"],
    ["engage", "thrive", "flourish", "conduct"],
    ["informed", "staffed", "known", "versed"],
    ["deal", "motivate", "make", "clinch"]
    ],
    answer: []
    },
    {
    text: "Crime is an integral part of everyday life. It is a prominent ________ in the news and is a popular subject for fictional portrayal. Most students commencing legal studies will have some experience of crime, whether directly, as a victim of crime or indirectly through exposure to media coverage. This means that most offenses ________ on the syllabus, such as murder, theft and rape will be familiar terms. This tends to give students the impression that they know more about criminal law than they do about other subjects on the syllabus. This can be a real disadvantage ________ the academic study of criminal law because it tends to lead students to rely on preconceived notion of the nature and scope of the offenses and to reach instinctive, but often legally inaccurate, conclusions. It is absolutely ________ to success in criminal law that you put aside any prior knowledge of the offenses and focus on the principles of law derived from statutes and cases. ________ doing this, you will soon appreciate just how much difference there is between everyday conceptions of crime and its actuality.",
    options: [
    ["feature", "point", "aspect", "fuss"],
    ["covering", "covered", "are covered", "has covered"]
    ["in spite of", "in front of", "in terms of", "by comparison with"],
    ["inevitable", "responsible", "essential", "important"],
    ["For", "Despite", "By", "Without"]
    ],
    answer: []
    },
    {
    text: "Distance learning can be highly beneficial to a large variety of people from young students wanting to expand their horizons to adults looking for more job security. With programs that allow learners of all ages to take courses for fun, personal advancement and ________ , distance learning can ________ the needs of a diverse population. Perhaps one of the most notable and often talked about ________ of distance learning is the flexibility. The majority of programs allow students to learn when and where it's convenient for them. For ________ who are struggling to balance their distance learning goals with working a fulltime job and taking care of a family this kind of flexibility can allow many people to ________ education who would not otherwise be able to do so. ________ there are no on-campus courses to attend, students can learn from their own homes, at work on their lunch breaks and from virtually anywhere with internet access. For some it can even be a big source of savings on the fuel costs and time required to commute to classes.",
    options: [
    ["conformations", "discriminations", "abhorrences", "degrees"],
    ["claim", "achieve", "devise", "meet"],
    ["definitions", "factors", "advantages", "defaults"],
    ["they", "them", "those", "that"],
    ["obey", "accelerate", "test", "pursue"],
    ["Due to", "Thus", "Besides", "Since"]
    ],
    answer: []
    },
    {
    text: "Language comes so naturally to us that it is easy to forget what a strange and miraculous gift it is. All over the world members of our ________ fashion their breath into hisses and hums and squeaks and pops and listen to others do the ________ .We do this, of course, not only because we like the sounds but because details of the sounds contain information about the ________ of the person making them. We, humans, are fitted with a means of ________ our ideas, in all their unfathomable vastness. When we listen to speech, we can be led to think thoughts that have never been thought before and that never would have ________  to us on our own.",
    options: [
    ["genre", "category", "group", "species"],
    ["same", "so", "liking", "correspondence"],
    ["intentions", "interventions", "determinations", "attempts"],
    ["rendering", "loading", "turning", "sharing"],
    ["appeared", "occurred", "risen", "opened"]
    ],
    answer: []
    },
    {
    text: "Film is where art meets commerce. As Orson Welles said:A painter just needs a brush and the writer just needs a pen, but the producer needs an army. And an army needs money. A producer is just like an entrepreneur, and we raise money to make films. First, we need to find an original idea or a book or a play and purchase the rights, then we need money to develop that idea, often not a reasonably small sum. Besides , to commission a writer for the screenplay isn't something you would want to gamble your own money on, so you find a partner. We are lucky here in the UK, as we have Film 4, BBC Films and the UK Film Council, all of which are good places to develop an idea. Producing in Britain is very different to producing in America or even Europe because the economic dynamic is different.",
    options: [
    ["As", "Likely", "Unlike", "Despite"],
    ["raise", "arise", "rise", "raze"],
    ["Nevertheless", "Or", "Besides", "Thus"],
    ["them", "that", "those", "which"],
    ["until", "even", "unless", "ever"]
    ],
    answer: []
    },
    {
    text: "The foreign policy of a state, it is often argued, begins and ends with the border. No doubt an exaggeration, this aphorism nevertheless has an ________ of truth. A state's relation with its neighbors, at least in the ________ years, are greatly influenced by its frontier policy, especially when there are no ________  borders. Empire builders in the past sought to extend imperial frontiers for a variety of reasons; subjugation of kings and princes to gain their ________ (as well as handsome tributes or the coffers of the state), and, security of the core of the empire from external attacks by establishing a string of buffer states in areas ________ the frontiers. The history of the British empire in India was no different. It is important to note in this connection that the concept of international boundaries (between two sovereign states), demarcated and ________  , was yet to emerge in India under Mughal rule.",
    options: [
    ["element", "exertion", "evidence", "explanation"],
    ["cultivating", "early", "formative", "established"],
    ["disputed", "irregular", "nether", "settled"],
    ["admittance", "tranquility", "allegiance", "prestige"],
    ["adjoining", "adhering", "having", "declaring"],
    ["delineated", "divided", "circled", "deposited"]
    ],
    answer: []
    },
    {
    text: "What are allergies? Allergies are abnormal immune system reactions to things that are typically harmless to most people. When you're allergic to something, your immune system ________ believes that this substance is harmful to your body. Substances that cause allergic reactions- such as certain foods, dust, plant pollen, or medicines- are known as allergens. In an attempt to ________ the body, the immune system produces IgE antibodies to that allergen. Those antibodies then cause certain cells in the body to ________  chemicals into the bloodstream, one of which is histamine (pronounced: HIS-tuh-meen). The histamine then ________ on the eyes, nose, throat, lungs, skin, or gastrointestinal tract and causes the symptoms of the allergic reaction. Future exposure to that same allergen will trigger this ________ response again. This means that every time you come into contact with that allergen, you'll have some form of allergy symptoms.",
    options: [
    ["mistakenly", "misleadingly", "involuntarily", "unprovokedly"],
    ["protect", "strengthen", "equip", "hedge"],
    ["dissolve", "thicken", "release", "crystallize"],
    ["focuses", "targets", "reacts", "acts"],
    ["antigen", "counter", "antibody", "psychological"]
    ],
    answer: []
    },
    {
    text: "One of the most important things to remember is that classic does not necessarily translate to favorite or bestselling. Literature is instead considered classic when it has stood the test of time and it stands the test of time when the artistic quality it expresses - be it an ________ of life, truth, beauty, or anything about the universal human condition - continues to be relevant and continues to inspire emotional responses, no matter the period in which the work was ________ . Indeed, classic literature is considered as such ________ of book sales or public popularity. That said, classic literature ________ merits lasting recognition - from critics and other people in a position to influence such decisions - and has a universal appeal. And, while effective use of language as well as technical excellence - is a must, not everything that is well-written or is characterized by technical achievement or critical acclaim will automatically be considered a classic. Conversely, works that have not been acknowledged or received ________ by the writer's contemporaries or critics can still be considered as classics.",
    options: [
    ["expression", "iconization", "imagination", "exaggeration"],
    ["written", "writing", "write", "to write"],
    ["regardless", "lacking", "devoid", "careless"],
    ["exclusively", "usually", "merely", "consequently"],
    ["imposingly", "positively", "efficiently", "arguably"]
    ],
    answer: []
    },
    {
    text: "Leadership is all about being granted permission by others to lead their thinking. It is a bestowed moral authority that gives the right to organize and direct the efforts of others. But moral authority does not come from simply managing people effectively or communicating better or being able to motivate. It comes from many ________ , including being authentic and genuine, having integrity, and showing a real and deep understanding of the business in question. All these ________ build confidence. Leaders lose moral authority for three reasons: they behave ________ , they become plagued by self-doubt and lose their conviction, or they are blinded by power, lose self-awareness and thus lose ________ with those they lead as the context around them changes. Having said all this, it has to be assumed that if someone becomes a leader, at some point they understand the difference between right and wrong. It is up to them to ________ by a moral code and up to us to ensure that the moment we suspect they do not, we fire them or vote them out.",
    options: [
    ["foundations", "derivatives", "outcomes", "sources"],
    ["origins", "functions", "elements", "factors"],
    ["falsely", "outrageously", "eternally", "unethically"],
    ["contempt", "confirmation", "connection", "convection"],
    ["abide", "coincide", "stand", "conform"]
    ],
    answer: []
    },
    {
    text: "Moreover, for Professor David Phoenix, the dean of the faculty of science and technology, the return of single-honors chemistry is a ________  of credibility and pride. If you say you're a science faculty, you have to have all the core sciences, and this course will mean we attract a new supply of potential Masters and PhD students in chemistry. Phoenix is adamant that the new course will teach solid chemistry, but he thinks that an attraction for students will be a teaching approach that ________ significantly from his days as an undergraduate. This takes real-life issues as the starting point of lectures and modules, such as how drugs are made or the science behind green issues. Out of this study, he says, students will be exposed to the same core chemistry unchanged over decades, but they will be doing it in a way that is more ________ and more likely to lead to more fundamental learning. It is an approach that ________  chemistry' s recent success story: moving with the times, while holding fast to the subject's essential role as a building block of science and technological advance.",
    options: [
    ["matter", "sum", "degree", "pinch"],
    ["divides", "diversify", "differs", "deviates"],
    ["conventional", "engaging", "courageous", "pretentious"],
    ["realizes", "depicts", "mobilizes", "symbolizes"]
     ],
     answer: []
     },
    {
    text: "When I enrolled in my master's course at Oxford last year, I had come straight from medical school with the decision to leave clinical science for good. Thinking back, I realize that I didn't put very much ________  on this decision at the time. But today, I more clearly understand the ________ of leaving my original profession. When I meet old friends who are now physicians and surgeons, I sense how our views on medical problems have ________ .They scrutinize the effects of disease and try to eliminate or alleviate them; I try to understand how they come about in the first place. I feel happier working on this side of the problem, although I do occasionally miss clinical work and seeing patients. However, when I think about the rate at which my medical skills and knowledge have ________ , the years spent reading weighty medical textbooks, the hours spent at the bedside, I sometimes wonder if these years were partly a ________  of time now that I am pursuing a research career. Nonetheless, I know the value of my medical education. It is easy to forget the importance of the biosciences when working with model organisms in basic research that seem to have nothing to do with a sick child or a suffering elderly person. Yet, I still have vivid memories of the cruel kaleidoscope of severe diseases and of how they can ________ a human being. I hope to retain these memories as a guide in my current occupation.",
    options: [
    ["attention", "weight", "accumulation", "denotation"],
    ["subsequences", "consequences", "successors", "successions"],
    ["conflicted", "diverged", "converged", "diversified"],
    ["disappeared", "disclosed", "dipped", "dissipated"],
    ["consumption", "waste", "misuse", "splash"],
    ["strike", "jar", "pounce", "simulate"]
    ],
    answer: []
    },
    {
    text: "The best way to experience the museum is from the top floor down. One emerges from the elevators into a spacious hallway. At some hours, museum staff members are giving small hands- on ________  of techniques such as quillwork. These activities take place near wall cases filled with objects. These small surveys of the museum's vast holdings are called Windows on the Collection. Appearing on every floor in the halls that ________ the rotunda, these display cases serve as a kind of visible storage, presenting a panoply of objects and materials. Their arrangements are artistic, and their contents perhaps ________  designed to jar the visitor. For example, the largest case on the fourth floor displays animal imagery of all sorts. Older ________ of birds, mammals and sea creatures ________ alongside witty contemporary works such as Larry Beck' s version of a Yup' ik mask made of rubber tire treads and metal tools, and Jim Schoppert' s Walrus Loves Baby Clams mask. Recently-made ivory carvings challenge the common distinction between so-called authentic fine art and commodity( a distinction which may be passé in the academic world, but which still ________  strong among much of the general public).",
    options: [
    ["articles", "patterns", "specimens", "demonstrations"],
    ["override", "overstate", "overturn", "overlook"],
    ["intentionally", "inevitably", "inadvertently", "favorably"],
    ["statutes", "totems", "images", "sculptures"],
    ["present", "flourish", "appear", "scatter"],
    ["insists", "notes", "holds", "heaves"]
     ],
     answer: []
     },
    {
    text: "Zika is more pernicious than public health officials anticipated. At present, it is circulating in more than 50 countries. And as of mid-May, seven countries or territories have reported cases of microcephaly or other serious birth defects linked to the virus, which ________ by mosquito bite, blood transfusion or sexual contact with an infected human. It can also be passed from mother to fetus during pregnancy. Despite Zika's vast ________ over almost 70 years, there is little genetic difference among the various strains, according to an analysis by researchers at the University of Texas Medical Branch at Galveston. For example, the strain currently in the Americas and another previously detected in French Polynesia are practically ________ from each other (group in white box). If the virus has changed so little over time, why is it rearing its ugly head now? Scientists are not sure yet, but new experimental work in mosquitoes suggests that the virus was capable of ________ detrimental health effects and outbreaks all along. Therefore, it is unlikely mutations enabled new abilities. Instead, public health officials probably did not understand Zika's potential because the virus ________  mostly in remote locations until recently.",
    options: [
    ["transmitted", "had been transmitted", "was transmitted", "is transmitted"],
    ["range", "extent", "number", "domain"],
    ["identical", "indistinguishable", "odd", "different"],
    ["shaping", "pressing", "causing", "making"],
    ["is circulated", "circulate", "are circulated", "circulated"]
    ],
    answer: []
    },
    {
    text: "The Ironbridge Gorge World Heritage property covers an area of 5.5 km2 (550ha) and is located in Telford, Shropshire, approximately 50 km north-west of Birmingham. The Industrial Revolution ________  in the Ironbridge Gorge before spreading across the world, bringing with it some of the most far-reaching changes in human history. The site ________ the steep-sided, mineral-rich Severn Valley from a point immediately west of Ironbridge downstream to Coalport, together with two smaller river valleys extending northwards to Coalbrookdale and Madeley. The Ironbridge Gorge ________ into the origins of the Industrial Revolution and also contains extensive remains of that period when the area was the focus of international attention from artists, engineers, and writers. The site contains substantial remains of mines, foundries, factories, workshops, warehouses, ironmasters' and workers' housing, public buildings, infrastructure, and transport systems, together with ________ of the Severn Gorge. In addition, there also remain ________ of artifacts and archives relating to the individuals, processes, and products that made the area so important. ________ overturned the fascinating image, have its modern impression, had its 18th century roots, came to an abrupt halt",
    options: [
    ["fuses a 5km width of", "incorporates a 5km length of", "expands a lot of", "adds a finishing touch to"],
    ["gives a useful understanding", "afford some information", "allows a good understanding", "offers a powerful insight"],
    ["conventional woods and stuff", "outdated roadside scenery", "traditional landscape and forests", "old- fashioned countryside"],
    ["big crowds", "large communities", "extensive collections", "customized groups"]
     ],
     answer: []
     },
    {
    text: "Emerald is defined by its green color. To be an emerald, a specimen must have a ________ green color that falls in the range from bluish green to green to slightly yellowish green. To be an emerald, the specimen must also have a rich color. Stones with weak saturation or light tone should be called green beryl. ________ the beryl's color is greenish blue then it is an aquamarine. If it is greenish yellow it is heliodor. This color definition is a source of ________ . Which hue, tone, and saturation combinations are the dividing lines between green beryl and emerald? Professionals in the gem and jewelry trade can disagree on where the lines should be ________ . Some believe that the name emerald should be used when chromium is the cause of the green color, and that stones colored by vanadium should be called green beryl. Calling a gem an emerald instead of a green beryl can have a significant ________ upon its price and marketability. This color confusion exists within the United States. In some other countries, any beryl with a green color - no matter how faint - is called an emerald.",
    options: [
    ["usually", "succinctly", "distinctly", "undoubtedly"],
    ["Since", "That", "Although", "If"],
    ["expression", "fusion", "condition", "confusion"],
    ["kept", "let", "drawn", "taken"],
    ["result", "error", "impact", "change"]
    ],
    answer: []
    },
    {
    text: "DNA is a molecule that does two things. First, it acts as the ________ material, which is passed down from generation to generation. Second, it directs, to a considerable extent, the construction of our bodies, telling our cells what kinds of molecules to make and ________ our development from a single- celled zygote to a fully formed adult. These two things are of course ________ The DNA sequences that construct the best bodies are more likely to get passed down to the next generation because well- constructed bodies are more likely to survive and ________ to reproduce. This is Darwin's theory of natural selection stated in the language of DNA.",
    options: [
    ["acquired", "hereditary", "nutritional", "metabolic"],
    ["establishing", "guiding", "pushing", "determining"],
    ["supplanted", "connected", "paralleled", "required"],
    ["thus", "yet", "namely", "nevertheless"]
    ],
    answer: []
    },
    {
    text: "This is a challenging time for UK students, and we should be making their transition from university to the globalized world easier, not harder. The British Academy has voiced its ________ over the growing language deficit for some years, and the gloomy statistics speak for themselves. We need ________ action if we are remedying this worsening situation. The ________  of the problem lie within schools, but Vice-Chancellors have the power to drive change and help their students recognize the importance of learning languages, and about the countries where they are spoken and the cultures they sustain. We ________  them to act and protect this country's long term economic, social and cultural standing.",
    options: [
    ["opinion", "concern", "criticism", "expectation"],
    ["inclusive", "decisive", "perfunctory", "formative"],
    ["roots", "scourges", "links", "grounds"],
    ["suppress", "appeal", "persuade", "urge"]
    ],
    answer: []
    },
    {
    text: "Part of the fun of experimenting with granular materials, says Stephen W. Morris, is the showmanship. In one stunt that he has demonstrated in settings ranging from high school classrooms to television studios, the University of Toronto ________  loads clear plastic tubes with white table salt and black sand and starts them rotating. What transpires in the tubes usually knocks the socks off of any ________ bystander. Instead of mixing into a drab gray sameness, the sand particles slowly separate into crisp black bands cutting across a long, narrow field of salt. As the spinning continues, some bands disappear and new ones arise. It's a parlor trick, Morris says. Not to deny its entertainment value, this ________ of how strangely granular materials can behave is also an authentic experiment in a field both rich in fundamental physics and major practical consequences. Yet granular mixing today remains more of an art than a ________  , says chemical engineer Fernando J.",
    options: [
    ["psychologist", "physicist", "pharmacists", "physicians"],
    ["uncomfortable", "unsuspecting", "representing", "suspecting"],
    ["theory", "demonstration", "exhibition", "notion"],
    ["tradition", "science", "hobby", "computation"]
    ],
    answer: []
    },
    {
    text: "Over many centuries and across many territories the Romans were able to win an astonishing number of military victories and their success was due to several important factors. Italy was a peninsula not easily attacked. ________ a huge pool of fighting men to draw upon, a disciplined and innovative army, a centralized command and line of supply, expert engineers, effective diplomacy ________ a network of allies, and an inclusive approach to conquered people, ________ allowed for strengthening and broadening of the Roman power and logistical bases. ________ , her allies not only supplied, equipped and paid for additional men but they also supplied vital materials such as grain and ships. ________ , Rome was more or less in a continuous state of war or readiness for it and believed absolutely in the necessity of defending and imposing on others what she firmly believed was her cultural superiority.",
    options: [
    ["But with", "There was", "There is", "Here has"],
    ["through", "by", "about", "and"],
    ["which", "who", "whom", "that"],
    ["Further", "Recent", "Because", "So"],
    ["Despite of", "Instead of", "On top of all", "At the thought of"]
    ],
    answer: []
    },
    {
    text: "Formed two million years ago when low-density salt was pushed up through the much harder materials surrounding it, the Cardona Salt Mountain is one of the largest domes of its kind in the world, and unique in Europe. While small amounts of other minerals pervade the savory hill, the salt pile ________ a near translucent quality if not for the thin layer of reddish clay coating the exterior. The ________ of the mountain was recognized as early as the middle ages when Romans began exploiting the mountain for its salt, which began to bolster the young Cardonian ________ . With the invention of industrial mining techniques, a mine was built into the side of the mountain and a thriving facility formed at its base as excavators dragged enormous amounts of potash (water-soluble) salt from the innards of the hill. In ________ to the mineral export, the locals of Cardona began making salt sculptures to sell and invented a number of hard, salty pastries unique to the area.",
    options: [
    ["would have", "have had", "has", "has had"],
    ["significant", "significance", "significantly", "signify"],
    ["correspondence", "economy", "accordance", "economist"],
    ["ratio", "addition", "interest", "adaption"]
    ],
    answer: []
    },
    {
    text: "The emperor is the giant of the penguin world and the most iconic of the birds of Antarctica. Gold patches on their ears and on the top of their chest ________ their black heads. Emperors and their closest relative, the king penguin, have unique breeding cycles, with very long chick-rearing periods. The emperor penguins breed the furthest south of any penguin species, forming large colonies on the sea- ice surrounding the Antarctic continent. They are true Antarctic birds, rarely ________ in the subantarctic waters. So that the chicks can fledge in the late summer season, emperors breed during the cold, dark winter, with temperatures as low at - 50°C and winds ________ to 200 km per hour. They trek 50–120 km (30–75 mls) over the ice to breeding colonies which may include thousands of individuals. The female lays a single egg in May then passes it over to her mate to incubate ________ she goes to sea to feed. For nine weeks the male fasts, losing 45% of his body weight. The male balances the egg on his feet, which are ________ in a thick roll of skin and feathers. The egg can be 70°C warmer than the outside temperature.",
    options: [
    ["clear up", "brighten up", "trade off", "match up to"],
    ["have seen", "seen", "see", "seeing"],
    ["up", "on", "out", "off"],
    ["whilst", "where", "so", "after"],
    ["covering", "protected", "covered", "protecting"]
    ],
    answer: []
    },
    {
    text: "Opportunity cost incorporates the notion of scarcity: No matter what we do, there is always a trade-off. We must trade off one thing for another because resources are limited and can be used in different ways. ________ , we use up resources that could have been used to acquire something else. The ________ of opportunity cost allows us to measure this tradeoff. Most decisions ________ several alternatives. For example, if you spend an hour studying for an economics exam, you have one fewer hour to pursue other activities. To determine the opportunity cost of an activity, we look at what you consider the best of these 'other' activities. For example, suppose the alternatives to studying economics are studying for a history exam or working in a job that pays $10 per hour. If you consider studying for history a ________ use of your time than working, then the opportunity cost of studying economics is the four extra points you could have received on a history exam if you studied history instead of economics. Alternatively, if working is the best alternative, the opportunity cost of studying economics is the $10 you could have earned instead.",
    options: [
    ["Contrary with acquiring something", "Without acquiring something", "By acquiring something", "Having acquired anything"],
    ["image", "use", "notion", "strategy"],
    ["involved", "have involved", "involve", "had involved"],
    ["better", "value", "best", "worse"]
    ],
    answer: []
    },
    {
    text: "The last tourists may have been leaving the Valley of the Kings on the West Bank in Luxor but the area in front of the tomb of Tutankhamun remained far from deserted. Instead of the ________ that usually descends on the area in the evening it was a hive of activity. TV crews trailed masses of equipment, journalists milled and photographers held their cameras at the ready. The reason? For the first time since Howard Carter ________ the tomb in 1922 the mummy of Tutankhamun was being prepared for public display. Inside the subterranean burial chamber Egypt's archaeology supremo Zahi Hawass, ________  by four Egyptologists, two restorers and three workmen, were slowly lifting the mummy from the golden sarcophagus where it has been rested -- mostly undisturbed -- for more than 3,000 years. The body was then placed on a wooden stretcher and ________ to its new home, a high- tech, climate-controlled plexi-glass showcase located in the outer chamber of the tomb where, covered in linen, with only the face and feet exposed, it now greets visitors.",
    options: [
    ["chaos", "permanence", "ecstasy", "tranquility", "franchise"],
    ["showed", "founded", "discovered", "dismantled", "accounted"],
    ["accomplished", "complimented", "accompanied", "affected", "afflicted"],
    ["commuted", "transmitted", "transported", "convoy", "conflated"]
    ],
    answer: []
    },
    {
    text: "Americans approached a record level of generosity last year. Of the $260.28bn given to charity in 2005, 76.5 percent of it came from individual ________ . These people gave across the range of nonprofit bodies, from museums to hospitals to religious organizations, with a heavy ________ on disaster relief after the Asian tsunami and US hurricanes. In total, Americans gave away 2.2 per cent of their household income in 2005, slightly above the 40-year ________  of 2.1 per cent.",
    options: [
    ["donors", "accounts", "businessmen", "honors"],
    ["analysis", "imagination", "emphasis", "hypothesis"],
    ["sovereignty", "coverage", "average", "indebtedness"]
     ],
     answer: []
     },
    {
    text: "This summer, 41 UBC alumni and friends participated in expeditions to the Canadian Arctic and the legendary Northwest Passage. Presentations, conversations and learning accompanied their exploration of the great ________ aboard the Russian-flagged Akademik Ioffe, designed and built in Finland as a scientific research vessel in 1989. Her bridge was open to passengers virtually 24 hours a day. Experts on ________ presented on topics including climate change, wildlife, Inuit culture and history, and early European explorers. UBC professor Michael Byers presented on the issue of Arctic sovereignty, a ________ cause of debate as ice melts, new shipping routes open, and natural resources ________  accessible. Recommended pre-trip reading was late UBC alumni Pierre Berton's book, The Arctic Grail.",
    options: [
    ["outdoors", "view", "outside", "scene"],
    ["board", "boat", "ship", "aboard"],
    ["slight", "growing", "disappearing", "growth"],
    ["were become", "turn", "become", "became"]
    ],
    answer: []
    },
    {
    text: "According to the literature, the history of ________ can be traced back to as early as the 7th century when the monks in India tried to immunize themselves by drinking snake ________  .The first vaccination was inoculation with human smallpox, a practice widely ________ out in ancient India, Arabia, and China. This method of vaccination consisted of collecting pus from a patient suffering from a mild form of smallpox virus infection and ________ the sample to a healthy human, which later led to a minor infection. This method was first introduced in England by a Greek named Timoni. However, this method had a risk of spreading smallpox in the community and even worsening the health condition of the person who received the inoculation. While the use of human smallpox vaccine was ________  , Jenner came up with bovine smallpox vaccine in 1796; this new method also faced controversy but continued to be ________ .Smallpox became a preventable disease by injecting pus extracted from a human infected with cowpox virus. Jenner named the substance vaccine after the Latin word vacca which means cow, and thus the process of giving vaccine became vaccination.",
    options: [
    ["drug", "prescription", "vacancy", "vaccination"],
    ["velocity", "venus", "rhythm", "venom"],
    ["carried", "put", "excluded", "practiced"],
    ["calculating", "including", "inoculating", "renovating"],
    ["accepted", "contributed", "controversial", "popular"],
    ["universalized", "realized", "exclusive", "urbanized"]
    ],
    answer: []
    },
    {
    text: "Folklore, a modern term for the ________ of traditional customs, superstitions, stories, dances, and songs that have been adopted and maintained within a given ________ by processes of repetition is not reliant on the written word. Along with folk songs and folktales, this broad ________ of cultural forms embraces all kinds of legends, riddles, jokes, proverbs, games, charms, omens, spells, and rituals, especially those of pre-literate societies or social classes. Those forms of verbal expression that are handed on from one generation or locality to the next by ________  of mouth are said to constitute an oral ________  ",
    options: [
    ["activity", "achievement", "symbol", "body"],
    ["family", "community", "organization", "immunity"],
    ["experience", "category", "experiment", "use"],
    ["development", "transmission", "word", "transition"],
    ["tone", "condition", "prediction", "tradition"]
    ],
    answer: []
    },
    {
    text: "Researchers already know that spending long periods of time in a zero-gravity ________ —such as that inside the International Space Station (ISS) — results in loss of bone density and ________ to the body’s ________ . That’s partly why stays aboard the ISS are ________ at six months. And now, a number of NASA astronauts are reporting that their 20/20 ________ after spending time in space, with many needing glasses once they returned to Earth.",
    options: [
    ["planet", "weather", "climate", "environment"],
    ["enhancement", "damage", "gain", "recovery"],
    ["muscles", "flexibility", "development", "action"],
    ["allowed", "excessive", "timed", "restricted"],
    ["voices", "smelling", "vision", "hearing"],
    ["disappeared", "fatigued", "faded", "strengthened"]
    ],
    answer: []
    },
    {
    text: "David Lynch is professor and head of education at Charles Darwin University. ________ to this he was sub dean in the Faculty of Education and Creative Arts at Central Queensland University and foundation head of the University’s Noosa ________ . David’s career in education began as a primary school teacher in Queensland in the early 1980’s and ________ to four principal positions before ________ higher education. David’s research interests predominate in teacher education with particular interest in building teacher capability to meet a changed world.",
    options: [
    ["After", "Prior", "Last", "Before"],
    ["campus", "place", "camp", "college"],
    ["projected", "processed", "pronounced", "progressed"],
    ["leaving", "hiring", "entering", "having"]
    ],
    answer: []
    },
    {
    text: "The increasing darkness in the Northern Hemisphere this time of year indicates to the plant that ________ is coming on. So it starts recouping materials from the ________ before they drop off. Evergreens protect their needle-like foliage from freezing with ________ coatings and natural antifreezes. But broadleaf plants, like sugar maples, birches, and sumacs, have no such protections. As a result, they ________ their leaves. But before they do, the plants first try to ________  important nutrients such as nitrogen and phosphorus.",
    options: [
    ["fall", "summer", "spring", "winter"],
    ["trunks", "leaves", "roots", "branches"],
    ["booty", "sticky", "waxy", "watery"],
    ["shed", "collected", "brought", "beat"],
    ["deliver", "call", "convene", "salvage"]
    ],
    answer: []
    },
    {
    text: "Financing of Australian higher education has undergone dramatic ________ since the early 1970s. Although the Australian Government provided regular funding for universities from the late 1950s, in 1974 it ________ full responsibility for funding higher education — abolishing tuition fees with the intention of making university education affordable to all Australians who had the ability and who wished to participate in higher education. Since the late 1980s, there has been a move towards greater private contributions, ________  student fees. In 1989, the Australian Government introduced the Higher Education Contribution Scheme (HECS) which included a loans scheme to help students finance their contributions. This enabled university to remain ________  to students by delaying their payments until they could afford to pay off their loans. In 2002, the Australian Government ________ a scheme similar to HECS for postgraduate students - the Postgraduate Education Loan Scheme (PELS). Funding for higher education comes from various sources. This article examines the three main sources - Australian Government funding, student fees and charges, and HECS. While the proportion of total ________ raised through HECS is relatively small, HECS payments are a significant component of students' university costs, with many students carrying a HECS debt for several years after leaving university. This article also focuses on characteristics of university students based on their HECS liability status, and the level of accumulated HECS debt.",
    options: [
    ["change", "appeal", "exhaustion", "plateau"],
    ["assumed", "clarified", "paid", "represented"],
    ["without", "automatically", "with", "particularly"],
    ["access", "inaccessible", "accessibility", "accessible"],
    ["produced", "carried", "remembered", "introduced"],
    ["expenses", "expenditure", "profit", "revenue"]
    ],
    answer: []
    },
    {
    text: "A herbal is a book of plants, describing their appearance, their properties and how they may be used for preparing ointments and medicines. The medical use of plants is ________ on fragments of papyrus and clay tablets from ancient Egypt, Samaria and China that date back 5,000 years but document traditions far older still. Over 700 herbal remedies were detailed in the Papyrus Ebers, an Egyptian text written in 1500 BC. Around 65 BC, a Greek physician called Dioscorides wrote a herbal that was ________  into Latin and Arabic. Known as ‘De materia medica’, it became the most influential work on medicinal plants in both Christian and Islamic worlds until the late 17th century. An illustrated manuscript copy of the text made in Constantinople (modern-day Istanbul) ________ from the sixth century. The first printed herbals date from the dawn of European printing in the 1480s. They provided valuable information for apothecaries, whose job was to make the pills and potions ________ by physicians. In the next century, landmark herbals were produced in England by William Turner, considered to be the father of British botany, and John Gerard, whose illustrations would inspire the floral fabric, wallpaper and tile designs of William Morris four centuries later.",
    options: [
    ["registered", "recorded", "memorized", "discovered"],
    ["moved", "interpreted", "translated", "removed"],
    ["preserves", "revives", "suffers", "survives"],
    ["instructed", "pointed", "prescribed", "determined"]
    ],
    answer: []
    },
    {
    text: "Sales jobs allow for a great deal of discretionary time and effort on the part of the sales representatives - especially when compared with managerial, manufacturing, and service jobs. Most sales representatives work independently and outside the immediate presence of their sales managers. Therefore, some form of goals needs to be in place ________ their performance. Sales personnel are not the only professionals with performance goals or quotas. Health care professionals operating in clinics have daily, weekly, and monthly goals in terms of patient visits. Service personnel are assigned a number of service calls they ________ during a set time period. Production workers in manufacturing have output goals. So, why are achieving sales goals or quotas such a big deal? The answer to this question can be found by examining how a firm's other departments are affected by how well the company's salespeople achieve their performance goals. The success of the business ________  the successful sales of its products and services. Consider all the planning, the financial, production and marketing efforts that go into ________ the sales force sells. Everyone depends on the sales force to sell the company's products and services and they eagerly anticipate knowing things are going.",
    options: [
    ["helping confuse and mislead", "to help motivate and guide", "help motivating and guiding", "help confuse and mislead"],
    ["have displayed", "must perform", "are reforming", "can take"],
    ["leads to", "hinges on", "contributes to", "results in"],
    ["producing what", "consuming as", "protecting that", "purchasing which"]
    ],
    answer: []
    },
    {
    text: "Before effective anesthetics, surgery was very crude and very painful. Before 1800, alcohol and opium had ________ success in easing pain during operations. Laughing gas was used in 1844 in dentistry in the USA, but failed to ease all pain and patients ________ conscious. Ether (used from 1846) made patients totally unconscious and lasted a long time. However, it could make patients cough during operations and sick afterwards. It was highly flammable and ________ in heavy glass bottles. Chloroform (used from 1847) was very effective with few side effects. However, it was difficult to get the dose right and could kill some people ________  the effect on their heart. An inhaler helped to regulate the dosage.",
    options: [
    ["little", "a little", "few", "a few"],
    ["contained", "retained", "remained", "released"],
    ["has transported", "was transported", "had transported", "have transported"],
    ["rather than", "because of", "but", "due"]
    ],
    answer: []
    },
    {
    text: "With their punk hairstyles and bright colors, marmosets and tamarins are among the most attractive primates on earth. These fast-moving, lightweight animals live in the rainforests of South America. Their small size ________ it easy for them to dart about the trees, catching insects and small animals such as lizards, frogs, and snails. Marmosets have another unusual food ________  - they use their chisel-like incisor teeth to dig into tree bark and lap up the gummy sap that seeps out, leaving telltale, oval-shaped holes in the ________ when they have finished. But as vast tracts of rainforest are cleared for plantations and cattle ranches, marmosets and tamarins are in serious ________  of extinction.",
    options: [
    ["brings", "makes", "takes", "claims"],
    ["originality", "provenience", "source", "origin"],
    ["grasses", "branches", "trees", "roots"],
    ["fatal", "endangered", "safe", "danger"]
    ],
    answer: []
    },
    {
    text: "Organizations need to integrate their sales activities more both internally and with customers' needs according to a new book co-authored by an academic at the University of East Anglia. The book ________ how sales can help organizations to become more customer-oriented and considers how they are responding to challenges such as increasing competition, more ________ customers and a more complex selling environment. Many organizations are facing escalating costs and a growth in customer power, ________ makes it necessary to allocate resources more strategically. The sales function can provide critical customer and market knowledge to help inform both innovation and marketing. However, the authors say that within the industry ________ is still uncertainty about the shape a future sales team should take, how it should be managed, and how it ________  into their organization's business model.",
    options: [
    ["predicts", "stipulates", "addresses", "circumscribes"],
    ["demanding", "aggressive", "friendly", "needy"],
    ["which", "this", "that", "where"],
    ["that", "there", "which", "this"],
    ["applies", "segregates", "fits", "develops"]
    ],
    answer: []
    },
    {
    text: "Over the last ten thousand years there seem to have been two separate and conflicting building sentiments throughout the history of towns and cities. ________ is the desire to start again, for a variety of reasons: an earthquake or a tidal wave may have demolished the settlement, or fire destroyed it, or the new city ________ a new political beginning. The other can be likened to the effect of a magnet: established settlements attract people, who ________ to come whether or not there is any planning for their arrival. The clash between these two sentiments is evident in every established city ________ its development has been almost completely accidental or is lost in history. Incidentally, many settlements have been planned from the beginning but, for a variety of reasons, no settlement followed the plan. A good example is Currowan, on the Clyde River in New South Wales, which ________ in the second half of the 19th century, in expectation that people would come to establish agriculture and a small port. But no one came.",
    options: [
    ["It", "What", "One", "That"],
    ["highlights", "starts", "marks", "protrudes"],
    ["hesitate", "dislike", "turn", "tend"],
    ["whereas", "whatever", "if", "unless"],
    ["has been surveyed", "had surveyed", "be surveyed", "was surveyed"]
     ],
     answer: []
     },
    {
    text: "Never has the carbon footprint of multinational corporations been under such intense scrutiny. Inter- city train journeys and long-haul flights to ________ face-to-face business meetings contribute significantly to greenhouse gases and the resulting ________ on the environment. The Anglo-US company Teliris has introduced a new video-conferencing technology and partnered with the Carbon Neutral Company, enabling corporate outfits to become more environmentally responsible. The innovation allows simulated face-to-face meetings to be held across continents without the time ________ or environmental burden of international travel. Previous designs have enabled video-conferencing on a point-to-point, dual-location basis. The firm's VirtuaLive technology, however, can bring people together from up to five ________  locations anywhere in the world - with ________  transmission quality.",
    options: [
    ["create", "conduct", "produce", "generate"],
    ["gases", "strain", "affect", "steam"],
    ["pressure", "limit", "stress", "press"],
    ["separate", "each", "single", "respectively"],
    ["unreasonable", "unrealistic", "unreliable", "unrivaled"]
    ],
    answer: []
    },
    {
    text: "According to research conducted by Cambridge University, flowers can find their own ways to attract insects to help them pollinate. Flowers will release an ________ smell. A scientist and her ________  did an experiment in which they use fake flowers to attract bees and insects. In their experiments, they freed many bumblebees from their ________  repeatedly and got the same results.",
    options: [
    ["strange", "wired", "irresistible", "uncomfortable"],
    ["friends", "children", "colleagues", "relatives"],
    ["dens", "destinations", "origins", "tastes"]
    ],
    answer: []
    },
    {
    text: "What is a country, and how is a country defined? When people ask how many countries there are in the world, they expect a simple answer. After all, we've explored the ________ planet, we have international travel, satellite navigation and plenty of global organizations like the United Nations, ________ we should really know how many countries there are! However, the answer to the question varies according to whom you ask. Most people say there are 192 countries, but others point out that there could be more like 260 of them. So why isn't there a straightforward answer? The problem arises because there isn't a universally agreed definition of 'country' and because, for political reasons, some countries find it convenient to recognize or not recognize ________  countries.",
    options: [
    ["very", "whole", "only", "total"],
    ["for", "while", "but", "so"],
    ["those", "their", "other", "all"]
    ],
    answer: []
    },
    {
    text: "There were twenty-six freshmen ________ in English at Beijing Language Institute in the class of 1983. I was assigned to Group Two with another eleven boy and girls who had come from big cities in China. I was ________ that language study required smallness so that we would each get more attention from the skillful teachers. The better the school, the smaller the class. I realized that my classmates were already ________  in English, simple sentences tossed out to each other in their red-faced introductions and carefree chatting. Their intonations were curving and dramatic and their pronunciation refined and accurate. But as I stretched to catch the drips and drops of their humming dialogue, I couldn’t ________ it all, only that it was English. Those words now flying before me sounded a little familiar. I had read them and tried to speak to them, but I had never heard them ________ back to me in such a speedy, fluent manner. My big plan of beating the city folks was thawing before my eyes.",
    options: [
    ["majored", "major", "majors", "majoring"],
    ["telling", "told", "tells", "tell"],
    ["talking", "talked", "talks", "talk"],
    ["understanding", "understand", "understands", "understood"],
    ["spoken", "spoke", "speaking", "speak"]
    ],
    answer: []
    },
    {
    text: "Drive down any highway,and you’ll see a proliferation of chain restaurants—most likely, if you travel long and far enough you’ll see McDonald's golden arches as well as signs for Burger King, Hardee’s,and Wendy’s the "big four" of burgers. Despite its name, though Burger King has fallen short of ________  the burger crown, unable to surpass market leader McDonald's No 1 sales status. Always the bridesmaid and never the bride, Burger King remains No 2. Worse yet, Burger King has experienced a six-year 22 percent decline in customer traffic, with its overall quality rating dropping while ratings for the other three ________  have increased. The decline has been ________  to inconsistent product quality and poor customer service. Although the chain tends to throw advertising dollars at the problem, an understanding of Integrated Marketing Communication theory would suggest that internal management problems (nineteen CEOs in fifty years) need to be ________ before a unified, long-term strategy can be put in place. The ________  of consistency in brand image and messages, at all levels of communication, has become a basic tenet of IMC theory and practice. The person who takes the customer’s order must communicate the same message as Burger King's famous tagline, Have it your way," or the customer will just buzz up the highway to a chain restaurant that seems more consistent and, therefore, more ________ filing, claiming, winning, getting",
    options: [
    ["constables", "contenders", "cooperators", "contestants"],
    ["dedicated", "contributed", "devoted", "attributed"],
    ["rectified", "ratified", "realized", "recognized"],
    ["importance", "pressure", "incumbency", "ignorance"],
    ["available", "reliable", "quality", "disputable"]
    ],
    answer: []
    },
    {
    text: "If after years of Spanish classes, some people still find it impossible to understand some native speakers, they should not worry. This does not ________ mean the lessons were wasted. Millions of Spanish speakers use neither standard Latin American Spanish nor Castilian, which ________ in US schools. The confusion is partly political - the Spanish-speaking world is very diverse. Spanish is the language of 19 separate countries and Puerto Rico. This means that there is no one standard dialect. The most common Spanish dialect taught in the US is standard Latin American. It is sometimes called Highland Spanish since it is generally spoken in the ________ areas of Latin America. While each country retains its own ________  and has some unique vocabulary, residents of countries such as Mexico, Colombia, Peru, and Bolivia generally speak Latin American Spanish, especially in urban centers. This dialect is noted for its ________ of each letter and its strong r sounds. This Spanish was spoken in Spain in the sixteenth and seventeenth centuries and was brought to the Americas by the early colonists. However, the Spanish of Madrid and of northern Spain, called Castilian, developed ________ that never reached the New World. These include the pronunciation of ci and ce as th. In Madrid, gracias (thank you) becomes gratheas (as opposed to gras-see-as in Latin America). Another difference is the use of the word vosotros (you all, or you guys) as the informal form of ustedes in Spain. Castilian sounds to Latin Americans much like British English sounds to US residents.",
    options: [
    ["usually", "only", "particularly", "necessarily"],
    ["evolve", "proceed", "precede", "predominate"],
    ["mountainous", "coastal", "rocky", "hidden"],
    ["accents", "actions", "authority", "thoughts"],
    ["elucidation", "remembering", "pronunciation", "collection"],
    ["normality", "characteristics", "problems", "distinguishes"]
    ],
    answer: []
    },
    {
    text: "In a sequence of bestsellers, including The Language Instinct and How the Mind Works, Pinker has argued the swathes of our mental, social and emotional lives may have ________ as evolutionary adaptations, well suited to the lives our ancestors eked out on the Pleistocene savannah. Sometimes it seems as if nothing is ________  from being explained this way. Road rage, adultery, marriage, altruism, our tendency to reward senior executives with corner offices on the top floor, and the smaller number of women who become mechanical engineers—all may have their ________ in natural selection, Pinker claims. The controversial implications are obvious: that men and women might ________ in their inborn abilities at performing certain tasks, for example, or that parenting may have ________  influence on personality.",
    options: [
    ["regarded", "described", "assimilated", "originated"],
    ["prohibited", "convinced", "immune", "protected"],
    ["needs", "roots", "demands", "values"],
    ["differ", "complicate", "indulge", "interested"],
    ["more", "some", "small", "little"]
    ],
    answer: []
    },
    {
    text: "Egg-eating snakes are a small group of snakes whose ________ consists only of eggs. Some eat only small eggs, which they have to swallow ________ , as the snake has no teeth. Instead, some other snakes eat bigger eggs, but it requires special ________ . These snakes have spines that stick ________ from the backbone. The spines crack ________  the egg as it passes through the throat.",
    options: [
    ["food", "meal", "snack", "diet"],
    ["slow", "entire", "whole", "all"],
    ["thinking", "treatment", "food", "supplement"],
    ["about", "on", "by", "out"],
    ["down", "up", "close", "open"]
    ],
    answer: []
    },
    {
    text: "School-to-work transition is a historically persistent topic of educational policymaking and reform that impacts national systems of vocational education and training. The transition process refers to a period between ________ of general education and the beginning of vocational education or the beginning of gainful employment as well as to training systems, institutions, and programs that prepare young people for careers. The status passage of youth from school to work has changed structurally under late modernism, and young people are forced to adapt to changing ________ of their environment, especially when planning for entry into the labor market. While some young people have developed ________  strategies to cope with these requirements, those undereducated and otherwise disadvantaged in society often face serious problems when trying to prepare for careers. Longer transitions lead to a greater vulnerability and to risky ________ ",
    options: [
    ["endurance", "processing", "beginning", "completion"],
    ["appearances", "demands", "necessities", "options"],
    ["unknown", "known", "successful", "unsuccessful"],
    ["demonstrations", "questions", "behaviors", "business"]
    ],
    answer: [],
    },
    {
    text: "It's like the molecular version of the Joker and the Riddler teaming up against Batman. ________ at Yale University have discovered that amyloid beta, a protein involved in Alzheimer's disease, can damage brain cells by binding to prion proteins, which are themselves infamous because, in their abnormal form, they cause things like mad cow disease. Amyloid beta is best known as the protein that forms the giant plaques that riddle the brains of people with Alzheimer's. Those plaques contain billions of copies of amyloid beta all stuck together in one gloppy mess. But the protein also exists in a more soluble form, either in single units or in small groups of 50 or 100. These smaller clusters don't cause the same large- scale mayhem as plaques, but they do damage neurons, impairing their ability to learn. And the Yale researchers wanted to find out how. They discovered that amyloid beta binds to the prion proteins normally found on neurons. What's more, the prions ramp up amyloid beta's ________  effects. Take away the prions and amyloid-beta clusters are ________ , findings ________ in the journal Nature. So drugs that prevent this amyloid-prion coupling could be a potent weapon against Alzheimer's.",
    options: [
    ["Wirelesses", "Fineness", "Hypoglycaemics", "Scientists"],
    ["allergic", "strophic", "neurotoxic", "histrionic"],
    ["harmless", "mollusks", "commons", "augments"],
    ["exulted", "content", "published", "demist"]
    ],
    answer: [],
    },
    {
    text: "Oliver Smithies won the Nobel Prize in ________ or Medicine in 2007. On June 27th, he spoke to students about what he learned from his thesis ________ , which ________ developing a new method to measure the osmotic pressures of mixes of proteins: Here's my osmotic pressure ________ . And I was rather proud of this method. And I ________  it with great delight. This paper has a record, you know: nobody ever quoted it. And nobody ever used the method again. And I didn't use the method again. So I have to ask you, what was the point of it all? Well, the answer is really a very serious answer. The answer is I learned to do good science. But it didn't matter what I did when I was learning to do good science. So it doesn't matter what you do when you're doing a thesis, you see. But it's very important that you enjoy it. Because if you don't enjoy it, you won't do a good job and you won't learn science. So all of this comes around to the fact that if you don't enjoy what you're doing, ask your advisors to let you do something else. And if your advisor won't do that, there's another ________  : change your advisor.",
    options: [
    ["Mentality", "Physiology", "Pottery", "Geniality"],
    ["shad", "sherd", "research", "watt"],
    ["involved", "mad", "evolved", "allot"],
    ["experiment", "magnificent", "measurement", "belligerent"],
    ["cohabit", "disulphide", "annexed", "published"],
    ["solution", "brougham", "futon", "union"]
    ],
    answer: [],
    },
    {
    text: "A common response to seeing an ant inside your house is to stomp on it. But if you crush a member of the ant species Tapinoma sessile, you might catch a whiff of a strange smell—a smell that reminds some people of blue cheese, rancid butter or rotten coconut. In fact, the smell is so noticeable that the insect's common name is the odorous house ant. And many people call it the coconut ant. In an effort to figure out why people have these reactions, ________ enlisted ________ at an event called the North Carolina BugFest. One-hundred-forty-three volunteers smelled smushed ants and were asked to identify the scent from four choices: blue cheese, rancid butter, rotten coconut or just other. Although Web sites overwhelmingly call the smell rotten coconut, almost 40 percent of the human judges picked blue cheese and about 25 percent picked rotten coconut. More than 30 percent went with the choice of other. The scientists then analyzed the chemicals ________ for the ant odor, as well as the smelly chemicals in blue cheese, fresh coconut and coconut buried underground for three days. It turns out that the chemistry of the ants' scent is indeed similar to that of blue cheese and rotten coconut. But not to fresh coconut. And the researchers note that the Penicillium ________ that turn coconut oil rancid are also ________ in the production of blue cheese. The study is in the journal American Entomologist. The researchers also noted that the most common write-in candidate as a description for the ants' aroma was cleaning spray. And one little girl told them that the ants smelled exactly like her doctor.",
    options: [
    ["siestas", "researchers", "freelances", "timeservers"],
    ["particulars", "solicitors", "visitors", "exoskeletons"],
    ["watchable", "volatile", "responsible", "cantonal"],
    ["diodes", "microbes", "thighbones", "firestorms"],
    ["involved", "scrubbed", "pot", "restaurant"]
    ],
    answer: [],
    },
    {
    text: "Here's a possible blood ________  remedy. But it's only for those who can stand the heat. It's capsaicin, the 'active ingredient' in peppers like habaneros that should probably be sold by prescription only. While lips burn and eyes water, blood vessels ________ relax, thanks to increased ________ of the signaling molecule nitric oxide. In rodents, anyway. For seven months, ________  in China fed a steady diet of capsaicin to rats bred to be hypertensive. Long-term consumption of the chemical ________ lowered the rats' blood pressure. The results appear in the August issue of the journal Cell Metabolism. Previous research found mixed results with capsaicin, but those studies only looked at ________ effects. Human trials are needed, but there's already a clue. Some 20 percent of people in northeastern China have high blood pressure. But the southwest—where hot peppers are a dietary staple—has a much lower incidence, half in some places. Human studies could also confirm whether the habanero, as legend has it, can cause hearing loss. Allegedly so that diners don't have to listen to their own screams.",
    options: [
    ["depressor", "whenever", "pressure", "quicker"],
    ["actually", "unfashionably", "anonymously", "concomitantly"],
    ["production", "impulsion", "cannon", "bondmen"],
    ["researchers", "cookers", "supervisors", "deans"],
    ["mortality", "bisexuality", "substantially", "practicality"],
    ["mortem", "short-term", "glowworm", "totem"]
    ],
    answer: [],
    },
    {
    text: "Australia and New Zealand have many common links. Both countries were recently settled by Europeans, are predominantly English speaking and in that sense, share a common cultural ________ .Although in lose proximity to one another, both countries are geographically isolated and have small populations by world ________ .They have similar histories and enjoy close relations on many fronts. In terms of population ________ ,Australia and New Zealand have much in common. Both countries have minority indigenous populations, and during the latter half of the 20th century have seen a steady stream of migrants from a variety of regions throughout the world. Both countries have ________ similar declines in fertility since the high levels recorded during the baby boom, and alongside this have enjoyed the benefits of continually improving life expectancy. One consequence of these trends is that both countries are faced with an ageing population, and the ________ challenge of providing appropriate care and support for this growing group within the community.",
    options: [
    ["heritage", "asset", "appearance", "prestige"],
    ["statistics", "standards", "authorities", "records"],
    ["senses", "characteristics", "aspects", "directions"],
    ["experienced", "expected", "compensated", "estimated"],
    ["associated", "favorable", "comprehensive", "irrevocable"]
    ],
    answer: [],
    },
    {
    text: "Three degrees does not sound like much but it ________ a rise in temperature compatible with the global heating that occurred between the last ice age, some 15,000 years ago, and the warmth of the eighteenth century. When Earth was cold, giant glaciers sometimes extended from the polar-regions as far south as St Louis in the US and the Alps in Europe. Later this century when it is three degree hotter glaciers everywhere will be melting in a climate of often ________ heat and drought, punctuated with storms and floods. The ________ for humanity could be truly horrific; if we fail to act swiftly, the full impact of global heating could cull us along with vast populations of the plant and animals with whom we share Earth. In a worst-case scenario, there might - in the 22nd century - be only a remnant of humanity eking out a ________  existence in the polar-regions and the few remaining oases left on a hot and arid Earth.",
    options: [
    ["represents", "tolerates", "proved", "show"],
    ["cool", "push", "suits", "unbearable"],
    ["facts", "fruits", "benefits", "consequences"],
    ["diminished", "increasing", "reducing", "faded"]
    ],
    answer: [],
    },
    {
    text: "Keith Haring began as an underground artist, literally. His first famous projects were pieces of stylized graffiti ________  in New York subway stations. Haring travelled from station to station, drawing with chalk and chatting with commuters about his work. These doodles helped him develop his classic style and he grew so ________ , doing up to 40 drawings a day, that it was not long before fame and a measure of fortune followed. Soon, galleries and collectors from the art establishment wanted to buy full-sized pieces by Haring. The paintings skyrocketed in price but this did not sit well with Haring's philosophy. He believed that art, or ________ his art, was for everyone. Soon, Haring opened a store which he called the Pop Shop, which he hoped would attract a broad range of people. While somewhat controversial among street artists,some of ________  accused Haring of 'selling out', the Pop Shop changed the way people thought about the relationship between art and business.",
    options: [
    ["drawers", "drew", "draws", "drawn"],
    ["prolific", "pedantic", "perceptive", "proactive"],
    ["in part", "at least", "by contrast", "actually"],
    ["those", "whom", "them", "whose"]
    ],
    answer: [],
    },
    {
    text: "Victoria University of Wellington has conferred an honorary degree on a distinguished astrophysicist in a recent graduation ceremony. Professor Warrick Couch ________ the honorary degree of Doctor of Science for his remarkable contribution to our knowledge of galaxies and dark energy. Professor Couch is a distinguished astrophysicist who has ________ a crucial role in the discovery that the Universe is expanding at an accelerating rate, a finding which led to the lead scientists being awarded a Nobel Prize in Physics in 2011, which he attended in recognition of his contribution. In his research, Professor CouchStructures in the Universe. He is also involved in uses large ground-based and spaced-based telescopes to observe galaxy clusters, ________ are the largest a number of national and international committees overseeing the management of these telescopes. ________ his own research activities, Professor Couch has worked to support young researchers and provide public comment on astronomy internationally.",
    options: [
    ["was receiving", "received", "had received", "is received"],
    ["led", "played", "done", "found"],
    ["who", "they", "those", "which"],
    ["As a result of", "Instead of", "In addition to", "Regarding"]
    ],
    answer: [],
    }
    "explanations", "function", "incompetent", "understanding"
"protect", "a form", "succeed", "possible"
"otherwise", "result", "cheaper"
"virtually", "contrary", "avid", "ingrained"
"at least", "like", "in the middle", "used to", "look after"
"focuses", "pass", "security", "public"
"support", "surprisingly", "double"
"has not been", "primarily", "prescribed", "corrupted", "while"
"increasingly", "balanced", "destruction", "measures", "citing"
"choices", "meet", "whether", "range", "activities"
"discourse", "ideas", "linguistic"
"exceptionally", "some way", "relying", "them to move away"
"as well as", "whole", "because of", "role"
"of", "banned", "statistically", "maintaining"
"discourse", "ideas", "enhances"
"at the same time", "exploring", "adult", "development", "both", "impact"
"enforcement", "prompted", "challenges", "creativity"
"applicable", "responsible", "policies", "regard"
"both", "remains", "variation", "from", "form on"
"appalling", "struggle", "shapes", "automatic", "trial"
"possibility", "whereby", "existence", "beyond", "prophecy", "sufficient"
"predicted", "purely", "commits", "spare"
"being able", "however", "committing"
"increasingly", "struggles", "combinations", "for example"
"impacts", "lessen", "barriers", "prepare", "commence"
"stimulation", "destructive", "eminently", "commensurate", "distressed"
"renamed", "rehabilitation", "genuine", "imprisonment"
"becoming", "erodes", "at", "where"
"however", "subject to", "in common", "along with", "but"
"skill", "flush", "beaten"
"spread", "substantial", "complicated", "discernible"
"a bit", "receive", "follows", "is", "transported"
"concept", "fit", "behavior", "argue"
"is charged up with", "which", "while", "right now", "as well as"
"characteristics", "planet", "astronomers", "detect"
"on", "fell", "overall", "considering"
"converted", "factor", "accounting", "comprised", "productive", "beneficial"
"reduction", "context", "differ", "low"
"determine", "balancing", "exchange", "value", "noted"
"catalog", "popularity", "emergence", " were observed"
"difficulty", "beholder", "smirk", " physically"
"turned to", "design", "had beaten", " allows, spin"
"does", "across", "instead", "followed", "rule"
"on", "more", "by", "otherwise", "no"
"while", "are afflicted", "are falling", "must have decreased", "variation", "this reason"
"eminent", "novel", "goal", "explicitly", "task"
"blanketed", "performing", "arranged"
"universe", "pure", "scientists", "possible"
"benefits", "scores", "cohort", "with", "reflect", "confounded"
"dominance", "twice", "part", "rate"
"through", "age", "importance", "authority", "talent"
"processes", "remove", "required", "happen", "finished"
"accepted", "unit", "so", "first"
"opens", "on", "marveled", "connects", "vehicular", "symbol", "until"
"traditionally", "throughout", "lone", "characteristics", "expectancy"
"drinking", "filter", "soil"
"downturn", "the course", "rate"
"who", "although", "would have sounded", "heart"
"recorded seeing", "began to use", "were suspended from", "commemorates"
"immediately", "wait", "case", "perform"
"demanding", "as well as", "equipped", "making"
"career", "figures", "sets"
"has shown", "as", "aims", "very few"
"why", "with", "using", "communicated", "each"
"scooped", "device", "conjunction", "ensuring"
"confident", "emotional", "rational", "personal"
"wellbeing", "chronic", "recommends", "preferably", "obtain"
"expenditure", "gratification", "laborious", "prefer", "taste"
"tourists", "waters", "honed", "attacked", "lives"
"basic", "vital", "especially", "array", "while"
"container", "disciplined", "arrangement", "plant"
"medicine", "staff", "decisions"
"journey", "became", "secrets", "determine", "predict"
"worth", "relative", "address", "nonetheless", "with"
"considerably", "of", "be penalized", "it is"
"observation", "including", "supreme", "in such cases", "as in"
"emphasis", "explore", "senses", "investigations", "understanding", "use"
"on", "published", "previously", "causes", "instead"
"helps", "do", "leave", "also"
"wondering", "purposeful", "logically", "prepare"
"are found", "how", "was already", "responsible for", "stick"
"however", "renewed",  "boundaries", "resulting", "promises", "be widely recognized", "focus"
"supplant", "advertising", "less", "attitude", "expressions", "embossed"
"extract", "depth", "publication", "rigorous"
"responsibilities", "action", "conflict", "changed"
"healthy", "has it covered", "taking", "fun", "entitle", " benefit"
"strongly", "condition", "normal", "material", "overlap"
"concept", "delay", "gradually", "barriers", "simultaneously"
"which", "whether", "thus", "rather"
"fewer", "extent", "one", "with"
"well", "its use", "take", "particularly"
"few", "which", "up"
"developing", "which", "guiding"
"caused", "even though", "up", "around"
"abundance", "picturesque", "sought", "experiences"
"dimension", "views", "phenomenon", "power", "interests"
"tribute", "aircraft", "attempt", "landed", "daily", "interactive", "educational"
"reconstruct", "little", "cut", "converging", "tone"
"proposals", "offered", "regular", "acceptance"
"concerned", "sustainability", "disciplines"
"goes on", "after all", "have featured", "makes"
"exposes", "filled with", "while", "much"
"may", "effort", "attitudes"
"role", "assumption", "unlikely", "service", "provoke"
"therefore", "another", "reviews", "performers"
"produced", "leaving", "toward", "to supply"
"observations", "act", "decisiveness", "journey", "logic", "blinded"
"role", "study", "seemed", "period", "time", "established", " found in"
"being created", "in part", "simply", "down"
"gentle", "hot", "heavier", "difference", "entire"
"trading", "vocabulary", "known", "any depth"
"enjoyed", "failing", "radical", "leave"
"offer", "choose", "majority", "want", "criteria"
"disproportionately", "current", "sustenance", "collaborative", "agencies"
"differ", "evolutionary", "evolution", "a few", "in", "although", "for"
"participation", "available", "recognition", "relationship"
"whereby", "left", "even", "of"
"reflects", "leading", "adopt", "critical", "ensure"
"transitional", "acceptable", "excluded", "be approaching", "respectability", "yet", "consequences"
"representative", "manage", "equitable", "rights", "quota"
"without", "fit", "deep", "can"
"diversity", "major", "source", "reservoirs", "counter", "idea", " result", "origin"
"culpability", "prosecution", "characterized", "instance"
"sustainability", "reduced", "within", "prosper", "longer"
"consultation", "develops", "is modeled", "facilitate", "consistent"
"point of view", "using", "subject", "attain", "integrated"
"the", "two", "main", "three", "of"
"collaborate", "overlap", "revealed", "laboratory", "advent"
"as", "is intended", "has developed", "from", "contribute"
"distinct", "several", "facilitated", "suggesting"
"in" , "complex", "activities", "certain", "species"
"designing for", "progressively enhance", "instead of spending", "biggest challenge"
"civilisation", "period", "research"
"findings", "during", "fewest", "can"
"curious" , "structures", "experience", "convinced", "crippled"
"mockup" , "promising", "orbit", "contract", "retired"
"have selected" , "for example", "interest", "intervened", "place"
"assumptions" , "experiments", "results", "data", "picture"
"sound", "successfully", "influence", "despite", "factors", "suitable"
"workings" , "broad", "addition", "knowledge", "responsible"
"not until", "there had been", "is becoming", "is opening up", "were not possible", " bring", " off"
"sellers" , "accompanied", "engage", "versed", "clinch"
"feature" , "covered", "in terms of", "essential", "by"
"degrees" , "meet", "advantages", "those", "pursue", "since"
"species" , "same", "intentions", "sharing", "occurred"

"element" , "formative", "settled", "allegiance", "adjoining", "delineated"
"mistakenly" , "protect", "release", "acts", "antibody"
"expression" , "written", "regardless", "usually", "positively"
"sources" , "factors", "unethically", "connection", "abide"
"matter", "differs", "engaging", "symbolizes"
"weight" , "consequences", "diverged", "dissipated", "waste", "strike"
"demonstrations" , "overlook", "intentionally", "sculptures", "appear", "holds"
"is transmitted" , "range", "indistinguishable", "causing", "circulated"
"had its 18th century roots" , "incorporates a 5km length of", "offers a powerful insight", "traditional landscape and forests", "extensive collections"
"distinctly" , "if", "confusion", "drawn", "impact"
"hereditary", "guiding", "connected", "thus"
"concern", "decisive", "roots", "urge"
"physicist", "unsuspecting", "demonstration", "science"
"there was" , "through", "which", "further", "on top of all this"
"would have", "significance", "economy", "addition"
"brighten up" , "seen", "up", "whilst", "covered"
"by acquiring something", "notion", "involve", "better"
"tranquility", "discovered", "accompanied", "transported"
"donors", "emphasis", "average"
"outdoors", "board", "growing", "become"
"vaccination" , "venom", "carried", "inoculating", "controversial", "universalized"
"body" , "community", "category", "word", "tradition"
"environment" , "damage", "muscles", "restricted", "vision", "faded"
"prior", "campus", "progressed", "entering"
"pressure", "actually", "production", "researchers", "substantially", "short-term"
"heritage", "standards", "characteristics", "experienced", "associated"
"represents", "unbearable", "consequences", "diminished"
"drawn", "prolific", "at least", "whom"
"received", "played", "which", "in addition to"

    ];
  
          // Function to load and display the current question
          function loadQuestion(index) {
              const question = questions[index];
              const questionContainer = document.getElementById('question-container');
              const blanks = question.options.map((blankOptions, i) => {
                  const select = document.createElement('select');
                  select.id = `blank-${i}`;
                  blankOptions.forEach((option) => {
                      const optionElement = document.createElement('option');
                      optionElement.value = option;
                      optionElement.textContent = option;
                      select.appendChild(optionElement);
                  });
                  return select;
              });
              const textParts = question.text.split('________');
              const fragment = document.createDocumentFragment();
              for (let i = 0; i < textParts.length; i++) {
                  fragment.appendChild(document.createTextNode(textParts[i]));
                  if (i < textParts.length - 1) {
                      fragment.appendChild(blanks[i]);
                  }
              }
              questionContainer.innerHTML = '';
              questionContainer.appendChild(fragment);
          }
  
          // Function to show the next question
          function showNext() {
              currentQuestionIndex++;
              if (currentQuestionIndex >= questions.length) {
                  currentQuestionIndex = 0; // Loop back to the first question
              }
              loadQuestion(currentQuestionIndex);
              result.innerText = "";
              Score.style.display = "none"
              testIndex.innerText = currentQuestionIndex+1
          }
  
          // Function to show the previous question
          function showPrevious() {
              currentQuestionIndex--;
              if (currentQuestionIndex < 0) {
                  currentQuestionIndex = questions.length - 1; // Loop to the last question
              }
              loadQuestion(currentQuestionIndex);
              testIndex.innerText = currentQuestionIndex+1
              result.innerText = "";
              Score.style.display = "none"
          }
  
          // Function to check the answer for the current passage
          function checkAnswer() {
              const selectedAnswers = questions[currentQuestionIndex].options.map((_, i) =>
                  document.querySelector(`select#blank-${i}`).value
              );
              const correctAnswers = questions[currentQuestionIndex].answers;
              const questionScore = calculateQuestionScore(selectedAnswers, correctAnswers);
  
              const results = document.getElementById("results");
              results.innerHTML = `Your score for this question: ${questionScore} / ${selectedAnswers.length}`;
              Score.style.display = "block"
          }
  
          // Function to calculate the question score
          function calculateQuestionScore(selectedAnswers, correctAnswers) {
              let questionScore = 0;
  
              for (let i = 0; i < selectedAnswers.length; i++) {
                  if (selectedAnswers[i].toLowerCase() === correctAnswers[i].toLowerCase()) {
                      questionScore++; // Increment the question score for each correct answer
                  }
              }
  
              return questionScore;
          }
  
          // Load the initial question
          loadQuestion(currentQuestionIndex);
          function goToTestByIndex(index) {
        if (index >= 1 && index <= questions.length) {
            currentQuestionIndex = index - 1;
            loadQuestion(currentQuestionIndex);
            testIndex.innerText = currentQuestionIndex + 1;
            aiScore.style.display = "none";
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
  