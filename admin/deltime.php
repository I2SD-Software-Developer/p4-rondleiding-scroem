<?php
// Assuming you have a script to establish the database connection
include_once('connection.php');

// Check if the delete action is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $deleteId = $_POST['delete'];

    // Prepare the SQL statement
    $deleteSql = "DELETE FROM available_dates WHERE id = :id";

    // Prepare and bind the statement
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bindParam(":id", $deleteId);

    // Execute the statement
    $deleteStmt->execute();

    // Close the statement
    $deleteStmt = null;

    // Redirect back to the timeslot.php page after deletion
    header("Location: timeslot.php");
    exit();
}

// Close the database connection
$conn = null;
?>
