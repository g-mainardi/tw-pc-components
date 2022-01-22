function generaNotificheSchermo(notifiche){
    let result = "<section class='areaNotifiche'>";

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
    </section> `;
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

    // Aprire e chiudere espandi/riduci
    $(".mostra").click(function(){
        if($(".tabella").css("display") == "none"){
            $(".tabella").css("display", "");
        } else {
            $(".tabella").css("display", "none");
        }
    });

    // Chiedo i dati delle notifiche a schermo
    $.getJSON("api-notifiche-schermo.php", function(data){
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

});