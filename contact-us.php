<?php

$conn = new mysqli('localhost', 'root', '', 'database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = htmlspecialchars(trim($_POST['Firstname']));
    $lastname = htmlspecialchars(trim($_POST['Lastname']));
    $email = htmlspecialchars(trim($_POST['Email']));
    $phone_number = htmlspecialchars(trim($_POST['phone-number']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($firstname) && !empty($lastname) && !empty($email)) {
        $stmt = $conn->prepare("INSERT INTO contact_us (firstname, lastname, email, phone_number, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstname, $lastname, $email, $phone_number, $message);

        if ($stmt->execute()) {
        } else {
            echo "Connection failed:: " . $stmt->error;
        }
        $stmt->close();
    } 
}

$conn->close();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="Assets/contact-us.css">
</head>

<body>
    <div class="container">
    <?php
    include 'navbar.php';
    ?>
        <div class="contact">
        <?php if (!empty($thankYouMessage)): ?>
            <div class="success-message">
                <?= $thankYouMessage ?>
            </div>
        <?php endif; ?>

            <div class="contact-ctn">
                <div class="img">
                    <!-- <img src=" assets/Images/forgot.png" alt="image"> -->
                    <h1>Contact Us</h1>
                    <p>We’re here to help! Whether you have questions, need assistance, or just want to provide feedback, feel free to reach out. Our team is dedicated to responding to your inquiries as quickly as possible.</p>
                    <img src=" assets/Images/Air-Lugina-Logo.png" alt="AirLugina-Logo">

                </div>
                <div class="forgot-ctn">
                    <div class="forgot">
                        <!-- <div class="logo">
                        <img src=" assets/Images/Air-Lugina-Logo.png" alt="AirLugina-Logo">
                    </div> -->

                        <div class="form-container">
                            <form action="" method="POST" id="signupForm">
                                <div class="name-ctn">
                                    <fieldset class="fieldset">
                                        <legend>First Name</legend>
                                        <input type="text" placeholder="First Name" data-validation="name" id="nameField" name="Firstname">
                                    </fieldset>
                                    <fieldset class="fieldset">
                                        <legend>Last Name</legend>
                                        <input type="text" placeholder="Last Name" data-validation="surname" id="surnameField" name="Lastname">
                                    </fieldset>
                                </div>
                                <fieldset class="fieldset">
                                    <legend>Email</legend>
                                    <input type="email" placeholder="name@email.com" data-validation="email" name="Email">
                                </fieldset>
                                <fieldset class="fieldset">
                                    <legend>Phone Number</legend>
                                    <input type="text" placeholder="+383 43 943 253" data-validation="number" id="numberField" name="phone-number">
                                </fieldset>
                                <fieldset class="fieldset">
                                    <legend>Message</legend>
                                    <textarea name="message" id="message">My booking is pending...</textarea>
                                </fieldset>
                                <button type="submit">Send message</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="lugina-logo">
                <div class="air-img">
                    <img src=" Assets/Images/AirLugina-footer.png" alt="Air-Lugina">
                </div>
                <div class="social-medias">
                    <img src=" Assets/Images/Social-medias.png" alt="Social-Medias">
                </div>
            </div>
            <div class="our-destinations">
                <h4>Our destinations</h4>
                <p>Canada</p>
                <p>Alaska</p>
                <p>France</p>
                <p>Iceland</p>
            </div>
            <div class="our-destinations">
                <h4>Our Activities</h4>
                <p>Northern Lights</p>
                <p>Cruising & Sailing</p>
                <p>Multi-Activities</p>
                <p>Kayaing</p>
            </div>

            <div class="our-destinations">
                <h4>Travel Blogs</h4>
                <p>Bali Travel Guide</p>
                <p>Sri Lanks Travel Guide</p>
                <p>Peru Travel Guide</p>
                <p>Bali Travel Guide</p>
            </div>
            <div class="our-destinations">
                <h4>About Us</h4>
                <p>Our Story</p>
                <p>Work with us</p>
                <p>Destinations</p>
                <p>Our Journey</p>
            </div>
            <div class="our-destinations">
                <h4>Contact Us</h4>
                <p>Our Contacts</p>
                <p>Emails</p>
                <p>Our staff</p>
                <p>Connections</p>
            </div>
        </div>
        <script src="assets/dropdown.js"></script>

</body>
<script>
    document.getElementById('signupForm').addEventListener('submit', function (e) {
        const firstName = document.getElementById('nameField');
        const lastName = document.getElementById('surnameField');
        const email = document.querySelector('input[name="Email"]');
        const phoneNumber = document.getElementById('numberField');
        const message = document.getElementById('message');
        

        let isValid = true;
        let errorMessage = "";

    
        if (firstName.value.trim() === "") {
            errorMessage += "First Name cannot be empty.\n";
            isValid = false;
        }

        if (lastName.value.trim() === "") {
            errorMessage += "Last Name cannot be empt.\n";
            isValid = false;
        }

        if (email.value.trim() === "") {
            errorMessage += "Email cannot be empt.\n";
            isValid = false;
        } 

        if (phoneNumber.value.trim() === "") {
            errorMessage += "Phone Number cannot be empt.\n";
            isValid = false;
        }

        if (message.value.trim() === "") {
            errorMessage += "Message cannot be empt.\n";
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault(); 
            alert(errorMessage); 
        }
    });
</script>

</html>