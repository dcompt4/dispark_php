<?php
header('Access-Control-Allow-Origin: *');
//header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
//header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Origin, Origin, Accept, X-Requested-With, Content-Type, Access-Control-Request-Method,x-http-method-override, Access-Control-Request-Headers");

require('config.php');
$db = new PDO($host, $dbUser, $dbPass);

$data = json_decode(file_get_contents('php://input'));
if ($_SERVER['REQUEST_METHOD'] == "GET"){

   /* $sql = "SELECT * FROM weeks ";
    $query = $db->prepare($sql);
    $query->execute(array());
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $query->fetchAll();
    $results["week"] = $rows;


    echo json_encode($results);*/

}
if ($_SERVER['REQUEST_METHOD'] == "POST"){





 // $sql = "INSERT INTO tasks (title) values (:title)";
  //$query = $db->prepare($sql);
 // $query->execute(array(":title"=>$data->title));
  //$result['id'] = $db->lastInsertId();
 // echo json_encode($result);
}
if ($_SERVER['REQUEST_METHOD'] == "PUT"){
  /*$sql = "UPDATE application_info SET active = :active WHERE appID = :appID";
  $query = $db->prepare($sql);
  if($query->execute(array(":active"=>$data->active, ":appID"=>$data->appID))){
    $result['id'] = $db->lastInsertId();
    echo json_encode($result);
  }else{
    echo 'error';
  }*/

}

if ($_SERVER['REQUEST_METHOD'] == "DELETE"){

}

$db = null;
?>
