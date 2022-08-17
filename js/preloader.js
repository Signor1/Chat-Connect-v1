//code for hiding the preloader and displaying the main content on windows load
$(window).load(function(){
    $(".preloader").fadeOut("slow");
    $(".overall-container").fadeIn("slow");
});