<section class="notifiche">
    <h2>Le tue notifiche</h2>

    <?php if(isset($SetParameters["notifiche"]) && count($SetParameters["notifiche"]) > 0) :?>

    <ul>
        <?php foreach($SetParameters["notifiche"] as $notifica):?>

        <li> 
            <button class="bottoneNotifica <?php if($notifica['visualizzato']) {echo 'visualizzato';} ?>" >
                <?php echo $notifica["titolo"]; ?>
            </button>
            <?php if(!$notifica['visualizzato']) {echo '<img src="immagini/exclamation-mark.png" alt="">';} ?>
            <div>
                <p><?php echo $notifica["descrizione"]; ?></p>
                <footer>
                    <button class="bottoneTabella" onclick = "location.href = 'notifiche.php?notifica=<?php echo $notifica['ID_Notifica']; ?>&action=1'" >ELIMINA</button>
                </footer>
            </div>     
        </li>

        <?php endforeach;?>
    </ul>

    <?php else: ?>
        <p>Non ci sono notifiche al momento.</p>
    <?php endif; ?>

</section>