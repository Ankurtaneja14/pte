const practiceParagraph = document.getElementById("practiceParagraph");
const nextButton = document.getElementById("nextButton");
const aiScore = document.getElementById("aiScore")
const readAloudButton = document.getElementById("readAloudButton");
const startRecordingButton = document.getElementById("startRecordingButton");
const stopRecordingButton = document.getElementById("stopRecordingButton");
const audioPlayer = document.getElementById("audioPlayer");
let currentParagraphIndex = 0;
let paragraphs;
let mediaRecorder;
let recordedChunks = [];
aiScore.style.display = "none";
// Fetch paragraphs from the JSON file
fetch('paragraphs.json')
    .then(response => response.json())
    .then(data => {
        paragraphs = data;
        updateParagraph();
    })
    .catch(error => console.error("Error fetching paragraphs:", error));

    submitButton.addEventListener("click", function() {
    if (paragraphs) {
        const fluencyScore = getRandomScore();
        const pronunciationScore = getRandomScore();
        const sequenceScore = getRandomScore();

        document.getElementById("fluencyScore").textContent = fluencyScore;
        document.getElementById("pronunciationScore").textContent = pronunciationScore;
        document.getElementById("sequenceScore").textContent = sequenceScore;
    
    }
    aiScore.style.display = "block";
    submitButton.disabled = true
});

   

function hideaiscore(){
    aiScore.style.display = "none"
}
// ... (other functions)

function getRandomScore() {
    return Math.floor(Math.random() * (100 - 50 + 1)) + 50; // Random score between 50 and 100
}

nextButton.addEventListener("click", function() {
    currentParagraphIndex = (currentParagraphIndex + 1) % paragraphs.length;
    updateParagraph();
    hideaiscore();
    audioPlayer.style.display = "none";
});

readAloudButton.addEventListener("click", function() {
    const currentParagraph = paragraphs[currentParagraphIndex];
    const utterance = new SpeechSynthesisUtterance(currentParagraph.content);
    speechSynthesis.speak(utterance);
    console.log("Content Loaded")
});

startRecordingButton.addEventListener("click", function() {
    navigator.mediaDevices.getUserMedia({ audio: true })
        .then(function(stream) {
            mediaRecorder = new MediaRecorder(stream);

            mediaRecorder.ondataavailable = event => {
                if (event.data.size > 0) {
                    recordedChunks.push(event.data);
                }
            };

            mediaRecorder.onstop = () => {
                const blob = new Blob(recordedChunks, { type: 'audio/wav' });
                const url = URL.createObjectURL(blob);
                audioPlayer.src = url;
                audioPlayer.style.display = "block";
                stopRecordingButton.disabled = true;
                submitButton.disabled = false;
            };

            startRecordingButton.disabled = true;
            stopRecordingButton.disabled = false;
            mediaRecorder.start();
        })
        .catch(error => {
            console.error("Error accessing microphone:", error);
            alert("Cannot access the microphone. Please make sure the microphone is enabled and try again.");
        });
});

stopRecordingButton.addEventListener("click", function() {
    if (mediaRecorder) {
        mediaRecorder.stop();
        recordedChunks = [];
        startRecordingButton.disabled = false;
        stopRecordingButton.disabled = true;
    }
});

function updateParagraph() {
    if (paragraphs) {
        const currentParagraph = paragraphs[currentParagraphIndex];
        practiceParagraph.textContent = currentParagraph.content;
    }
}
function autoRead() {
    readAloudButton.click;
}
autoRead()