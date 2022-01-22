function generaNotifiche(notifiche){
    let result = `<section class='notifiche'>
    <h2>Le tue notifiche</h2>`;

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
        <li id="${id}">
            <header>
                <button id="${id}" class="bottoneNotifica ${classe}">
                    ${notifiche[i]["titolo"]}
                </button>
                ${img}
            </header>
            <div id="${id}">
                <p>${notifiche[i]["descrizione"]}</p>
                <footer>
                    <p>${notifiche[i]["data"]}</p>
                    <button class="bottoneTabella eliminaNotifica" id="${id}" >ELIMINA</button>
                </footer>
            </div>
        </li>`;

        result += notifica;
        if(i == (notifiche.length - 1)){result += "</ul>";}
    }

    checkNoNotifications();

    return result + `
    </section> `;
}

function isAbsent(element){
    return element.length <= 0;
}

function checkNoNotifications(){
    // Stampo testo se non ci sono alcun tipo di notifiche nel db per questo utente
    if(isAbsent($("section.notifiche")) || isAbsent($("section.notifiche > ul")) || isAbsent($("section.notifiche > ul > li"))){
        $("section.notifiche").append("<p>Non ci sono notifiche al momento.</p>");
    }
}

$(document).ready(function(){

    // Chiedo i dati di tutte le notifiche dell'utente
    $.getJSON("api-notifiche.php?statonotifica=0", function(data){
        // Prendo i dati e li formatto nell'HTML poi li aggiungo al main
        $("main").append(generaNotifiche(data));

        // Aprire e chiudere le notifiche
        $(".bottoneNotifica").click(function() {
            // Salvo l'id di questa notifica
            let idnum = parseInt($(this).attr("id").split("notifica")[1]);
            // Aggiunge la classe visualizzato nel caso in cui non ci fosse già
            $(this).addClass("visualizzato");

            // Controllo attraverso la presenza del disclaimer se la notifica doveva ancora essere letta 
            if($(this).next().is("img")){
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
            let idnum = parseInt($(this).attr("id").split("notifica")[1]);
            // Comunico l'eliminazione al db
            $.post("gestisci-notifica.php", {ID_Notifica: idnum, action: 2}, function(data){
                // Per testing console.log(data);
            });

            $("li#notifica" + idnum).remove();
            checkNoNotifications();
        });
    });

});