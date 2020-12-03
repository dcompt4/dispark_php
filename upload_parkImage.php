<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Access-Control-Allow-Headers, Origin, Accept, X-Requested-With, Content-Type, Access-Control-Request-Method,x-http-method-override, Access-Control-Request-Headers");


require('config.php');
$db = new PDO($host, $dbUser, $dbPass);


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $target_dir = "uploads/park_images/";
    $target_fileName =  time() . '_' . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $target_fileName;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $results['success'] = "success";
        $results['filepath'] = $target_fileName;
        $results['filename'] = $_FILES["fileToUpload"]["name"];
        echo json_encode($results);
    } else {
        echo "error";
    }




}
