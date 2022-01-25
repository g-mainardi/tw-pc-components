<section class="Section1">
            <h1>BENVENUTO</h1>
            <h2>qui è dove puoi gestire la tua merce in vendita</h2>
</section> 
  <?php foreach ($SetParameters["prodotti"] as $prodotto): ?>
    <section class="<?php echo ($prodotto["quantità"] == 0 ? "prodottoEsaurito" : ""); ?>">    
        <h1 class="nomeProdotti"><?php echo $prodotto["nome"];?></h1>
        <div class="container">
            <img src="<?php echo IMG_DIR.$prodotto["img"];?>" alt="" />
        <form class="selezioaQuantità" action="#" method="POST"> 
            <table class="tabellaCategorie">
                <tr>
                    <th><p class="titoliTabella"><?php echo "quantità rimaste: ".$prodotto["quantità"];?></p></th>
                    <th><p class="titoliTabella"><?php echo $prodotto["prezzo"]." €";?></p></th>
                    
                </tr>
                <tr>
                    <td>
                   <label>aggiorna quantià</label>                   
                </td>
                <td>
                    <label>modifica prezzo</label>             
                </td>

                </tr>
                <tr>
                    <td>
                    <input class="modificaProdotti" type="text" name="quantita<?php echo $prodotto["ID_Articolo"]?>" value="<?php echo $prodotto["quantità"];?>" />
                    </td>
                    <td>
                    <input class="modificaProdotti" type="text" name="prezzo<?php echo $prodotto["ID_Articolo"]?>" value="<?php echo $prodotto["prezzo"];?>" />
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
