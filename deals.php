<?php
$conn = new mysqli('localhost', 'root', '', 'database');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM tickets");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deals</title>
    <link rel="stylesheet" href="Assets/deals.css">
</head>

<body>
    <div class="container">
        <?php
        include 'navbar.php';
        ?>
        <div class="ticket-ctn">
            <div class="new-ticket">
                <button type="submit" onclick="window.location.href='show_message.php'">Show Messages</button>
            </div>
            <div class="new-ticket">
                <button type="submit" onclick="window.location.href='fetch.php'">Show users</button>
            </div>
            <div class="new-ticket">
                <button type="submit" onclick="window.location.href='booking-details.php'">Add New Ticket</button>
            </div>
        </div>
        <?php
        while ($row = $result->fetch_assoc()) {
            $date = new DateTime($row['date_time']);  
            $formattedDate = $date->format('h:i A - d.m.Y');  
            echo "
    <div class='emirates'>
        <div class='emirate-img'>
            <img src='" . $row['flight_logo'] . "' alt='emirate'>
        </div>
        <div class='very-good'>
            <div class='ctn'>
                <div class='reviews'>
                    <div class='numbers'>
                        <p>4.2</p>
                    </div>
                    <div class='paragraf'>
                        <p><span>Very Good</span> 54 reviews</p>
                    </div>
                </div>
                <div class='second-ctn'>
                    <div class='p'>
                        <p>starting from</p>
                    </div>
                    <div class='price'>
                        <p>$" . $row['price'] . "</p>
                    </div>
                </div>
            </div>
            <div class='nonstop'>
                <div class='emi'>
                    <p><span>$formattedDate</span></p>
                    <p class='pa'>" . $row['airline_name'] . "</p>
                </div>
                <p class='pad'>non stop</p>
                <div class='EWR'>
                    <p><span>" . $row['flight_duration'] . " Hours</span></p>
                    <p>" . $row['origin'] . "-" . $row['destination'] . "</p>
                </div>
            </div>
            <div class='details-btn button'>
            <form method='POST' action='delete2.php' style='display: inline;'>
                <input type='hidden' name='ticket_id' value='" . $row['id'] . "'> 
                <button type='submit'>Delete</button>
            </form>
             <form method='POST' action='edit.php' style='display: inline;'>
                <input type='hidden' name='ticket_id' value='" . $row['id'] . "'> 
                <button type='submit'>Edit</button>
            </form>
            </div>
        </div>
    </div>";
        }
        $conn->close();
        ?>
        <div class="space"></div>
        <?php
        include 'footer.php';
        ?>


</body>

</html>