function generaNotificheSchermo(notifiche){
    let result = "<div class='areaNotifiche'>";

    for(let i=0; i < notifiche.length; i++){
        let id = notifiche[i]["ID_Notifica"];
        let notifica = `
        <div id="notificaschermo${id}">
            <header>
                <h2><a href="notifiche.php?id=${id}">${notifiche[i]["titolo"]}</a></h2>
                <button class="close" id="notificaschermo${id}">X</button>
            </header>
            <p>${notifiche[i]["descrizione"]}</p>
            <footer>
                <p>${notifiche[i]["data"]}</p>
                <a href="notifiche.php?id=${id}">Vai alla notifica</a>
            </footer>
        </div>`;
        result += notifica;
    }

    return result + `
    </div> `;
}

function generaIconaNotifiche(notifiche){
    let icona=`
    <li>
        <a href="notifiche.php">
        <div class="text-box">
            <p class="numNotifiche">${notifiche.length}</p>
        </div>
            <img src="immagini/notifiche.png" alt="" />
        </a>
    </li>`
    return icona;
}

function generaIconaCarrello(carrello){
    let icona=`
    <li>
        <a href="carrello.php">
            <div class="text-box">
                <p class="numCarrello">${carrello.length}</p>
            </div>
            <img src="immagini/carrello.png" alt="" />
        </a>
    </li>`
    return icona;
}

$(document).ready(function(){

    // Icona notifiche: richiedo i dati delle notifiche da visualizzare - solo se loggato
    $.getJSON("api-notifiche.php?statonotifica=1", function(data){

        // Prendo i dati e li formatto nell'HTML poi li aggiungo nell'header
        $("body > header > ul").append(generaIconaNotifiche(data));
    });
    
    $("table.tabellaFooter > tbody > tr").each(function(){
        let colnumber = $(this).children().length;
        if(colnumber == 1){
            $(this).children().last().attr("colspan", "3");
        } else if (colnumber == 2){
            $(this).children().last().attr("colspan", "2");
        }
    });

    // Aprire e chiudere il menù laterale di navigazione
    $(".bottoneMenu").click(function(){
        if($(".menu").css("display") == "none"){
            $(".menu").css("display", "block");
        } else {
            $(".menu").css("display", "none");
        }
    });

    // Aprire e chiudere espandi/riduci - descrizione prodotto
    $(".mostra").click(function(){
        if($(".tabella").css("display") == "none"){
            $(".tabella").css("display", "");
        } else {
            $(".tabella").css("display", "none");
        }
    });

    // Chiedo i dati delle notifiche a schermo - solo se loggato
    $.getJSON("api-notifiche.php?statonotifica=2", function(data){
        // Prendo i dati e li formatto nell'HTML poi li aggiungo al body
        $("nav.menu").after(generaNotificheSchermo(data));

        // Associo funzione per chiudere notifica a schermo
        $("button.close").click(function(){
            var idnum = parseInt($(this).attr("id").split("notificaschermo")[1]);
            $.post("gestisci-notifica.php", {ID_Notifica: idnum, action: 0}, function(data){
                // Per testing console.log(data);
                $("div#" + "notificaschermo" + idnum).remove();
            });
        });
    });

    // Controllo di non essere nella pagina di carrello
    if(document.title.match("Carrello")==null){
        // Icona carrello: richiedo i dati del carrello - solo se loggato
        $.getJSON("api-carrello.php", function(data){

            // Prendo i dati e li formatto nell'HTML poi li aggiungo nell'header
            $("body > header > ul").append(generaIconaCarrello(data));
        });
    }


});