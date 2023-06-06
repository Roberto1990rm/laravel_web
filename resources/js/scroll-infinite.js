$(document).ready(function() {
    var page = 1;
    var container = $('#beer-container');
    var indicator = $('#loading-indicator');
    var loading = false;
    var finished = false;
  
    function loadBeers() {
        if (!finished && !loading) {
            loading = true;
            indicator.show();
            $.ajax({
                url: '/beers/load',
                data: { page: page },
                type: 'GET',
                success: function(response) {
                    if (response) {
                        container.append(response);
                        page++;
                        loading = false;
                        indicator.hide();
                    } else {
                        finished = true;
                        indicator.text('No more beers to load').show();
                    }
                },
                error: function() {
                    indicator.text('Error loading beers').show();
                }
            });
        }
    }
  
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {
            loadBeers();
        }
    });
  
    loadBeers();
});
