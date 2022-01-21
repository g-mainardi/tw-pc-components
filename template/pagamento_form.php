<section>
       <h2>inserisci i dati di spedizione e della carta di credito o carta prepagata</h2>
   </section>
<section class="pagamento">
    <form action="pagamento_effettuato.php"> 
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
        <input required id="cap" type="tel" inputmode="numeric" pattern="[0-9]{5}" maxlength="5" placeholder="xxxxx" value="47521">
        </div>
        <div class="col">
        <p>carta di credito o prepagata</p>
        <label for="nomeCarta">intestatario della carta:</label>
        <input required type="text" id="nomeCarta" name="nomeCarta"/>
        <label for="numeroCarta">Numero carta:</label>
        <input required id="numeroCarta" type="tel" inputmode="numeric" pattern="[0-9\s]{19}" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
        <label for="scadenza">Scadenza:</label>
        <input required type="date" id="scadenza" name="scadenza"/>
        <label for="CYV">CYV:</label>
        <input required id="CYV" type="tel" inputmode="numeric" pattern="[0-9]{3}" maxlength="3" placeholder="xxx">
        <input type="submit"/>
        </div>
        </div>
        </form>
        
</section>