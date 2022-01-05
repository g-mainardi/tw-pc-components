    <section class="carelloSection">
        <ul>
            <li><p>Carrello: 2</p></li>
            <li><p class="totale"></p></li>
            <li><button class="bottoneTabella">CHECKOUT</button></li>
        </ul>
    </section>
  
<?php foreach($SetParameters["cart"] as $prodotto):
    $articolo = $dbh->getProdotto($prodotto["ID_Articolo"]);

    if($prodotto["quantità"] > $articolo[0]["quantità"]){
        echo "<section class='prodottoEsaurito'";
    } else {
        echo "<section>";
    }
    ?>
        <div class="container">
            <img src="immaginiGPU/3080.jpg" alt="">
            <table class="tabellaCategorie">
                <tr>
                    <th><h2 class="testoTabella"><?php echo $prodotto["marca"]." ".$prodotto["nome"];?></h2></th>
                    <th><h2 class="testoTabella prezzo"><?php echo $prodotto["prezzo"]." $"; ?></h2></th>
                </tr>
                <tr>
                    
                    <td><button class="aggiornaQuantità">+</button>
                    <p class="testoTabella">QTY: <?php echo $prodotto["quantità"]; ?></p>
                    <button class="aggiornaQuantità">-</button></td>
                    <td>
                            <a class="link2" href="#">rimuovi tutto</a>
                        
                </td>
                </tr>
            </table>
        </div>
      
    
       
    </section>
<?php endforeach; ?> 
