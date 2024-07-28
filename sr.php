<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentence Reorder Test</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
        }

        .box {
            border: 1px solid #ccc;
            padding: 10px;
            width: 45%;
            min-height: 100px; /* Add minimum height to boxes to ensure they are visible */
        }

        .arrows {
            text-align: center;
        }

        button {
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1>Sentence Reorder Test</h1>

    <div class="container">
        <div class="box" id="scrambled-box">
            <!-- Scrambled Sentences -->
        </div>

        <div class="arrows">
            <!-- Arrow Buttons to Move Sentences -->
            <button onclick="moveToScrambled()">←</button>
            <button onclick="moveToCorrectOrder()">→</button>
        </div>

        <div class="box" id="correct-order-box">
            <!-- Correct Order Sentences -->
        </div>
    </div>

    <div class="arrows">
        <!-- Arrow Buttons to Move Sentences Up and Down in the Answer Box -->
        <button onclick="moveSentenceUp()">↑</button>
        <button onclick="moveSentenceDown()">↓</button>
    </div>

    <button id="prev-button" onclick="loadPrevious()">Previous</button>
    <button id="next-button" onclick="loadNext()">Next</button>

    <button id="submit-button" onclick="checkAnswer()">Submit Answer</button>

    <script>
        const scrambledBox = document.getElementById("scrambled-box");
        const correctOrderBox = document.getElementById("correct-order-box");
        const prevButton = document.getElementById("prev-button");
        const nextButton = document.getElementById("next-button");
        const submitButton = document.getElementById("submit-button");
        let selectedSentence = null;
        let currentSentenceIndex = 0;
        let sentences = []; // Store sentences loaded from JSON
        let correctSentences = []; // Store the correct order of sentences

        // Sample sets of sentences
        const sentenceSets = [
            ["Sentence Set 1 - Sentence 1", "Sentence Set 1 - Sentence 2", "Sentence Set 1 - Sentence 3"],
            ["Sentence Set 2 - Sentence A", "Sentence Set 2 - Sentence B", "Sentence Set 2 - Sentence C"]
        ];

        // Function to load and display sentences from the current set
        function loadSentenceSet(index) {
            if (index >= 0 && index < sentenceSets.length) {
                const currentSet = sentenceSets[index];
                currentSentenceIndex = 0; // Reset to the first sentence in the set

                // Clear both boxes
                scrambledBox.innerHTML = "";
                correctOrderBox.innerHTML = "";

                // Load sentences into the scrambled box
                currentSet.forEach((sentence) => {
                    const sentenceElement = createSentenceElement(sentence);
                    scrambledBox.appendChild(sentenceElement);
                });

                // Enable/disable Next and Previous buttons
                prevButton.disabled = index === 0;
                nextButton.disabled = index === sentenceSets.length - 1;

                selectedSentence = null; // Clear the selected sentence

                // Store the correct order of sentences
                correctSentences = [...currentSet];
            }
        }

        // Function to create a sentence element with click event listener
        function createSentenceElement(sentence) {
            const sentenceElement = document.createElement("p");
            sentenceElement.textContent = sentence;
            sentenceElement.addEventListener("click", () => selectSentence(sentenceElement));
            return sentenceElement;
        }

        // Function to move a sentence from the scrambled box to the correct order box
        function moveToCorrectOrder() {
            if (selectedSentence) {
                correctOrderBox.appendChild(selectedSentence);
                selectedSentence.style.backgroundColor = "";
                selectedSentence = null;
            }
        }

        // Function to move a sentence from the correct order box to the scrambled box
        function moveToScrambled() {
            if (selectedSentence) {
                scrambledBox.appendChild(selectedSentence);
                selectedSentence.style.backgroundColor = "";
                selectedSentence = null;
            }
        }

        // Function to select a sentence when clicked
        function selectSentence(sentence) {
            if (selectedSentence) {
                selectedSentence.style.backgroundColor = "";
            }
            selectedSentence = sentence;
            selectedSentence.style.backgroundColor = "lightgray";
        }

        // Function to move the selected sentence up within the answer box
        function moveSentenceUp() {
            if (selectedSentence && selectedSentence.parentElement === correctOrderBox) {
                const previous = selectedSentence.previousElementSibling;
                if (previous) {
                    correctOrderBox.insertBefore(selectedSentence, previous);
                }
            }
        }

        // Function to move the selected sentence down within the answer box
        function moveSentenceDown() {
            if (selectedSentence && selectedSentence.parentElement === correctOrderBox) {
                const next = selectedSentence.nextElementSibling;
                if (next) {
                    correctOrderBox.insertBefore(next, selectedSentence);
                }
            }
        }

        // Function to check if the sentences are in the correct order
        function checkAnswer() {
            const reorderedSentences = Array.from(correctOrderBox.children).map((sentenceElement) => sentenceElement.textContent);
            const isCorrect = JSON.stringify(reorderedSentences) === JSON.stringify(correctSentences);

            if (isCorrect) {
                alert("Correct! The sentences are in the correct order.");
            } else {
                alert("Incorrect. Please rearrange the sentences.");
            }
        }

        // Function to load the previous sentence set
        function loadPrevious() {
            currentSentenceIndex = 0; // Reset to the first sentence in the set
            loadSentenceSet(currentSentenceIndex - 1);
        }

        // Function to load the next sentence set
        function loadNext() {
            currentSentenceIndex = 0; // Reset to the first sentence in the set
            loadSentenceSet(currentSentenceIndex + 1);
        }

        // Initial load (load the first set of sentences)
        loadSentenceSet(currentSentenceIndex);
    </script>
</body>
</html>
