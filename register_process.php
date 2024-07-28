<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    // Validate form data (you can add more validation as per your requirements)
    if (empty($username) || empty($password) || empty($name)) {
        $_SESSION['error_message'] = "All fields are required.";
        header("Location: register.php");
        exit();
    } else {
        // Connect to the database
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'pte_practice';

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the username already exists in the database
        $check_username_query = "SELECT id FROM users WHERE username = '$username'";
        $result = $conn->query($check_username_query);

        if ($result->num_rows > 0) {
            $_SESSION['error_message'] = "This username is already taken. Please choose a different one.";
            header("Location: register.php");
            exit();
        } else {
            // Hash the password for security (recommended)
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insert user data into the database
            $insert_query = "INSERT INTO users (username, password, name) VALUES ('$username', '$hashed_password', '$name')";
            if ($conn->query($insert_query) === true) {
                // Redirect to the login page after successful registration
                header("Location: login.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Error: " . $conn->error;
                header("Location: register.php");
                exit();
            }
        }

        $conn->close();
    }
}
?>
