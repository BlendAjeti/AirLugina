<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $new_username = trim($_POST['username']);


    $conn = mysqli_connect("localhost", "root", "", "database");

    if (!$conn) {
        die("Error: " . mysqli_connect_error());
    }

    $query = "UPDATE userdata SET username = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $new_username, $id);

        if (mysqli_stmt_execute($stmt)) {
        } else {
            die("Error: " . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    } else {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_close($conn);

    header("Location: edit_user.php");
    echo '<script type="text/javascript">window.location.href = "fetch.php";</script>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/edit-user.css">
    <title>Edit User</title>
</head>

<body>
    <?php 
        include "navbar.php";
    ?>
    <div class="container">
        <form method="POST" action="edit_user.php" id="editForm">
            <h1>Update Username</h1>
            <fieldset>
                <legend>User ID:</legend>
                <input type="text" id="id" name="id" required>
            </fieldset>
            <fieldset>
                <legend>New username:</legend>
                <input type="text" id="username" name="username" required>
            </fieldset>
            <div class="buttons">
                <button type="submit">Save</button>
                <button type="button" id="backButton">Back</button>
            </div>
        </form>

        <p id="successMessage" style="display: none; color: green; font-weight: bold;">
            User updated successfully!
        </p>
    </div>
    
    

    <?php 
        include "footer.php";
    ?>
    <script>
        document.getElementById('backButton').addEventListener('click', function() {
            window.location.href = 'fetch.php';
        });

        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('edit_user.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('successMessage').style.display = 'block';
                    this.reset();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>