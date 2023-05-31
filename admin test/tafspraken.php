<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <nav></nav>
        <?php
        include_once('connection.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['delete'])) {
                $id = $_POST['delete'];
                echo "<script>
                    if (confirm('Are you sure you want to delete this row?')) {
                        window.location.href = 'delete_row.php?id=$id';
                    }
                </script>";
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
    </div>
</body>
</html>
