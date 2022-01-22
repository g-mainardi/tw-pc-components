function hideElement(element){
    element
        .removeClass("selected")     
        .nextAll().filter("div").slideUp();            
}

$(document).ready(function(){

    // Aprire e chiudere le notifiche
    $(".bottoneNotifica").click(function() {
        // Aggiunge la classe visualizzato nel caso in cui non ci fosse già
        $(this).addClass("visualizzato");

        // Controllo se la notifica doveva ancora essere letta, in tal caso 
        // rimuovo il disclaimer e lo comunico al db
        if($(this).next().is("img")){
            $(this).next().addClass("nascondi");

            $.post("gestisci-notifica.php", {ID_Notifica: parseInt($(this).attr("id")), action: 1}, function(data){
                // Per testing console.log(data);
            });

            // Devo aggiornare numerino notifiche icona
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