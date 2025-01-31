<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['ticket_id'];
    $flight_logo = $_POST['flight_logo'];
    $price = $_POST['price'];
    $airline_name = $_POST['airline_name'];
    $flight_duration = $_POST['flight_duration'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];

    $conn = mysqli_connect("localhost", "root", "", "database");

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $query = "UPDATE tickets SET flight_logo = ?, price = ?, airline_name = ?, flight_duration = ?, origin = ?, destination = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sissssi", $flight_logo, $price, $airline_name, $flight_duration, $origin, $destination, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo "Kayıt başarıyla güncellendi.";
        } else {
            die("Güncelleme Hatası: " . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    } else {
        die("Sorgu Hazırlama Hatası: " . mysqli_error($conn));
    }

    mysqli_close($conn);

    header("Location: deals.php");
    exit;
}
?>
