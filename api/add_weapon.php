<?php
include '../include/config.php';
$name = $_POST['weaponName'];
$price = $_POST['weaponPrice'];
$damage = $_POST['weaponDamage'];
$bulk = $_POST['weaponBulk'];
$weaponType = $_POST['weaponType'];
$range = $_POST['weaponRange'];
$reload = $_POST['weaponReload'];
$capacity = $_POST['weaponCapacity'];
$misfire = $_POST['weaponMisfire'];

$sql = "INSERT INTO weapons (name, price, damage, bulk, weapon_type_id, `range`, reload, capacity, misfire)
VALUES ('$name', '$price', '$damage', '$bulk', '$weaponType', '$range', '$reload', '$capacity', '$misfire')";

echo $sql;
$link->query($sql);
?>
