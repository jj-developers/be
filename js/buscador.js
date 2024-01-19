$(document).ready(function() {

    //buscador subcategoria

    $('#buscarsubcat').click(function() {
        searchItems();
    });

    $('#searchInputsubcat').on('keyup', function(event) {
        if (event.key === 'Enter') {
            searchItems();
        }
    });

    function searchItems() {
        var searchText = $('#searchInputsubcat').val().toLowerCase();
        $('.item').each(function() {
            var itemText = $(this).text().toLowerCase();
            if (itemText.indexOf(searchText) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    } 


    //buscador categoria


    $('#buscarcat').click(function() {
        searchItemscat();
    });

    $('#searchInputcat').on('keyup', function(event) {
        if (event.key === 'Enter') {
            searchItemscat();
        }
    });

    function searchItemscat() {
        window.location.href = 'buscador?busqueda='+$("#searchInputcat").val();
    } 

   

});
