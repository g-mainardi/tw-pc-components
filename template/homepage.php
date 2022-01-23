        <script src="./script/slider.js"></script>
        <div class="slider">
            <div class="slideshow-container">
            <?php foreach ($SetParameters["prodottiRandom"] as $prodotti): ?>
                <div class="mySlides fade">
                    <a href="prodotto.php?id=<?php echo $prodotti["ID_Articolo"];?>">
                        <img src="immagini/<?php echo $prodotti["img"];?>" style="width:100%" />
                    </a>
                </div>
            <?php endforeach; ?>
                <a class="prev">&#10094;</a>
                <a class="next">&#10095;</a>
                    
            </div>

            <br>
            
            <div style="text-align:center">
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
            </div>
        </div>

        <section class="Section1">
            <h1>Benvenuto<?php if(isset($setParameters["nome"])) {echo " ".$SetParameters["nome"];} ?>, ecco i nostri prodotti</h1>
            <h2>scegli la componentistica che più si addice al tuo computer!</h2>
        </section>    
        
        <section>    
            <div class="container">
            <a href="categorie.php?categoria=Motherboard"><img src="immagini/motherboard.jpg" alt=""></a>
            </div>
            <h2>SCHEDE MADRI</h2>
            <p>scegli tra la vasta gamma di schede madri quella che fa al caso tuo</p>
            <a class="link1" href="categorie.php?categoria=Motherboard">Scopri di più...</a> 
        </section>
        
        <section>    
            <div class="container">
            <a href="categorie.php?categoria=GPU"><img src="immagini/gpu.jpg" alt=""></a>
            </div>
            <h2>SCHEDE VIDEO</h2>
            <p>scegli tra la vasta gamma di schede madri quella che fa al caso tuo</p>
            <a class="link1" href="categorie.php?categoria=GPU">Scopri di più...</a> 
        </section>
        
        <section>    
            <div class="container">
                <a href="categorie.php?categoria=CPU"><img src="immagini/cpu.jpg" alt=""></a>
            </div>
            <h2>PROCESSORI</h2>
            <p>scegli tra la vasta gamma di schede madri quella che fa al caso tuo</p>
            <a class="link1" href="categorie.php?categoria=CPU">Scopri di più...</a> 
        </section>
        
        <section>    
            <div class="container">
                <a href="categorie.php?categoria=PSU"><img src="immagini/PSU.jpg" alt=""></a>
            </div>
            <h2>ALIMENTATORI</h2>
            <p>scegli tra la vasta gamma di schede madri quella che fa al caso tuo</p>
            <a class="link1" href="categorie.php?categoria=PSU">Scopri di più...</a> 
        </section>
        
        <section>    
            <div class="container">
                <a href="categorie.php?categoria=RAM"><img src="immagini/RAM.jpg" alt=""></a>
            </div>
            <h2>RAM</h2>
            <p>scegli tra la vasta gamma di schede madri quella che fa al caso tuo</p>
            <a class="link1" href="categorie.php?categoria=RAM">Scopri di più...</a> 
        </section>

        <section>    
            <div class="container">
                <a href="categorie.php?categoria=Case"><img src="immagini/case.jpg" alt=""></a>
            </div>
            <h2>CASE</h2>
            <p>scegli tra la vasta gamma di schede madri quella che fa al caso tuo</p>
            <a class="link1" href="categorie.php?categoria=Case">Scopri di più...</a> 
        </section>

        <section>    
            <div class="container">
                <a href="categorie.php?categoria=cooler"><img src="immagini/raffreddamento.jpg" alt=""></a>
            </div>
            <h2>DISSIPATORI</h2>
            <p>scegli tra la vasta gamma di schede madri quella che fa al caso tuo</p>
            <a class="link1" href="categorie.php?categoria=cooler">Scopri di più...</a> 
        </section>