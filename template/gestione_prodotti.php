<section class="Section1">
            <h1>BENVENUTO</h1>
            <h2>qui è dove puoi gestire la tua merce in vendita</h2>
</section> 
  <?php foreach ($SetParameters["prodotti"] as $prodotto): ?>
    <section class="<?php echo ($prodotto["quantità"] == 0 ? "prodottoEsaurito" : ""); ?>">    
        <div class="container">
            <img src="<?php echo IMG_DIR.$prodotto["img"];?>" alt="" />
        <form class="selezioaQuantità" action="#" method="POST"> 
            <table class="tabellaCategorie">
                <tr>
                    <th><h2 class="testoTabella"><?php echo $prodotto["nome"];?></h2></th>
                    <th><h2 class="testoTabella"><?php echo $prodotto["prezzo"]." €";?></h2></th>
                    
                </tr>
                <tr>
                    <td colspan="2">
                      <p class="testoTabella"><?php echo "quantità rimaste: ".$prodotto["quantità"];?></p>
                    </td>

                </tr>
                
                <tr>

                    <td>
                   <label>aggiorna quantià<br/>
                   <input class="modificaProdotti" type="text" id="prezzo" name="quantita<?php echo $prodotto["ID_Articolo"]?>" value="<?php echo $prodotto["quantità"];?>" />
                   </form>  
                </td>

                <td>
                     
                    <label>modifica prezzo<br/>
                    <input class="modificaProdotti" type="text" id="prezzo" name="prezzo<?php echo $prodotto["ID_Articolo"]?>" value="<?php echo $prodotto["prezzo"];?>" />
                    </td>

                </tr>
                
                <tr><td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $prodotto["ID_Articolo"]?>" />
                    <button class="bottoneTabella" type="submit" name="submit">AGGIORNA</button>
                </td></tr> 
            </table>
        </form>
        </div>
      
    </section>
    <?php endforeach; ?>