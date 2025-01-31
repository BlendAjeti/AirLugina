<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $conn = mysqli_connect("localhost", "root", "", "database");

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $query = "DELETE FROM contact_us WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $reorderIdsQuery = "
            SET @count = 0;
            UPDATE contact_us SET id = (@count := @count + 1) ORDER BY id;
        ";
        if (!mysqli_multi_query($conn, $reorderIdsQuery)) {
            die("id Reordering Failed: " . mysqli_error($conn));
        }

        while (mysqli_next_result($conn)) {
            if ($result = mysqli_store_result($conn)) {
                mysqli_free_result($result);
            }
        }

        $resetAutoIncrement = "ALTER TABLE contact_us AUTO_INCREMENT = 1";
        if (!mysqli_query($conn, $resetAutoIncrement)) {
            die("AUTO_INCREMENT Reset Failed: " . mysqli_error($conn));
        }
    } else {
        die("Query Failed: " . mysqli_error($conn));
    }

    mysqli_close($conn);
    header("Location: show_message.php");
    exit;
}
?>
