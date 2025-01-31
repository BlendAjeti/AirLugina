<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$message = "";
$conn = new mysqli('localhost', 'root', '', 'database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $stmt = $conn->prepare("SELECT id, password, username, role FROM userdata WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $db_password, $username, $role);  
        $stmt->fetch();

        if ($password === $db_password) {
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role; 

            header("Location: landingpage.php");
            exit();
        } else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    const passwordFieldset = document.querySelector('input[type=\"password\"]').closest('.fieldset');
                    const passwordField = document.querySelector('input[type=\"password\"]');
                    passwordFieldset.classList.add('error');
                    const originalPlaceholder = passwordField.getAttribute('data-original-placeholder') || passwordField.placeholder;
                    passwordField.setAttribute('data-original-placeholder', originalPlaceholder);
                    passwordField.placeholder = 'Incorrect Password';
                    passwordField.focus();
                });
            </script>";
        }
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                const emailFieldset = document.querySelector('input[type=\"email\"]').closest('.fieldset');
                const emailField = document.querySelector('input[type=\"email\"]');
                emailFieldset.classList.add('error');
                const originalPlaceholder = emailField.getAttribute('data-original-placeholder') || emailField.placeholder;
                emailField.setAttribute('data-original-placeholder', originalPlaceholder);
                emailField.placeholder = 'Email not Found';
                emailField.focus();
            });
            </script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body class="bg-light">
    <div class="container">
        <div class="forgot-ctn">
            <div class="forgot">
                <div class="logo">
                    <img src="assets/Images/Air-Lugina-Logo.png" alt="AirLugina-Logo">
                </div>
                <div class="link">
                    <a href="booking.php"><img src="assets/Images/Vector.png" alt="vector"> Back to flights</a>
                    <h1>Login</h1>
                    <p>Login to access your AirLugina account</p>
                </div>
                <div class="form-container">
                    <form action="login.php" method="POST">
                        <div class="inputbox">
                            <fieldset class="fieldset">
                                <legend>Email</legend>
                                <input type="email" name="Email" placeholder="name@email.com">
                            </fieldset>
                        </div>
                        <div class="inputbox">
                            <fieldset class="fieldset">
                                <legend>Password</legend>
                                <input id="passwordField" type="password" name="Password" placeholder="*********">
                                <i id="togglePassword" class='bx bx-hide' style="padding: 0 10px 10px 0"></i>
                            </fieldset>
                        </div>
                        <div class="remember" style="display: flex;">
                            <div class="p">
                                <a href="forgot-password.php" style="text-decoration: none; color:black">Forgot password?</a>
                            </div>
                        </div>
                        <button type="submit">Login</button>
                        <div class="register">
                            <p>Don't have an account? <a href="signup.php">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="img">
            <img src="assets/Images/forgot.png" alt="image">
        </div>
    </div>
    <script src="assets/login.js"></script>
</body>
</html>
