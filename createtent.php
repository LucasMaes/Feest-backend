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
include_once 'tents.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$tent = new Tent($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set tent property values
$tent->person = htmlspecialchars(strip_tags($data->person));

// create the product
if($tent->create()){
    echo '{';
        echo '"message": "Tent was created."';
    echo '}';
}

// if unable to create the product, tell the user
else{
    echo '{ ';
        echo '"message": "Unable to create tent."';
    echo '}';
}
?>
