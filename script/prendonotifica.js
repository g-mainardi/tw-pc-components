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

function aggiornaNotifiche(){
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

$(document).ready(function(){
    // Con un GET chiedo i dati al file
    $.getJSON("api-notifiche.php", function(data){
        // Prendo i dati e li formatto nell'HTML poi li aggiungo al body
        $("nav.menu").after(generaNotifiche(data));
        aggiornaNotifiche();

        // Associo funzione per chiudere notifica a schermo
        $("button.close").click(function(){
            var idnum = parseInt($(this).attr("id").split("notificaschermo")[1]);
            $.post("gestisci-notifica.php", {ID_Notifica: idnum, action: 0}, function(data){
                console.log(data);
                $("div#" + "notificaschermo" + idnum).attr("class", "mostrata");
                $("div#" + "notificaschermo" + (idnum - 2)).attr("class","inmostra");
                aggiornaNotificheSchermo();  
            });
        });

    });

    aggiornaNotifiche();




});

