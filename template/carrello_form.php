<form action="#" method="POST" name="carrello">

            <section class="intestazioneCarrello">
                <h1>Carrello</h1>
                <p class="totale">Totale: 0 €</p>
                <input class="bottoneSecondario" type="submit" name="save" value="Salva carrello" disabled></input>
                <input class="bottoneTabella" type="submit" name="submit" value="Vai al pagamento"></input>
            </section>

    <?php $cont = 0; 
    if(isset($SetParameters["cart"])) :
        foreach($SetParameters["cart"] as $artCarrello):
            $articolo = $dbh->getProdotto($artCarrello["ID_Articolo"]);

            echo "        <section name='qty[".$artCarrello["ID_Articolo"]."]' class='".($artCarrello['quantità'] > $articolo[0]['quantità'] ? 'prodottoEsaurito ' : '>').$cont."'>\n";

            ?>
                <div class="container">
                    <img src="immagini/<?php echo$artCarrello["img"]; ?>" alt="">
                    <table class="tabellaCategorie">
                        <tr>
                            <th><h2 class="testoTabella"><?php echo $artCarrello["marca"]." ".$artCarrello["nome"];?></h2></th>
                            <th><h2 class="testoTabella prezzo"><?php echo $artCarrello["prezzo"]." €"; ?></h2></th>
                        </tr>
                        <tr>
                            <td>
                                <button class="aggiornaQuantità" name="qty[<?php echo $artCarrello["ID_Articolo"]; ?>]">+</button>
                                <label for="">QTY: </label>
                                <input readonly type="number" name="qty[<?php echo $artCarrello["ID_Articolo"] ?>]" class="testoTabella" value="<?php echo $artCarrello["quantità"];?>"
                                    max="<?php echo $SetParameters["quantitàdb"][$artCarrello["ID_Articolo"]];?>" min="0"></input>
                                <button class="aggiornaQuantità" name="qty[<?php echo $artCarrello["ID_Articolo"]; ?>]">-</button>
                            </td>
                            <td>
                                <button class="link2" name="qty[<?php echo $artCarrello["ID_Articolo"]; ?>]">Elimina dal carrello</button>
                            </td>
                        </tr>
                    </table>
                </div>  
            </section>

    <?php 
        endforeach; 
    endif;?>
    </form>
