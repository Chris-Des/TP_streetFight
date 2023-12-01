<?php
require_once('../model/fighter.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $life = $_POST['life'];
    $atk = $_POST['atk'];
    $color = $_POST['color'];

    $fighter = new Personnage();
    $fighter->createPersonnage($name, $life, $atk, $color);

    header('Location: ../view/personnage/list.php');
    exit;
}
