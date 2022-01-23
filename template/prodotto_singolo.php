<?php $prodotto = $SetParameters["prodotto"][0]; ?>   
    <section class="prodottoSingolo" >    
        <div class="container">
        <img src="immagini/<?php echo $prodotto["img"];?>" alt="">
         </div>
        <h1><?php echo $prodotto["marca"]." ".$prodotto["nome"]; ?></h1>
        <h2><?php echo $prodotto["prezzo"]; ?> €</h2>
        <form class="selezionaQuantità" action="#" method="POST">  
            <input type="hidden" name="id" value="<?php echo $prodotto["ID_Articolo"];?>"/>
            <label>QTY<br/>
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
            <!--<tr>
                <th><p>Dimensioni prodotto</p></th>
                <td><p>32 x 12.9 x 5.5 cm; 1.36 Kg</p></td>   
            </tr>
            <tr>
                <th><p>Numero modello articolo</p></th>
                <td><p>GV-N3080GAMING OC-10GD V2</p></td>   
            </tr>
            <tr>
                <th><p>Clock di Memoria</p></th>
                <td><p>19000 MHz</p></td>   
            </tr>
            <tr>
                <th><p>Coprocessore grafico</p></th>
                <td><p>NVIDIA GeForce RTX 3080</p></td>   
            </tr>
            <tr>
                <th><p>Grafica Chipset Brand</p></th>
                <td><p>NVIDIA</p></td>   
            </tr>
            <tr>
                <th><p>Descrizione scheda grafica</p></th>
                <td><p>Dedicated</p></td>   
            </tr>
            <tr>
                <th><p>Tipo memoria scheda grafica</p></th>
                <td><p>GDDR6X</p></td>   
            </tr>
            <tr>
                <th><p>Dimensioni memoria scheda grafica</p></th>
                <td><p>10 GB</p></td>   
            </tr>
            <tr>
                <th><p>Interfaccia scheda grafica</p></th>
                <td><p>PCI-Express x16</p></td>   
            </tr>
            <tr>
                <th><p>Wattaggio</p></th>
                <td><p>750 watt</p></td>   
            </tr>
            <tr>
                <th><p>Peso articolo</p></th>
                <td><p>1,36 Kg</p></td>   
            </tr>-->
        </table>


    </section>
