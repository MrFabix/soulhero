<?php
include '../include/config.php';
$id = $_POST['weaponId'];
$name = $_POST['weaponName'];
$price = $_POST['weaponPrice'];
$damage = $_POST['weaponDamage'];
$bulk = $_POST['weaponBulk'];

$sql = "UPDATE weapons SET name = '$name', price = '$price', damage = '$damage', bulk = '$bulk' WHERE id = $id";
$link->query($sql);
?>
