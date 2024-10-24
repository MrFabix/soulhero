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
        beforeSend: function() {
            // Optionally add a loading indicator
            $('#search-results').html('<li>Loading...</li>');
        },
        success: function(data) {
            console.log( data);
            // Mostra i risultati

            $('#search-results').html('');
            for (var i = 0; i < data.results.length; i++) {
                for (var j = 0; j < data.results[i].hits.length; j++) {
                    //scorro gli elementi dell array hits
                    var hit = data.results[i].hits[j];
                    //elemento hit
                    $('#search-results').append('<li><a href="' + hit.id + '">' + hit.name + '</a></li>');
                }
            }



        },
        error: function(error) {
            console.error('Error fetching search results:', error);
            $('#search-results').html('<li>An error occurred while fetching results.</li>');
        }
    });

}

//prendo in get il parametro query