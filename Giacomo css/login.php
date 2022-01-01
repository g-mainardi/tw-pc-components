<?php
require_once '../Luis php/required.php';

if(isset($_POST["username"]) && isset($_POST["password"])) {
    
    // Controllo se c'è su db
    $risultatologin = $dbh->checkLogin($_POST["username"], $_POST["password"]);

    if(count($risultatologin)==0) {
        $SetParameters["risultatologin"] = "Errore: username o password errati";
    } else {
        $SetParameters["risultatologin"] = "Login riuscito!";
        setLoggedUser($risultatologin[0]);
    }

}

if(isLoggedIn()){
    setParametersByType();
} else {
    $SetParameters["titolo"] = "Login";
    $SetParameters["file"] = "login_form.php";
}
    
require("base.php");

?>



<!-- PARTE HTML

<html lang="it">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
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
                <a href="index.html"><img src="immagini/Razer-Logo.png" alt=""></a>          
            </li>
            <li>
                <a href="#"><img src="immagini/carelllo.png" alt=""></a>
            </li>

            
        </ul>
      
    </header>
<nav class="menu">
        
        <ul>
            <li><a href="login.php">ACCEDI</a></li>
            <li><a href="register.html">REGISTRATI</a></li>
            <li><a href="">CARRELLO</a></li>
            <li><a href="">ORDINI</a></li>
            <li><a href="">ESCI</a></li>
        </ul>
    
</nav>
    <div class="barra">
        <ul>
            <li><a href="">Motherboard</a></li>
            <li><a href="GPU.html">GPU</a></li>
            <li><a href="">CPU</a></li>
            <li><a href="">Alimentatori</a></li>
            <li><a href="">RAM</a></li>
            <li><a href="">Case</a></li>
        </ul>
    </div>


    <main>
        <div class="login">
            <form action="#" method="POST">
                <h2>LOGIN</h2>                

                <?php 
                // PARTE AGGIUNTA PER PROVA
                //if(isset($SetParameters["risultatologin"])): 
                ?>
                    <p><?php //echo $SetParameters["errorelogin"]; ?></p>
                <?php 
                //endif; 
                // Fine parte per prova
                ?>    


                <ul>
                    <li>
                        <input type="text" id="username" name="username" placeholder="user id" />
                    </li>
                    <li>
                        <input type="password" id="password" name="password" placeholder="password" />
                    </li>
                    <li class="loginButton">
                        <input type="submit" name="submit" value="LOG-IN" />
                    </li>
                    <li><p>---------------or register--------------</p></li>
                    <li><a class="vadoRegister" href="register.html">REGISTER</a></li>
                </ul>
            </form>
        </div>


        

</main>

<footer>
    <p>CATEGORIE:</p>
    <ul>
        <li><a href="">Motherboard</a></li>
        <li><a href="GPU.html">GPU</a></li>
        <li><a href="">CPU</a></li>
    </ul>
    <ul>
        <li><a href="">Alimentatori</a></li>
        <li><a href="">RAM</a></li>
        <li><a href="">Case</a></li>
    </ul>
    <p>Progetto Tecnologie Web - A.A. 2021/2022</p>
    <p>Giacomo Magrini, Giosuè Mainardi,Luigi Incarnato</p>

</footer>




</body>
</html> -->