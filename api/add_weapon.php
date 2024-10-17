<?php
include '../include/config.php';
$name = $_POST['weaponName'];
$price = $_POST['weaponPrice'];
$damage = $_POST['weaponDamage'];
$bulk = $_POST['weaponBulk'];
$weaponType = $_POST['weaponType'];

$sql = "INSERT INTO weapons (name, price, damage, bulk , weapon_type_id)
VALUES ('$name', '$price', '$damage', '$bulk', '$weaponType')";
$link->query($sql);
?>
