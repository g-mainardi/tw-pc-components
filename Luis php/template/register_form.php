<div class="login">
            <form action="#" method="POST">
                <h2>REGISTER</h2>                
                <ul>
                    <li>
                        <?php if(isset($SetParameters["risultatoregister"])):?>
                            <p><?php echo $SetParameters["risultatoregister"]; ?></p>
                        <?php endif; ?>
                    </li>
                    <li>
                        <?php if(isset($SetParameters["nome"])):?>
                            <label for="nome">Nome:</label>
                            <input class="field" type="text" id="nome" name="nome" placeholder="nome" required value="<?php echo $SetParameters["nome"]?>"/>
                        <?php else:?>
                            <label for="nome">Nome:</label>
                            <input class="field" type="text" id="nome" name="nome" placeholder="nome" required/>
                        <?php endif; ?>
                    </li>
                    <li>
                        <?php if(isset($SetParameters["username"])):?>
                            <label for="username" class="error">E-mail:</label>
                            <input class="field error" type="text" id="username" name="username" placeholder="e-mail" required value="<?php echo $SetParameters["username"]?>"/>
                            <p class="error"><?php echo $msg; ?></p>
                        <?php else:?>
                            <label for="username">E-mail:</label>
                            <input class="field" type="text" id="username" name="username" placeholder="e-mail" required/>
                        <?php endif; ?>
                    </li>
                    <li>
                        <label for="password">Password(minimo 4 caratteri):</label>
                        <input class="field" type="password" id="password" name="password" placeholder="password"  minlength="4" required/>
                    </li>
                    <li class="registerButton">
                        <input type="submit" name="submit" value="REGISTER" />
                    </li>
                    <li><p>---------------or login--------------</p></li>
                    <li><a class="vadoLogin" href="login.php">LOGIN</a></li>
                </ul>
            </form>
</div>

