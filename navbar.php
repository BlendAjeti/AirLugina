<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/navbar.css">
</head>

<body>
    <div class="navbar">
        <div class="navbar-elements">
            <div class="flights">
                <div class="plane-logo">
                    <img src="assets/Images/plane.logo.png" alt="small-plane">
                </div>
                <div class="flight-name">
                    <p><a href="booking.php">Find Flight</a></p>
                </div>
            </div>
            <div class="home">
                <p><a href="landingpage.php">Home</a></p>
            </div>
            <div  onclick="window.location.href='landingpage.php'" class="logo" id="img-logo">
                <img src="Assets/Images/Air-Lugina-Logo.png" alt="AirLugina-logo">
            </div>

            <div class="home">
                <p><a href="contact-us.php">Contact Us</a></p>
            </div>

            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="user-ctnn">
                    <div class="user-ctn">
                        <div class="user-img">
                            <img src="assets/Images/user-image.jpg" alt="User">
                        </div>
                        <div class="user-name">
                            <p><?php echo $_SESSION['username']; ?></p>
                        </div>
                        <div class="arrow-down">
                            <img src="assets/Images/arrow-down.png" alt="Arrow">
                        </div>
                    </div>
                    <div class="user-logo">
                        <div class="dropdown">
                            <?php
                            if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                                echo '
                                <div class="dropdown-ctn">
                                    <img src="assets/Images/Support.png" alt="Admin Panel">
                                    <a href="fetch.php">Admin Panel</a>
                                </div>';
                            }
                            ?>
                            <div class="dropdown-ctn">
                                <img src="assets/Images/logout.png" alt="logout">
                                <a href="logout.php" id="logout">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php else: ?>
                <div class="buttons">
                    <button class="log" onclick="window.location.href='login.php'">Login</button>
                    <button class="sig" onclick="window.location.href='signup.php'">Sign up</button>
                </div>
            <?php endif; ?>

            <div class="menu-ctn">
                <div class="menu-toggle">
                    <img src="assets/Images/menu.png" alt="menu">
                </div>
                <div class="dropdown-second" id="dropdown-second">
                    <ul>
                        <li><a href="landingpage.php">Home</a></li>
                        <li><a href="contact-us.php">Contact Us</a></li>
                        <li><a href="booking.php">Flights</a></li>
                        <?php if (!isset($_SESSION['user_id'])): ?>
                            <li id="login-signup"><a href="login.php">Login</a></li>
                            <li id="login-signup"><a href="signup.php">Sign Up</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/menu-drop.js"></script>

</body>
</html>
