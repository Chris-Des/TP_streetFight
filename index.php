<?php 

require __DIR__ . '/util/Autoloader.php';

use App\Autoloader; // Utilisation du namespace

session_name('Node');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="./assets/ts/router.ts"></script> -->
    <title>Bienvenue</title>
</head>
<body>
    <div class="principal">
      <?php Autoloader::view('home/TheHeader');?>
        <?php Autoloader::view('home/bienvenue');?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>