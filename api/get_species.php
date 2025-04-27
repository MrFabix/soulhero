<?php
include '../include/config.php';

$sql = "SELECT ancestries.*, skill.name as name_skill FROM ancestries JOIN skill on ancestries.fk_skill = skill.id";
$result = $link->query($sql);

$species = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $species[] = [
            'id' => $row['id_stirpe'],
            'nome_stirpe' => $row['nome_stirpe'],
            'descrizione' => $row['descrizione']
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($species);