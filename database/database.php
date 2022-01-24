<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    //------------------------------------------------------------------

    //PRODOTTI

    public function getProdotti($categoria){
        $stmt = $this->db->prepare("SELECT DISTINCT articolo.* 
                                    FROM articolo, categoria 
                                    WHERE categoria.nome = ? 
                                    AND categoria.ID_Categoria = articolo.categoria");

        $stmt->bind_param('s',$categoria);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //Prodotti per gestione del venditore
    public function getSellerProducts($idvenditore){
        $query = "SELECT articolo.ID_Articolo, articolo.nome, articolo.prezzo, articolo.quantità, articolo.img
                  FROM articolo, utente
                  WHERE articolo.venditore = utente.ID_Utente AND utente.ID_Utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idvenditore);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //Prodotti che vende un certo venditore di una certa categoria
    public function getVenditoreProdotti($categoria, $venditore){
        $stmt = $this->db->prepare("SELECT DISTINCT articolo.* 
                                    FROM articolo, categoria, utente 
                                    WHERE categoria.nome = ? 
                                    AND utente.nome = ? AND categoria.ID_Categoria = articolo.categoria AND utente.ID_Utente = articolo.venditore");

        $stmt->bind_param('ss',$categoria, $venditore);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTypeProducts($tipologia){
        $stmt = $this->db->prepare("SELECT DISTINCT *
                                    FROM articolo
                                    WHERE tipologia = ?");

        $stmt->bind_param('s', $tipologia);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProdotto($id){
        $stmt = $this->db->prepare("SELECT * FROM articolo WHERE ID_Articolo = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function randomProducts(){
        $query = ("SELECT articolo.ID_Articolo, articolo.img FROM articolo ORDER BY RAND() LIMIT 3");
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //------------------------------------------------------------------

    //UTENTE

    public function getUtenti(){
        $stmt = $this->db->prepare("SELECT * FROM utente");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getVenditori($categoria){
        $stmt = $this->db->prepare("SELECT DISTINCT utente.nome 
                                     FROM articolo, utente, categoria
                                     WHERE utente.ID_Utente = articolo.venditore 
                                     AND categoria.nome = ? 
                                     AND categoria.ID_Categoria = articolo.categoria");
        $stmt->bind_param('s', $categoria);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function checkLogin($username,$password){
        $query = "SELECT ID_Utente, nome, username, Tipo FROM utente WHERE username=? AND password=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkExistingUsername($username){
        $query = "SELECT ID_Utente FROM utente WHERE username=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertUser($nome, $username, $password){
        $query = "INSERT INTO utente (nome, username, password, Tipo) VALUES (?, ?, ?, ?)";

        $Tipo = "cliente";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $nome, $username, $password, $Tipo);

        $stmt->execute();
        return $stmt->insert_id;
    }
    //------------------------------------------------------------------

    //NOTIFICHE

    public function getAllNotifications($idutente) {
        $query = "SELECT ID_Notifica, ordine, titolo, descrizione, notifica.stato AS statoNotifica, ordine.stato AS statoOrdine, data
                  FROM notifica, ordine
                  WHERE utente=? AND notifica.ordine = ordine.ID_Ordine
                  ORDER BY notifica.data DESC";

        $stmt = $this->db->prepare($query);

        if(!$stmt){
            echo "NON VA BENE LA QUERY";
        }

        $stmt->bind_param('i', $idutente);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOnlyUnreadNotifications($idutente) {
        $query = "SELECT ID_Notifica, ordine, titolo, descrizione,  notifica.stato AS statoNotifica, ordine.stato AS statoOrdine, data
                  FROM notifica, ordine
                  WHERE utente=? AND (notifica.stato='not read' OR notifica.stato='not read on screen') AND notifica.ordine = ordine.ID_Ordine
                  ORDER BY notifica.data DESC";

        $stmt = $this->db->prepare($query);

        if(!$stmt){
            echo "NON VA BENE LA QUERY";
        }

        $stmt->bind_param('i', $idutente);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOnlyNotReadOnScreenNotifications($idutente) {
        $query = "SELECT ID_Notifica, ordine, titolo, descrizione,  notifica.stato AS statoNotifica, ordine.stato AS statoOrdine, data
                  FROM notifica, ordine
                  WHERE utente=? AND notifica.stato='not read on screen' AND notifica.ordine = ordine.ID_Ordine
                  ORDER BY notifica.data DESC";

        $stmt = $this->db->prepare($query);

        if(!$stmt){
            echo "NON VA BENE LA QUERY";
        }

        $stmt->bind_param('i', $idutente);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Eliminazione di una notifica dal db
    public function deleteNotification($idnotifica){
        $query = "DELETE FROM notifica WHERE ID_Notifica = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idnotifica);
        
        return $stmt->execute();
    }

    /*Cambiamento dello stato di una notifica, richiede l'id della notifica e lo stato in 
    cui si vuole cambiare (una stringa tra le seguenti):
    "read" = letta, 
    "not read" = non letta ma notifica a schermo tolta,
    "not read on screen" = non letta e notifica a schermo*/
    public function changeNotification($idnotifica, $stato){
        $query = "UPDATE notifica SET stato = ? WHERE ID_Notifica = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $stato, $idnotifica);

        return $stmt->execute();
    }

    //Ho fatto un inserimento generalizzato, poi modificabile come meglio credi Giosuè
    //inoltre la data non c'è bisogno di metterla, mette in automatica quella di quando
    //viene inserita la riga nella tabella
    public function insertNotification($idutente, $idordine, $titolo, $descrizione){
        $query = "INSERT INTO `notifica` (`utente`, `ordine`, `titolo`, `descrizione`) 
                    VALUES ( ?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iiss', $idcliente, $idarticolo, $quantità);
    
        $stmt->execute();
        return $stmt->insert_id;
    }
    //------------------------------------------------------------------

    //CARRELLO

    public function getCartProducts($idutente) {
        $query = "SELECT carrello.ID_Carrello, carrello.ID_Articolo, carrello.quantità, articolo.nome, articolo.descrizione, articolo.img, articolo.prezzo, articolo.marca, articolo.quantità AS disponibilità
                  FROM carrello, articolo
                  WHERE articolo.ID_Articolo=carrello.ID_Articolo AND carrello.ID_Cliente=?";
        $stmt = $this->db->prepare($query);
        if(!$stmt){
            echo "NON VA BENE LA QUERY";
        }
        $stmt->bind_param('i', $idutente);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCartProduct($idcliente, $idarticolo) {
        $query = "SELECT carrello.quantità
                  FROM carrello
                  WHERE carrello.ID_Cliente=? AND carrello.ID_Articolo=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $idcliente, $idarticolo);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertProductInCart($idcliente, $idarticolo, $quantità){
        $qty = $this->getCartProduct($idcliente, $idarticolo);
        if(isset($qty[0])){
            $quantità += $qty[0]["quantità"];
            $this->modifyCartArticleQuantity($idcliente, $idarticolo, $quantità);
        } else {
            $query = "INSERT INTO carrello (ID_Cliente, ID_Articolo, quantità) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iii', $idcliente, $idarticolo, $quantità);
    
            $stmt->execute();
            return $stmt->insert_id;
        }
    }

    public function modifyCartArticleQuantity($idcliente, $idarticolo, $qty){
        $query = "UPDATE carrello SET quantità = ? WHERE ID_Cliente = ? AND ID_Articolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $qty, $idcliente, $idarticolo);
        
        return $stmt->execute();
    }

    public function removeCartArticle($idcliente, $idarticolo){
        $query = "DELETE FROM carrello WHERE ID_Cliente = ? AND ID_Articolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $idcliente, $idarticolo);
        $stmt->execute();
        return true;
    }

    // Solo per Venditore
    public function updateProduct($prezzo, $quantita, $id){
        $query = "UPDATE articolo SET prezzo = ?, quantità = ? WHERE ID_Articolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $prezzo, $quantita, $id);

        return $stmt->execute();
    }
    
    //-----------------------------------------------------------------------------------

    //Categoria che appaiono nella homepage
    public function getAllCategories(){
        $query = ("SELECT * FROM categoria");
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //Tipologia di certi prodotti
    public function getType($categoria){
        $stmt = $this->db->prepare("SELECT DISTINCT articolo.tipologia 
                                    FROM articolo, categoria
                                    WHERE categoria.nome = ? 
                                    AND categoria.ID_Categoria = articolo.categoria");

        $stmt->bind_param('s', $categoria);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    //Prende la quantità di un certo prodotto
    public function getQuantitaProdotti($id){
        $stmt = $this->db->prepare("SELECT DISTINCT COUNT(*) FROM articolo WHERE quantità <= 6 AND ID_Articolo = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*Modifica stato dell'ordine
    per lo stato dellordine ci sono
    "loading" = in esecuzione, "shipped" = spedito
    "delivered" = consegnato*/
    public function changeStateOrder($stato, $idordine){
        $query = "UPDATE ordine SET stato = ? WHERE ID_Ordine = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $stato, $idordine);

        return $stmt->execute();
    }


}
?>