<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['ticket_id'];

    $conn = mysqli_connect("localhost", "root", "", "database");

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM tickets WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            die("Error.");
        }

        mysqli_stmt_close($stmt);
    } else {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/edit.css">
    <title>Edit Ticket</title>
</head>

<body>
    <div class="container">
        <?php include 'navbar.php'; ?>
        <div class="ctn">
            <div class="h1-ctn">
                <h1>Edit Ticket</h1>
            </div>
            <div class="form-container">
                <form method="POST" action="update_ticket.php">
                    <input type="hidden" name="ticket_id" value="<?php echo htmlspecialchars($row['id']); ?>">

                    <fieldset>
                        <legend>Flight Logo URL:</legend>
                        <input type="text" id="flight_logo" name="flight_logo" value="<?php echo htmlspecialchars($row['flight_logo']); ?>" required>
                    </fieldset>
                    <fieldset>
                        <legend for="price">Price:</legend>
                        <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($row['price']); ?>" required>
                    </fieldset>
                    <fieldset>
                        <legend for="airline_name">Airline Name:</legend>
                        <input type="text" id="airline_name" name="airline_name" value="<?php echo htmlspecialchars($row['airline_name']); ?>" required>
                    </fieldset>
                    <fieldset>
                        <legend for="flight_duration">Flight Duration:</legend>
                        <input type="text" id="flight_duration" name="flight_duration" value="<?php echo htmlspecialchars($row['flight_duration']); ?>" required>
                    </fieldset>
                    <fieldset>
                        <legend for="origin">Origin:</legend>
                        <input type="text" id="origin" name="origin" value="<?php echo htmlspecialchars($row['origin']); ?>" required>
                    </fieldset>
                    <fieldset>
                        <legend for="destination">Destination:</legend>
                        <input type="text" id="destination" name="destination" value="<?php echo htmlspecialchars($row['destination']); ?>" required>
                    </fieldset>
                    <button type="submit">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <div class="space"></div>
    <?php
    include 'footer.php';
    ?>
   
</body>

</html>