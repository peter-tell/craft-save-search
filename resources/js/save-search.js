$( document ).ready(function() {
    // Grab the saved search from local storage
    var savedSearch = Craft.getLocalStorage('savedSearch.' + area);

    // If we're on a searchable page, try and populate the search box
    var $search = $('.search:first input:first');
    if ($search.length && savedSearch) {
        $search.val(savedSearch);
        $search.trigger('change');
    }

    // Upon exiting the page grab the search string and store it
    window.onbeforeunload = function(){
        if ($search.length) {
            if ($search.val() !== savedSearch) {
                Craft.setLocalStorage('savedSearch.' + area, $search.val());
            }
        }
    }
});
