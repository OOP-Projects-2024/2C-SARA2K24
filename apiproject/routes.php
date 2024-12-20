<?php
require_once "./config/database.php";
require_once "./modules/Get.php";
require_once "./modules/Post.php";
require_once "./modules/Patch.php";
require_once "./modules/Delete.php";
require_once "./modules/Auth.php";
require_once "./modules/Common.php";




$db = new Connection();
$pdo = $db->connect();

$get = new Get($pdo);
$post = new Post($pdo);
$patch = new Patch($pdo);
$auth = new Authentication($pdo);


if(isset($_REQUEST['request'])){
    $request = explode("/", $_REQUEST['request']);
}
else{
    echo "URL does not exist.";
}


switch($_SERVER['REQUEST_METHOD']){

    
    case "GET":
        if($auth->isAuthorized()){
        switch($request[0]){

            case "patient":
                if(count($request) > 1){
                    echo json_encode($get->getPatient($request[1]));
                }
                else{
                    echo json_encode($get->getPatient());
                }
            break;
            case "doctor":
                if(count($request) > 1){
                    echo json_encode($get->getDoctor($request[1]));
                }
                else{
                    echo json_encode($get->getDoctor());
                }
            break;

            case "billing":
                if(count($request) > 1){
                    echo json_encode($get->getBilling($request[1]));
                }
                else{
                    echo json_encode($get->getBilling());
                }
            break;

            case "appointment":
                if(count($request) > 1){
                    echo json_encode($get->getAppointment($request[1]));
                }
                else{
                    echo json_encode($get->getAppointment());
                }
            break;

            case "log":
              echo "hello";
                 echo json_encode($get->getLogs($request[1] ?? date("Y-m-d")));
            break;

            case "user":
                if(count($request) > 1){
                    echo json_encode($get->getUser($request[1]));
                }
                else{
                    echo json_encode($get->getUser());
                }
            break;

            default:
                http_response_code(401);
                echo "This is invalid endpoint";
            break;
        }
    }
    else{
    
        echo "Unauthorized";
        
    }
    break;

    case "POST":
        $body = json_decode(file_get_contents("php://input"));
        switch($request[0]){
            case "login":
                echo json_encode($auth->login($body));
                break;

            case "user":
                echo json_encode($auth->addAccount($body));
            break;

            case "patient":
                echo json_encode($post->postPatient($body));
                    break;

                echo $post->postPatient($body);
            break;


            case "doctor":
                echo json_encode($post->postDoctor($body));

            break;

            case "billing":
                echo json_encode($post->postBilling($body));
                
            break;

            case "appointment":
                echo json_encode($post->postAppointment($body));
            break;

            default:
                http_response_code(401);
                echo "This is invalid endpoint";
            break;
        }
    break;

    case "PATCH":
        $body = json_decode(file_get_contents("php://input"));
        switch($request[0]){
            case "patient":
                echo json_encode($patch->patchPatient($body, $request[1]));
            break;

            case "doctor":
                echo json_encode($patch->patchDoctor($body, $request[1]));
            break;

            case "billing":
                echo json_encode($patch->patchBilling($body, $request[1]));
            break;

            case "appointment":
                echo json_encode($patch->patchAppointment($body, $request[1]));
            break;

          

            
        }
        break;

   case "DELETE":
            switch($request[0]){
                case "patient":
                    echo json_encode($patch->archivePatient($request[1]));
                    break;

                case "doctor":
                    echo json_encode($patch->archiveDoctor($request[1]));
                    break;

                case "billing":
                        echo json_encode($patch->archiveBilling($request[1]));
                     break;

                 case "appointment":
                            echo json_encode($patch->archiveAppointment($request[1]));
                     break;
                }
                case "destroyPatient":
                    echo json_encode($delete->deletePatient($request[1]));
                    break;

                case "destroyDoctor":
                        echo json_encode($delete->deleteDoctor($request[1]));
                    break;

                case "destroyBilling":
                            echo json_encode($delete->deleteBilling($request[1]));
                    break;

                case "destroyAppointment":
                                echo json_encode($delete->deleteAppointment($request[1]));
                    break;
                    
                    
        break;
        
             
    default:
        http_response_code(400);
        echo "Invalid Request Method.";
    break;
                
        
}



?>