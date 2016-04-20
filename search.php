<?php header('Content-Type: application/json');

$servername = "localhost";
$username = "jlweston_tix";
$password = "Drowning85";
$dbname = "jlweston_misc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$folder = strval($_GET['folder']);
$ID = strval($_GET['ticketID']);

// Folder searches
if ($folder == "Open"){
	$sql = "SELECT id, title, is_active FROM tickets WHERE is_active='open'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $tixarray = array();
    while($row = $result->fetch_assoc()) {
       $tixarray[] = $row;
    }
} else {
    echo "[No open tickets]";
}
echo json_encode($tixarray);
}


else if ($folder == "All"){
$sql = "SELECT id, title, is_active FROM tickets";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $tixarray = array();
    while($row = $result->fetch_assoc()) {
       $tixarray[] = $row;
    }
} else {
    echo "";
}
echo json_encode($tixarray);
}



// Ticket search
else if ($ID) {
	$sql = "SELECT id, title, is_active, detail FROM tickets WHERE id = '".$ID."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $tixarray = array();
    while($row = $result->fetch_assoc()) {
       $tixarray[] = $row;
    }
} else {
    echo "No ticket selected";
}
echo json_encode($tixarray);
}

else {
	$sql = "SELECT id, title, is_active FROM tickets WHERE is_active='closed'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $tixarray = array();
    while($row = $result->fetch_assoc()) {
       $tixarray[] = $row;
    }
} else {
    echo "No closed tickets";
}

echo json_encode($tixarray);
}

?>