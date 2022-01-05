    

    <p style="color: white"><?php echo $prodotto["nome"]?></p>
    <p style="color: white"><?php echo $prodotto["quantità"]?></p>
    <p style="color: white"><?php echo $prodotto["descrizione"]?></p>
    <p style="color: white"><?php echo $prodotto["prezzo"]?></p>
    <p style="color: white"><?php echo $prodotto["marca"]?></p>

    <section class="carelloSection">
        <ul>
            <li><p>Carrello: 2</p></li>
            <li><p class="totale"></p></li>
            <li><button class="bottoneTabella">CHECKOUT</button></li>
        </ul>
    </section>
  
<?php foreach($SetParameters["cart"] as $prodotto):?> 
    <section class="prodottoEsaurito">    
        <div class="container">
            <img src="immaginiGPU/3080.jpg" alt="">
            <table class="tabellaCategorie">
                <tr>
                    <th><h2 class="testoTabella">RTX 3080</h2></th>
                    <th><h2 class="testoTabella prezzo">1800 $</h2></th>
                </tr>
                <tr>
                    
                    <td><button class="aggiornaQuantità">+</button>
                    <p class="testoTabella">QTY: 1</p>
                    <button class="aggiornaQuantità">-</button></td>
                    <td>
                            <a class="link2" href="#">rimuovi tutto</a>
                        
                </td>
                </tr>
            </table>
        </div>
      
    
       
    </section>
<?php endforeach; ?> 


   <section>
    <div class="container">
        <img src="immaginiGPU/3080.jpg" alt="">
        <table class="tabellaCategorie">
            <tr>
                <th><h2 class="testoTabella">RTX 3080</h2></th>
                <th><h2 class="testoTabella prezzo">1000 $</h2></th>
            </tr>
            <tr>
                <td><button class="aggiornaQuantità">+</button>
                <p class="testoTabella">QTY: 1</p>
                <button class="aggiornaQuantità">-</button></td>
                <td>
                        <a class="link2" href="#">rimuovi tutto</a>
                 </td>
            </tr>
        </table>
    </div>
  

   
</section> -->