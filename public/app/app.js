// $(document).ready(function() {
//     $('.container').animate({
//         "opacity": "1",
//     }, 800);
// });

var app = {};

(function($) {

    "use strict";

    var $window = $(window),
        $document = $(document);

    $fadeInOuverturePage = $('.container').animate({
        "opacity": "1"
    }, 1800);

    // app.fadeInOuverturePage = function() {
    //     $('.container').animate({
    //         "opacity": "1",
    //     }, 800);
    // }

    $document.ready(function() {
        $fadeInOuverturePage;



    });

})(jQuery);