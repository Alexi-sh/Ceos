var app = {};

(function($) {

    "use strict";

    var $window = $(window),
        $document = $(document);

    var fadeOutContainer = function() {
        $('.container').animate({
            "opacity": "0",
        }, 800);
    }

    var redirectionIdentificationEleve = function() {
        window.location.href = "//localhost:8000/eleve";
    }

    var redirectionIdentificationProf = function() {
        window.location.href = "//localhost:8000/professeur";
    }


    app.clickEleve = function() {

        $("#eleve").click(function() {
            event.preventDefault();

            $("#prof").animate({
                "opacity": "0",
            }, 800);

            $("#eleve").animate({
                "left": "25%",
            }, 1600);

            setTimeout(fadeOutContainer, 1600);
            setTimeout(redirectionIdentificationEleve, 2800);
        });
    }

    app.clickProf = function() {
        $("#prof").click(function() {
            event.preventDefault();

            $("#eleve").animate({
                "opacity": "0",
            }, 800);

            $("#prof").animate({
                "right": "25%",
            }, 1600);
            setTimeout(fadeOutContainer, 1600);
            setTimeout(redirectionIdentificationProf, 2800);
        });
    }

    $document.ready(function() {

        app.clickEleve();
        app.clickProf();

    });


})(jQuery);