<?php
class User {

    // database connection and table name
    private $conn;
    private $table_name = "guests";

    // object properties
    public $id;
    public $name;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create product
    function create() {

      // query to insert record
      //$query = "INSERT INTO ArtistsSongs (artists, songs) VALUES (' $this->artist', '$this->song')";
      // prepare query
      $prepare = pg_prepare($this->conn, "", "INSERT INTO guests (name, datetimelogin) VALUES ( $1,$2 )");
      //$stmt = pg_query($this->conn, $query);
      $stmt = pg_execute($this->conn,"",array($this->name,date("Y-m-d h:i:sa")));
      // execute query
      if($stmt){
          return true;
      }

    return false;

    }
}
?>
