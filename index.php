<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project3";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Kan geen verbinding maken met de database: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROC Van Twente I aanmelden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-fluid">
      <a class="navbar-brand" href="https://www.rocvantwente.nl/">ROC</a>
      <button class="navbar-toggler collapsed bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="toggler-icon top-bar"></span>
        <span class="toggler-icon middle-bar"></span>
        <span class="toggler-icon bottom-bar"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="https://www.rocvantwente.nl/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.rocvantwente.nl/contact.html">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.rocvantwente.nl/leslocaties.html">Locaties</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              voor volwassenen
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="https://www.rocvantwente.nl/voor-volwassenen/opleidingen-zoeker.html">Opleidingen en cursussen</a></li>
              <li><a class="dropdown-item" href="https://www.rocvantwente.nl/voor-volwassenen/werk-en-loopbaan.html">Werk en loopbaan</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="https://www.rocvantwente.nl/voor-volwassenen/alle-opleidingen.html ">ontdek alle studievormen</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="text-center">
    <img src="roc-van-twente.png" alt="logo" style= "width: 170px; z-index: 0;" class="rounded mt-5">
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>

    <h2 class="text-center mt-5 ">Aanmelden</h2>
    <form method="POST" class="text-center mt-5 ">
        <label for="voornaam">Voornaam:</label>
        <input class="me-4" type="text" name="voornaam" id="voornaam" required><br><br>
        
        <label for="achternaam">Achternaam:</label>
        <input class= "me-5" type="text" name="achternaam" id="achternaam" required><br><br>
        
        <label for="email">E-mail:</label>
        <input class = "me-2" type="email" name="email" id="email" required><br><br>

        <label for="datum">Datum:</label>
        <input type="date" name="datum" id="datum" required><br><br>
        
        <label for="tijd">Beschikbare tijden:</label>
        <select name="tijd" id="tijd" required>
            <option value="9-15">9:00 - 15:00</option>
            <option value="7-16">7:00 - 16:00</option>
            <option value="7-16">7:00 - 16:00</option>
        </select><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $voornaam = $_POST["voornaam"];
        $achternaam = $_POST["achternaam"];
        $email = $_POST["email"];
        $datum = $_POST["datum"];
        $tijd = $_POST["tijd"];

        $volledigeNaam = $voornaam . " " . $achternaam;

        $stmt = $conn->prepare("SELECT COUNT(*) FROM aanmelding WHERE email = :email AND datum = :datum AND tijd = :tijd");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':datum', $datum);
        $stmt->bindParam(':tijd', $tijd);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            ?> <p class="text-center mt-5"><?php echo "U heeft al aangemeld op deze dag en tijd."; ?></p> <?php
        } else {
            try {
                $stmt = $conn->prepare("INSERT INTO aanmelding (naam, email, datum, tijd) VALUES (:volledigeNaam, :email, :datum, :tijd)");
                $stmt->bindParam(':volledigeNaam', $volledigeNaam);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':datum', $datum);
                $stmt->bindParam(':tijd', $tijd);
                $stmt->execute();
            } catch(PDOException $e) {
                echo "Fout bij het aanmelden: " . $e->getMessage();
            }
            ?> <p class="text-center mt-5"><?php echo "U heeft aangemeld." ?></p> <?php
        }
    }
    ?>
    
    <footer class="text-center text-white fixed-bottom" style= "background: linear-gradient(90deg, #0082ca, 50%, #280080);">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
            <!-- Facebook -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #3b5998;"
                href="https://www.facebook.com/rocvantwente"
                role="button"
                ><i class="fab fa-facebook-f"></i
            ></a>

            <!-- Twitter -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #55acee;"
                href="https://twitter.com/rocvantwente"
                role="button"
                ><i class="fab fa-twitter"></i
            ></a>

            <!-- YOUTUBE -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #dd4b39;"
                href="https://www.youtube.com/user/rocvantwente"
                role="button"
                ><i class="fab fa-youtube"></i
            ></a>

            <!-- Instagram -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #ac2bac;"
                href="https://www.instagram.com/rocvantwente/"
                role="button"
                ><i class="fab fa-instagram"></i
            ></a>

            <!-- Linkedin -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #0082ca;"
                href="https://nl.linkedin.com/school/roc-van-twente/"
                role="button"
                ><i class="fab fa-linkedin-in"></i
            ></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="https://www.rocvantwente.nl/">ROC Van Twente</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>
</html>