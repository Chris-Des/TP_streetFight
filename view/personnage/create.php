<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un personnage</title>
</head>

<body>
    <h1>Créer un personnage</h1>
    <form action="../../controllers/createPersonnage.php" method="post">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required><br>

        <label for="life">Vie :</label>
        <input type="number" id="life" name="life" required><br>

        <label for="atk">Attaque :</label>
        <input type="number" id="atk" name="atk" required><br>

        <label for="color">Couleur :</label>
        <input type="text" id="color" name="color" required><br>

        <input type="submit" value="Créer">
    </form>
</body>

</html>