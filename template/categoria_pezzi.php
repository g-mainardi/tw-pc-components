<script src="./script/categorie.js"></script>
<section class="filtro">
            
<h1>SCEGLI UN FORNITORE</h1>
        <h2>scegli un fornitore per filtrare i prodotti</h2>
        <ul>
        <?php foreach ($SetParameters["venditori"] as $venditore): 
            if(isset($_GET["venditore"]) && $venditore["nome"] == $_GET["venditore"]):?> 
            
                <li>
                <button class="filtroBottoni1 disabilitato" onclick = "location.href = 'categorie.php?categoria=<?php echo $SetParameters['categoria']; ?>&venditore=<?php echo $venditore['nome']; ?>'"><?php echo $venditore["nome"]; ?></button>
                </li>
            <?php else: ?>
                <li>
                <button class="filtroBottoni1" onclick = "location.href = 'categorie.php?categoria=<?php echo $SetParameters['categoria']; ?>&venditore=<?php echo $venditore['nome']; ?>'"><?php echo $venditore["nome"]; ?></button>
                </li>
            <?php endif; ?>
           
            
        <?php endforeach;?>
        </ul>



        <?php   if(isset($SetParameters["tipologia"])):
                    echo "<h2>altri filtri</h2>";
                    echo "<ul>";
                    foreach ($SetParameters["tipologia"] as $tipologia): 
                    if(isset($_GET["tipologia"]) && $tipologia["tipologia"] == $_GET["tipologia"]):?> 
                        
                            <li>
                            <button class="filtroBottoni2 disabilitato" onclick = "location.href = 'categorie.php?categoria=<?php echo $SetParameters['categoria']; ?>&tipologia=<?php echo $tipologia['tipologia']; ?>'"><?php echo $tipologia["tipologia"]; ?></button>
                            </li>

                    <?php else: ?>

                            <li>
                            <button class="filtroBottoni2" onclick = "location.href = 'categorie.php?categoria=<?php echo $SetParameters['categoria']; ?>&tipologia=<?php echo $tipologia['tipologia']; ?>'"><?php echo $tipologia["tipologia"]; ?></button>
                            </li>

                    <?php endif; ?>

                       
        <?php       endforeach;
        echo "</ul>";
                endif; 
        ?>

    </section>   

    <?php foreach($SetParameters["prodotti"] as $prodotto): ?> 
    <section>
        <div class="container">
        <img src="immagini/gpu.jpg" alt="">
        <table class="tabellaCategorie">
            <tr>
                <th><h2 class="testoTabella"><?php echo $prodotto["marca"]." ".$prodotto["nome"]; ?></h2></th>
                <th><h2 class="testoTabella"><?php echo $prodotto["prezzo"]; ?> €</h2></th>
            </tr>
            <tr>
                <td><a class="link1" href="prodotto.php?id=<?php echo $prodotto['ID_Articolo'];?>">Dettagli...</a></td>    
                <td><form action="#" method="POST">
                    <input type="hidden" name="ID_Articolo" value="<?php echo $prodotto["ID_Articolo"];?>" />
                    <button class="bottoneTabella" type="submit" name="submit">AGGIUNGI AL CARRELLO</button>
                </form></td>
            </tr>
        </table>
    </div>
    </section>
    <?php endforeach; ?>