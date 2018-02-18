<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once 'database.php';

// instantiate product object
include_once 'artistssongs.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$artistssongs = new ArtistsSongs($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set product property values
$artistssongs->artist = htmlspecialchars(strip_tags($data->artist));
$artistssongs->song = htmlspecialchars(strip_tags($data->song));

// create the product
if($artistssongs->create()){
    echo '{';
        echo '"message": "ArtistsSongs was created."';
    echo '}';
}

// if unable to create the product, tell the user
else{
    echo '{ ';
        echo '"message": "Unable to create artistssongs."';
    echo '}';
}
?>
