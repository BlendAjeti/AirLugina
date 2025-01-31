<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch</title>
    <link rel="stylesheet" href="Assets/fetch.css">
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div style="margin-bottom:120px;" class="container">
        <div class="card-header">
            <h4>Fetch Data from Database in PHP MySQL</h4>
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        header("Cache-Control: no-cache, must-revalidate");
                        header("Pragma: no-cache");
                        header("Expires: 0");

                        $conn = new mysqli('localhost', 'root', '', 'database');

                        if ($conn->connect_error) {
                            die("Connection Failed: " . $conn->connect_error);
                        }

                        $tableCheckQuery = "SHOW TABLES LIKE 'userdata'";
                        $result = $conn->query($tableCheckQuery);

                        if ($result->num_rows == 0) {
                            echo "<tr><td colspan='5'>Table 'userdata' does not exist.</td></tr>";
                        } else {
                            $query = "SELECT * FROM userdata";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>
                                        <form action='delete.php' method='POST' style='display:inline;'>
                                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                                            <button type='submit' style='background-color: #FF3D00; color: white; border: none; padding: 5px 10px; cursor: pointer;'>Delete</button>
                                        </form>
                                        <form method='POST' action='edit_user.php' style='display: inline;'>
                                            <input type='hidden' name='ticket_id' value='" . $row['id'] . "'> 
                                            <button type='submit' style='background-color: #FF3D00; color: white; border: none; padding: 5px 10px; cursor: pointer;'>Edit</button>
                                         </form>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No data found</td></tr>";
                            }
                        }

                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
</html>
