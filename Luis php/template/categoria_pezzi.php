<section class="filtro">
            
        <h1>SCEGLI UN FORNITORE</h1>
        <h2>scegli un fornitore per filtrare i prodotti</h2>
        <button onclick = "location.href = 'categorie.php?categoria=<?php echo $SetParameters['categoria']; ?>&venditore=MSI'">MSI</button>
        <button onclick = "location.href = 'categorie.php?categoria=<?php echo $SetParameters['categoria']; ?>&venditore=Asus'">ASUS</button>
        <button onclick = "location.href = 'categorie.php?categoria=<?php echo $SetParameters['categoria']; ?>&venditore=ASRock'">ASROCK</button>
        <button onclick = "location.href = 'categorie.php?categoria=<?php echo $SetParameters['categoria']; ?>&venditore=Gigabyte'">GIGABYTE</button>

    </section>   

    <?php foreach($SetParameters["prodotti"] as $prodotto): ?> 
    <section>
        <div class="container">
        <img src="immagini/gpu.jpg" alt="">
        <table class="tebellaCategorie">
            <tr>
                <th><h2 class="testoTabella"><?php echo $prodotto["nome"]; ?></h2></th>
                <th><h2 class="testoTabella"><?php echo $prodotto["prezzo"]; ?></h2></th>
            </tr>
            <tr>
                <td><a class="link1" href="prodotto.php?id=<?php echo $prodotto['ID_Articolo']?>">Dettagli...</a></td>
                <td><button class="bottoneTabella">AGGIUNGI AL CARRELLO</button></td>
            </tr>
        </table>
    </div>
    </section>
    <?php endforeach; ?>