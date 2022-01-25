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
                <button class="bottoneMenu"><img src="immagini/menu-logo.png" alt="" /></button>
            </li>

            <li>
                <a href="index.php"><img src="immagini/Razer-Logo.png" alt="" /></a>          
            </li>
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

    <div class='barra <?php if(($SetParameters["logged"]) && ($SetParameters["Tipo"] == "venditore")){echo "nascondi";} ?>'>
        <ul>

            <?php foreach($SetParameters["categorie"] as $categoria) :?>

            <li><a href="categorie.php?categoria=<?php echo $categoria["nome"];?>"><?php echo $categoria["nome_esposizione"];?></a></li>  
            <?php endforeach;?>
            
        </ul>
    </div>

    <main>
        <?php
            if(isset($SetParameters["file"])){
                require($SetParameters["file"]);
            }
        ?>
    </main>

    <footer>
        <?php if(!isset($SetParameters["logged"]) || (!$SetParameters["logged"]) || ($SetParameters["Tipo"] != "venditore")): ?>
        
        <p class="categorieFooter">CATEGORIE:</p>
        <table class="tabellaFooter">
            <?php 
            $row_number = count($SetParameters["categorie"]) / 3;
            if(is_float($row_number)){
                $row_number = floor($row_number) + 1;
            } 

            $righe = "";
            for($row = 0; $row < $row_number; $row++){
                $righe .= "<tr>";
                for($i = ($row * 3); $i < count($SetParameters["categorie"]) && $i < (($row + 1) * 3); $i++){
                    $categoria = $SetParameters["categorie"][$i];
                    $righe .= "<th><a href='categorie.php?categoria=".$categoria["nome"]."'>".$categoria["nome_esposizione"]."</a></th>";
                }
                $righe .= "</tr>";
            }
            echo $righe;
            ?>

        </table>
        <?php endif; ?>

        <p>Progetto Tecnologie Web - A.A. 2021/2022</p>
        <p>Giacomo Magrini, Giosuè Mainardi, Luigi Incarnato</p>

    </footer>

</body>

</html>