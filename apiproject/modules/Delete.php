<?php
class Delete{
    protected $pdo;
    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }
  
    public function deletePatient($id){
        
        $errmsg = "";
        $code = 0;
        
        try{
            $sqlString = "UPDATE FROM  patienttable WHERE patientID = ?";
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute([$id]);
            $code = 200;
            $data = null;
            return array("data"=>$data, "code"=>$code);
        }
        catch(\PDOException $e){
            $errmsg = $e->getMessage();
            $code = 400;
        }
        
        return array("errmsg"=>$errmsg, "code"=>$code);
    }

    public function deleteDoctor($id){
        
        $errmsg = "";
        $code = 0;
        
        try{
            $sqlString = "UPDATE FROM doctortable WHERE doctorID = ?";
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute([$id]);
            $code = 200;
            $data = null;
            return array("data"=>$data, "code"=>$code);
        }
        catch(\PDOException $e){
            $errmsg = $e->getMessage();
            $code = 400;
        }
        
        return array("errmsg"=>$errmsg, "code"=>$code);
    }

    public function deleteBilling($id){
        
        $errmsg = "";
        $code = 0;
        
        try{
            $sqlString = "UPDATE FROM billingtable WHERE billID = ?";
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute([$id]);
            $code = 200;
            $data = null;
            return array("data"=>$data, "code"=>$code);
        }
        catch(\PDOException $e){
            $errmsg = $e->getMessage();
            $code = 400;
        }
        
        return array("errmsg"=>$errmsg, "code"=>$code);
    }

    public function deleteAppointment($id){
        
        $errmsg = "";
        $code = 0;
        
        try{
            $sqlString = "UPDATE FROM appointmenttable WHERE appointmentID = ?";
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute([$id]);
            $code = 200;
            $data = null;
            return array("data"=>$data, "code"=>$code);
        }
        catch(\PDOException $e){
            $errmsg = $e->getMessage();
            $code = 400;
        }
        
        return array("errmsg"=>$errmsg, "code"=>$code);
    }
    
}
?>