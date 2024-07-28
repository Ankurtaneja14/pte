<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags, title, and stylesheets -->
    <!-- Bootstrap CSS link -->
    <!-- Include Recorder.js library -->
    <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
</head>
<body>
<!-- Header content -->

<div class="main">
    <div class="contain">
        <!-- Image display and description form -->

        <div class="row">
            <div class="col-md-6">
                <div class="description">
                    <!-- Add the Start and Stop Recording buttons here -->
                    <button id="startRecordingButton" class="btn btn-success mt-3">Start Recording</button>
                    <button id="stopRecordingButton" class="btn btn-danger mt-3" disabled>Stop Recording</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include the audio player -->
<audio id="audioPlayer" controls style="display: none;"></audio>

<!-- Footer content -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const startRecordingButton = document.getElementById("startRecordingButton");
        const stopRecordingButton = document.getElementById("stopRecordingButton");
        const audioPlayer = document.getElementById("audioPlayer");

        let recorder;
        let audioChunks = [];

        startRecordingButton.addEventListener("click", function() {
            navigator.mediaDevices.getUserMedia({ audio: true })
                .then(function(stream) {
                    recorder = new MediaRecorder(stream);

                    recorder.ondataavailable = event => {
                        if (event.data.size > 0) {
                            audioChunks.push(event.data);
                        }
                    };

                    recorder.onstop = () => {
                        const blob = new Blob(audioChunks, { type: 'audio/wav' });
                        const url = URL.createObjectURL(blob);
                        audioPlayer.src = url;
                        audioPlayer.style.display = "block";
                        audioPlayer.controls = true;

                        // Clean up
                        audioChunks = [];
                        recorder = null;
                    };

                    startRecordingButton.disabled = true;
                    stopRecordingButton.disabled = false;

                    recorder.start();
                })
                .catch(error => {
                    console.error("Error accessing microphone:", error);
                    alert("Cannot access the microphone. Please make sure the microphone is enabled and try again.");
                });
        });

        stopRecordingButton.addEventListener("click", function() {
            if (recorder) {
                recorder.stop();
                startRecordingButton.disabled = false;
                stopRecordingButton.disabled = true;
            }
        });
    });
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Describe Image Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .contain {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .description textarea {
            width: 100%;
        }
    </style>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <!-- Your existing header content -->
    </header>
    <div class="main">
        <div class="contain">
            <h1>Describe Image Test</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="image-container">
                        <img id="image" src="images/sample.jpg" alt="Sample Image">
                    </div>
                    <div class="description">
                        <button id="startRecordingButton" class="btn btn-primary mt-3">Start Recording</button>
                        <button id="stopRecordingButton" class="btn btn-danger mt-3" disabled>Stop Recording</button>
                        <audio id="audioPlayer" controls style="display: none;"></audio>
                        <button id="submitDescription" class="btn btn-success mt-3">Submit</button>
                        <button id="viewAnswer" class="btn btn-primary mt-3" disabled>View Answer</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Answer</h3>
                    <p id="answerDisplay"></p>
                    <button id="nextImage" class="btn btn-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; <?php echo date('Y'); ?> PTE Practice</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imageElement = document.getElementById("image");
            const viewAnswerButton = document.getElementById("viewAnswer");
            const submitButton = document.getElementById("submitDescription");
            const answerDisplay = document.getElementById("answerDisplay");
            const nextImageButton = document.getElementById("nextImage");
            const startRecordingButton = document.getElementById("startRecordingButton");
            const stopRecordingButton = document.getElementById("stopRecordingButton");
            const audioPlayer = document.getElementById("audioPlayer");
            let mediaRecorder;
            let recordedChunks = [];

            const images = [
                "img/menu.png", // Add more image paths here
            ];
            const answers = [
                "Three Dots",
                "The image shows a colorful marketplace with various stalls and people shopping.",
                // Add more answers corresponding to each image
            ];

            let currentImageIndex = 0;

            function loadImage(index) {
                imageElement.src = images[index];
                descriptionTextarea.value = "";
                answerDisplay.textContent = "";
            }

            submitButton.addEventListener("click", function() {
                const description = descriptionTextarea.value;
                if (description.trim() !== "") {
                    alert("Description submitted: " + description);
                    viewAnswerButton.disabled = false;
                } else {
                    alert("Please provide a description.");
                }
            });

            viewAnswerButton.addEventListener("click", function() {
                answerDisplay.textContent = answers[currentImageIndex];
                viewAnswerButton.disabled = true;
            });

            nextImageButton.addEventListener("click", function() {
                currentImageIndex = (currentImageIndex + 1) % images.length;
                loadImage(currentImageIndex);
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

            loadImage(currentImageIndex);
        });
    </script>
</body>
</html>
