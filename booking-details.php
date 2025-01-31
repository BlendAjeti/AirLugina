<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_FILES['flight_logo'])) {
        if ($_FILES['flight_logo']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true); 
            }

            $flight_logo = $target_dir . basename($_FILES["flight_logo"]["name"]);

            if (move_uploaded_file($_FILES["flight_logo"]["tmp_name"], $flight_logo)) {
                $flight_logo_path = $flight_logo;
            } else {
                echo "Error uploading file.";
                exit;
            }
        } else {
            $error_code = $_FILES['flight_logo']['error'];
            switch ($error_code) {
                case UPLOAD_ERR_INI_SIZE:
                    echo "Error: The uploaded file exceeds the upload_max_filesize directive in php.ini.<br>";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "Error: The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.<br>";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "Error: The uploaded file was only partially uploaded.<br>";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Error: No file was uploaded.<br>";
                    break;
                default:
                    echo "Error: Unknown upload error (code: $error_code).<br>";
            }
            exit;
        }
    } else {
        echo "Error: No file input detected in the request.<br>";
        exit;
    }

    $origin = $_POST['prishtina'];
    $destination = $_POST['presheva'];
    $date_time = $_POST['datetime'];
    $flight_duration = $_POST['hours'];
    $airline_name = $_POST['bus-name'];
    $gate = intval($_POST['gate']);
    $stock = intval($_POST['stock']);
    $price = floatval($_POST['price']);




    $sql = "INSERT INTO tickets (flight_logo, origin, destination, date_time, flight_duration, airline_name, gate, stock, price) 
            VALUES ('$flight_logo_path', '$origin', '$destination', '$date_time', '$flight_duration', '$airline_name', $gate, $stock, $price)";

    if ($conn->query($sql) === TRUE) {
        

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking details</title>
    <link rel="stylesheet" href="Assets/booking-details.css">
</head>

<body>
    <div class="container">
        <?php include 'navbar.php'; ?>

        <div class="form-container">
            <form action="booking-details.php" method="POST" enctype="multipart/form-data">
                <div class="s-upload">
                    <div class="upload">
                        <img src="Assets/Images/upload-vector.png" alt="upload">
                        <input type="file" id="flight_logo" name="flight_logo" required>
                    </div>
                </div>

                <div class="form-group">
                    <fieldset class="fieldseti">
                        <legend>From</legend>
                        <input type="text" id="prishtina" name="prishtina" placeholder="Prishtina" required>
                    </fieldset>
                    <fieldset>
                        <legend>To</legend>
                        <input type="text" id="presheva" name="presheva" placeholder="Presheva" required>
                    </fieldset>
                </div>

                <fieldset id="input-fieldset">
                    <legend>Date & Hour</legend>
                    <input type="datetime-local" id="datetime" name="datetime" required>
                </fieldset>

                <fieldset id="input-fieldset">
                    <legend>Flight Hours</legend>
                    <input type="text" id="hours" name="hours" placeholder="2 hours 52 minutes" required>
                </fieldset>

                <fieldset id="input-fieldset">
                    <legend>Airbus Name</legend>
                    <input type="text" id="bus-name" name="bus-name" placeholder="Emirates" required>
                </fieldset>
                <fieldset id="input-fieldset">
                    <legend>Gate</legend>
                    <input type="number" id="gate" name="gate" placeholder="Gate" required>
                </fieldset>
                <fieldset id="input-fieldset">
                    <legend>Stock</legend>
                    <input type="number" id="stock" name="stock" placeholder="21 Tickets" required>
                </fieldset>

                <fieldset id="input-fieldset">
                    <legend>Price</legend>
                    <input type="number" step="0.01" id="price" name="price" placeholder="112.00" required>
                </fieldset>

                <div class="upload-images">
                    <img src="Assets/Images/upload-vector.png" alt="upload">
                    <input type="file" id="additional_image" name="additional_image">
                </div>

                <button type="submit" id="add-ticket-btn" onclick="window.location.href='booking.php'">Add New Ticket</button>
            </form>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>
</body>

</html>