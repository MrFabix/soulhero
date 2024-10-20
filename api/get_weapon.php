<?php
include '../include/config.php';

$id = $_GET['id'];

// Query per ottenere i dettagli dell'arma
$sql = "SELECT * FROM weapons WHERE id = $id";
$result = $link->query($sql);

// Inizializza un array per contenere i dettagli dell'arma e i suoi tratti
$response = array();

// Controlla se l'arma esiste e aggiungi i dati dell'arma all'array
if ($result->num_rows > 0) {
    $response = $result->fetch_assoc();
}

// Query per ottenere i tratti dell'arma
$sql = "SELECT wt.id, wt.name, wwt.value
        FROM weapon_weapon_traits wwt
        JOIN weapon_traits wt ON wwt.weapon_trait_id = wt.id
        WHERE wwt.weapon_id = $id";

$weapon_traits = $link->query($sql);

// Inizializza un array per i tratti
$traits = array();

// Popola l'array dei tratti
if ($weapon_traits->num_rows > 0) {
    while ($row = $weapon_traits->fetch_assoc()) {
        // Aggiungi ogni tratto all'array $traits
        $traits[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'value' => $row['value'] // Se il tratto ha un valore (es. per tratti con X)
        );
    }
}

// Aggiungi i tratti all'array di risposta
$response['traits'] = $traits;

// Restituisci l'array in formato JSON
echo json_encode($response);
?>
