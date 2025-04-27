<?php
global $link;
include '../include/config.php';

$sql = "SELECT * FROM class";
$result = $link->query($sql);
$classes = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $classes[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'hp' => $row['hp'],
        ];
    }
}

echo json_encode($classes);
