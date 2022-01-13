
        <section class="carelloSection">
            <ul>
                <li><p>Carrello:</p></li>
                <li><p class="totale"></p></li>
                <li><button class="bottoneTabella">CHECKOUT</button></li>
            </ul>
        </section>

<?php $cont = 0; 
if(isset($SetParameters["cart"])) :
    foreach($SetParameters["cart"] as $prodotto):
        $articolo = $dbh->getProdotto($prodotto["ID_Articolo"]);

        echo "        <section class='".($prodotto['quantità'] > $articolo[0]['quantità'] ? 'prodottoEsaurito ' : '>').$cont."'>\n";

        ?>
            <div class="container" id="<?php echo $prodotto["ID_Articolo"];?>">
                <img src="immaginiGPU/3080.jpg" alt="">
                <table class="tabellaCategorie">
                    <tr>
                        <th><h2 class="testoTabella"><?php echo $prodotto["marca"]." ".$prodotto["nome"];?></h2></th>
                        <th><h2 class="testoTabella prezzo"><?php echo $prodotto["prezzo"]." $"; ?></h2></th>
                    </tr>
                    <tr>
                        <td>
                            <button class="aggiornaQuantità">+</button>
                            <p class="testoTabella">QTY: <?php echo $prodotto["quantità"]; ?></p>
                            <button class="aggiornaQuantità">-</button>
                        </td>
                        <td>
                            <a class="link2" href="#">elimina dal carrello</a>
                        </td>
                    </tr>
                </table>
            </div>  
        </section>
<?php 
    endforeach; 
endif;?>
