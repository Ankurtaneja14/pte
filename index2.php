<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTE Practice Quiz</title>
    <!-- Add meta description for SEO -->
    <meta name="description" content="Prepare for your PTE exam with our comprehensive practice platform. Ace your PTE test with study material, practice tests, and progress tracking">
    
    <!-- Add meta author information (if applicable) -->
    <meta name="author" content="Your Name">

    <!-- Specify the character set for better compatibility -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Set canonical URL (if applicable) -->
    <link rel="canonical" href="https://www.example.com/index.php">

    <!-- Open Graph Meta Tags for social sharing (customize as needed) -->
    <meta property="og:title" content="PTE Practice Quiz">
    <meta property="og:description" content="Prepare for your PTE exam with our comprehensive practice platform. Ace your PTE test with study material, practice tests, and progress tracking">
    <meta property="og:image" content="https://www.example.com/images/pte-practice-image.jpg">
    <meta property="og:url" content="https://www.example.com/index.php">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags for social sharing (customize as needed) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="PTE Practice Quiz">
    <meta name="twitter:description" content="Prepare for your PTE exam with our comprehensive practice platform. Ace your PTE test with study material, practice tests, and progress tracking">
    <meta name="twitter:image" content="https://www.example.com/images/pte-practice-image.jpg">
    <meta name="twitter:url" content="https://www.example.com/index.php">

    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Tailwind CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <!-- Animate.css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom CSS link -->
    <style>
        /* Custom Hero Section Styles */
        .hero-section {
            background-image: linear-gradient(120deg, #3498db, #8e44ad);
            color: #ffffff;
            padding: 100px 0;
        }

        .hero-section h1 {
            font-size: 3rem;
        }

        /* Custom Features Section Styles */
        .features-section {
            background-color: #f8f9fa;
            padding: 80px 0;
        }

        .features-section h2 {
            font-size: 2.5rem;
            color: #343a40;
        }

        .features-section .col-md-4 {
            text-align: center;
            padding: 20px;
        }

        .features-section .fa {
            font-size: 4rem;
            color: #3498db;
        }

        /* Custom Call to Action Section Styles */
        .call-to-action-section {
            background-image: linear-gradient(120deg, #3498db, #8e44ad);
            color: #ffffff;
            padding: 100px 0;
        }

        .call-to-action-section h2 {
            font-size: 2.5rem;
        }

        /* Custom Footer Styles */
        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
        }

        /* Additional Styles */
        body {
            background-color: #f4f5f7;
        }

        .container {
            max-width: 1200px;
        }

        /* Redesigned Navbar Styles */
        .navbar {
            background-color: #3c6d86;
            border-bottom: 3px solid #3945b4;
        }

        .navbar-brand {
            font-size: 1.8rem;
            color: #7848a0;
        }

        .navbar-nav .nav-link {
            font-size: 1.2rem;
            color: #212891;
            padding: 0.5rem 1rem;
            margin: 0 0.5rem;
            border-radius: 5px;
        }

        .navbar-nav .nav-link:hover {
            background-color: #3e41eb;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">PTE Practice</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="practice_test.php">Practice Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center text-white py-5">
        <div class="container">
            <h1 class="animate__animated animate__fadeInUp animate__delay-1s text-4xl font-bold mb-4">Prepare for Success with PTE Practice</h1>
            <p class="animate__animated animate__fadeInUp animate__delay-2s text-lg leading-relaxed mb-8">Ace your PTE exam with our comprehensive practice platform.</p>
            <a href="practice_test.php" class="animate__animated animate__fadeInUp animate__delay-3s btn btn-light btn-lg py-2 px-6 rounded-full hover:bg-white hover:text-blue-500 transition duration-300">Start Practicing</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section text-center bg-light py-5">
        <div class="container">
            <h2 class="animate__animated animate__fadeInUp animate__delay-1s">Key Features</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <i class="fa fa-book fa-4x mb-3"></i>
                    <h3>Extensive Study Material</h3>
                    <p>Access a wide range of study material and tips for all PTE sections.</p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-clock fa-4x mb-3"></i>
                    <h3>Real-time Practice Tests</h3>
                    <p>Take full-length practice tests with a countdown timer to simulate the real exam environment.</p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-trophy fa-4x mb-3"></i>
                    <h3>Track Your Progress</h3>
                    <p>Monitor your performance and track your progress over time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="call-to-action-section text-center py-5">
        <div class="container">
            <h2 class="animate__animated animate__fadeInUp animate__delay-1s">Ready to boost your PTE score?</h2>
            <p class="animate__animated animate__fadeInUp animate__delay-2s">Start practicing now and achieve your desired PTE score!</p>
            <a href="practice_test.php" class="animate__animated animate__fadeInUp animate__delay-3s btn btn-primary btn-lg py-2 px-6 rounded-full hover:bg-white hover:text-blue-500 transition duration-300">Get Started</a>
        </div>
    </section>

    <!-- Additional Content Section 1 -->
    <section class="additional-content-section bg-gray-100 py-5">
        <div class="container">
            <h2 class="text-center text-3xl font-semibold mb-4">More About PTE Practice</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="animate__animated animate__fadeInUp animate__delay-1s">
                    <img src="images/study-material.jpg" alt="Study Material" class="rounded-lg">
                </div>
                <div class="animate__animated animate__fadeInUp animate__delay-2s">
                    <p class="text-lg text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut libero nec augue efficitur pulvinar. Nulla facilisi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Content Section 2 -->
    <section class="additional-content-section py-5">
        <div class="container">
            <h2 class="text-center text-3xl font-semibold mb-4">Testimonials</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <p class="text-lg text-gray-800">"PTE Practice helped me achieve a high score in my PTE exam. The real-time practice tests were invaluable."</p>
                        <p class="text-gray-600 mt-2">- John Doe</p>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <p class="text-lg text-gray-800">"I highly recommend PTE Practice to anyone preparing for the PTE exam. It's an excellent platform."</p>
                        <p class="text-gray-600 mt-2">- Jane Smith</p>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <p class="text-lg text-gray-800">"The progress tracking feature helped me identify my weak areas and improve my performance."</p>
                        <p class="text-gray-600 mt-2">- David Johnson</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-white text-center py-3">
        <p>&copy; <?php echo date('Y'); ?> PTE Practice</p>
    </footer>

    <!-- Bootstrap JS and jQuery links -->
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
