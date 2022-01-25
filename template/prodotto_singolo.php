<?php $prodotto = $SetParameters["prodotto"][0]; ?>   
    <section class="prodottoSingolo" >    
        <div class="container">
        <img src="<?php echo IMG_DIR.$prodotto["img"];?>" alt="" />
        <h1><?php echo $prodotto["marca"]." ".$prodotto["nome"]; ?></h1>
        <h2><?php echo $prodotto["prezzo"]; ?> €</h2>
        <form class="selezionaQuantità" action="#" method="POST">  
            <input type="hidden" name="id" value="<?php echo $prodotto["ID_Articolo"];?>"/>
            <label>QTY
            <select name="quantità">
            <?php for ($i=1; $i <= $prodotto["quantità"]; $i++) { 
                echo "<option value='".$i."'>".$i."</option>";
            }?>
            </select></label>
            <button type="submit" class="aggiungi">AGGIUNGI AL CARRELLO</button>
        </form>
        <p><?php echo $prodotto["anteprima"]; ?></p>
        <button class="mostra">Espandi/Riduci</button>
        <table class="tabella">
            <?php $dictonary = getSpecs($prodotto["descrizione"]);
                foreach ($dictonary as $key => $value):?>
                <tr>
                    <th><p><?php echo $key;?></p></th>
                    <td><p><?php echo $value;?></p></td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>

    </section>
