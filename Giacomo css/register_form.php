<div class="login">
            <form action="#" method="POST">
                <h2>REGISTER</h2>                
                <ul>
                    <li>
                      <?php if(isset($SetParameters["risultatoregister"])):?><p><?php echo $SetParameters["risultatoregister"]; ?></p><?php endif; ?>
                    </li>
                    <li>
                        <label for="nome">Nome:</label><input type="text" id="nome" name="nome" placeholder="nome" />
                    </li>
                    <li>
                        <label for="username">E-mail:</label><input type="text" id="username" name="username" placeholder="e-mail" />
                    </li>
                    <li>
                        <label for="password">Password:</label><input type="password" id="password" name="password" placeholder="password" />
                    </li>
                    <li class="registerButton">
                        <input type="submit" name="submit" value="REGISTER" />
                    </li>
                    <li><p>---------------or login--------------</p></li>
                    <li><a class="vadoLogin" href="login.php">LOGIN</a></li>
                </ul>
            </form>
</div>

