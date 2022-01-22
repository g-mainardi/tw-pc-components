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

        // Controllo attraverso la presenza del disclaimer se la notifica doveva ancora essere letta 
        if($(this).next().is("img")){
            // Rimuovo il disclaimer
            $(this).next().addClass("nascondi");

            let idnum = parseInt($(this).attr("id"));
            // Comunico la lettura al db
            $.post("gestisci-notifica.php", {ID_Notifica: idnum, action: 1}, function(data){
                // Per testing console.log(data);
            });
            $("div#" + "notificaschermo" + idnum).hide();

            // TODO Devo aggiornare numerino notifiche icona
        }
        
        // Chiusura e apertura pannello con descrizione
        if($(this).hasClass("selected")) {
            hideElement($(this));
        }
        else{
            $(this)
                .addClass("selected")
                .nextAll().filter("div").slideDown(); 
        }
    });

    // Eliminazione notifica
    $("button.eliminaNotifica").click(function() {
        let idnum = parseInt($(this).attr("id"));
        // Comunico l'eliminazione al db
        $.post("gestisci-notifica.php", {ID_Notifica: idnum, action: 2}, function(data){
            // Per testing console.log(data);
        });

        $("section.notifiche > ul > li#" + idnum).hide();
    });
});