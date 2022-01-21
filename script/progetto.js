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

    aggiornaNotificheSchermo();

    // Chiudere notifica a schermo
    $("button.close").click(function(){
        var idnum = parseInt($(this).attr("id").split("notificaschermo")[1]);
        $("div#" + "notificaschermo" + idnum).attr("class", "mostrata");
        $("div#" + "notificaschermo" + (idnum - 2)).attr("class","inmostra");
        aggiornaNotificheSchermo();
    });

});