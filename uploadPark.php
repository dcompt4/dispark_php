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

    $sql = "SELECT * FROM users ";
    $query = $db->prepare($sql);
    $query->execute(array());
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $query->fetchAll();
    $results["users"] = $rows;


    echo json_encode($results);

}
if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $sql = "INSERT INTO parks(parkName, parkAddress, parkBio, pavilions, tennis, baseball, soccer, basketball, parkImage, createdBy, modifiedBy, modifiedType)
                                    values (:parkName, :parkAddress, :parkBio, :pavilions, :tennis, :baseball, :soccer, :basketball, :parkImage, :createdBy, :modifiedBy, 'Add')";
    $query = $db->prepare($sql);
    $query->execute(array(":parkName" => $data->park-> parkName,
        ":parkAddress" => $data->park-> parkAddress,
        ":parkBio" => $data->park-> parkBio,
        ":pavilions" => $data->park-> pavilions,
        ":tennis" => $data->park-> tennis,
        ":baseball" => $data->park-> baseball,
        ":soccer" => $data->park-> soccer,
        ":basketball" => $data->park-> basketball,
        ":parkImage" => $data->park-> parkImage,
        ":createdBy" => $data->park-> createdBy,
        ":modifiedBy" => $data->park-> modifiedBy
    ));

    $lastID = $db->lastInsertId();
    $results['parkID'] = $lastID;
    echo json_encode($results);




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
