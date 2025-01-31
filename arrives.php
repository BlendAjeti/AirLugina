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

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrives</title>
    <link rel="stylesheet" href="Assets/arrives.css">
</head>

<body>
    <div class="container">
        <?php
        include 'navbar.php';
        ?>
        <div class="section-container">
            <div class="section">
                <div class="plane-type">
                    <h2><?php echo $ticket['airline_name']; ?></h2>
                    <h2><span>$<?php echo $ticket['price']; ?></span></h2>
                </div>
                <div class="location-btn">
                    <div class="location">
                        <img src=" Assets/Images/location-logo.png" alt="location-logo">
                        <p><?php echo $ticket['origin']; ?> - <?php echo $ticket['destination']; ?></p>
                    </div>
                    <div class="btn">
                        <?php if (!isset($_SESSION['user_id'])): ?>
                            <button type="submit" style="cursor:pointer;" onclick="window.location.href='login.php'">Book Now</button>
                        <?php else: ?>
                            <button type="submit"><a href="card.php?id=<?php echo $ticket['id']; ?>">Book Now</a></button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="big-plane">
                <img src=" Assets/Images/big-plane.png" alt="Big-plane">
            </div>
            <div class="h2-text">
                <h2>Basic Economy Features</h2>
            </div>

            <div class="policies-ctn">
                <div class="policies">
                    <div class="emirates">
                        <h2><?php echo $ticket['airline_name']; ?> Policies</h2>
                    </div>
                    <div class="pre-flight">
                        <div class="cleaning"><img src=" Assets/Images/time-vector.png" alt="time">
                            <p>Pre-flight cleaning, installation of cabin HEPA filters.</p>
                        </div>
                        <div class="cleaning"><img src=" Assets/Images/time-vector.png" alt="time">
                            <p>Pre-flight health screening questions.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="date-ctn">
                <div class="date">
                    <div class="return-date">
                        <div class="wed">
                            <h4><?php 
                                $date = new DateTime($ticket['date_time']); 
                                echo $date->format('h:i A - d.m.Y'); 
                            ?></h4>
                        </div>
                        <div class="wed">
                            <h4><?php echo $ticket['flight_duration']; ?> Hours</h4>
                        </div>
                    </div>
                    <div class="plane-accesories">
                        <div class="e-logo">
                            <img src="<?php echo $ticket['flight_logo']; ?>" alt="Emirate-logo">
                        </div>
                        <div class="wifi-logo">
                            <img src=" Assets/Images/Accessories.png" alt="Accessories">
                        </div>
                    </div>
                    <div class="plane-arrive">
                        <div class="newark">
                            <h2><?php
                                $date = new DateTime($ticket['date_time']); 
                                echo $date->format('h:i A'); 
                            ?></h2>
                            <div class="inline">
                                <p><?php echo $ticket['origin']; ?></p>
                            </div>
                        </div>
                        <div class="plane-direction">
                            <img src=" Assets/Images/Plane-direction.png" alt="plane-direction">
                        </div>
                        <div class="newark">
                            <h2><?php 
                                $departure_time = new DateTime($ticket['date_time']);
                                $departure_time->modify("+" . $ticket['flight_duration'] . " hour");
                                echo $departure_time->format('h:i A');
                            ?></h2>
                            <div class="inline">
                                <p><?php echo $ticket['destination']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space">
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
</body>

</html>
