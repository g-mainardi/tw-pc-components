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

    <?php if(isset($SetParameters["scripts"])):
        foreach($SetParameters["scripts"] as $script):?>

        <script src="<?php echo $script; ?>"></script>
    <?php endforeach;
    endif;?>

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
            <?php if(isset($SetParameters["logged"]) && $SetParameters["logged"]) :?>

            <li>
                <a href="notifiche.php">
                    <?php
                    if(count($SetParameters["notifichenonlette"]) > 0) {
                        echo '<div class="text-box">
                        <p>'.count($SetParameters["notifichenonlette"]).'</p>
                    </div>';
                    }
                    ?>

                    <img src="immagini/notifiche.png" alt="" />
                </a>
            </li>
            <?php endif;?>
            <?php if(isset($SetParameters["logged"]) && $SetParameters["logged"] && $SetParameters["Tipo"]!="venditore") :?>

            <li>
                <a href="carrello.php">
                    <?php 
                    if(count($SetParameters["cart"]) > 0) {
                        echo '<div class="text-box">
                        <p>'.count($SetParameters["cart"]).'</p>
                    </div>';
                    }
                    ?>
                    
                    <img src="immagini/carrello.png" alt="" />
                </a>
            </li>
            <?php endif;?> 
        </ul>
    </header>

    <nav class="menu">
        <ul>
            <?php if(isset($SetParameters["logged"]) && $SetParameters["logged"]): ?>
                <?php if($SetParameters["Tipo"] == "venditore"): ?>

                <li><a href="gestione.php">GESTIONE PRODOTTI</a></li>
                <?php else: ?>

                <li><a href="carrello.php">CARRELLO</a></li>
                <?php endif; ?>

                <li><a href="notifiche.php">NOTIFICHE</a></li>
                <li><a href="logout.php">ESCI</a></li>
            <?php else: ?>

                <li><a href="login.php">ACCEDI</a></li>
                <li><a href="register.php">REGISTRATI</a></li>
            <?php endif; ?>

        </ul>
    </nav>
    <?php if(!isset($SetParameters["logged"]) || (!$SetParameters["logged"]) || ($SetParameters["Tipo"] != "venditore")): ?>

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
    <?php endif; ?>

    <main>
        <?php
            require($SetParameters["file"]);
        ?>
    </main>

    <footer>
        <?php if(!isset($SetParameters["logged"]) || (!$SetParameters["logged"]) || ($SetParameters["Tipo"] != "venditore")): ?>
        
        <p class="categorieFooter">CATEGORIE:</p>
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
        <?php endif; ?>

        <p>Progetto Tecnologie Web - A.A. 2021/2022</p>
        <p>Giacomo Magrini, Giosuè Mainardi, Luigi Incarnato</p>

    </footer>

</body>

</html>