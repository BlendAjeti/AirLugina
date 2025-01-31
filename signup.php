<?php
$message = "";
$toastClass = "";
$conn = new mysqli('localhost', 'root', '', 'database');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $checkEmailStmt = $conn->prepare("SELECT email FROM userdata WHERE email = ?");
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailStmt->store_result();

    if ($checkEmailStmt->num_rows > 0) {
        $message = "Email ID already exists";
        echo "<script>alert('$message');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO userdata (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {

            setcookie("username", $username, time() + (86400 * 30), "/");
            setcookie("email", $email, time() + (86400 * 30), "/");

            header("Location: landingpage.php");
            exit();
        } else {
            $message = "Error: " . $stmt->error;
            echo "<script>alert('$message');</script>";
        }

        $stmt->close();
    }

    $checkEmailStmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/new-signup.css">
    <title>SignUp</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="img">
            <img src="assets/Images/forgot.png" alt="image">
        </div>
        <div class="forgot-ctn">
            <div class="forgot">

                <div class="logo">
                    <img src="assets/Images/Air-Lugina-Logo.png" alt="AirLugina-Logo">
                </div>
                <div class="link">
                    <a href="booking.php"><img src=" assets/Images/Vector.png" alt="vector"> Back to flights</a>
                    <h1>Sign up</h1>
                    <p>Let’s get you all set up so you can access your personal account.</p>
                </div>
                <div class="form-container">
                    <form method="POST" id="signupForm">
                        <div class="name-ctn">
                            <fieldset style="width: 100%;" class="fieldset">
                                <legend>Username</legend>
                                <input type="text" name="username" id="username" placeholder="username">
                            </fieldset>
                        </div>
                        <fieldset class="fieldset">
                            <legend>Email</legend>
                            <input type="email" placeholder="name@email.com" data-validation="email" name="Email">
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend>Password</legend>
                            <input type="password" placeholder="Password" data-validation="password" id="passwordField" name="Password">
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend>Confirm Password</legend>
                            <input type="password" placeholder="Confirm Password" data-validation="confirmPassword" id="confirmPasswordField">
                        </fieldset>
                        <div class="remember">
                            <div class="input">
                                <input type="checkbox" id="terms">
                            </div>
                            <div class="p">
                                <p>I agree to all the <span>Terms</span> and <span>Privacy Policies</span></p>
                            </div>
                        </div>
                        <button type="submit">Create account</button>
                        <div class="register">
                            <p>Already have an account?
                                <a href="login.php">Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="assets/signup.js"></script>

</html>