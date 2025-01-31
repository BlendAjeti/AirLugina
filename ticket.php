<?php
$conn = new mysqli('localhost', 'root', '', 'database');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM tickets WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $ticket = $result->fetch_assoc();
    } else {
        echo "Ticket not found.";
        exit;
    }
} else {
    echo "Invalid ticket ID.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" href="assets/ticket.css">
</head>

<body>
    <div class="container">
        <?php
        include 'navbar.php';
        ?>
        <div class="direction">
        </div>
        <div class="emirate">
            <div class="airbus">
                <h2><?php echo $ticket['airline_name']; ?></h2>
            </div>
            <div class="money">
                <h2>$<?php echo $ticket['price']; ?></h2>
            </div>
        </div>
        <div class="loc">
            <img src="Assets/Images/location-logo.png" alt="location-logo">
            <p><?php echo $ticket['origin']; ?> - <?php echo $ticket['destination']; ?></p>
        </div>

        <div class="ticket-box">
            <div class="boarding-num">
                <div class="b-number">
                    <h3><?php echo $_SESSION['username']; ?></h3>
                    <p>Boarding Pass N'123</p>
                </div>
                <div class="bussines-class">
                    <p>Business Class</p>
                </div>
            </div>
            <div class="qr-code">
                <div class="class-1">
                    <div class="code-container">
                        <div class="date-container">
                            <div class="date-vector">
                                <img src="Assets/Images/date-vector.png" alt="date">
                            </div>
                            <div class="date-text">
                                <h4>Date</h4>
                                <p><?php 
                                    $date = new DateTime($ticket['date_time']); 
                                    echo $date->format('d.m.Y'); 
                                ?></p>
                            </div>
                        </div>
                        <div class="date-container">
                            <div class="date-vector">
                                <img src="Assets/Images/timee-vector.png" alt="flight-time">
                            </div>
                            <div class="date-text">
                                <h4>Flight time</h4>
                                <p><?php 
                                    $date = new DateTime($ticket['date_time']); 
                                    echo $date->format('h:i A'); 
                                ?></p>
                            </div>
                        </div>
                        <div class="date-container">
                            <div class="date-vector">
                                <img src="Assets/Images/gate-vector.png" alt="gate">
                            </div>
                            <div class="date-text">
                                <h4>Gate</h4>
                                <p><?php echo $ticket['gate']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="class-2">
                    <div class="time">
                        <div class="estimated-time">
                            <h1><?php
                            $date = new DateTime($ticket['date_time']); 
                            echo $date->format('h:i A'); 
                            ?></h1>
                            <p><?php echo $ticket['origin']; ?></p>
                        </div>
                        <div class="img">
                            <img src="Assets/Images/estimated-plane.png" alt="plane">
                        </div>
                        <div class="estimated-time">
                            <h1><?php 
                                $departure_time = new DateTime($ticket['date_time']);
                                $departure_time->modify("+" . $ticket['flight_duration'] . " hour");
                                echo $departure_time->format('h:i A');
                            ?></h1>
                            <p><?php echo $ticket['destination']; ?></p>
                        </div>
                    </div>
                    <div class="code">
                        <img src="Assets/Images/qr-code.png" alt="code">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="terms">
            <div class="conditions">
                <h2>Terms and Conditions</h2>
            </div>
            <div class="payments">
                <h2>Payments</h2>
                <ul>
                    <li>If you are purchasing your ticket using a debit or credit card via the Website, we will process
                        these payments via the automated secure common payment gateway which will be subject to fraud
                        screening purposes.</li>
                    <li>If you do not supply the correct card billing address and/or cardholder information, your
                        booking will not be confirmed and the overall cost may increase.</li>
                    <li>Golobe may require the card holder to provide additional payment verification upon request by
                        either submitting an online form or visiting the nearest Golobe office.</li>
                </ul>
            </div>
            <div class="contact-us">
                <h2>Contact us</h2>
                <p>If you have any questions about our Website or our Terms of Use, please contact: </p>
                <p>AirLugina</p>
                <p>Prishtine - Presheve</p>
                <p>info@airlugina.com</p>
                <p>+383 222 444</p>
                <p>Further contact details can be found at focused-studio.com</p>
            </div>
        </div>
        <div class="space"></div>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>
