$( document ).ready(function() {
    // Grab the saved search from local storage
    var savedSearch = Craft.getLocalStorage('savedSearch.' + area);

    // If we're on a searchable page, try and populate the search box
    var $search = $('.search:first input:first');
    if ($search.length && savedSearch) {
        $search.attr('value', savedSearch).blur();
    }

    // Clear out the saved search when moving to another section
    $('div#sidebar').on( 'click', 'nav ul li a', function() {
        Craft.setLocalStorage('savedSearch.' + area, '');
        if ($search.length) {
            $search.attr('value', '');
        };
    });

    // Upon exiting the page grab the search string and store it
    window.onbeforeunload = function(){
        if ($search.length) {
            if ($search.val() !== savedSearch) {
                Craft.setLocalStorage('savedSearch.' + area, $search.val());
            }
        }
    }
});
