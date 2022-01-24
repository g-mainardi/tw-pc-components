function generaCarrello(articoli){
    let result = `    
<form action="#" method="POST" name="carrello">
    <section class="intestazioneCarrello">
        <h1>Carrello</h1>
        <p class="totale">Totale: 0 €</p>
        <input class="bottoneTabella" type="submit" name="submit" value="Vai al pagamento"></input>
    </section>`;

    for(let i=0; i < articoli.length; i++){
        let articolo = articoli[i];
        let classi = "";
        if(articolo["quantità"] > articolo["disponibilità"]){
            classi = 'prodottoEsaurito';
        }
        
        let articoloHtml = `
        <section name="qty[${articolo["ID_Articolo"]}]" class="${classi}">
            <div class="container">
                <a href="prodotto.php?id=${articolo["ID_Articolo"]}">
                    <img src="${articolo["img"]}" alt="">
                </a>
                <table class="tabellaCategorie">
                    <tr>
                        <th><h2 class="testoTabella">${articolo["marca"]} ${articolo["nome"]}</h2></th>
                        <th><h2 class="testoTabella prezzo">${articolo["prezzo"]} €</h2></th>
                    </tr>
                    <tr>
                        <td>
                            <button class="aggiornaQuantità" name="qty[${articolo["ID_Articolo"]}]">+</button>
                            <label for="">QTY: </label>
                            <input readonly type="number" name="qty[${articolo["ID_Articolo"]}]" class="testoTabella" value="${articolo["quantità"]}"
                                max="${articolo["disponibilità"]}" min="0"></input>
                            <button class="aggiornaQuantità ${classi}" name="qty[${articolo["ID_Articolo"]}]">-</button>
                        </td>
                        <td>
                            <button class="link2" name="qty[${articolo["ID_Articolo"]}]">Elimina dal carrello</button>
                        </td>
                    </tr>
                </table>
            </div>  
        </section>
        `;

        result += articoloHtml;
    }

    return result + `
</form>`;
}

function calcolaTotaleCarrello() {
    var temp = 0;
    $(".container").each(function(){
        var prezzo = $(this).find(".prezzo").text().split("€");
        prezzo = parseInt(prezzo[0]);

        temp += (prezzo * parseInt($(this).find("input.testoTabella").attr("value")));
    });
    $(".totale").text("Totale: " + temp + " €");
    if(temp == 0){
        $(".intestazioneCarrello > input.bottoneTabella").addClass("disabilitato");
    } else{
        $(".intestazioneCarrello > input.bottoneTabella").removeClass("disabilitato");
    }
}

function getQtyArticolo(articlename){
    return $("input.testoTabella[name='" + articlename + "']");
}

function setQtyArticolo(articlename, qty){
    // Se la quantità è zero allora nascondo l'elemento e aggiorno icon carrello
    if(qty <= 0){
        $("section[name='" + articlename + "']").hide();
        qty = 0;
        let numeroCarrello = parseInt($(".numCarrello").text());
        if(numeroCarrello > 0) {
            $(".numCarrello").text(numeroCarrello - 1);
        }
    }

    // Modifico la quantità
    $("input.testoTabella[name='" + articlename + "']").attr("value", qty);

    // Ricalcolo del totale
    calcolaTotaleCarrello();
}

$(document).ready(function() {

    // Chiedo i dati di tutte le notifiche dell'utente
    $.getJSON("api-carrello.php", function(data){   
        // Per icona: prendo i dati e li formatto nell'HTML poi li aggiungo nell'header
        $("body > header > ul").append(generaIconaCarrello(data));

        // Per form carrello: prendo i dati e li formatto nell'HTML poi li aggiungo al main
        $("main").append(generaCarrello(data));
            
        // Calcolare il totale del carrello
        calcolaTotaleCarrello();

        // Modificare la quantità di un singolo prodotto nel carrello
        $(".aggiornaQuantità").click(function(event) {
            event.preventDefault();
            let qtyElement = getQtyArticolo($(this).attr("name"));
            let id = $(this).attr("name").replace("qty[", "").replace("]", "");
            let qty = parseInt(qtyElement.attr("value"));
            let modifica = 0;
            if($(this).text() == "+"){ 
                // + Prendo la quantità e la aumento di 1 solo se non supera il massimo e 99
                let maxqty = parseInt(parseInt(qtyElement.attr("max")));
                modifica = (qty < maxqty) && (qty < 99) ? 1 : 0;
            } else if($(this).text() == "-") {
                // -  Prendo la quantità e la diminuisco di 1 solo se maggiore di 0
                modifica = qty > 0 ? -1 : 0;
            }

            if(modifica != 0){
                qty += modifica;
                if(qty <= 0){
                    qty = 0;
                    // Comunico l'eliminazione al db
                    setQtyArticolo($(this).attr("name"), qty);
                    $.post("gestisci-carrello.php", {action: 0,ID_Articolo: id}, function(data){
                      //Per testing console.log(data);
                    });
                } else {
                    setQtyArticolo($(this).attr("name"), qty);
                    // Comunico la modifica al db
                    $.post("gestisci-carrello.php", {action: 1,ID_Articolo: id, quantità: qty}, function(data){
                        // Per testing console.log(data);

                        // Modifico anche l'html
                    });
                }

                if ($(this).hasClass("prodottoEsaurito") && qty<=parseInt(parseInt(qtyElement.attr("max")))){
                    $(this).parents("section").children("p").remove();
                    $(this).parents("section").removeClass("prodottoEsaurito");
                }
                
                if(!$("section").hasClass("prodottoEsaurito") && $(".totale").text() != "Totale: 0 €"){
                    $("input.bottoneTabella").removeClass("disabilitato");
                }
            }
        });

        // Pulsante elimina da carrello
        $("button.link2").click(function(e){
            e.preventDefault();
            setQtyArticolo($(this).attr("name"), 0);
            
            let id = $(this).attr("name").replace("qty[", "").replace("]", "");
            // Comunico l'eliminazione al db
            $.post("gestisci-carrello.php", {action: 0,ID_Articolo: id}, function(data){
                // Per testing console.log(data);
            });
        });

        // Messaggio di errore se si selezionano troppe quantità
        $("section.prodottoEsaurito").append("<p class='erroreEsaurito'>prodotto esaurito o non disponibile</p>");
        $("section.prodottoEsaurito").append("<p class='erroreEsaurito'>modificarne quantità</p>");
 
        if($("section").hasClass("prodottoEsaurito")){
            $("input.bottoneTabella").addClass("disabilitato")
        }
    });

})