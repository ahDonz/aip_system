<?php
session_start();  // Start the session to access session variables

// Include the database connection
include 'src/config/database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $email = $_POST['department_email'];
    $password = $_POST['department_password'];

    // Sanitize the email to prevent SQL injection
    $email = $conn->real_escape_string($email);

    // Query the database to get the user's data by email
    $query = "SELECT * FROM tbl_user WHERE department_email = '$email'";
    $result = $conn->query($query);

    // Check if a user is found
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if the password matches (you should hash the passwords for security)
        if ($password === $user['department_password']) {  // Insecure; use password_verify() in production
            // Check the status of the user
            if ($user['status'] === 'department') {
                // Store user info and status in session
                $_SESSION['department_email'] = $user['department_email'];  // Store the department email in the session
                $_SESSION['status'] = $user['status'];  // Store the status in the session

                // Redirect to the dashboard or homepage
                header("Location: router.php?page=home");  // Redirect to a secure page after login
                exit;
            } else {
                // If the status is not 'department', show an error message
                $error_message = "You do not have access to this section.";
            }
        } else {
            // Incorrect password
            $error_message = "Invalid password.";
        }
    } else {
        // No user found with that email
        $error_message = "No user found with that email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <div class="form-col">
                <img src="public/images/login.jpeg" alt="">
            </div>
            <div class="form-col log-form">
                <div class="log-form-header">
                    <h1>Template</h1>
                </div>
                <form action="" method="POST">
                    <h1>Sign In</h1>
                    <h5>Welcome to Template</h5>
                    <input type="email" name="department_email" placeholder="Email" required>
                    <input type="password" name="department_password" placeholder="Password" required>
                    <?php
                    if (isset($error_message)) {
                        echo "<p style='color:red;'>$error_message</p>";
                    }
                    ?>
                    <p class="forgot-pass">Forgot password?</p>
                    <button type="submit">Login</button>
                    <p class="sign-up">Don't have an account? <a href="router.php?page=register">Sign Up!</a></p>
                </form>
                <div class="icons">
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
