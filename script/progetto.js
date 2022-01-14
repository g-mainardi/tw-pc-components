function hideElement(element){
    element
        .removeClass("selected")     
        .next().slideUp();            
}

function calcolaTotaleCarrello() {
    var temp = 0;
    $(".container").each(function(){
        var prezzo = $(this).find(".prezzo").text().split("$");
        prezzo = parseInt(prezzo[0]);

        temp += (prezzo * parseInt($(this).find("input.testoTabella").attr("value")));
    });
    $(".totale").text("Totale: " + temp + "$");
}

function getQtyArticolo(articlename){
    return $("input.testoTabella[name='" + articlename + "']");
}

function setQtyArticolo(articlename, qty){
    $("input.testoTabella[name='" + articlename + "']").attr("value", qty);
    checkRimozioneArticolo(articlename);
    calcolaTotaleCarrello();
}

function checkRimozioneArticolo(articlename){
    if(parseInt(getQtyArticolo(articlename).attr("value")) == 0){
        $("section[name='" + articlename + "']").hide();
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

    // Calcolare il totale del carrello
    calcolaTotaleCarrello();

    // Modificare la quantità di un singolo prodotto nel carrello
    $(this).find(".aggiornaQuantità").click(function(event) {
        event.preventDefault();
        var qtyElement = getQtyArticolo($(this).attr("name"));
        var qty = parseInt(qtyElement.attr("value"));

        if($(this).text() == "+"){ 
            // + Prendo la quantità e la aumento di 1 solo se non supera il massimo e 99
            var maxqty = parseInt(parseInt(qtyElement.attr("max")));
            qty += (qty < maxqty) && (qty < 99) ? 1 : 0;
        } else if($(this).text() == "-") {
            // -  Prendo la quantità e la diminuisco di 1 solo se maggiore di 0
            qty -= qty > 0 ? 1 : 0;
        }

        setQtyArticolo($(this).attr("name"), qty);
    });

    // Pulsante elimina da carrello
    $("button.link2").click(function(e){
        e.preventDefault();
        if(parseInt(getQtyArticolo($(this).attr("name")).attr("value")) > 0){
            setQtyArticolo($(this).attr("name"), 0);
        }
    });

    // Invio carrello prima di cambio pagina
/*     $(window).on("onunload",function() {
        setTimeout(function() {

            console.log("Aspetta");
        }, 30000000)
    }); */
    $("form[name='carrello']").onbeforeunload =  function () {
        console.log("Aspetta");
        // Invia l'alert
        return "Le modifiche al carrello non sono state salvate";
    };

    // Aprire e chiudere le notifiche
    $(".bottoneNotifica").click(function(){
        $(this).addClass("visualizzato");
        if ($(this).hasClass("selected")){
            hideElement($(this));
        }
        else{
            $(this)
                .addClass("selected")
                .next().slideDown(); 
        }
    });
});