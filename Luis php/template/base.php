<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $SetParameters["titolo"]?></title>
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
                <a href="index.php"><img src="immagini/Razer-Logo.png" alt=""></a>          
            </li>
            <li>
                <a href="#"><img src="immagini/carrello.png" alt=""></a>
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
            <li><a href="#">Dissipatori</a></li>
        </ul>
    </div>

    <main>
        <?php
            require($SetParameters["file"]);
        ?>
    </main>

    <footer>
        <p>CATEGORIE:</p>
        <table class="tabellaFooter">
            <tr>
                <th><a href="categorie.php?categoria=Motherboard">Motherboard</a></th> 
                <th><a href="categorie.php?categoria=GPU">GPU</a></th>
                <th><a href="categorie.php?categoria=CPU">CPU</a></th>
            </tr>
            <tr>
                <th><a href="categorie.php?categoria=PSU">Alimentatori</a></th>
                <th><a href="categorie.php?categoria=RAM">RAM</a></th>
                <th><a href="categorie.php?categoria=case">Case</a></th>
            </tr>
            <tr>
                <th></th>
                <th><a class href="#">Dissipatori</a></th>
            </tr>
        </table>
        <p>Progetto Tecnologie Web - A.A. 2021/2022</p>
        <p>Giacomo Magrini, Giosuè Mainardi, Luigi Incarnato</p>
    </footer>

</body>

</html>