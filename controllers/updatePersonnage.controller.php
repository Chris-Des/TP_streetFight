<?php
require_once('../model/fighter.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $atk = $_POST['atk'];
    $life = $_POST['life'];
    $color = $_POST['color'];

    $fighterObj = new Personnage();
    $fighterObj->setId($id);

    $fighterObj->updateDetails($atk, $life, $color);
}
?>
