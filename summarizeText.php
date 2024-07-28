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
      width: 98%;
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
    <h1 class="mb-4 heading">Summarize Written Text Test</h1>
<div class="container mt-5">
<div class = "Instructions">
      <h1>Instructions:</h1>
      <ol>
      <li>Read the passage below and summarize it using one sentence. Type your response in the box at the bottom of the screen. You have 10 minutes to finish this task. Your response will be judged on the quality of your writing and on how well your response presents the key points in the passage.</li>
      </ol>
    </div>
<h3>Test <span id = "index">1</span></h3>
        <div class="timer">Time Left: <span id="timer">10:00</span></div>
        <p>Total Tests: 58</p>
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
<p>Vocabulary: <span id="vocabularyScore"></span></p>
<p>Your Score: <span id="totalScore"></span></p>
<p>Max Score: 7</p>
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
let timerDuration = 600; // 5 minutes in seconds
let timerInterval;
let timerRunning = false;
const texts = [
    "The British Crime Survey (BCS) provides an important source of information about levels of crime, public attitudes to crime and other related issues. The results play an important role in informing Home Office policy. The BCS measures the amount of crime in England and Wales by asking people about crimes they have experienced in the last year. This includes crimes not reported to the police, so it is an important alternative to police records. Victims do not report crime for various reasons, and without the BCS there would be no official source of information on these unreported crimes. Because members of the public are asked directly about their experiences, the survey also provides a consistent measure of crime that is unaffected by the extent to which crimes are reported to the police, or by changes in the criteria used by the police when recording crime. The survey also helps to identify those most at risk of different types of crime, and this helps in the planning of crime prevention programs. The BCS also examines people's attitudes to crime, such as how much they fear crime and what measures they take to avoid it. The survey also covers attitudes to the Criminal Justice System (CJS), including the police and the courts, and has also been successful at developing special measures to estimate the extent of domestic violence, stalking and sexual victimization, which are probably the least reported to the police, but among the most serious of crimes in their impact on victims.",
    "If women are so far ahead of men, why are they so far behind? Reports from both sides of the Atlantic show that female students dominate university courses, yet women still do not make it to the top. A report on inequality in the UK said last week that girls had better educational results than boys at 16, went to university in greater numbers and achieved better degrees once they got there. 'More women now have higher education qualifications than men in every age group up to age 44,' the report said. In the US, 57 per cent of college graduates in 2006-07 were women. Women form the majority of all graduates under 45. Yet few women make it to the boards of companies in either country. In the UK, the proportion of women on FTSE 100 boards rose fractionally from 11.7 per cent to 12.2 per cent last year, according to the Cranfield University School of Management, but that was only because of a fall in the size of the boards. In the US, women accounted for 15.2 per cent of board seats on Fortune 500 companies, according to Catalyst, the research organization, which said the numbers had barely budged for five years. The hopeful way of looking at this is that the rising generation of female graduates has yet to reach director age. Give it 10 years and they will dominate boards as they do universities. If that were true, however, we would surely see the number of women director numbers moving up by now. The first year that women college graduates outnumbered men in the US was 1982. These graduates must be entering their 50s – prime director age.",
    "The British Crime Survey (BCS) provides an important source of information about levels of crime, public attitudes to crime and other related issues. The results play an important role in informing Home Office policy. The BCS measures the amount of crime in England and Wales by asking people about crimes they have experienced in the last year. This includes crimes not reported to the police, so it is an important alternative to police records. Victims do not report crime for various reasons, and without the BCS there would be no official source of information on these unreported crimes. Because members of the public are asked directly about their experiences, the survey also provides a consistent measure of crime that is unaffected by the extent to which crimes are reported to the police, or by changes in the criteria used by the police when recording crime. The survey also helps to identify those most at risk of different types of crime, and this helps in the planning of crime prevention programs. The BCS also examines people's attitudes to crime, such as how much they fear crime and what measures they take to avoid it. The survey also covers attitudes to the Criminal Justice System (CJS), including the police and the courts, and has also been successful at developing special measures to estimate the extent of domestic violence, stalking and sexual victimization, which are probably the least reported to the police, but among the most serious of crimes in their impact on victims.",
    "The age-old question of whether human traits are determined by nature or nurture has been answered, a team of researchers say. Their conclusion? It’s a draw. By collating almost every twin study across the world from the past 50 years, researchers determined that the average variation for human traits and disease is 49 percent due to genetic factors and 51 percent due to environmental factors. University of Queensland researcher Beben Benyamin from the Queensland Brain Institute collaborated with researchers at VU University of Amsterdam to collate 2,748 studies involving more than 14.5 million pairs of twins. “Twin studies have been conducted for more than 50 years but there is still some debate in terms of how much the variation is due to genetic or environmental factors,” Benyamin said. He said the study showed the conversation should move away from nature versus nurture, instead looking at how the two work together. “Both are important sources of variation between individuals,” he said. While the studies averaged an almost even split between nature and nurture, there was wide variation within the 17,800 separate traits and diseases examined by the studies. For example, the risk for bipolar disorder was found to be 68 percent due to genetics and only 32 percent due to environmental factors. Weight maintenance was 63 percent due to genetics and 37 percent due to environmental factors. In contrast, risk for eating disorders was found to be 40 percent genetic and 60 percent environmental, whereas the risk for mental and behavioral disorders due to use of alcohol was 41 percent genetic and 59 percent environmental. Benyamin said in psychiatric, ophthalmological and skeletal traits, genetic factors were a larger influence than environmental factors. But for social values and attitudes it was the other way around.",
    "Water is at the core of sustainable development. Water resources, and the range of services they provide, underpin poverty reduction, economic growth and environmental sustainability. From food and energy security to human and environmental health, water contributes to improvements in social wellbeing and inclusive growth, affecting the livelihoods of billions. In a sustainable world that is achievable in the near future, water and related resources are managed in support of human well-being and ecosystem integrity in a robust economy. Sufficient and safe water is made available to meet every person's basic needs, with healthy lifestyles and behaviors easily upheld through reliable and affordable water supply and sanitation services, in turn supported by equitably extended and efficiently managed infrastructure. Water resources management, infrastructure and service delivery are sustainably financed. Water is duly valued in all its forms, with wastewater treated as a resource that avails energy, nutrients and freshwater for reuse. Human settlements develop in harmony with the natural water cycle and the ecosystems that support it, with measures in place that reduce vulnerability and improve resilience to water-related disasters. Integrated approaches to water resources development, management and use and to human rights are the norm. Water is governed in a participatory way that draws on the full potential of women and men as professionals and citizens, guided by a number of able and knowledgeable organizations, within a just and transparent institutional framework.",
    "Many technologies have promised these qualities, but few have been commercially viable. What's been lacking is the performance data needed to demonstrate that these technologies are durable, genuinely environmentally beneficial, and suitable to be insured. Over the past 13 years, our Department of Architecture & Civil Engineering has led on research into straw as a low-impact building material. This work, which has included developing a unique straw bale panel as well as scientific monitoring and testing, has now culminated in crucial industry certifications. The BM TRADA’s Q-Mark certification guarantees a straw building’s energy efficiency, fire safety, durability and weather-resilience and means that developers and homebuyers can now get insurance and mortgages for straw homes and buildings. The innovative straw walls in the new houses provide two times more insulation than required by current UK building regulations. Based on monitoring a residential straw-bale development in Leeds, fuel bill reductions up to 90% can be expected. The walls have been built using ModCell technology; prefabricated panels consisting of a wooden structural frame infilled with straw bales or hemp and rendered with either a breathable lime-based system or ventilated timber or brick cladding. This technology combines the lowest carbon footprint and the best operational CO² performance of any system of construction currently available. In fact, as an agricultural co-product, straw buildings can be carbon negative as straw absorbs CO² when it grows.",
"Delivering packages with drones will scale back CO2 emissions inbound circumstances as compared to truck deliveries, a brand new study from University of Washington transportation engineers finds. In a paper to be revealed in associate degree coming issue of Transportation analysis half D, researchers found that drones tend to own CO2 emissions blessings over trucks once the drones haven't got to fly terribly way to their destinations or once a delivery route has few recipients. Trucks — which may provide environmental edges by carrying everything from garments to appliances to the article of furniture in a very single trip — become a lot of climate-friendly various once a delivery route has several stops or is farther off from a central warehouse. For small, light-weight packages — a bottle of drugs or a kid's bathing costume — drones contend particularly well. However, the carbon edges erode because the weight of a package increases since these unmanned aerial vehicles have to be compelled to use extra energy to remain aloft with a significant load.",
"The area that is now South Africa has been inhabited by humans for millennia. The San, the original inhabitants of this land, were migratory people who lived in small groups of about 15 to 20 people. They survived by fishing and hunting and by gathering roots and other wild foods. They did not build permanent dwellings but used rock shelters as temporary dwellings. Around 2,000 years ago Khoikhoi pastoralists migrated to the coast. In the eastern part of present-day South Africa, iron-working societies date from about 300 AD. The Sotho-Tswana and Nguni peoples arrived in this region around 1,200 AD. They lived by agriculture and stock farming, mined gold, copper and tin and hunted for ivory and built stone-walled towns. Over the centuries, these societies had diverse contacts with the Khoisan. Strife between the San and the Khoikhoi developed over competition for game; eventually the Khoikhoi became dominant. These peoples lived in the western part of present-day South Africa and are known collectively as the Khoisan.",
"The National Oceanography Center (NOC) is engaged in research into the potential risks and benefits of exploiting deep-sea mineral resources, some of which are essential for low-carbon technology, as well as using ocean robots to estimate the environmental impact of these potential deep-sea mining activities. Late last year the NOC led an expedition on the RRS James Cook that found enough of the scarce element Tellurium present in the crust of a submerged volcano that, if it were all to be used in the production of solar PV panels, could provide two-thirds of the UK's annual electricity supply. Recently, the NOC also led an international study demonstrating deep-sea nodule mining will cause long-lasting damage to deep-sea life, lasting at least for decades. These nodules are potato-sized rocks containing high levels of metals, including copper, manganese and nickel. They grow very slowly on the sea-bed, over millions of years. Although no commercial operations exist to extract these resources, many are planned. Professor Edward Hill, Executive Director at the NOC commented, 'By 2050 there will be nine billion people on earth and attention is increasingly turning to the ocean, particularly the deep ocean, for food, clean supplies of energy and strategic minerals. The NOC is undertaking research related to many aspects and perspectives involved in exploiting ocean resources. This research is aimed at informing with sound scientific evidence the decisions that will need to be taken in the future, as people increasingly turn to the oceans to address some of society's greatest challenges.'",
"Banks provide short-term finance to companies in the form of an overdraft on a current account. The advantage of an overdraft is its flexibility. When the cash needs of the company increase with seasonal factors, the company can continue to write cheques and watch the overdraft increase. When the goods and services are sold and cash begins to flow in, the company should be able to watch the overdraft decrease again. The most obvious example of a business which operates in this pattern is farming. The farmer uses the overdraft to finance the acquisition of seed for arable farming, or feed through the winter for stock farming and to cover the period when the crops or animals are growing and maturing. The overdraft is reduced when the crops or the animals are sold. The main disadvantage of an overdraft is that it is repayable on demand. The farmer whose crop fails because of bad weather knows the problem of being unable to repay the overdraft. Having overdraft financing increases the worries of those who manage the company. The other disadvantage is that the interest payable on overdrafts is variable. When interest rates increase, the cost of the overdraft increases. Furthermore, for small companies there are often complaints that the rate of interest charged is high compared with that available to larger companies. The banks answer that the rates charged reflect relative risk and it is their experience that small companies are more risky.",
"In 1953 B.F. Skinner visited his daughter’s maths class. The Harvard psychologist found every pupil learning the same topic in the same way at the same speed. A few days later he built his first 'teaching machine', which let children tackle questions at their own pace. By the mid-1960s similar gizmos were being flogged by door-to-door salesmen. Within a few years, though, enthusiasm for them had fizzled out. Since then education technology (edtech) has repeated the cycle of hype and flop, even as computers have reshaped almost every other part of life. One reason is the conservatism of teachers and their unions. But another is that the brain-stretching potential of edtech has remained unproven. Today, however, Skinner’s heirs are forcing the sceptics to think again (see article). Backed by billionaire techies such as Mark Zuckerberg and Bill Gates, schools around the world are using new software to 'personalize' learning. This could help hundreds of millions of children stuck in dismal classes—but only if edtech boosters can resist the temptation to revive harmful ideas about how children learn. To succeed, edtech must be at the service of teaching, not the other way around. The conventional model of schooling emerged in Prussia in the 18th century. Alternatives have so far failed to teach as many children as efficiently. Classrooms, hierarchical year-groups, standardized curriculums and fixed timetables are still the norm for most of the world’s nearly 1.5bn schoolchildren.",
"Humans love to complain to each other. It helps us feel less alone. Think about what happens when a family member or friend is going through a tough time; they call up someone who will listen to their tale of woe. Unfortunately, negative bonding is the default for many groups. In some families, complaining is the only way to get attention. When one person says, I had a bad day; the other person has to top it, 'You think you had a tough day. I had to do three TPS reports!' The same thing happens at work and social settings. 'Your child didn't sleep through the night until 6 months? Mine was a full year old before she went over six hours.' It's a race to the bottom, and the worst situation wins. In Bitching is Bonding, A Guide To Mutual Complaint, Irene S. Levine, Ph.D., a professor of psychiatry at the NYU Langone School of Medicine says, 'The reason why these conversations feel good is because we feel understood.' People raised in negative environments learn early on. Being positive gets you thrown out of the club. When family dinner is a complaint fest, you’re not going to risk alienation saying, 'Wow, I had an awesome day. Don't you just love life?' Translate this into a work setting: people, often unconsciously, believe being positive keeps you out of the cool club. When negativity provides bonding, humans are reluctant to abandon the behavior that brings them comfort.",
"It's very easy to forget about what's in the ground beneath our feet and why it's so important to protect it. One tablespoon of soil contains more organisms than there are people on Earth; billions of bacteria, fungi and other microorganisms combine with minerals, water, air and organic matter to create a living system that supports plants and, in turn, all life. Healthy soil can store as much as 3,750 tons of water per hectare, reducing the risk of flooding, and the International Panel on Climate Change (IPCC) has said that 89% of all agricultural emissions could be mitigated if we improved the health of our soil. Good soil management also increases disease resistance in livestock and ultimately drives profits for farmers - yet soil and its impact on the health of our animals has, over recent decades, been one of the most neglected links in UK agriculture. Over the last 50 years' agriculture has become increasingly dependent on chemical fertilizers, with applications today around 10 times higher than in the 1950s. Farmers often think the chemical fertilizer NPK (nitrogen, phosphorous and potassium) provides all the nutrition a plant requires, but it also has a detrimental effect on the long-term health of the land: research suggests there are fewer than 100 harvests left in many of the world's soils.",
"Research shows that when people work with a positive mind-set, performance on nearly every level – productivity, creativity, engagement - improves. Yet happiness is perhaps the most misunderstood driver of performance. For one, most people believe that success precedes happiness. “Once I get a promotion, I'll be happy,” they think. Or, “Once I hit my sales target, I'll feel great.” But because success is a moving target – as soon as you hit your target, you raise it again, the happiness that results from success is fleeting. In fact, it works the other way around: People who cultivate a positive mind-set perform better in the face of challenge. I call this the 'happiness advantage” – every business outcome shows improvement when the brain is positive. I've observed this effect in my role as a researcher and lecturer in 48 countries on the connection between employee happiness and success. And I'm not alone: In a meta-analysis of 225 academic studies, researchers Sonja Lyubomirsky, Laura King, and Ed Diener found strong evidence of directional causality between life satisfaction and successful business outcomes. Another common misconception is that our genetics, our environment, or a combination of the two determines how happy we are. To be sure, both factors have an impact. But one's general sense of well-being is surprisingly malleable. The habits you cultivate, the way you interact with coworkers, how you think about stress – all these can be managed to increase your happiness and your chances of Success.",
"Ethics is a set of moral obligations that define right and wrong in our practices and decisions. Many professions have a formalized system of ethical practices that help guide professionals in the field. For example, doctors commonly take the Hippocratic Oath, which, among other things, states that doctors 'do no harm' to their patients. Engineers follow an ethical guide that states that they 'hold paramount the safety, health, and welfare of the public.' Within these professions, as well as within science, the principles become so ingrained that practitioners rarely have to think about adhering to the ethic – it's part of the way they practice. And a breach of ethics is considered very serious, punishable at least within the profession (by revocation of a license, for example) and sometimes by the law as well. Scientific ethics calls for honesty and integrity in all stages of scientific practice, from reporting results regardless to properly attributing collaborators. This system of ethics guides the practice of science, from data collection to publication and beyond. As in other professions, the scientific ethic is deeply integrated into the way scientists work, and they are aware that the reliability of their work and scientific knowledge in general depends upon adhering to that ethic. Many of the ethical principles in science relate to the production of unbiased scientific knowledge, which is critical when others try to build upon or extend research findings. The open publication of data, peer review, replication, and collaboration required by the scientific ethic all help to keep science moving forward by validating research findings and confirming or raising questions about results.",
"Working nine to five for a single employer bears little resemblance to the way a substantial share of the workforce makes a living today. Millions of people assemble various income streams and work independently, rather than in structured payroll jobs. This is hardly a new phenomenon, yet it has never been well measured in official statistics and the resulting data gaps prevent a clear view of a large share of labor-market activity. To better understand the independent workforce and what motivates the people who participate in it, the McKinsey Global Institute surveyed some 8,000 respondents across Europe and the United States. We asked about their income in the past 12 months-encompassing primary work, as well as any other income-generating activities, and about their professional satisfaction and aspirations for work in the future. The resulting report, Independent work: Choice, necessity, and the gig economy, finds that up to 162 million people in Europe and the United States-or 20 to 30 percent of the workingage population - engage in some form of independent work. While demographically diverse, independent workers largely fit into four segments (exhibit): free agents, who actively choose independent work and derive their primary income from it; casual earners, who use independent work for supplemental income and do so by choice; reluctants, who make their primary living from independent work but would prefer traditional jobs; and the financially strapped, who do supplemental independent work out of necessity.",
"'A day would come', Percy Shelley predicted in 1813, 'when the monopolizing eater of animal flesh would no longer destroy his constitution by eating an acre at a meal.' He explained: 'The quantity of nutritious vegetable matter consumed in fattening the carcass of an ox would afford 10 times the sustenance if gathered immediately from the bosom of the earth.' Two hundred years later, mainstream agronomists and dietitians have caught up with the poet. A growing scientific consensus agrees that feeding cerealsand beans to animals is an inefficient and extravagant way to produce human food, that there is a limited amount of grazing land, that the world will be hard-pressed to supply a predicted population of 9 billion people with a diet as rich in meat as the industrialized world currently enjoys, and that it's not a very healthy diet anyway. On top of this, livestock contribute significantly towards global warming, generating 14.5% of all manmade greenhouse gas emissions, according to one much-quoted estimate from the United Nations. Now that the problem has been identified, the challenge is to persuade people in wealthy countries to eat less meat. That might seem a tall order, but governments have successfully persuaded people to quit smoking through a combination of public information, regulation and taxation.",
"Ecology is the study of interactions of organisms among themselves and with their environment. It seeks to understand patterns in nature (e.g., the spatial and temporal distribution of organisms) and the processes governing those patterns. Climatology is the study of the physical state of the atmosphere – its instantaneous state or weather, its seasonal-to-interannual variability, its long-term average condition or climate, and how climate changes over time. These two fields of scientific study are distinctly different. Ecology is a discipline within the biological sciences and has as its core the principle of natural selection. Climatology is a discipline within the geophysical sciences based on applied physics and fluid dynamics. Both, however, share a common history. The origin of these sciences is attributed to Aristotle and Theophrastus and their books Meteorological and Enquiry into Plants, respectively, but their modern beginnings trace back to natural history and plant geography. Seventeenth, eighteenth, and nineteenth century naturalists and geographers saw changes in vegetation as they explored new regions and laid the foundation for the development of ecology and climatology as they sought explanations for these geographic patterns. Alexander von Humboldt, in the early 1800s, observed that widely separated regions have structurally and functionally similar vegetation if their climates are similar. Alphonse de Candolle hypothesized that latitudinal zones of tropical, temperate, and arctic vegetation are caused by temperature and in 1874 proposed formal vegetation zones with associated temperature limits.",
"Over the years, language teachers have alternated between favoring teaching approaches that focus primarily on language use and those that focus on language forms or analysis. The alternation has been due to a fundamental disagreement concerning whether one learns to communicate in a second language by communicating in that language (such as in an immersion experience) or whether one learns to communicate in a second language by learning the lexicogrammar – the words and grammatical structures – of the target language. In other words, the argument has been about two different means of achieving the same end. As with any enduring controversy, the matter is not easily resolved. For one thing, there is evidence to support both points of view. It is not uncommon to find learners who, for whatever reason, find themselves in a new country or a new region of their own country, who need to learn a new language, and who do so without the benefit of formal instruction. If they are post pubescent, they may well retain an accent of some kind, but they can pick up enough language to satisfy their communicative needs. In fact, some are natural acquirers who become highly proficient in this manner. In contrast, there are learners whose entire exposure to the new language comes in the form of classroom instruction in lexicogrammar. Yet they too achieve a measure of communicative proficiency, and certain of these learners become highly proficient as well. What we can infer from this is that humans are amazingly versatile learners and that some people have a natural aptitude for acquiring languages and will succeed no matter what the circumstances.",
"Skipping Breakfast Has Drawbacks - It's no mystery why so many people routinely skip breakfast: bad timing. It comes at a time when folks can be more occupied with matters of grooming, attire and otherwise making themselves presentable for a new day. However, studies conducted both in the United States and internationally have shown that skipping breakfast can affect learning, memory and physical well-being. Students who skip breakfast are not as efficient at selecting critical information for problem-solving as their peers who have had breakfast. For school children, skipping breakfast diminishes the ability to recall and use newly acquired information, verbal fluency, and control of attention, according to Ernesto Pollitt, a UC Davis professor of pediatrics whose research focuses on the influence of breakfast on mental and physical performance. Skipping breakfast can impair thinking in adults, also. For both children and adults, a simple bowl of cereal with milk goes a long way toward providing a sufficiently nutritious start to the day. Green-Burgeson recommends choosing a cereal that's low in sugar — less than five grams per serving — and using nonfat or one percent milk. Frederick Hirshburg, a pediatrician at UC Davis Medical Group, Carmichael, says that babies and other preschoolers rarely skip breakfast because they're usually the hungriest at the beginning of the day. Breakfast then becomes more of a 'learned experience' than a response to a biological need, Hirshburg says.Original: Negotiation is a common process in business to mainly solve business conflicts between both parties. Compromise is a basic negotiation state in which both parties give up something that they want in order to get something else they want more. Compromise usually occur in unfair parties when there is a fixed pie to be divided up, and whatever on one side gets, the other side loses. In compromise situations, neither side gets all of what they really want, but they each make concessions in order to reach an agreement that is acceptable to both. Both parties usually can reach win-win concept through compromise. However, negotiation cannot resolve all the conflict if one party is unwilling to resolve the problem.",
"Tim Berners-Lee believes the internet can foster human understanding and even world peace. He is the man who has changed the world more than anyone else in the past hundred years. Sir Tim Berners-Lee may be a mild-mannered academic who lives modestly in Boston, but as the inventor of the world wide web he is also a revolutionary. Along with Galileo, William Caxton and Sir Isaac Newton, he is a scientist who has altered the way people think as well as the way they live Since the web went global 20 years ago, the way we shop, listen to music and communicate has been transformed. There are implications for politics, literature, economics even terrorism because an individual can now have the same access to information as the elite. Society will never be the same. The computer scientist from Oxford, who built his own computer from a television screen and spare parts after he was banned from one of the university computers, is a cultural guru as much as a technological one. It is amazing how far we've come, he says. But you're always wondering what’s the next crazy idea, and working to make sure the web stays one web and that the internet stays open. There isn't much time to sit back and reflect. We speak for more than an hour about everything from Facebook to fatwas, Wikipedia to Google. He invented the web, he says, because he was frustrated that he couldn't find all the information he wanted in one place. It was an imaginary concept that he realized.",
"Asda has become the first food retailer in the country to measure how much customers can save by cutting back on food waste, thanks to a Knowledge Transfer Partnership (KTP) with the University of Leeds. The idea behind the KTP was for the University, using Asda’s customer insight data, to apply its research to identify, investigate and implement ways of helping customers to reduce their food waste. This was one of the first times that a major retailer had tried to deliver large-scale sustainability changes, with the two year project seen as a way for Asda to position themselves as true innovators in this area. The campaign focused on providing customers with advice on everything from food storage and labelling, to creative recipes for leftovers. Meanwhile, in-store events encouraged customers to make changes in their own. They will make changes to how they deal with food waste in their own homes, leading to an average saving of 57 pounds per customer, as well as a reduction in waste. A key aspect of a KTP is that an associate is employed by the University to work in the firm and help deliver the desired outcomes of the KTP. As a part of the collaboration with Asda, Laura Babbs was given the task of driving forward the sustainability changes in the retailer. As a result of the success of her work, Laura eventually became a permanent member of the team at Asda.",
"Most of the time when I embark on such an investigation, it quickly becomes clear that matters are much more complicated and ambiguous several shades grayer than I thought going in. Not this time. The deeper I delved into the confused and confusing thicket of nutritional science, sorting through the longrunning fats versus carb wars, the fiber skirmishes and the raging dietary supplement debates, the simpler the picture gradually became. I learned that in fact, science knows a lot less about nutrition than you would expect - that in fact, nutrition science is, to put it charitably, a very young science. Ifs still trying to figure out exactly what happens in your body when you sip a soda, or what is going on deep in the soul of a carrot to make it so good for you, or why in the world you have so many neurons - brain cells! - in your stomach, of all places. It's a fascinating subject, and someday the field may produce definitive answers to the nutritional questions that concern us, but — as nutritionists themselves will tell you - they're not there yet. Not even close. Nutrition science, which after all only got started less than two hundred years ago, is today approximately where surgery was in the year 1650 -very promising, and very interesting to watch, but are you ready to let them operate on you? I think I'll wait a while.",
"According to researchers, the invisibility cloak illusion stems from the belief that we are much more socially observant than the people around us. This means that, while we watch and wonder about other people as much as possible, we often think that people around us are less aware. This illusion occurs because, while we are fully aware of our own impressions and speculations about other people, we have no idea about what those other people are thinking unless they choose to share with us, something that rarely happens except in exceptional circumstances. To better understand what is happening, it is important to consider the groundbreaking research by Amos Tversky and Daniel Kahneman on cognitive biases. When people make judgments about other people in social situations, they often depend on specific biases such as the availability heuristic, i.e., that we attach more significance to thoughts that come to mind easily. This is why we consider thoughts about other people as being more important than thoughts about inanimate objects. And so, as we look around us, we tend to focus our thoughts on the people we see and what they happen to be doing. Which is why people-watching can be so addictive. What adds to the sense that we are relatively invisible to others is that people tend to be as discreet as possible about their people-watching. Just because other people aren't sharing their observations with us, it's easy to pretend that they are not as observant as we are. Of course, people may share their people-watching observations with anyone they happen to be with but, for the most part, that only applies, to something remarkable enough to comment on. For most of us, what we are seeing tends to be extremely private and not to be shared with others.",
"It might seem a little eccentric, but reviewing your work by reading it aloud can help to identify the woolliest areas. This works best if you perform your reading in a theatrical way, pausing at the commas and ends of sentences. If you run out of breath during a sentence, it is probably too long. You ought to be able to convert your writing into a speech in this way if it sounds too stilted and convoluted, perhaps you could rework these parts until they sound fluid. It is unlikely that your reader will be fooled by the idea that long words make you sound clever. Cluttering a sentence with too many complicated words can prevent its meaning from being understood at all. A short word is always preferable to a long one. Why should anyone choose the word erroneous over the word wrong in an essay? Usually, writers who employ more obscure words are trying to sound impressive but can appear pretentious. Direct words enable you to control what you are saying, and are not necessarily babyish, but the most appropriate ones for the job. When you read your writing aloud, you will notice that the key stress comes at the end of your sentence. It is, therefore, most effective to end with a short and emphatic word to secure your point. Try to resist the impulse to waffle at the end of your sentence by trailing off into qualifying clauses. It might be worth relocating the clause to the beginning of the sentence or losing it altogether if you feel that it adds little to its meaning. Your sentences might be the most grammatically perfect in the world, but still, cause your writing to sound wrong if you have misjudged its tone. A colloquial style, which uses slang and exclamations, is an inappropriately chatty tone for an essay. However, style can be equally jarring if your vocabulary is too formal or ambitious for its context. It is much more impressive to make complicated points using simple language and grammar.",
"Biomimicry (from bios, meaning life, and mimesis, meaning to imitate) is a new science that studies nature’s best ideas and then imitates these designs and processes to solve human problems. Studying a leaf to invent a better solar cell is an example. I think of it as ‘innovation inspired by nature.’ The core idea is that nature, imaginative by necessity, has already solved many of the problems we are grappling with. Animals, plants, and microbes are the consummate engineers. They have found what works, what is appropriate, and most important, what lasts here on Earth. This is the real news of biomimicry: After 3.8 billion years of research and development, failures are fossils, and what surrounds, us is the secret to survival. Like the viceroy butterfly imitating the monarch, we humans are imitating the best and brightest organisms in our habitat. We are learning, for instance, how to harness energy like a leaf, grow food like a prairie, build ceramics like an abalone, self-medicate like a chimp, compute like a cell, and run a business like a hickory forest. The conscious emulation of life’s genius is a survival strategy for the human race, a path to a sustainable future. The more our world looks and functions like the natural world, the more likely we are to endure on this home that is ours, but not ours alone.",
"Fish are being killed, and prevented from reaching maturity, by the litter of plastic particles finding their way into the world's oceans, new research has proved. Some young fish have been found to prefer tiny particles of plastic to their natural food sources, effectively starving them before they can reproduce. The growing problem of microplastics - tiny particles of polymer-type materials from modern industry - has been thought for several years to be a peril for fish, but the study published on Thursday is the first to prove the damage in trials. Microplastics are near-indestructible in natural environments. They enter the oceans through litter, when waste such as plastic bags, packaging and other convenience materials are discarded. Vast amounts of these end up in the sea, through inadequate waste disposal systems and sewage outfall. Another growing source is microbeads, tiny particles of hard plastics that are used in cosmetics, for instance as an abrasive in modern skin cleaners. These easily enter waterways as they are washed off as they are used, flushed down drains and forgotten, but can last for decades in our oceans. The impact of these materials has been hard to measure, despite being a growing source of concern. Small particles of plastics have been found in seabirds, fish and whales, which swallow the materials but cannot digest them, leading to a build-up in their digestive tracts. For the first time, scientists have demonstrated that fish exposed to such materials during their development show stunted growth and increased mortality rates, as well as changed behavior that could endanger their survival.",
"Orville and Wilbur Wright were brothers living in Dayton, Ohio. The two had started making bicycles during the 1890s and had a successful small business selling their Wright Specials for $18 each ($475 in today’s green). This experience with building light, strong machines would prove valuable in the coming years after the brothers' interest turned to flight. Others in the United States were also developing, aircraft at the time the Wright brothers started turning their curiosity skyward. Samuel Langley had flown an unmanned steam-powered aircraft in 1896. Octave Chanute and others were flying gliders near Chicago late in the decade as well. But it wasn’t until the Wright brothers started working on the matter that the “flying problem” would finally be solved. Beginning in 1899, the brothers designed and built a series of gliders to test their various ideas on a flying machine. They constructed a wind tunnel that allowed them to test designs without having to build a full-size model. They even built their own gasoline-powered motor for their aircraft. But it was the idea of controlled flight that the Wright brothers recognized as the biggest challenge. The Wright brothers realized the problem wasn't getting into the air, it was what to do once the pilot was airborne. One of the key features of the Wright brothers’ design is something they learned from watching birds.",
"In 1920, the eighteenth Amendment to the United States Constitution created yet another setback for the American wine industry. The National Prohibition Act, also known as the Volstead Act, prohibited the manufacture, sale, transportation, importation, delivery, or possession of intoxicating liquors for beverage purposes. Prohibition, which continued for thirteen years, nearly destroyed what had become a thriving and national industry. One of the loopholes in the Volstead Act allowed for the manufacture and sale of sacramental wine, medicinal wines for sale by pharmacists with a doctor’s prescription, and medicinal wine tonics (fortified wines) sold without prescription. Perhaps more important, prohibition allowed anyone to produce up to two hundred gallons yearly of fruit juice or cider. The fruit juice, which was sometimes made into concentrate, was ideal for making wine. People would buy grape concentrate from California and have it shipped to the East Coast. The top of the container was stamped in big bold letters: caution: do not add sugar or yeast or else fermentation will take place! Some of this yield found its way to bootleggers throughout America who did just that. But not for long, because the government stepped in and banned the sale of grape juice, preventing illegal wine production. Vineyards stopped being planted, and the American wine industry came to a halt.",
"Compulsory voting is often suggested as a solution to the problem of declining turnout. But how are individuals and countries affected by compulsory voting beyond boosting electoral participation? Shane Singh investigates the social, economic, and political consequences of compelling citizens to vote. There has been a lot of discussion about compulsory voting these days. In the United Kingdom, in, particular, as voter turnout rates have declined, many commentators and politicians have begun advocating for mandatory electoral participation. Those in favor of compulsory voting often adduce the importance of participation among all segments of society. Citizens of democracies are forced to do many things in the interest of the public good, they maintain, including serving on juries and educating their children, and full participation serves the country as a whole. Those opposed to compulsory voting often argue that, from a democratic theory perspective, the right to vote implicitly includes a right not to vote. Such a right of abstention, they argue, is more important than any societal good that might accompany high turnout. In fact, opponents of compulsory voting often contend that the country may be better off if those who are disinclined to vote are not pushed to participate in public affairs. Regardless of whether one of these sets of arguments is more persuasive than the other, compulsory voting is commonly used around the world. Several European democracies mandate voting, as do Australia and most of the countries in Latin America. By evaluating results from these countries, it is possible to assess the mechanics and effects of compulsory voting.",
"To understand the final reason why the news marketplace of ideas dominated by television is so different from the one that emerged in the world dominated by the printing press, it is important to distinguish the quality of vividness experienced by television viewers from the “vividness” experienced by readers. I believe that the vividness experienced in the reading of words is automatically modulated by the constant activation of the reasoning centers of the brain that are used in the process of concreating the representation of reality the author has intended. By contrast, the visceral vividness portrayed on television has the capacity to trigger instinctual responses similar to those triggered by reality itself—and without being modulated by logic, reason, and reflective thought. The simulation of reality accomplished in the television medium is so astonishingly vivid and compelling compared with the representations of reality conveyed by printed words that it signifies much more than an incremental change in the way people consume information. Books also convey compelling and vivid representations of reality, of course. But the reader actively participates in the conjuring of the reality the book’s author is attempting to depict. Moreover, the parts of the human brain that are central to the reasoning process are continually activated by the very act of reading printed words: Words are composed of abstract symbols —letters—that have no intrinsic meaning themselves until they are strung together into recognizable sequences. Television, by contrast, presents to its viewers a much more fully formed representation of reality—without requiring the creative collaboration that words have always demanded.",
"The face, though better preserved than most of the statue, has been battered by centuries of weathering and vandalism. In 1402, an Arab historian reported that a Sufi zealot had disfigured it “to remedy some religious errors.” Yet there are clues to what the surface looked like in its prime. Archaeological excavations in the early 19th century found pieces of its carved stone beard and a royal cobra emblem form its headdress. Residues of red pigment are still visible on the face, leading researchers to conclude that at some point, the Sphinx’s entire visage was painted red. Traces of blue and yellow paint elsewhere suggest to Lehner that the Sphinx was once decked out in gaudy comic book. For thousands of years, sand buried the colossus up to its shoulders, creating a vast disembodied head atop the eastern edge of the Sahara. Then, in 1817, a Genoese adventurer, Capt. Giovanni Battista Caviglia, led 160 men in the first modern attempt to dig out the Sphinx. They could not hold back the sand, which poured into their excavation pits nearly as fast as they could dig it out. The Egyptian archaeologist Selim Hassan finally freed the statue from the sand in the late 1930s. “The Sphinx has thus emerged into the landscape out of shadows of what seemed to be an impenetrable oblivion,” the New York Times declared.",
"The world engages in improving literacy of reading and writing, but it is not that important now. What are text/written language anyway? It's an ancient technology for storing and retrieving information. We store information by writing it, and we retrieve it by reading it. Six thousand to 10,000 years ago, many of our ancestors' hunter -- gatherer societies settled on the land and began what's known as the agricultural revolution. That new land settlement led to private property and increased production and trade of goods, generating a huge new influx of information. Unable to keep all this information in their memories, our ancestors created systems of written records that evolved over millennia into today's written language. But this ancient technology is already becoming obsolete. Text has run its historic course and is now rapidly getting replaced in every area of our lives by the ever – increasing array of emerging technologies driven by voice, video, and body movement rather than the written word. In my view, this is a positive step forward in the evolution of human technology, and it carries great potential for a total positive redesign of education.",
"When the Rosetta Stone was discovered in 1799, the carved characters that covered its surface were quickly copied. Printer's ink was applied to the Stone and white paper laid over it. When the paper, was removed, it revealed an exact copy of the text—but in reverse. Since then, many copies or 'facsimiles' have been made using a variety of materials. Inevitably, the surface of the Stone accumulated many layers of material left over from these activities, despite attempts to remove any residue. Once on display, the grease from many thousands of human hands eager to touch the Stone added to the problem. An opportunity for investigation and cleaning the Rosetta Stone arose when this famous object was made the centerpiece of the Cracking Codes exhibition at The British Museum in 1999. When work commenced to remove all but the original, ancient material, the stone was black with white lettering. As treatment progressed, the different substances uncovered were analyzed. Grease from human handling, a coating of carnauba wax from the early 1800s and printer's ink from 1799 were cleaned away using cotton wool swabs and liniment of soap, white spirit, acetone and purified water. Finally, white paint in the text, applied in 1981, which had been left in place until now as a protective coating, was removed with cotton swabs and purified water. A small square at the bottom left corner of the face of the Stone was left untouched to show the darkened wax and the white infill.",
"Males do the singing and females do the listening. This has been the established, even cherished view of courtship in birds, but now some ornithologists are changing tune. László Garamszegi of the University of Antwerp, Belgium, and colleagues studied the literature on 233 European songbird species. Of the 109 for which information on females was available, they found evidence for singing in 101 species. In only eight species could the team conclude that females did not sing. Females that sing have been overlooked, the team say, because their songs are quiet, they are mistaken for males from their similar plumage or they live in less well studied areas such as the tropics. Garamszegi blames Charles Darwin for the oversight. “He emphasized the importance of male sexual display, and this is what everyone has been looking at.” The findings go beyond modern species. After carefully tracing back an evolutionary family tree for their songbirds, Garamszegi’s team discovered that, in at least two bird families, singing evolved in females first. They suggest these ancient females may have been using their songs to deter other females from their territories, to coordinate breeding activities with males, or possibly to attract mates. “It leaves us with a perplexing question.”",
"Here's a term you're going to hear much more often: plug-in vehicle, and the acronym PEV. It's what you and many other people will drive to work in ten years and more from now. At that time, before you drive off in the morning you will first unplug your car - your plugin vehicle. Its big on board batteries will, have been fully charged overnight, with enough power for you to drive 50-100 kilometers through city traffic. When you arrive at work you'll plug in your car once again, this time into a socket that allows power to flow from your car's batteries to the electricity grid. One of the things you did when you bought your car was to sign a contract with your favorite electricity supplier, allowing them to draw a limited amount of power from your car's batteries should they need to, perhaps because of a blackout, or very high wholesale spot power prices. The price you get for the power the distributor buys from your car would not only be most attractive to you, it would be a good deal for them too, their alternative being very expensive power form peaking stations. If, driving home or for some other reason your batteries looked like running flat, a relatively small, but quiet and efficient engine running on petrol, diesel or compressed natural gas, even bio-fuel, would automatically cut in, driving a generator that supplied the batteries so you could complete your journey. Concerns over 'peak oil', increasing greenhouse gas emissions, and the likelihood that by the middle of this century there could be five times as many motor vehicles registered worldwide as there are now, mean that the world's almost total dependence on petroleum-based fuels for transport is, in every sense of the word, unsustainable.",
"If your recruiting efforts attract job applicants with too much experience—a near certainty in this weak labor market—you should consider a response that runs counter to most hiring managers’ MO: Don’t reject those applicants out of hand. Instead, take a closer look. New research shows that overqualified workers tend to perform better than other employees, and they don’t quit any sooner. Furthermore, a simple managerial tactic—empowerment—can mitigate any dissatisfaction they may feel. The prejudice against too-good employees is pervasive. Companies tend to prefer an applicant who is a “perfect fit” over someone who brings more intelligence, education, or experience than needed. On the surface, this bias makes sense: Studies have consistently shown that employees who consider themselves overqualified exhibit higher levels of discontent. For example, over-qualification correlated well with job dissatisfaction in a 2008 study of 156 call-center reps by Israeli researchers Saul Fine and Baruch Nevo. And unlike discrimination based on age or gender, declining to hire overqualified workers is perfectly legal. But even before the economic downturn, a surplus of overqualified candidates was a global, problem, particularly in developing economies, where rising education levels are giving workers more skills than are needed to supply the growing service sectors. If managers can get beyond the conventional wisdom, the growing pool of too-good applicants is a great opportunity. Berrin Erdogan and Talya N. Bauer of Portland State University in Oregon found that overqualified workers’ feelings of dissatisfaction can be dissipated by giving them autonomy in decision making. At stores where employees didn’t feel empowered, “overeducated” workers expressed greater dissatisfaction than their colleagues did and were more likely to state an intention to quit. But that difference vanished where self-reported autonomy was high.",
"What makes teaching online unique is that it uses the internet, especially the World Wide Web, as the primary means of communication. Thus, when you teach online, you don’t have to be someplace to teach. You don’t have to lug your briefcase full of paper or your laptop to a classroom, stand at a lectern, scribble on a chalkboard (or even use your high-tech, interactive classroom “smart” whiteboard), or grade papers in a stuffy room while your students take a test. You don’t even have to sit in your office waiting for students to show up for conferences. You can hold “office hours” on weekends or at night after dinner. You can do all this while living in a small town in Wyoming or a big city like Bangkok, even if you are working for a college whose administrative office is located in Florida or Dubai. You can attend an important conference in Hawaii on the same day you teach your class in New Jersey, logging on from your laptop via the local café’s wireless hotspot or your hotel room’s high-speed network. Or you may simply pull out your smartphone to quickly check on the latest postings, email, or text messages from students. Online learning offers more freedom for students as well. They can search for courses using the Web, scouring their institution or even the world for programs, classes, and instructors that fit their needs. Having found an appropriate course, they can enroll and register, shop for their books, read articles, listen to lectures, submit their homework assignments, confer with their instructors, and receive their final grades-all online.",
"A plunging oil price has dragged UK inflation to zero over recent months. But analysts say the fall in retail prices cannot solely be attributed to oil. Discount retailers continue to steal market share from established industry giants, taking an increased chunk of both food and non-food markets. And, as retail analyst Nick Bubb notes, “the big supermarkets have had to respond to this by bringing down their own ‘rip off’ prices”. The result is a sector-wide fall in prices paid at the till. The growth of online retailers has also brought prices down, in part due to the ease with which customers can compare prices and purchase goods elsewhere if they find an item cheaper on a competitor’s site. Retailers are also reluctant to offer different prices in their physical and online stores, according to retail analyst Richard Hyman, which means shops are forced to cut prices on the high street. An ever-expanding range of shops is also to blame, according to Mr. Hyman. “Overcapacity is the biggest of the issues affecting prices,” he says. “In the last 10 years, online alone has added the equivalent of 110m square feet of trading space — that’s roughly equal to 65 additional Westfield London shopping malls. An increase in supply of retailers, with no increase in demand, has left the industry massively oversupplied.”",
"This year’s Nobel Peace Prize justly rewards the thousands of scientists of the United Nations Climate Change Panel (the IPCC). These scientists are engaged in excellent, painstaking work that establishes exactly what the world should expect from climate change. The other award winner, former US Vice President Al Gore, has spent much more time telling us what to fear. While the IPCC’s estimates and conclusions are grounded in careful study, Gore doesn’t seem to be similarly restrained. Gore told the world in his Academy Award winning movie (recently labelled “one sided” and containing “scientific errors” by a British judge) to expect 20-foot sea level rises over this century. He ignores the findings of his Nobel co-winners, the IPCC, who conclude that sea levels will rise between only a half foot and two feet over this century, with their best expectation being about one foot. That’s similar to what the world experienced over the past 150 years. Likewise, Gore agonizes over the accelerated melting of ice in Greenland and what it means for the planet, but overlooks the IPCC’s conclusion that, if sustained, the current rate of melting would add just three inches to the sea level rise by the end of the century. Gore also takes no notice of research showing that Greenland’s temperatures were higher in 1941 than they are today. The politician turned movie maker loses sleep over a predicted rise in heat related deaths. There’s another side of the story that’s inconvenient to mention: rising temperatures will reduce the number of cold spells, which are a much bigger killer than heat. The best study shows that by 2050, heat will claim 400,000 more lives, but, 1.8 million fewer will die because of cold. Indeed, according to the first complete survey of the economic effects of climate change for the world, global warming will actually save lives.",
"What is museology? A simple definition might be that it is the study of museums, their history and underlying philosophy, the various ways in which they have, in the course of time, been established and developed, their avowed or unspoken aims and policies, their educative or political or social role. More broadly conceived, such a study might also embrace the bewildering variety of audiences — visitors, scholars, art lovers, children -at whom the efforts of museum staff are supposedly directed, as well as related topics such as the legal duties and responsibilities placed upon (or incurred by) museums, perhaps even some thought as to their future. Seen in this light, museology might appear at first sight a subject so specialized as to concern only museum professionals, who by virtue of their occupation are more or less obliged to take an interest in it. In reality, since museums are almost, if not quite as old as civilization itself, and since the plethora of present-day museums embraces virtually every field of human endeavor - not just art, or craft, or science, but entertainment, agriculture, rural life, childhood, fisheries, antiquities, automobiles: the list is endless - it is a field of enquiry so broad as to be a matter of concern to almost everybody.",
"Half a lifetime ago I made a lifestyle to choice to exchange a city terrace for a farm cottage. I knew it was a good idea because I had been there before. Born and reared on a farm I had been seduced for a few years by the idea of being a big shot that lived and worked in a city rather than only going for the day to wave at the buses. True, I was familiar with some of the minor disadvantages of country living such as an iffy private water supply sometimes infiltrated by a range of flora and fauna (including, on one memorable occasion, a dead lamb), the absence of central heating in farm houses and cottages, and a single track farm road easily blocked by snow, broken down machinery or escaped livestock. But there were many advantages as I told my wife back in the mid Seventies. Town born and bred, eight months pregnant and exchanging a warm, substantial Corstorphine terrace for a windswept farm cottage on a much lower income, persuading her that country had it over town might have been difficult.",
"Malaysia is one of the most pleasant, hassle-free countries to visit in Southeast Asia. Aside from its gleaming 21st century glass towers, it boasts some of the most superb beaches, mountains and national parks in the region. Malaysia is also launching its biggest-ever tourism campaign in effort to lure 20 million visitors here this year. Any tourist itinerary would have to begin in the capital, Kuala Lumpur, where you will find the Petronas Twin Towers, which once comprised the world tallest buildings and now hold the title of second-tallest. Both the 88-story towers soar 1,480 feet high and are connected by a sky-bridge on the 41st floor. The limestone temple Batu Caves, located 9 miles north of the city, have a 328-foot-high ceiling and feature ornate Hindu shrines, including a 141-foot-tall gold-painted statue of a Hindu deity. To reach the caves, visitors have to climb a steep flight of 272 steps. In Sabah state on Borneo island not to be confused with Indonesias Borneo you'll find the small mushroom-shaped Sipadan island, off the coast of Sabah, rated as one of the top five diving sites in the world. Sipadan is the only oceanic island in Malaysia, rising from a 2,300-foot abyss in the Celebes Sea. You can also climb Mount Kinabalu, the tallest peak in Southeast Asia, visit the Sepilok Orang Utan Sanctuary, go white-water rafting and catch a glimpse of the bizarre Proboscis monkey, a primate found only in Borneo with a huge pendulous nose, a characteristic pot belly and strange honking sounds. While you're in Malaysia, consider a trip to Malacca. In its heyday, this southern state was a powerful Malay sultanate and a booming trading port in the region. Facing the Straits of Malacca, this historical state is now a place of intriguing Chinese streets, antique shops, old temples and reminders of European colonial powers. Another interesting destination is Penang, known as the Pearl of the Orient. This island off the northwest coast of Malaysia boasts of a rich Chinese cultural heritage, good food and beautiful beaches.",
"According to new research, house mice (Mus musculus) are ideal biomarkers of human settlement as they tend to stow away in crates or on ships that end up going where people go. Using mice as a proxy for human movement can add to what is already known through archaeological data and answer important questions in areas where there is a lack of artifacts, Searle said. Where people go, so do mice, often stowing away in carts of hay or on ships. Despite a natural range of just 100 meters (109 yards) and an evolutionary base near Pakistan, the house mouse has managed to colonize every continent, which makes it a useful tool for researchers like Searle. Previous research conducted by Searle at the University of York supported the theory that Australian mice originated in the British Isles and probably came over with convicts shipped there to colonize the continent in the late 18th and 19th centuries. In the Viking study, he and his fellow researchers in Iceland, Denmark and Sweden took it a step further, using ancient mouse DNA collected from archaeological sites dating from the 10th to 12th centuries, as well as modern mice. He is hoping to do just that in his next project, which involves tracking the migration of mice and other species, including plants, across the Indian Ocean, from South Asia to East Africa.",
"What is the solution for nations with increasing energy demands, hindered by frequent power cuts and an inability to compete in the international oil market? For East Africa at least, experts think geothermal energy is the answer. More promising still, the Kenyan government and international investors seem to be listening. This is just in time according to many, as claims of an acute energy crisis are afoot due to high oil prices, population spikes and droughts. Geothermal energy works by pumping water into bedrock, where it is heated and returns to the surface as steam which is used directly as a heat source or to drive electricity production. Source: Energy Information Administration, Geothermal Energy in the Western United States and Hawaii. Currently over 60% of Kenya’s power comes from hydroelectric sources but these are proving increasingly unreliable as the issue of seasonal variation is intensified by erratic rain patterns. Alternative energy sources are needed; and the leading energy supplier in Kenya, Kenya Electricity Generating Company (KenGen), hopes to expand its geothermal energy supply from 13% to 25 % of its total usage by 2020. The potential of geothermal energy in the region was first realised internationally by the United Nations Development Program, when geologists observed thermal anomalies below the East African Rift system. Locals have been utilising this resource for centuries; using steam vents to create the perfect humidity for greenhouses, or simply to enjoy a swim in the many natural hot lakes. Along the 6000 km of the rift from the Red Sea to Mozambique, geochemical, geophysical and heat flow measurements were made to identify areas suitable for geothermal wells. One area lies next to the, extinct Olkaria volcano, within the Hell’s Gate National Park, and sits over some of the thinnest continental crust on Earth. This is a result of the thinning of the crust by tectonic stretching, causing hotter material below the Earth’s surface to rise, resulting in higher temperatures. This thin crust was ideal for the drilling of geothermal wells, reaching depths of around 3000 m, where temperatures get up to 342°C, far higher than the usual temperature of 90°C at this depth. Water in the surrounding rocks is converted to steam by the heat. The steam can be used to drive turbines and produce electricity.",
"A miner in the state of Chiapas found a tiny tree frog that has been preserved in amber for 25 million years, a researcher said. If authenticated, the preserved frog would be the first of its kind found in Mexico, according to David Grimaldi, a biologist and curator at the American Museum of Natural History, who was not involved in the find. The chunk of amber containing the frog, less than half an inch long, was uncovered by a miner in Mexico’s southern Chiapas state in 2005 and was bought by a private collector, who loaned it to scientists for study. A few other preserved frogs have been found in chunks of amber — a stone formed by ancient tree sap — mostly in the Dominican Republic. Like those, the frog found in Chiapas appears to be of the genus Craugastor, whose descendants still inhabit the region, said biologist Gerardo Carbot of the Chiapas Natural History and Ecology Institute. Carbot announced the discovery this week. The scientist said the frog lived about 25 million years ago, based on the geological strata where the amber was found. Carbot would like to extract a sample from the frog’s remains in hopes of finding DNA that could identify the particular species but doubts the owner would let him drill into the stone.",
"The feature of being “double blind”, where neither patients nor physicians are aware of who receives the experimental treatment, is almost universally trumpeted as being a virtue of clinical trials. Hence, trials that fail to remain successfully double blind are regarded as providing inferior evidential support. The rationale for this view is unobjectionable: double blinding rules out the potential confounding influences of patient and physician beliefs. Nonetheless, viewing double blind trial as necessarily superior is problematic. For one, it leads to the paradox that very effective experimental treatments will not be supportable by best evidence. If a new drug were to make even the most severe symptoms of the common cold disappear within seconds, most participants and investigators would correctly identify it as the latest wonder drug and not the control (i.e. placebo) treatment. Any trial testing the effectiveness of this wonder drug will therefore fail to remain double blind. Similar problems arise for treatments, such as exercise and most surgical techniques, whose nature makes them resistant to being tested in double blind, conditions. It seems strange that an account of evidence should make priori judgments that certain claims can never be supported by ‘best evidence’. It would be different if the claims at issue were pseudoscientific – untestable. But so far as treatments with large effects go, the claim that they are effective is highly testable and intuitively they should receive greater support from the evidence than do claims about treatments with moderate effects.",
"When Christopher Columbus arrived at Hispaniola during his first transatlantic voyage in the year, A.D. 1492, the island had already been settled by Native Americans for about 5,000 years. The occupants in Columbus’s time were a group of Arawak Indians called Tainos who lived by farming, were organized into five chiefdoms, and numbered around half a million (the estimates range from 100,000 to 2,000,000). Columbus initially found them peaceful and friendly, until he and his Spaniards began mistreating them. Unfortunately for the Tainos, they had gold, which the Spanish coveted but didn’t want to go to the work of mining themselves. Hence the conquerors divided up the island and its Indian population among individual Spaniards, who put the Indians to work as virtual slaves, accidentally infected them with Eurasian diseases, and murdered them. By the year 1519, 27 years after Columbus’s arrival, that original population of half a million had been reduced to about 11,000, most of whom died that year of smallpox to bring the population down to 3,000.",
"Many people who have written on the subject of allowances say it is not a good idea to pay your child for work around the home. These jobs are a normal part of family life. Paying children to do extra work around the house, however, can be useful. It can even provide an understanding of how a business works. Allowances give children a chance to experience the things they can do with money. They can share it in the form of gifts or giving to a good cause. They can spend it by buying things they want. Or they can save and maybe even invest it. Saving helps children understand that costly goals require sacrifice: you have to cut costs and plan for the future. Requiring children to save part of their allowance can also open the door to future saving and investing. Many banks offer services to help children and teenagers learn about personal finance. A savings account is an excellent way to learn about the power of compound interest. Compounding works by paying interest on interest. So, for example, one dollar invested at two percent interest for two years will earn two cents in the first year. The second year, the, money will earn two percent of one dollar and two cents, and so on. That may not seem like a lot. But over time it adds up.",
"Scientists believe they may have found a way to prevent complications that can arise following cataract surgery, the world’s leading cause of blindness. Detailing why complications can occur after surgery, researchers from the University of East Anglia (UEA) explained that while cataract surgery works well to restore vision, a few natural lens cells always remain after the procedure. Over time, the eye’s wound healing response leads these cells to spread across the underside of the artificial lens, which interferes with vision, causing what’s known as ‘posterior capsule opacification’ or secondary cataract. UEA’s School of Biological Sciences academic, Dr. Michael Wormstone, who led the study, said: “Secondary visual loss responds well to treatment with laser surgery. But as life expectancy increases, the problems of cataract and posterior capsule opacification will become even greater in terms of both patient well being and economic burden. It’s essential that we find better ways to manage the condition in future.” As a result, researchers are designing new artificial lenses that can be placed into a capsular bag that stays open, instead of shrink-wrapping closed, which currently occurs. It is believed that, through the new approach, fluid in the eye can flow around the artificial lens, therefore diluting and washing away the cell-signaling molecules that encourage cell re-growth.",
"In its periodic quest for culinary identity, Australia automatically looks to its indigenous ingredients, the foods that are native to this country. 'There can be little doubt that using an indigenous product must qualify a dish as Australian notes Stephanie Alexander. Similarly, and without qualification, states that ‘A uniquely Australian food culture can only be based upon foods indigenous to this country, although, as Craw remarks, proposing Australian native foods as national symbols relies more upon their association with 'nature' and geographic origin than on common usage. Notwithstanding the lack of justification for the premise that national dishes are, of necessity, founded on ingredients native to the country—after all, Italy's gastronomic identity is tied to the non-indigenous tomato, Thailand's to the non-indigenous chili—the reality is that Australians do not eat indigenous foods in significant quantities. The exceptions are fish, crustaceans and shellfish from oceans, rivers and lakes, most of which are unarguably unique to this country. Despite valiant and well-intentioned efforts today at promoting and encouraging the consumption of native resources, bush foods are not harvested or produced in sufficient quantities for them to be a standard component of Australian diets, nor are they generally accessible., Indigenous foods are less relevant to Australian identity today than lamb and passionfruit, both initially imported and now naturalized.",
"Some 'moments' seem more important in hindsight than they were at the time. David Day, for example, looks at John Curtin's famous 'Australia looks to America' statement of December 1941, a moment remembered as embodying a fundamental shift in Australia's strategic alliance away from Britain towards the US. As Day points out, the shift to the US as our primary ally was a long, drawn-out process which occurred over half a century. Curtin's statement is iconic - it represents and symbolizes the shift - but in and of itself it made almost no difference. Russell McGregor makes similar arguments with regard to the 1967 referendum, falsely hailed in our memories as a huge advance in Aboriginal rights. There are many other important events which our contributors examine - the campaign to save the Franklin River; the landings at Gallipoli, the discovery of gold in 1851, the disastrous Premiers' Plan designed to cope with the Great Depression, to name just a few. Taken together, our contributors show that narrative approaches to Australian history are not as simple as might be imagined. There is of course the issue of what should be included and what should not be - what, after all, makes a moment or an event sufficiently important to be included in an official narrative? Just as importantly, the moments and events that are included in narrative histories are open to multiple interpretations. We hope this collection will provide an important reminder to those wanting to impose a universal history curriculum for our schoolchildren, and indeed a lesson to all Australians wishing to understand their nation's past. History is never simple or straightforward, and it always resists attempts to make it so.",
"The Booksellers of Hookham and Carpenter (hereafter referred to only as Hookham) were located on New Bond Street in London, and their records span the most politically turbulent decade of the eighteenth-century the 1790's. Clients who frequented Hookham were primarily from the aristocratic or gentry classes. In fact, of Hookham's total buyers, 22% were aristocracy, and 35% of the aristocracy purchased novels. We can also confidently assume that untitled female customers were of gentry income because their addresses were primarily in London's fashionable West End. Hookham's ledgers not only reveal a dramatic increase in the proportion of female purchasers of novels by comparison to earlier studies of provincial women, but they also reveal a remarkable increase in the proportion of female purchases of novels authored by females. Such a marked increase illustrates that Hookham's leisured, female customers were able to buy more novels. Furthermore, the fact that these female aristocrats and gentry have accounts under their own name, not their husbands, demonstrates the greater degree of agency and independence that these urban, moneyed women had relative to provincial women. However, because our study does not include an examination of male customers, we are very limited in what claims we can make about whether or not these women behaved according to the clich that women were the predominant consumers of novels in the eighteenth-century. Moreover, while more disposable income and leisure time certainly accounts for the significant increase in female purchases of novels authored by women in the 1790s, this increase also strongly suggests a desire on the part of women readers to engage in this politically charged decade. Thus, novel-reading provided women readers with the means through which they were able to participate in the male-dominated world of politics. The latter part of our paper will more fully explore this hypothesis in the context of certain recent literary scholars claims that both Gothic and sentimental novels are actively engaged in political debate and discussion.",
"Slightly less than one in five carers (19%) were primary carers (475,000 people). That is, they were the main carer of a person who was limited in carrying out the core everyday activities of mobility, communication or self-care. Both primary carers and the larger group of other carers (close to 2 million) contribute to the wellbeing of older people and people with disabilities. However, because they care for people who otherwise would have difficulty carrying out basic everyday activities, there is particular interest in primary carers: in the contribution they make, their wellbeing, labor force experiences, motivations and the support they receive in caring. Primary carers were more likely than other carers to be assisting someone who lived in the same household (81% compared with 76%). As with caring as a whole, the likelihood of being a primary carer increased with age to peak at age 55-64 years, where one in twenty people were primary carers. However, rather than then declining, the likelihood of being a primary carer remained at around this level among the older age groups. Consequently, primary carers had a somewhat older age profile than other carers. The median age of primary carers was 52 years, compared with 47 years for other carers. Primary carers were more likely than other carers to be female (71% compared with 50%) and less likely to be in the labor force (39% compared with 60%). Women not in the labor force were by far the largest single group among primary carers (44%). In contrast, men employed full-time were the largest single group among other carers (25%).",
"For decades, space experts have worried that a speeding bit of orbital debris might one day smash a large spacecraft into hundreds of pieces and start a chain reaction, a slow cascade of collisions that would expand for centuries, spreading chaos through the heavens. In the last decade or so, as scientists came to agree that the number of objects in orbit had surpassed a critical mass — or, in their terms, the critical spatial density, the point at which a chain reaction becomes inevitable — they grew more anxious. Early this year, after a half-century of growth, the federal list of detectable objects (four inches wide or larger) reached 10,000, including dead satellites, spent rocket stages, a camera, a hand tool and junkyards of whirling debris left over from chance explosions and destructive tests. So our billions of dollars of satellites are at risk.",
"American English is, without doubt, the most influential and powerful variety of English in the world today. There are many reasons for this. First, the United States is, at present, the most powerful nation on earth and such power always brings with it influence. Indeed, the distinction between a dialect and a language has frequently been made by reference to power. As has been said, a language is a dialect with an army. Second, America’s political influence is extended through American popular culture, in particular through the international reach of American films (movies, of course) and music. As Kahane has pointed out, the internationally dominant position of a culture results in a forceful expansion of its language... the expansion of language contributes... to the prestige of the culture behind it. Third, the international prominence of American English is closely associated with the extraordinarily quick development of communications technology. Microsoft is owned by an American, Bill Gates. This means a computer’s default setting for language is American English, although of course this can be changed to suit one’s own circumstances. In short, the increased influence of American English is caused by political power and the resultant diffusion of American culture and media, technological advance, and the rapid development of communications technology.",
"The ways of life Upper Paleolithic people are known through the remains of meals scattered around their hearths, together with many tools and weapons and the debris left over from their making. The people were hunter-gathers who lived exclusively from what they could find in nature without practicing either agriculture or herding. They hunted the bigger herbivores, while berries, leaves, roots, wild fruit and mushrooms probably played a major role in their diet. Their hunting was indiscriminate;, perhaps because so many animals were about, they did not need to spare pregnant females or the young. In the cave of Enlene, for example, many bones of reindeer and bison fetuses were found. Apparently, upper Paleolithic people hunted like other predators and killed the weakest prey first. They did, however, sometimes concentrate on salmon suns and migrating herds of reindeer. Contrary to popular beliefs about cavemen, upper Paleolithic people did not live deep inside caves. They rather close the foot of cliffs, especially when an overhang provided good shelter. On the plains and in the valleys, they used tents made from hides of the animals they killed. At time, on the great Russian plains, they built huts with huge bones and tusks collected from skeletons of mammals. Men hunted mostly with spears, the bow and arrow were probably not invented until the Magdalenian period that came at the end of the Upper Paleolithic.",
"The Home Office's periodic British Crime Survey estimates that the true level of crime (the sorts, anyway, which inform the official figures) is about four times than is registered in the annual statistics. Quite often, especially in the financial services sector, businesses do not report crimes against themselves for fear of lowering their public image. Many citizens today are not insured against car theft or property loss (because they cannot afford the premiums) so they have no incentive to tell the police if they become victims. A steep statistical rise in crime can sometimes arise not from a real growth in a particular type of conduct but from a new policing policy - offences of 'lewd dancing' rose by about 300 per cent during 12 months in the 1980s in Manchester, but only because the zealous Chief Constable James Anderton had deployed a great many officers in gay night clubs. Sometimes the enactment of a new range of offences or the possibility of committing old offences in a new way (like computer offences involving fraud and deception) can cause an upward jolt in crime levels. The figures just released show a startling jump in street robbery but much of this seems to be a very particular crime: the theft of the now ubiquitous mobile phones. Conversely, if crimes like joyriding and some assaults are kept out of the categories measured in the annual statistics, as is the case, the official figures do not reflect even what is reported to the police as criminal. The way that criminal statistics are compiled by the Home Office is also relevant. From April 1998, police forces started to count crime in a way which, according to the government, will give 'a more robust statistical measure'."
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

    // Calculate and display the total score
    const totalScore = parseInt(scores.content) + parseInt(scores.form) + parseInt(scores.grammar) + parseInt(scores.vocabulary);
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

    // Display the scores
    const scores = {
        content: `${contentScore}/2`,
        form: `${formScore}/1`,
        grammar: `${grammarScore}/2`,
        vocabulary: `${vocabularyScore}/2`,
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
    return Math.floor(Math.random() * 3); // Random score between 0 and 2
}

function calculateFormScore(userSummary) {
    // Implement your form scoring logic here and return a score out of 1
    // You might check for structure and coherence.
    // For this example, let's assume a random score of 0 or 1.
    return Math.floor(Math.random() * 2); // Random score 0 or 1
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



function EnableSubmit() {
    submitButton.disabled = false;
}

nextButton.addEventListener("click", function () {
    currentTextIndex = (currentTextIndex + 1) % texts.length;
    updateText();
    timerDuration = 600; // Reset timer
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
    timerDuration = 600; // Reset timer
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
        timerDuration = 600; // Reset timer
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