<?php
$conn = new mysqli('localhost', 'root', '', 'database');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form inputs
$origin = isset($_GET['from']) ? $_GET['from'] : '';
$destination = isset($_GET['to']) ? $_GET['to'] : '';
$depart = isset($_GET['depart']) ? $_GET['depart'] : '';
$return = isset($_GET['return']) ? $_GET['return'] : '';

// Build the query
$query = "SELECT * FROM tickets";
$params = [];
if (!empty($origin) && !empty($destination)) {
    $query .= " WHERE origin = ? AND destination = ?";
    $params[] = $origin;
    $params[] = $destination;

    if (!empty($depart)) {
        $query .= " AND date_time >= ?";
        $params[] = $depart;
    }

    if (!empty($return)) {
        $query .= " AND date_time <= ?";
        $params[] = $return;
    }
}

// Prepare and execute the query
$stmt = $conn->prepare($query);
if ($params) {
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="assets/booking.css">
</head>

<body>
    <div class="container">
        <?php include 'navbar.php'; ?>

        <!-- Search Form -->
        <div class="depart">
            <form action="booking.php" method="GET">
                <div class="trip-1">
                    <fieldset>
                        <legend>From</legend>
                        <select id="from" name="from">
                            <option value="" <?= empty($origin) ? 'selected' : '' ?>>Select Origin</option>
                            <option value="Geneva" <?= $origin === 'Geneva' ? 'selected' : '' ?>>Geneva</option>
                            <option value="Stamboll" <?= $origin === 'Stamboll' ? 'selected' : '' ?>>Stamboll</option>
                            <option value="Paris" <?= $origin === 'Paris' ? 'selected' : '' ?>>Paris</option>
                            <option value="Burrel" <?= $origin === 'Burrel' ? 'selected' : '' ?>>Burrel</option>
                        </select>
                    </fieldset>
                </div>
                <div class="trip-1">
                    <fieldset>
                        <legend>To</legend>
                        <select id="to" name="to">
                            <option value="" <?= empty($destination) ? 'selected' : '' ?>>Select Destination</option>
                            <option value="Geneva" <?= $destination === 'Geneva' ? 'selected' : '' ?>>Geneva</option>
                            <option value="Stamboll" <?= $destination === 'Stamboll' ? 'selected' : '' ?>>Stamboll</option>
                            <option value="Paris" <?= $destination === 'Paris' ? 'selected' : '' ?>>Paris</option>
                            <option value="Burrel" <?= $destination === 'Burrel' ? 'selected' : '' ?>>Burrel</option>
                        </select>
                    </fieldset>
                </div>
                <div class="depart-return">
                    <fieldset>
                        <legend>Depart</legend>
                        <input type="datetime-local" id="depart" name="depart" value="<?= htmlspecialchars($depart) ?>">
                    </fieldset>
                </div>
                <div>
                    <fieldset class="depart-return">
                        <legend>Return</legend>
                        <input type="datetime-local" id="return" name="return" value="<?= htmlspecialchars($return) ?>">
                    </fieldset>
                </div>
                <div class="search">
                    <button type="submit"><img src="Assets/Images/search-vector.png" alt="search"></button>
                </div>
            </form>
        </div>

        <!-- Flight Results -->
        <?php
        if ($result->num_rows > 0) {
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
                        <div class='details-btn'>
                            <button><a href='arrives.php?id=" . $row['id'] . "'>View Deals</a></button>
                        </div>
                    </div>
                </div>
                ";
            }
        } else {
            echo "<div class='no-flights'>
                        <p class='error-red'>No flights available.</p>
                  </div>";
        }
        ?>

        <div class="results">
            <button id="show-more">Show more results</button>
        </div>
        <div class="space"></div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>
