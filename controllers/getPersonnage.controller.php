<?php
require_once('../model/fighter.php');
if (isset($_GET['id'])) {
    $fighterObj = new Personnage();
    $selectedFighter = $fighterObj->getPersonnage($_GET['id']);
    header('Content-Type: application/json');
    echo json_encode($selectedFighter);
}
?>
