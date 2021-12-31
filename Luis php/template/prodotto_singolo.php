<?php $prodotto = $SetParameters["prodotto"][0]; ?>   
    <section class="prodottoSingolo" >    
        <div class="container">
        <img src="immaginiGPU/3080.jpg" alt="">
         </div>
        <h1><?php echo $prodotto["marca"]." ".$prodotto["nome"]; ?></h1>
        <h2>1300 $</h2>
        <form class="selezioaQuantità"> 
            <label>QTY<br/>
            <select name="quantità">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            </select></label>
            </form>
        <button class="bottoneTabella">AGGIUNGI AL CARRELLO</button>
        <p><?php echo $prodotto["anteprima"]; ?></p>
        <button class="mostra">Espandi/Riduci</button>
        <table class="tabella">
            <tr>
                <th><p>Marca</p></th>
                <td><p>Gigabyte</p></td>
            </tr>
            <tr>
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
            </tr>
        </table>


    </section>
