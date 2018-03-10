<?php
class Tent {

    // database connection and table name
    private $conn;
    private $table_name = "tents";

    // object properties
    public $id;
    public $person;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create product
    function create() {

      // query to insert record
      //$query = "INSERT INTO ArtistsSongs (artists, songs) VALUES (' $this->artist', '$this->song')";
      // prepare query
      $prepare = pg_prepare($this->conn, "", "INSERT INTO Tents (person) VALUES ( $1 )");
      //$stmt = pg_query($this->conn, $query);
      $stmt = pg_execute($this->conn,"",array($this->person));
      // execute query
      if($stmt){
          return true;
      }

    return false;

    }
}
?>
