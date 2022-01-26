<section>
       <h1 class="nomeProdotti">INSERISCI I DATI DI SPEDIZIONE E DELLA CARTA DI CREDITO O CARTA PREPAGATA</h1>
</section>
<section class="pagamento">
<h1 class="nomeProdotti">INSERISCI I DATI</h1>    
    <form action="pagamento.php" method="POST" name="pagamento"> 
        <div class="row">
            <div class="col">
                <p>indirizzo di spedizione</p>
                <label for="nome">Nome:</label>
                <input required type="text" id="nome" name="nome"/>
                <label for="cognome">Cognome:</label>
                <input required type="text" id="cognome" name="cognome"/>
                <label for="indirizzo">Indirizzo:</label>
                <input required type="text" id="indirizzo" name="indirizzo" value="Via Cesare Pavese, 50"/>
                <p>spedizione in: ITALIA</p>
                <label for="città">Città:</label>
                <input required type="text" id="città" name="città"  value="Cesena"/>
                <label for="provincia">Provincia:</label>
                <input required type="text" id="provincia" name="provincia"  value="FC"/>
                <label for="cap">CAP:</label>
                <input required id="cap" type="tel" pattern="[0-9]{5}" maxlength="5" placeholder="xxxxx" value="47521" name="cap"/>
            </div>
            <div class="col">
                <p>carta di credito o prepagata</p>
                <label for="nomeCarta">intestatario della carta:</label>
                <input required type="text" id="nomeCarta" name="nomeCarta"/>
                <label for="numeroCarta">Numero carta:</label>
                <input required id="numeroCarta" type="tel"pattern="[0-9\s]{19}" maxlength="19" placeholder="xxxx xxxx xxxx xxxx"/>
                <label for="scadenza">Scadenza:</label>
                <input required type="date" id="scadenza" name="scadenza"/>
                <label for="CYV">CYV:</label>
                <input required id="CYV" type="tel"  pattern="[0-9]{3}" maxlength="3" placeholder="xxx"/>
                <input type="submit" name="submit"/>
            </div>
        </div>
    </form>    
</section>