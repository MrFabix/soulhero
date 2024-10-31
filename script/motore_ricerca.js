// URL base per i dettagli dei risultati (modifica secondo necessità)
const BASE_DETAIL_URL = '/wiki/';

// Funzione per gestire la ricerca
function search(query) {
    console.log("Searching for:", query);
    if (query.length === 0) {
        return;
    }

    // Costruzione URL relativo (usa URL assoluto se il file PHP è su un dominio diverso)
    const apiUrl = '../api/hello_algolia.php';

    // Chiamata AJAX su apiUrl
    $.ajax({
        url: apiUrl,
        type: 'POST',
        data: { query: query },
        dataType: 'json',
        beforeSend: function() {
            $('#search-results').html('<li>Loading...</li>');
        },
        success: function(data) {
            console.log(data);
            $('#search-results').html('');

            data.results.forEach(result => {
                 let indexName = result.index;
                 let url = '';
                //rimuovi tutti i caratteri fino al primo _
                    indexName = indexName.replace(/.*?_/, '');
                    //switch per sostituire i nomi degli indici con i nomi delle tabelle
                    switch (indexName) {
                        case 'CLASS': url = 'class.php'; break;
                        case 'WEAPON': url = 'weapon.php'; break;
                        case 'ARMOR': url = 'armor.php'; break;
                        case 'GEAR': url = 'gear_common_items.php'; break;
                        case 'SPECIES': url = 'species.php'; break;
                        case 'ROLE': url = 'role.php'; break;
                        case 'ArcanaRunes': url = 'arcana_runes.php'; break;
                        case 'RITUALS': url = 'rituals.php'; break;
                        case 'GenearlFeats': url = 'general_feats.php'; break;
                        case 'ClassFeats': url = 'class_feats.php'; break;
                        case 'CoreAbilities': url = 'core_abilities.php'; break;
                        case 'UltimateAbilities': url = 'ultimate_abilities.php'; break;
                        case 'SHIELD': url = 'shield.php'; break;
                        case 'SecondaryAbilities': url = 'secondary_abilities.php'; break;
                    }




                if (result.hits && result.hits.length > 0) {
                    $('#search-results').append('<li><strong class="text-warning">' + indexName + '</strong></li>');

                    result.hits.forEach(hit => {
                        const hitUrl = BASE_DETAIL_URL + indexName + '.php?id=' + hit.id;
                        $('#search-results').append('<li><a href="' + url + '?id=' + hit.id + '">' + hit.name + '</a></li>');
                    });
                }
            });
        },
        error: function(error) {
            console.error('Error fetching search results:', error);
            $('#search-results').html('<li>An error occurred while fetching results.</li>');
        }
    });
}
