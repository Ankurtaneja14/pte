<!DOCTYPE html>
<html>
<head>
    <title>Text-to-Speech App</title>
    <style>
        /* CSS styles as before */
    </style>
</head>
<body>
    <div class="container">
        <h1>Text-to-Speech App</h1>
        <div class="text-container">
            <label for="text">Text:</label>
            <input type="text" id="text" placeholder="Enter text to speak">
            <button id="loadTextButton">Load Text</button>
            <button id="nextTextButton" disabled>Next Text</button>
        </div>
        <label for="voiceSelect">Select a voice:</label>
        <select id="voiceSelect"></select>
        <button id="speakButton">Speak</button>
        <button id="pauseButton" disabled>Pause</button>
        <button id="stopButton" disabled>Stop</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const textInput = document.getElementById("text");
            const voiceSelect = document.getElementById("voiceSelect");
            const speakButton = document.getElementById("speakButton");
            const pauseButton = document.getElementById("pauseButton");
            const stopButton = document.getElementById("stopButton");
            const loadTextButton = document.getElementById("loadTextButton");
            const nextTextButton = document.getElementById("nextTextButton");

            let voices = [];
            let speechSynthesis = window.speechSynthesis;
            let utterance = new SpeechSynthesisUtterance();
            let textData = [];
            let currentTextIndex = 0;

            function populateVoiceList() {
                voices = speechSynthesis.getVoices();
                voiceSelect.innerHTML = "";
                voices.forEach(function(voice) {
                    const option = document.createElement("option");
                    option.textContent = voice.name + " (" + voice.lang + ")";
                    option.setAttribute("data-name", voice.name);
                    option.setAttribute("data-lang", voice.lang);
                    voiceSelect.appendChild(option);
                });
            }

            function updateText() {
                if (textData.length > 0) {
                    textInput.value = textData[currentTextIndex];
                }
            }

            populateVoiceList();
            if (speechSynthesis.onvoiceschanged !== undefined) {
                speechSynthesis.onvoiceschanged = populateVoiceList;
            }

            voiceSelect.addEventListener("change", function() {
                utterance.voice = voices.find(
                    (voice) => voice.name === this.selectedOptions[0].getAttribute("data-name")
                );
            });

            nextTextButton.addEventListener("click", function() {
                if (textData.length > 0) {
                    currentTextIndex = (currentTextIndex + 1) % textData.length;
                    updateText();
                }
            });

            speakButton.addEventListener("click", function() {
                if (textInput.value === "") {
                    return;
                }

                utterance.text = textInput.value;
                speechSynthesis.speak(utterance);

                speakButton.disabled = true;
                pauseButton.disabled = false;
                stopButton.disabled = false;
            });

            pauseButton.addEventListener("click", function() {
                speechSynthesis.pause();
                speakButton.disabled = false;
                pauseButton.disabled = true;
                stopButton.disabled = false;
            });

            stopButton.addEventListener("click", function() {
                speechSynthesis.cancel();
                speakButton.disabled = false;
                pauseButton.disabled = true;
                stopButton.disabled = true;
            });

            // Load text from a JSON file
            loadTextButton.addEventListener("click", function() {
                fetch("text.json")
                    .then(response => response.json())
                    .then(data => {
                        textData = data.texts;
                        currentTextIndex = 0;
                        updateText();
                        if (textData.length > 1) {
                            nextTextButton.disabled = false;
                        }
                    })
                    .catch(error => console.error("Error loading text: " + error));
            });
        });
    </script>
</body>
</html>
