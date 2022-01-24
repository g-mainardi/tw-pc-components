<section class="notifiche">
    <h2>Le tue notifiche</h2>

    <?php if(isset($SetParameters["notifiche"]) && count($SetParameters["notifiche"]) > 0) :?>

    <ul>
        <?php foreach($SetParameters["notifiche"] as $notifica):?>

        <li id="<?php echo $notifica["ID_Notifica"]; ?>"> 
            <button id="<?php echo $notifica["ID_Notifica"]; ?>" class="bottoneNotifica <?php if(isRead($notifica['statoNotifica'])) {echo 'visualizzato';} ?>" >
                <?php echo $notifica["titolo"]; ?>
            </button>
            <?php if(!isRead($notifica['statoNotifica']))  {echo '<img src="'.IMG_DIR.'exclamation-mark.png" alt="" />';} ?>
            <div>
                <p><?php echo $notifica["descrizione"]; ?></p>
                <footer>
                    <button class="bottoneTabella eliminaNotifica" id="<?php echo $notifica['ID_Notifica']; ?>" >ELIMINA</button>
                </footer>
            </div>     
        </li>

        <?php endforeach;?>
    </ul>

    <?php else: ?>
        <p>Non ci sono notifiche al momento.</p>
    <?php endif; ?>

</section>