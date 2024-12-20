<?php
include_once "Common.php";

Class Get extends CommonMethods{
    protected $pdo;
    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }
    public function getLogs($date = null){
        $filename = "./logs/" . $date . ".log";
        
         $file = file_get_contents("./logs/$filename"); 
         $logs = explode(PHP_EOL, $file);

        
        $logs = array();
        try{
            $file = new SplFileObject($filename);
            while(!$file->eof()){
                array_push($logs, $file->fgets());
            }
            $remarks = "success";
            $message = "Successfully retrieved logs.";
        }
        catch(Exception $e){
            $remarks = "failed";
            $message = $e->getMessage();
           
        }

        return $this->sendResponse($logs, $remarks, $message, 200);
    }
    public function getPatient($id = null){
        $condition = "isdeleted = 0";
        if($id != null){
            $condition .= " AND patientID = $id";
        }
      
        $result =  $this->getDataByTable("patienttable", $condition, $this->pdo);
        if($result['code'] == 200){
            return $this->sendResponse($result['data'], "success", "Successfully retrieved records.", $result['code']);
        }
        return $this->sendResponse(null, $result['errmsg'], "failed", $result['code']);
    }
    public function getDoctor($id = null){ 
        $condition = "isdeleted = 0";
        if($id != null){
            $condition .= " AND doctorID = $id";
        }
        $result =  $this->getDataByTable("doctortable", $condition, $this->pdo);
        if($result['code'] == 200){
            return $this->sendResponse($result['data'], "success", "Successfully retrieved records.", $result['code']);
        }
        return $this->sendResponse(null, $result['errmsg'], "failed", $result['code']);
     
        
    }
    public function getBilling($id = null){
        $condition = "isdeleted = 0";
        if($id != null){
            $condition .= " AND billID = $id";
        }
        $result =  $this->getDataByTable("billingtable", $condition, $this->pdo);
        if($result['code'] == 200){
            return $this->sendResponse($result['data'], "success", "Successfully retrieved records.", $result['code']);
        }
        return $this->sendResponse(null, $result['errmsg'], "failed", $result['code']);
       
        
    }
    public function getAppointment($id = null){
        $condition = "isdeleted = 0";
        if($id != null){
            $condition .= " AND appointmentID = $id";
        }
      
        $result =  $this->getDataByTable("appointmenttable", $condition, $this->pdo);
        if($result['code'] == 200){
            return $this->sendResponse($result['data'], "success", "Successfully retrieved records.", $result['code']);
        }
        return $this->sendResponse(null, $result['errmsg'], "failed", $result['code']);
       
}
public function getUser($id = null){
    $condition = "isdeleted = 0";
    if($id != null){
        $condition .= " AND userID = $id";
    }
  
    return $this->getDataByTable("accountstable", $condition, $this->pdo);
   
}
}

?>