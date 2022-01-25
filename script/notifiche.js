function generaNotifiche(notifiche){
    let result = ``;

    for(let i=0; i < notifiche.length; i++){
        if(i == 0){result += "<ul>";}
        let id = "notifica" + notifiche[i]["ID_Notifica"];
        let classe = "";
        let img = "";
        if(notifiche[i]['statoNotifica'] == "read"){
            classe = 'visualizzato';
        } else {
            img = '<img src="immagini/exclamation-mark.png" alt=""/>';
        }
        
        let notifica = `
        <li class="${id}">
            <header>
                <button class="bottoneNotifica ${classe} ${id}">
                    ${notifiche[i]["titolo"]}
                </button>
                ${img}
            </header>
            <div id="${id}">
                <p>${notifiche[i]["descrizione"]}</p>
                <footer>
                    <p>${notifiche[i]["data"]}</p>
                    <button class="bottoneTabella eliminaNotifica ${id}">ELIMINA</button>
                </footer>
            </div>
        </li>`;

        result += notifica;
        if(i == (notifiche.length - 1)){result += "</ul>";}
    }

    return result;
}

function checkNoNotifications(){
    // Stampo testo se non ci sono alcun tipo di notifiche nel db per questo utente
    if($("section.notifiche > ul").length <= 0) {
        $("section.notifiche").append("<p class='nonotifiche'>Non ci sono notifiche al momento.</p>");
    } else if($("section.notifiche > ul > li").length <= 0) {
        $("section.notifiche > ul").remove();
        $("section.notifiche").append("<p class='nonotifiche'>Non ci sono notifiche al momento.</p>");
    }
}

$(document).ready(function(){

    $("main").append(`<section class='notifiche'>
        <h2>Le tue notifiche</h2>
    </section>`)
    // Chiedo i dati di tutte le notifiche dell'utente
    $.getJSON("api-notifiche.php?statonotifica=0", function(data){
        // Prendo i dati e li formatto nell'HTML poi li aggiungo al main
        $("section.notifiche").append(generaNotifiche(data));

        checkNoNotifications();

        // Aprire e chiudere le notifiche
        $(".bottoneNotifica").click(function() {
            let string = $(this).attr("class");
            let pos = string.search("notifica");
            let id = string.slice(pos+8, string.length);
            // Salvo l'id di questa notifica
            let idnum = parseInt(id);
            // Aggiunge la classe visualizzato nel caso in cui non ci fosse già
            $(this).addClass("visualizzato");

            // Controllo attraverso la presenza del disclaimer se la notifica doveva ancora essere letta 
            if($(this).next().is("img") && !$(this).next().hasClass("nascondi")){
                // Rimuovo il disclaimer
                $(this).next().addClass("nascondi");

                // Comunico la lettura al db
                $.post("gestisci-notifica.php", {ID_Notifica: idnum, action: 1}, function(data){
                    // Per testing console.log(data);
                });
                $("div#" + "notificaschermo" + idnum).hide();

                // Aggiorno numero notifiche icona
                let numnotifiche = parseInt($(".numNotifiche").text());
                if(numnotifiche > 0){
                    $(".numNotifiche").text(numnotifiche - 1);
                }
            }
            
            // Chiusura e apertura pannello con descrizione
            if($(this).hasClass("selected")) {
                $(this).removeClass("selected"); 
                $("div#notifica" + idnum).slideUp(); 
            }
            else{
                $(this).addClass("selected");
                $("div#notifica" + idnum).slideDown(); 
            }
        });

        // Eliminazione notifica
        $("button.eliminaNotifica").click(function() {
            let string = $(this).attr("class");
            let pos = string.search("notifica");
            let id = string.slice(pos+8, string.length);

            let idnum = parseInt(id);
            // Comunico l'eliminazione al db
            $.post("gestisci-notifica.php", {ID_Notifica: idnum, action: 2}, function(data){
                // Per testing console.log(data);
            });

            $("li.notifica" + idnum).remove();
            checkNoNotifications();
        });
    });

});