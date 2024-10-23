// Funzione per gestire la ricerca
function search(query) {
    console.log("Searching for:", query);
    // Verifica se la query non è vuota
    if (query.length === 0) {
        return;
    }

    // Chiamata AJAX su api/hello_algolia.php
    $.ajax({
        url: '../api/hello_algolia.php',
        type: 'POST', // Cambia a POST se stai inviando dati
        data: { query: query },
        dataType: 'json', // Assicurati di specificare il tipo di dati attesi
        success: function(data) {
            console.log('Search results:', data.results[0].hits);
            //mi calcolo il numero di risultati
            var numResults = data.results[0].nbHits;

            // Stampo i risultati<
            $('#search-results').empty()
            //ul search-results
            for (var i = 0; i < numResults; i++) {
                var hit = data.results[0].hits[i];
                //li search-results
                $('#search-results').append('<li>' + hit.name  +" "+ hit.id + '</li>');
            }


        },
        error: function(error) {
            console.error('Error fetching search results:', error);
        }
    });
}

//prendo in get il parametro query