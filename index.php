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

$minDatum = date('2023-05-26');
$maxDatum = date('2023-05-30');
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROC Van Twente I aanmelden</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <style>
        body {
            margin-bottom: 60px;
        }
        .background {
            background-image: url("images/back.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100vw;
            z-index: -1;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
  
        footer {
            margin-top: auto;
        }
    </style>
    <div class="background"></div>
        <style>
            .step {
                display: none;
            }
        
            .step.show {
                display: block;
            }
        </style>
</head>
<body class="d-flex flex-column h-100">


    <nav class="navbar navbar-expand-lg navbar-dark" style= "background: linear-gradient(90deg, #990300, 50%, #d10202); ">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.rocvantwente.nl/">ROC</a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" style="background-color: #99021A; border: none;" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
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
                    <li class="nav-item">
                        <a class="nav-link" href="https://rondleiding.netlify.app/">Tour</a>
                      <li class="nav-item dropdown">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Voor volwassenen</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item"en cursussen></a></li>
                            <li><a class="dropdown-item" href="https://www.rocvantwente.nl/voor-volwassenen/werk-en-loopbaan.html">Werk en loopbaan</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="https://www.rocvantwente.nl/voor-volwassenen/alle-opleidingen.html ">Ontdek alle studievormen</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="text-center">
    <img src="images/roc-van-twente.png" alt="logo" style= "width: 170px; z-index: 0;" class="rounded mt-5">
    <style>
    .border-transition {
        transition: border-color 0.6s ease;
    }

    .fade {
        transition: opacity 0.6s ease;
    }

    .slow-fade-out {
        transition: opacity 2s ease;
        opacity: 0;
    }
</style>



<div class="container">
    <div id="formContainer" class="border border-2 rounded p-4 mt-5 border-transition fade-transition" style="background-color: rgba(252, 250, 250, 0.8);">
        <h2 class="text-center">Aanmelden</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form id="multiStepForm" method="POST">
                            <div id="step1" class="step show fade-transition">
                                <div class="form-group">
                                    <label for="voornaam" class="form-label">Voornaam:</label>
                                    <input class="form-control" type="text" name="voornaam" id="voornaam" required>
                                </div>
                                <div class="form-group">
                                    <label for="achternaam" class="form-label">Achternaam:</label>
                                    <input class="form-control" type="text" name="achternaam" id="achternaam" required>
                                </div>
                                <button type="button" class="btn btn-primary next-btn mt-3" onclick="validateStep(1)">Next</button>
                            </div>
                            <div id="step2" class="step fade-transition">
                                <div class="form-group">
                                    <label for="email" class="form-label">E-mail:</label>
                                    <input class="form-control" type="email" name="email" id="email" required>
                                </div>
                                <button type="button" class="btn btn-primary prev-btn mt-3" onclick="prevStep(2)">Previous</button>
                                <button type="button" class="btn btn-primary next-btn mt-3" onclick="validateStep(2)">Next</button>
                            </div>
                            <div id="step3" class="step fade-transition">
                                <div class="form-group">
                                    <label for="datum" class="form-label">Datum:</label>
                                    <input style="color: #01368a;" class="form-control" type="date" name="datum" id="datum" required min="<?php echo $minDatum; ?>" max="<?php echo $maxDatum; ?>"><br><br>
                                </div>
                                <div class="form-group">
                                    <label for="tijd" class="form-label">Beschikbare tijden:</label>
                                    <select style="color: #01368a;" class="form-control" name="tijd" id="tijd" required>
                                        <option value="9-15">9:00 - 15:00</option>
                                        <option value="7-16">7:00 - 16:00</option>
                                        <option value="7-16">7:00 - 16:00</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary prev-btn mt-3" onclick="prevStep(3)">Previous</button>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
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
                                    echo "<p class='text-center mt-5'>U heeft al aangemeld op deze dag en tijd.</p>";
                                } else {
                                    try {
                                        $stmt = $conn->prepare("INSERT INTO aanmelding (naam, email, datum, tijd) VALUES (:volledigeNaam, :email, :datum, :tijd)");
                                        $stmt->bindParam(':volledigeNaam', $volledigeNaam);
                                        $stmt->bindParam(':email', $email);
                                        $stmt->bindParam(':datum', $datum);
                                        $stmt->bindParam(':tijd', $tijd);
                                        $stmt->execute();
                                        echo "<p class='text-center mt-5'>U heeft aangemeld.</p>";
                                    } catch(PDOException $e) {
                                        echo "Fout bij het aanmelden: " . $e->getMessage();
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateStep(step) {
        var currentStep = document.getElementById("step" + step);
        var nextStep = document.getElementById("step" + (step + 1));
        var formContainer = document.getElementById("formContainer");

        var inputs = currentStep.querySelectorAll("input[required], select[required]");
        var isValid = true;

        inputs.forEach(function(input) {
            if (!input.value) {
                isValid = false;
                input.classList.add("is-invalid");
            } else {
                input.classList.remove("is-invalid");
            }
        });

        if (step === 2) {
            var emailInput = document.getElementById("email");
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value)) {
                isValid = false;
                emailInput.classList.add("is-invalid");
            }
        }

        if (isValid) {
            formContainer.classList.remove("border-transition", "fade");
            formContainer.style.borderColor = "transparent";
            formContainer.style.opacity = "0";

            setTimeout(function() {
                currentStep.classList.remove("show");
                formContainer.classList.add("slow-fade-out");
                nextStep.classList.add("show");
                formContainer.style.opacity = "1";
                formContainer.style.borderColor = "";
                formContainer.classList.add("border-transition", "fade");
            }, 600);
        }
    }

    function prevStep(step) {
        var currentStep = document.getElementById("step" + step);
        var prevStep = document.getElementById("step" + (step - 1));
        var formContainer = document.getElementById("formContainer");

        formContainer.classList.remove("border-transition", "fade");
        formContainer.style.borderColor = "transparent";
        formContainer.style.opacity = "0";

        setTimeout(function() {
            currentStep.classList.remove("show");
            prevStep.classList.add("show");
            formContainer.style.opacity = "1";
            formContainer.style.borderColor = "";
            formContainer.classList.add("border-transition", "fade");
        }, 600);
    }
</script>

        </div>
    </div>
    <br>
    <br>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="text-white footer text-center" style="background: linear-gradient(90deg, #0082ca, 50%, #0f2696);">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn text-white btn-floating m-1" href="https://www.facebook.com/rocvantwente" role="button">
                <img src="images/facebook_icon.svg" alt="Facebook Logo" style="max-width: 30px; max-height: 30px;" />
            </a>

            <!-- Twitter -->
            <a class="btn text-white btn-floating m-1" href="https://twitter.com/rocvantwente" role="button">
                <img src="images/twitter_icon.svg" al   t="Twitter Logo" style="max-width: 30px; max-height: 30px;" />
            </a>

            <!-- YouTube -->
            <a class="btn text-white btn-floating m-1" href="https://www.youtube.com/user/rocvantwente" role="button">
                <img src="images/youtube_icon.svg" alt="YouTube Logo" style="max-width: 30px; max-height: 30px; " />
            </a>

            <!-- Instagram -->
            <a class="btn text-white btn-floating m-1" href="https://www.instagram.com/rocvantwente/" role="button">
                <img src="images/instagram_icon.svg" alt="Instagram Logo" style="max-width: 30px; max-height: 30px;" />
            </a>

            <!-- LinkedIn -->
            <a class="btn text-white btn-floating m-1" href="https://nl.linkedin.com/school/roc-van-twente/" role="button">
                <img src="images/linkedin_icon.svg" alt="LinkedIn Logo" style="max-width: 30px; max-height: 50px;" />
            </a>
        </section>
    </div>
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 ROC Van Twente
    </div>
    <!-- Copyright -->
</footer>

</body>
</html>