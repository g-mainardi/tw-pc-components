function hideElement(element){
    element
        .removeClass("selected")     
        .nextAll().filter("div").slideUp();            
}

$(document).ready(function(){

    // Aprire e chiudere le notifiche
    $(".bottoneNotifica").click(function() {
        $(this).addClass("visualizzato");

        if($(this).next().is("img")){
            $(this).next().addClass("nascondi");
        }
        
        if($(this).hasClass("selected")) {
            hideElement($(this));
        }
        else{
            $(this)
                .addClass("selected")
                .nextAll().filter("div").slideDown(); 
        }
    });
});