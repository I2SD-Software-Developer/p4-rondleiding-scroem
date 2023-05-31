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
        <style>
            .container {
                display: flex;
                flex-direction: row;
            }

        </style>
        <nav>aminakodum</nav>
        <div class="totaal">
            <style>
                .totaal {
                    display: flex;
                    flex-direction: column;
                    margin: 0;
                    padding: 0;
                    border: solid black;
                }

                .knop1 {
                    background-color: red;
                    text-decoration: none;
                    color: white;
                }

                .cijfer1 {
                    color: red;
                }
            </style>
            <p class="cijfer1">2</p>
            <p>Alle afspraken</p>
            <a class="knop1" href="tafspraken.php">Zie details</a>
        </div>
        <div class="tijd">
            <style>
                .tijd {
                    display: flex;
                    flex-direction: column;
                    margin: 0;
                    padding: 0;
                    border: solid black;
                }

                .knop2 {
                    background-color: blue;
                    text-decoration: none;
                    color: white;
                }

                .cijfer2 {
                    color: blue;
                }
            </style>
            <p class="cijfer2">2</p>
            <p>Tijden en Datums</p>
            <a class="knop2" href="tafspraken.php">Zie details</a>
        </div>
    </div>
</body>
</html>