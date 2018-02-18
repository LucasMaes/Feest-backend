<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once 'database.php';
include_once 'artistssongs.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$artistssongs = new ArtistsSongs($db);

// query products
$stmt = $artistssongs->read();
$num = pg_num_rows($stmt);

// check if more than 0 record found
if($num>0){

    // products array
    $artists_arr=array();
    $artists_arr["records"]=array();

    while ($row = pg_fetch_row($stmt)) {

        $artist_item = array(
          "id" => $row[0],
          "artist" => $row[1],
          "song" => $row[2]
        );
        array_push($artists_arr["records"], $artist_item);
    }

    echo json_encode($artists_arr);
}

else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>
