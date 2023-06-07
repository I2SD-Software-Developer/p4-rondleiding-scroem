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
        <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="adminpage.php">Dashboard</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="klanten.php">Klanten</a>
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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container-fluid">
            <div class="row custom-row">
                <div class="col-md-4">
                    <div class="card mb-4 custom-card" style="background-color: #55d985; color: white; font-size: larger;">
                        <div class="card-body">
                        <?php
                        include 'connection.php';

                        // Include your connection script
                        try {
                            // SQL query to count rows in "aanmeldingen" table
                            $sql = "SELECT COUNT(*) AS total FROM aanmelding";
                            $result = $conn->query($sql);

                            if ($result->rowCount() > 0) {
                                $row = $result->fetch(PDO::FETCH_ASSOC);
                                $totalRows = $row["total"];
                                echo "Aantal klanten: <br>" . $totalRows;
                            } else {
                                echo "Geen klanten beschikbaar";
                            }
                        } catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }

                        // Close connection (if required)
                        $conn = null;
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 custom-card" style="background-color: #5498f0;; color: white; font-size: larger;">
                        <div class="card-body">
                            <?php 
                             include 'connection.php';

                            // SQL query to find the highest ID value
                            $sqlMaxID = "SELECT MAX(id) AS max_id FROM aanmelding";
                            $resultMaxID = $conn->query($sqlMaxID);

                            if ($resultMaxID->rowCount() > 0) {
                                $maxIDRow = $resultMaxID->fetch(PDO::FETCH_ASSOC);
                                $maxID = $maxIDRow["max_id"];
                                echo "Totaale aanmeldingen ooit: <br>" . $maxID;
                            } else {
                                echo "No rows found in the 'aanmeldingen' table.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 custom-card" style="background-color: #f05454; color: white; font-size: larger;">
                        <div class="card-body">
                        <?php
                            // Include your connection script
                            include 'connection.php';

                            try {
                                // SQL query to count rows in "available_dates" table
                                $sqlCount = "SELECT COUNT(*) AS total FROM available_dates";
                                $resultCount = $conn->query($sqlCount);
                            
                                if ($resultCount->rowCount() > 0) {
                                    $rowCount = $resultCount->fetch(PDO::FETCH_ASSOC);
                                    $totalDates = $rowCount["total"];
                                    echo "aantal open tijden: <br>" . $totalDates;
                                } else {
                                    echo "No available dates found.";
                                }
                            } catch(PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }

                            // Close connection (if required)
                            $conn = null;
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
