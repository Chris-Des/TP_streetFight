<?php
require_once('../../model/fighter.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat de Personnages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        .fighter {
            border: 2px solid #333;
            padding: 10px;
            width: 200px;
            margin: 10px;
            display: inline-block;
        }

        .result {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h1>Combat de Personnages</h1>


    <div class="fighter">
        <?php
        $fighter1 = new Personnage();
        $fighter1Details = $fighter1->getRandomPersonnage();
        echo "<h2>{$fighter1Details['name']}</h2>";
        echo "<p>Attaque: {$fighter1Details['atk']}</p>";
        echo "<p>Vie: {$fighter1Details['life']}</p>";
        ?>
    </div>

    <div class="fighter">
        <?php
        $fighter2 = new Personnage();
        do {
            $fighter2Details = $fighter2->getRandomPersonnage();
        } while ($fighter2Details['id'] === $fighter1Details['id']);
        echo "<h2>{$fighter2Details['name']}</h2>";
        echo "<p>Attaque: {$fighter2Details['atk']}</p>";
        echo "<p>Vie: {$fighter2Details['life']}</p>";
        ?>
    </div>

    <div class="result">
        <h2>Résultat du Combat</h2>
        <?php
        $attackerName = $fighter1Details['name'];
        $defenderName = $fighter2Details['name'];
        echo "<p>$attackerName attaque $defenderName :</p>";
        $fighter2->deadAttack($fighter1->atk, $fighter1->name);


        ?>
    </div>
    <button onclick="location.reload();">Relancer le Combat</button>
</body>

</html>