function hideElement(element){
    element
        .removeClass("selected")     
        .next().slideUp();            
}

function stringaToQuantità(str) {
    var qty = str.split("QTY: ");
    qty = parseInt(qty[qty.length - 1]);
    return qty;
}

function calcolaTotaleCarrello() {
    var temp = 0;
    $(".container").each(function(){
        var prezzo = $(this).find(".prezzo").text().split("$");
        prezzo = parseInt(prezzo[0]);

        temp += (prezzo * stringaToQuantità($(this).find("p.testoTabella").text()));
    });
    $(".totale").text("Totale: " + temp + "$");
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
    $(".container").each(function(){

        $(this).find(".aggiornaQuantità").click(function() {
            var qty;
            if($(this).text() == "+"){ 
                // Prendo la quantità e la aumento di 1 solo se non supera 99
                qty = stringaToQuantità($(this).next().text())
                qty += qty < 99 ? 1 : 0;
                $(this).next().text("QTY: " + qty);
            } else if($(this).text() == "-") {
                // Prendo la quantità e la diminuisco di 1 solo se maggiore di 0
                qty = stringaToQuantità($(this).prev().text());
                qty -= qty > 0 ? 1 : 0;
                $(this).prev().text("QTY: " + qty);
            }
            calcolaTotaleCarrello();
        });
                
    });

    // Checkout carrello - non completo - non funzionante
    $("ul > li > button.bottoneTabella").click(function() {
        console.log("Checkout");
        $(".container").each(function(){

            var idProdotto = $(this).attr("id");
            var qty = stringaToQuantità($(this).find("p.testoTabella").text());
            console.log("Quantità: " + qty + " - ID: " + idProdotto);

            $.post("disponibili.json",
            {
                id: idProdotto
            }, 
            function(data,status) {
                $(".carelloSection > ul > li > p").text("Data: " + data + "\nStatus: " + status);
            });
        });
    })

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