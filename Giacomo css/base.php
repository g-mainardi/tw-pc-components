<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8"/><meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HomePage</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="progetto.js" type="text/javascript"></script>
</head>

<body>
    <header>
        
        <ul>
            <li>
                <button class="bottoneMenu"><img src="immagini/menu-logo.png" alt=""></button>
            </li>
            <li>
                <a href="template.php"><img src="immagini/Razer-Logo.png" alt=""></a>          
            </li>
            <li>
                <a href="#"><img src="immagini/carelllo.png" alt=""></a>
            </li>            
        </ul>
      
    </header>
<nav class="menu">
        
        <ul>
            <li><a href="login.php">ACCEDI</a></li>
            <li><a href="register.php">REGISTRATI</a></li>
            <li><a href="">CARRELLO</a></li>
            <li><a href="">ORDINI</a></li>
            <li><a href="">ESCI</a></li>
        </ul>
    
</nav>

    
    <div class="barra">
        <ul>
            <li><a href="categorie.php?categoria=Motherboard">Motherboard</a></li>
            <li><a href="categorie.php?categoria=GPU">GPU</a></li>
            <li><a href="categorie.php?categoria=CPU">CPU</a></li>
            <li><a href="categorie.php?categoria=PSU">Alimentatori</a></li>
            <li><a href="categorie.php?categoria=RAM">RAM</a></li>
            <li><a href="categorie.php?categoria=Case">Case</a></li>
        </ul>
    </div>

    <main>
    <?php
        require($SetParameters["file"]);
    ?>
    </main>

    <section class="slider">
    <div class="slideshow-container">

        <div class="mySlides fade">
          <img src="immagini/case2.jpg" style="width:100%">
        </div>
        
        <div class="mySlides fade">
          <img src="immagini/cpu2.jpg" style="width:100%">
        </div>
        
        <div class="mySlides fade">
          <img src="immagini/gpu2.jpg" style="width:100%">
        </div>
        
        <a class="prev">&#10094;</a>
        <a class="next">&#10095;</a>
        
        </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot"></span> 
          <span class="dot"></span> 
          <span class="dot"></span> 
        </div>
    </section>

    <footer>
    <p>CATEGORIE:</p>
    <ul>
        <li><a href="categorie.php?categoria=Motherboard">Motherboard</a></li>
        <li><a href="categorie.php?categoria=GPU">GPU</a></li>
        <li><a href="categorie.php?categoria=CPU">CPU</a></li>
    </ul>
    <ul>
        <li><a href="categorie.php?categoria=PSU">Alimentatori</a></li>
        <li><a href="categorie.php?categoria=RAM">RAM</a></li>
        <li><a href="categorie.php?categoria=Case">Case</a></li>
    </ul>
    <p>Progetto Tecnologie Web - A.A. 2021/2022</p>
    <p>Giacomo Magrini, Giosuè Mainardi,Luigi Incarnato</p>

</footer>


</body>
</html>