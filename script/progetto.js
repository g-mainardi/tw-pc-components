function aggiornaNotificheSchermo(){
    var damostrare = 0;
    $("section.areaNotifiche > div").each(function() {
        if($(this).hasClass("inmostra")){
            $(this).show();
        } else {
            $(this).hide();
            if($(this).hasClass("damostrare")){
                damostrare++;
            }
        }
    })
    if(damostrare <= 0){
        $("div.vediTutto").hide();
    } else {
        $("div.vediTutto").show();
    }
}

function generaNotifiche(notifiche){
    let result = "<section class='areaNotifiche'>";

    for(let i=0; i < notifiche.length; i++){
        let id = notifiche[i]["ID_Notifica"];
        let classe = (i >= 2)? 'damostrare' : 'inmostra';
        let notifica = `
        <div id="notificaschermo${id}" class="${classe}">
            <div>
                <h2><a href="notifiche.php?id=${id}">${notifiche[i]["titolo"]}</a></h2>
                <button class="close" id="notificaschermo${id}">X</button>
            </div>
            <p>${notifiche[i]["descrizione"]}</p>
            <footer>
                <a href="notifiche.php?id=${id}">Vai alla notifica</a>
            </footer>
        </div>`;
        result += notifica;
    }
    if(notifiche.length > 2){

        result += `
        <div class="vediTutto">
            <a href="notifiche.php">Vedi tutto...</a>
        </div> `;
    }        
    result += `
    </section> `; 

    return result;
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

    // Con un GET chiedo i dati al file
    $.getJSON("api-notifiche.php", function(data){
        // Prendo i dati e li formatto nell'HTML poi li aggiungo al body
        $("nav.menu").after(generaNotifiche(data));
        aggiornaNotificheSchermo();

        // Associo funzione per chiudere notifica a schermo
        $("button.close").click(function(){
            var idnum = parseInt($(this).attr("id").split("notificaschermo")[1]);
            $.post("gestisci-notifica.php", {ID_Notifica: idnum, action: 0}, function(data){
                // Per testing console.log(data);
                $("div#" + "notificaschermo" + idnum).attr("class", "mostrata");
                $("div#" + "notificaschermo" + (idnum - 2)).attr("class","inmostra");
                aggiornaNotificheSchermo();  
            });
        });
    });

});