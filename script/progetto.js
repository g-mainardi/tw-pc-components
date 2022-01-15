function hideElement(element){
    element
        .removeClass("selected")     
        .next().next().slideUp();            
}

$(document).ready(function(){

    // Aprire e chiudere il menù laterale di navigazione
    $(".bottoneMenu").click(function(){
        if($(".menu").css("display") == "none"){
            $(".menu").css("display", "block");
        } else {
            $(".menu").css("display", "none");
        }
    });

    // Aprire e chiudere le notifiche
    $(".bottoneNotifica").click(function(){
        $(this).addClass("visualizzato");
        $(this).next().addClass("nascondi");
        if ($(this).hasClass("selected")){
            hideElement($(this));
        }
        else{
            $(this)
                .addClass("selected")
                .next().next().slideDown(); 
        }
    });
});