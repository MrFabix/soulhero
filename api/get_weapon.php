<?php
include '../include/config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM weapons 
         WHERE id = $id";
$result = $link->query($sql);
//prendo tutte le weapons traits
$sql = "SELECT * FROM weapon_weapon_traits 
         WHERE weapon_id = $id";
$weapon_traits = $link->query($sql);
$traits = array();
if ($weapon_traits->num_rows > 0) {
    while($row = $weapon_traits->fetch_assoc()) {
        $sql = "SELECT * FROM weapon_traits 
         WHERE id = ".$row['weapon_trait_id'];
        $trait = $link->query($sql);
        if ($trait->num_rows > 0) {
            $traits[] = $trait->fetch_assoc();
        }
    }
}

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
}
?>
