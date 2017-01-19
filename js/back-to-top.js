( function( $ ) {

    $('a.back-to-top').click(function() {
            $('html, body').animate({
                    scrollTop: 0
            }, 700);
            return false;
    });
    
} )( jQuery );