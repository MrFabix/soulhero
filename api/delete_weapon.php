<?php
include '../include/config.php';
$id = $_POST['id'];

$sql = "DELETE FROM weapons WHERE id = $id";
$link->query($sql);
?>
