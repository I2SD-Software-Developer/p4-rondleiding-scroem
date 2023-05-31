<?php
include_once('connection.php');

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $query = "DELETE FROM aanmelding WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: tafspraken.php"); // Redirect to the page after deletion
    } else {
        echo "Error deleting record.";
    }
}

$query = "SELECT * FROM aanmelding";
$result = $conn->query($query);

if ($result->rowCount() > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Datum</th>";
    echo "<th>Tijd</th>";
    echo "<th>Action</th>";
    echo "</tr>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['naam']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['datum']."</td>";
        echo "<td>".$row['tijd']."</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='delete' value='".$row['id']."'>";
        echo "<input type='submit' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found.";
}

$conn = null;
?>
