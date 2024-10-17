<?php
include '../include/config.php';
$name = $_POST['weaponName'];
$price = $_POST['weaponPrice'];
$damage = $_POST['weaponDamage'];
$bulk = $_POST['weaponBulk'];

$sql = "INSERT INTO weapons (name, price, damage, bulk) VALUES ('$name', '$price', '$damage', '$bulk')";
$link->query($sql);
?>
