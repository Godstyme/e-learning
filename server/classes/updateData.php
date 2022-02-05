<?php
	require_once('dbconnection.php');

    class update extends DbConnection{
		public function updateProfile($id,$faculty,$dept,$phone,$level){
			$sql = "UPDATE student SET faculty = :faculty, dept = :dept, phone = :phone, level = :level WHERE id = :id";

        $query = $this->connection->prepare($sql);
         $exec = $query->execute(array(':id' => $id,':faculty'=>$faculty,':dept'=>$dept,':phone'=>$phone,':level'=>$level));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }
	}
	$update = new update;
?>