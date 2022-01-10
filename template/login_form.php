<div class="login">
            <form action="#" method="POST">
                <h2>LOGIN</h2>
                <ul>
                    <li>
                      <?php if(isset($SetParameters["risultatologin"])):?><p><?php echo $SetParameters["risultatologin"]; ?></p><?php endif; ?>
                    </li>
                    <li>
                        <label for="username">E-mail:</label><input class="field" type="text" id="username" name="username" placeholder="e-mail" />
                    </li>
                    <li>
                        <label for="password">Password:</label><input class="field" type="password" id="password" name="password" placeholder="password" />
                    </li>
                    <li class="loginButton">
                        <input type="submit" name="submit" value="LOG-IN" />
                    </li>
                    <li><p>---------------oppure Registrati--------------</p></li>
                    <li><a class="vaiPagina" href="register.php">Vai alla Registrazione</a></li>
                </ul>
            </form>
</div>