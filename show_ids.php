<?php
$servername = "10.0.0.31";
$username = "aespa";
$password = "dkagh1.";
$dbname = "supernova";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name FROM people";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>ID and Name List</h2>";
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>ID: " . $row["id"] . " - Name: " . $row["name"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}

$conn->close();
?>

<!-- Button to go back to the form page -->
<p><a href="index.html">Go back to the form</a></p>

