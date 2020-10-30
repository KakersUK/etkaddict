$(document).ready(function() {
    $('#character-search').change(function() {
        var searchCharacter = $(this).val();
        $.get('/search.json', { search: searchCharacter }, function(data) {
            $('ul.search-list').empty()
            $.each(data, function() {
                $('ul.search-list').append('<li><a href="/characters/' + this.charname + '/">' + this.charname + '</a></li>');
            });
        }, "json");
    });
});