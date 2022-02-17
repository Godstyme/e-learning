<?php
	require_once('dbconnection.php');

    class update extends DbConnection{
		public function updateProfile($id,$faculty,$jambid,$dept,$phone,$level){
			$sql = "UPDATE student SET faculty = :faculty, jambid = :jambid, dept = :dept,phone = :phone, level = :level WHERE id = :id";

            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array(':id' => $id,':faculty'=>$faculty,':jambid'=>$jambid,':dept'=>$dept,':phone'=>$phone,':level'=>$level));
            
            if ($query->errorCode() == 0) {
                return array('status'=>1);
                
            } else {
                return array('status'=>0, 'message'=>$query->errorInfo());
            }
        }


        public function updateExam($id,$coursetitle,$totalque,$markperitque,$markperongque,$examdate){
			$sql = "UPDATE quiz SET  coursetitle = :coursetitle, totalque=:totalque, markperitque=:markperitque,markperongque=:markperongque,examdate=:examdate WHERE id = :id";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array(':id' => $id,':coursetitle'=>$coursetitle,':totalque'=>$totalque,':markperitque'=>$markperitque,':markperongque'=>$markperongque,':examdate'=>$examdate));
            
            if ($query->errorCode() == 0) {
                return array('status'=>1);
                
            } else {
                return array('status'=>0, 'message'=>$query->errorInfo());
            }
        }
	}
	$update = new update;
?>