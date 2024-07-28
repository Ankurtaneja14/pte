<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTE Practice - Login</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Tailwind CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <!-- Animate.css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom CSS link -->
    <style>
        /* Custom Styles */
        body {
            background-color: #f0f0f0;
        }
        .container{
            max-width: 1200px;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-in-out;
        }

        .login-container h1 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-login {
            background-color: #3e41eb;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-login:hover {
            background-color: #3e41ec;
        }

        /* Additional Animations (using animate.css) */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated-button {
            animation: fadeInUp 1s ease-in-out;
            animation-delay: 0.5s;
        }
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
    <?php
    session_start();
    // Check if the user is already logged in, redirect to dashboard
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        header("Location: dashboard.php");
        exit();
    }

    // Check if there is any login error message
    if (isset($_SESSION['login_error'])) {
        $login_error = $_SESSION['login_error'];
        unset($_SESSION['login_error']);
    }
    ?>
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <h1 class="text-4xl font-bold text-center animated fadeInUp">Login</h1>
                <?php if (isset($login_error)): ?>
                    <div class="alert alert-danger animated fadeInUp" role="alert">
                        <?php echo $login_error; ?>
                    </div>
                <?php endif; ?>
                <form action="login_process.php" method="POST" class="animated fadeInUp">
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-login animated-button">Login</button>
                </form>
            </div>
        </div>
    </div>
     <!-- Bootstrap JS and jQuery links -->
     <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
