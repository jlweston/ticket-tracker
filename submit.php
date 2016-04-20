<?php header('Content-Type: text/javascript');

$servername = "localhost";
$username = "jlweston_tix";
$password = "Drowning85";
$dbname = "jlweston_misc";

$title = strip_tags($_POST['title']);
$details = strip_tags($_POST['details']);
$is_active = strip_tags($_POST['is_active']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


mysqli_query($conn, "INSERT INTO tickets (title, detail, is_active) VALUES ('$title', '$details', 'Open')");
$lastInsertedId = $conn->insert_id;

echo $lastInsertedId;

?>