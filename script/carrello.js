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
    // Modifico la quantità
    $("input.testoTabella[name='" + articlename + "']").attr("value", qty);

    // Se la quantità è zero allora nascondo l'elemento
    checkRimozioneArticolo(articlename);

    // Ricalcolo del totale
    calcolaTotaleCarrello();

    // Gestione dei pulsanti "Salva carrello" e "Vai al pagamento" per controllo stato
    if($("input.bottoneSecondario").attr("disabled")){
        // Abilito il pulsante "Salva carrello"
        $("input.bottoneSecondario").attr("disabled", false);    
        
        // Al cambio pagina mando un messaggio per avvisare di salvare il carrello
        window.onbeforeunload = function(e) {
            e.returnValue = "Sicuro di aver salvato le modifiche al carrello?";
        };

        // Disabilito il pulsante "Vai al pagamento"
        $("input.bottoneTabella").attr("disabled", true);
    }
}

function checkRimozioneArticolo(articlename){
    if(parseInt(getQtyArticolo(articlename).attr("value")) == 0){
        $("section[name='" + articlename + "']").hide();
    }
}

$(document).ready(function() {
    
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

    // 
    $("input.bottoneSecondario").click(function(e){
        window.onbeforeunload = null;
    });
})