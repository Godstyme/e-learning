

<?php
require_once('dbconnection.php');

class delete extends DbConnection{ 
   public function deleteStudent($id){
        $sql = "DELETE FROM  student  WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function deleteAdmin($id){
        $sql = "DELETE FROM  admin  WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }
}
// $delete = new delete;
?>