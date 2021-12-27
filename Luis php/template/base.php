<!DOCTYPE html>
<html lang="it">
<head>
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
                <a href="Homepage.html"><img src="immagini/Razer-Logo.png" alt=""></a>          
            </li>
            <li>
                <a href="#"><img src="immagini/carelllo.png" alt=""></a>
            </li>            
        </ul>
      
    </header>
<nav class="menu">
        
        <ul>
            <li><a href="login.html">ACCEDI</a></li>
            <li><a href="register.html">REGISTRATI</a></li>
            <li><a href="">CARRELLO</a></li>
            <li><a href="">ORDINI</a></li>
            <li><a href="">ESCI</a></li>
        </ul>
    
</nav>



    
    
    
    
    <div class="barra">
        <ul>
            <li><a href="motherboard.php">Motherboard</a></li>
            <li><a href="">GPU</a></li>
            <li><a href="">CPU</a></li>
            <li><a href="">Alimentatori</a></li>
            <li><a href="">RAM</a></li>
            <li><a href="">Case</a></li>
        </ul>
    </div>

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
        
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        
        </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
    </section>
        
        <script>
        var slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }
        </script>
  

    <main>
    <?php
        require($SetParameters["file"]);
    ?>
    </main>

<footer>
    <p>Progetto Tecnologie Web - A.A. 2021/2022</p>
    <p>Giacomo Magrini, Giosuè Mainardi,Luigi Incarnato</p>

</footer>




</body>
</html>