<section>
       <h2>inserisci i dati di spedizione e della carta di credito o carta prepagata</h2>
   </section>
<section class="pagamento">
    <form> 
        <div>
        <p>contatto</p>
        <label for="email">E-Mail:</label>
        <input required type="email" id="email" name="email" placeholder="example@gmail.com"/>
        <p>indirizzo di spedizione</p>
        <label for="nome">Nome:</label>
        <input required type="text" id="nome" name="nome"/>
        <label for="cognome">Cognome:</label>
        <input required type="text" id="cognome" name="cognome"/>
        <label for="indirizzo">Indirizzo:</label>
        <input required type="text" id="indirizzo" name="indirizzo"/>
        <p>spedizione in: ITALIA</p>
        <label for="città">Città:</label>
        <input required type="text" id="città" name="città"/>
        <label for="provincia">Provincia:</label>
        <input required type="text" id="provincia" name="provincia"/>
        <label for="cap">CAP:</label>
        <input required id="cap" type="tel" inputmode="numeric" pattern="[0-9]{5}" maxlength="5" placeholder="xxxxx">
        <p>carta di credito o prepagata</p>
        <label for="nomeCarta">intestatario della carta:</label>
        <input required type="text" id="nomeCarta" name="nomeCarta"/>
        <label for="numeroCarta">Numero carta:</label>
        <input required id="numeroCarta" type="tel" inputmode="numeric" pattern="[0-9\s]{19}" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
        <label for="scadenza">Scadenza:</label>
        <input required type="date" id="scadenza" name="scadenza"/>
        <label for="CYV">CYV:</label>
        <input required id="CYV" type="tel" inputmode="numeric" pattern="[0-9]{3}" maxlength="3" placeholder="xxx">
        <input type="submit">
    </div>
        </form>
   
</section>