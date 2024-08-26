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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO people (id, password, name) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $id, $hashed_password, $name);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<p>New record created successfully</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!-- Button to go back to the form page -->
<p><a href="index.html">Go back to the form</a></p>

