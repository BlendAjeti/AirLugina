<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="Assets/fetch.css">
</head>
<body>
    <div class="container">
        <div class="card-header">
            <h4>Message Data from Database in PHP MySQL</h4>
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fisrt Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone_number</th>
                        <th>Message</th>
                        <th>Created_at</th>
                        <th>Delete</th>
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

                        $tableCheckQuery = "SHOW TABLES LIKE 'contact_us'";
                        $result = $conn->query($tableCheckQuery);

                        if ($result->num_rows == 0) {
                            echo "<tr><td colspan='5'>Table 'contact_us' does not exist.</td></tr>";
                        } else {
                            $query = "SELECT * FROM contact_us";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['firstname'] . "</td>";
                                    echo "<td>" . $row['lastname'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['phone_number'] . "</td>";
                                    echo "<td>" . $row['message'] . "</td>";
                                    echo "<td>" . $row['created_at'] . "</td>";
                                    echo "<td> 
                                    <form action='delete_message.php' method='POST' style='display:inline;'>
                                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                                            <button type='submit' style='background-color: #FF3D00; color: white; border: none; padding: 5px 10px; cursor: pointer;'>Delete</button>
                                        </form>
                                        </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No data found</td></tr>";
                            }
                        }

                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
