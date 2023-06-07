<?php
session_start(); // Start session (if not already started)

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit();
}

// If the script reaches this point, the user is logged in
$loggedInUser = $_SESSION['username'];
// Perform any actions for logged-in users or display a personalized message
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ROC admin dashboard</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="images/favicon.png">
    <style>
        .custom-card {
            height: 200px;
            border: 1px solid #dee2e6;
        }

        .custom-row {
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">
            <a href="https://www.rocvantwente.nl/" target="_blank" rel="noopener noreferrer">
                <img src="../img/roc-van-twente.png" alt="ROC" style="max-height: 40px; vertical-align: middle;">
            </a>
        </div>
        <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="adminpage.php">Dashboard</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="klanten.php">Klanten</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="timeslot.php">Tijdslot</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="../aanmeldpagina/index.php">website</a>  
            <a class="list-group-item list-group-item-action list-group-item-light p-3 " href="logout.php">uit loggen</a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="navbar-toggler" id="sidebarToggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <?php
include_once('connection.php');

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $query = "DELETE FROM aanmelding WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        $deletedRows = $stmt->rowCount();
    } else {
        echo "Error deleting record.";
    }
}

$query = "SELECT * FROM aanmelding";
$result = $conn->query($query);

?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <?php if ($result->rowCount() > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Datum</th>
                            <th>Tijd</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['naam']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['datum']; ?></td>
                                <td>                                    
                                    <div class="max-width-td">
                                        <?php echo $row['tijd']; ?>
                                    </div></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No data found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
$conn = null;
?>

    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>


