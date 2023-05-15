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
    <title></title>
</head>
<body>
    <h2>Aanmelden</h2>
    <form method="POST">
        <label for="voornaam">Voornaam:</label>
        <input type="text" name="voornaam" id="voornaam" required><br><br>
        
        <label for="achternaam">Achternaam:</label>
        <input type="text" name="achternaam" id="achternaam" required><br><br>
        
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="tijd">Beschikbare tijden:</label>
        <select name="tijd" id="tijd" required>
            <option value="9-15">9:00 - 15:00</option>
            <option value="7-16">7:00 - 16:00</option>
            <option value="7-16">7:00 - 16:00</option>
        </select><br><br>
        
        <input type="submit" name="submit " value="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $voornaam = $_POST["voornaam"];
        $achternaam = $_POST["achternaam"];
        $email = $_POST["email"];
        $tijd = $_POST["tijd"];

        $volledigeNaam = $voornaam . " " . $achternaam;

        $stmt = $conn->prepare("SELECT COUNT(*) FROM aanmelding WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "Dit e-mailadres is al aangemeld.";
        } else {
            try {
                $stmt = $conn->prepare("INSERT INTO aanmelding (naam, email, tijd) VALUES (:volledigeNaam, :email, :tijd)");
                $stmt->bindParam(':volledigeNaam', $volledigeNaam);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':tijd', $tijd);
                $stmt->execute();
            } catch(PDOException $e) {
                echo "Fout bij het aanmelden: " . $e->getMessage();
            }
        }
    }
    ?>
</body>
</html>