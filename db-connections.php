<?php
$db = new mysqli('localhost', 'root', '', 'database');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
