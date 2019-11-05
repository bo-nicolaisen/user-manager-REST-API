<?php
// acces control
header('Acces-Control_Allow-Origin: *');
header('Content-Type: application/json');

require "../model/apifunctions.php";


switch ($_SERVER['REQUEST_METHOD']) {

  case 'GET':
  if(isset($_GET['id'])){
    readSIngleUser();
  }
  else{
    readAllUsers();
  }


  break;


  case 'POST':


  $myBody=file_get_contents('php://input');

  if($myBody){

    // validate json format
    $jsonError=jsonValidate($myBody);


    if ($jsonError === 0) {
      // JSON is valid
      createUser();
    }
    else{
      echo json_encode(['message'=>$jsonError]);

    }

  }
  else
  {
    echo json_encode(['message'=>'Unknown data error']);
  }

  break;


  case 'UPDATE':
  $myBody=file_get_contents('php://input');

  if($myBody){

    // validate json format
    $jsonError=jsonValidate($myBody);


    if ($jsonError === 0) {
      // JSON is valid
      updateUser();
    }
    else{
      echo json_encode(['message'=>$jsonError]);

    }

  }
  else
  {
    echo json_encode(['message'=>'Unknown data error']);
  }

  break;
  case 'DELETE':
  echo json_encode(['response'=>'DELETE method']);
  var_dump(getallheaders());
  break;

  default:
  // invalid req method
  header("HTTP/1.0 405 Method Not Allowed");
  break;
}


?>
