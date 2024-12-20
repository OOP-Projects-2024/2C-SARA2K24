<?php
include_once "Common.php";
Class Post extends CommonMethods{
    protected $pdo;
    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }
   
    public function postPatient($body){
        $result = $this->postData("patienttable", $body, $this->pdo);
        if($result['code'] == 200){
         $this->logger("awit sayo", "POST", "Created a new Patient record");
         return $this->sendResponse($result['data'], "success", "Successfully created a new record.", $result['code']);
       }
       $this->logger("awit sayo", "POST", $result['errmsg']);
       return $this->sendResponse(null, "failed", $result['errmsg'], $result['code']);
    }

     public function postDoctor($body){
        $result = $this->postData("doctortable", $body, $this->pdo);
        if($result['code'] == 200){
        $this->logger("awit sayo", "POST", "Created a new Doctor record");
         return $this->sendResponse($result['data'], "success", "Successfully created a new record.", $result['code']);
       }
       $this->logger("awit sayo", "POST", $result['errmsg']);
       return $this->sendResponse(null, "failed", $result['errmsg'], $result['code']);
    }
    
    public function postBilling($body){
        $result = $this->postData("billingtable", $body, $this->pdo);
       if($result['code'] == 200){
        $this->logger("awit sayo", "POST", "Created a new Billing record");
        return $this->sendResponse($result['data'], "success", "Successfully created a new record.", $result['code']);
      }
      $this->logger("awit sayo", "POST", $result['errmsg']);
      return $this->sendResponse(null, "failed", $result['errmsg'], $result['code']);
        }
        
        
    public function postAppointment($body){
        $result = $this->postData("appointmenttable", $body, $this->pdo);
        if($result['code'] == 200){
        $this->logger("awit sayo", "POST", "Created a new Appointment record");
          return $this->sendResponse($result['data'], "success", "Successfully created a new record.", $result['code']);
        }
        $this->logger("awit sayo", "POST", $result['errmsg']);
        return $this->sendResponse(null, "failed", $result['errmsg'], $result['code']);
}
}

?>