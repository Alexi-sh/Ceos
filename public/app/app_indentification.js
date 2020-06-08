function redirectionIdentificationEleve() {
    window.location.href = "//localhost:8000/eleve";
}

function redirectionIdentificationProf() {
    window.location.href = "//localhost:8000/professeur";
}

function fadeOutContainer() {
    $('.container').animate({
        "opacity": "0",
    }, 800); //.fadeOut(1500);
}


$("#eleve").click(function() {
    event.preventDefault();

    $("#prof").animate({
        "opacity": "0",
    }, 3000);

    $("#eleve").animate({
        "left": "25%",
    }, 4000);
    setTimeout(fadeOutContainer, 3000);
    setTimeout(redirectionIdentificationEleve, 4000);
});


$("#prof").click(function() {
    event.preventDefault();

    $("#eleve").animate({
        "opacity": "0",
    }, 800);

    $("#prof").animate({
        "left": "-25%",
    }, 1600);
    setTimeout(fadeOutContainer, 1600);
    setTimeout(redirectionIdentificationProf, 2800);
});