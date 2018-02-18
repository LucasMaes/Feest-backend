<?php
class ArtistsSongs {

    // database connection and table name
    private $conn;
    private $table_name = "ArtistsSongs";

    // object properties
    public $id;
    public $artist;
    public $song;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read() {
      // select all query
      $query = "SELECT id, artists, songs FROM ArtistsSongs";

      // execute query
      $stmt = pg_query($this->conn, $query);
      return $stmt;
    }

    // create product
    function create() {

      // query to insert record
      //$query = "INSERT INTO ArtistsSongs (artists, songs) VALUES (' $this->artist', '$this->song')";
      // prepare query
      $prepare = pg_prepare($this->conn, "", "INSERT INTO ArtistsSongs (artists, songs) VALUES ( $1 ,$2)");
      //$stmt = pg_query($this->conn, $query);
      $stmt = pg_execute($this->conn,"",array($this->artist,$this->song));
      // execute query
      if($stmt){
          return true;
      }

    return false;

    }
}
?>
