        <div class="slider">
            <div class="slideshow-container">
            <?php foreach ($SetParameters["prodottiRandom"] as $prodotti): 
                if($prodotti["quantità"]:?>
                    <div class="mySlides fade">
                        <a href="prodotto.php?id=<?php echo $prodotti["ID_Articolo"];?>">
                            <img src="<?php echo IMG_DIR.$prodotti["img"];?>" alt=""/>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
                <a class="prev">&#10094;</a>
                <a class="next">&#10095;</a>
                    
            </div>

            
            <div class="divDot">
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
            </div>
        </div>

        <section class="Section1">
            <h1>Benvenuto<?php if(isset($setParameters["nome"])) {echo " ".$SetParameters["nome"];} ?>, ecco i nostri prodotti</h1>
            <h2>scegli la componentistica che più si addice al tuo computer!</h2>
        </section>    
        
        <?php foreach($SetParameters["categorie"] as $categoria) :?>

        <section>    
            <div class="container">
                <a href="categorie.php?categoria=<?php echo $categoria["nome"];?>"><img src="<?php echo IMG_DIR.strtolower($categoria["nome"]);?>.png" alt="" /></a>
            </div>
            <h2><?php echo $categoria["nome_esposizione"];?></h2>
            <p><?php echo $categoria["descrizione"];?></p>
            <a class="link1" href="categorie.php?categoria=<?php echo $categoria["nome"];?>">Scopri di più...</a> 
        </section>
        <?php endforeach;?>
