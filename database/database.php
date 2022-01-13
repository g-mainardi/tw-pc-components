<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

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

    public function getType($categoria){
        $stmt = $this->db->prepare("SELECT DISTINCT articolo.tipologia 
                                    FROM articolo, categoria
                                    WHERE categoria.nome = ? 
                                    categoria.ID_Categoria = articolo.categoria");

        $stmt->bind_param('s', $categoria);
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

    public function getUtenti(){
        $stmt = $this->db->prepare("SELECT * FROM utente");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProdottiRandom(){
        $query = ("SELECT nome FROM articolo ORDER BY RAND() LIMIT 5");
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getQuantitaProdotti($id){
        $stmt = $this->db->prepare("SELECT DISTINCT COUNT(*) FROM articolo WHERE quantità <= 6 AND ID_Articolo = ?");
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

    public function getAllNotifications($idutente) {
        $query = "SELECT ID_Notifica, ordine, titolo, descrizione, visualizzato
                  FROM notifica
                  WHERE utente=?";

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
        $query = "SELECT ID_Notifica, ordine, titolo, descrizione, visualizzato
                  FROM notifica
                  WHERE utente=? AND visualizzato=0";

        $stmt = $this->db->prepare($query);

        if(!$stmt){
            echo "NON VA BENE LA QUERY";
        }

        $stmt->bind_param('i', $idutente);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCartProducts($idutente) {
        $query = "SELECT carrello.ID_Carrello, carrello.ID_Articolo, carrello.quantità, articolo.nome, articolo.descrizione, articolo.img, articolo.prezzo, articolo.marca
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
    /*

        ESEMPI

    public function getRandomPosts($n){
        $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAuthors(){
        $query = "SELECT username, nome, GROUP_CONCAT(DISTINCT nomecategoria) as argomenti FROM categoria, articolo, autore, articolo_ha_categoria WHERE idarticolo=articolo AND categoria=idcategoria AND autore=idautore AND attivo=1 GROUP BY username, nome";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    */


}
?>