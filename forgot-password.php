<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'root', '', 'database');

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm-password']);

    if (empty($email) || empty($password) || empty($confirmPassword)) {
        $error = "All fields are required!";
    } elseif (strlen($password) <= 8) {
        $error = "Password must be at least 8 characters long!";
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match!";
    } else {

        $stmt = $conn->prepare("UPDATE userdata SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $password, $email);
        if ($stmt->execute()) {
            $success = "Password updated successfully!";
            header("Location: login.php?success=" . urlencode($success));
            exit();
        } else {
            $error = "Error updating password: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="assets/forgot-password.css">
</head>

<body>
    <div class="container">
        <div class="forgot-ctn">
            <div class="forgot">
                <div class="logo">
                    <img src=" assets/Images/Air-Lugina-Logo.png" alt="AirLugina-Logo">
                </div>
                <div class="link">
                    <a href="login.php"><img src=" assets/Images/Vector.png" alt="vector"> Back to login</a>
                    <h1>Forgot your password?</h1>
                    <p>Don’t worry, happens to all of us. Enter your email below to recover your password</p>
                </div>
                <div class="form-container">
                    <form action="forgot-password.php" method="POST">
                        <fieldset>
                            <legend>Email</legend>
                            <input type="email" id="email" name="email" placeholder="filan.fisteku@gmail.com" required>
                        </fieldset>
                        <fieldset>
                            <legend>New Password</legend>
                            <input type="password" id="password" name="password" placeholder="Enter your new password" required>
                        </fieldset>
                        <fieldset>
                            <legend>Confirm Password</legend>
                            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                        </fieldset>
                        <button type="submit">Submit</button>
                    </form>

                </div>
            </div>
            <div class="img">
                <img src=" assets/Images/forgot.png" alt="image">
            </div>
        </div>
    </div>
</body>

</html>