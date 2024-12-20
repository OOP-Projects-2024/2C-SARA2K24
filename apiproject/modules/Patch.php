<?php
class Patch{
    protected $pdo;
    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }
    public function patchPatient($body, $id){
        $values = [];
        $errmsg = "";
        $code = 0;
        foreach($body as $value){
            array_push($values, $value);
        }
        array_push($values, $id);
        
        try{
            $sqlString = "UPDATE patienttable SET fname=?, lname=?  WHERE patientID = ?";
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute($values);
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
    public function archivePatient($id){
        
        $errmsg = "";
        $code = 0;
        
        try{
            $sqlString = "UPDATE patienttable SET isdeleted=1 WHERE patientID = ?";
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
    public function patchDoctor($body, $id){
        $values = [];
        $errmsg = "";
        $code = 0;
        foreach($body as $value){
            array_push($values, $value);
        }
        array_push($values, $id);
        
        try{
            $sqlString = "UPDATE doctortable SET fname=?, lname=? WHERE doctorID = ?";
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute($values);
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
    public function archiveDoctor($id){
        
        $errmsg = "";
        $code = 0;
        
        try{
            $sqlString = "UPDATE doctortable SET isdeleted=1 WHERE doctorID = ?";
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
    public function patchBilling($body, $id){
        $values = [];
        $errmsg = "";
        $code = 0;
        foreach($body as $value){
            array_push($values, $value);
        }
        array_push($values, $id);
        
        try{
            $sqlString = "UPDATE billingtable SET fname=?, lname=? WHERE billID = ?";
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute($values);
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
    public function archiveBilling($id){
        
        $errmsg = "";
        $code = 0;
        
        try{
            $sqlString = "UPDATE billingtable SET isdeleted=1 WHERE billiID = ?";
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
    public function patchAppointment($body, $id){
        $values = [];
        $errmsg = "";
        $code = 0;
        foreach($body as $value){
            array_push($values, $value);
        }
        array_push($values, $id);
        
        try{
            $sqlString = "UPDATE appointmenttable SET appointmendID=?, appointmentdate=? WHERE appointmentID = ?";
            $sql = $this->pdo->prepare($sqlString);
            $sql->execute($values);
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
    public function archiveAppointment($id){
        
        $errmsg = "";
        $code = 0;
        
        try{
            $sqlString = "UPDATE appointmenttable SET isdeleted=1 WHERE appointmentID = ?";
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
}
}
?>