<?php
require_once('dbconnection.php');
class insertData extends DbConnection {
	
    public function registerStudent($name, $email, $regnumber, $faculty,$dept,$password) {
        $sql = "INSERT INTO student(name, email, regnumber, faculty,dept,password) VALUES(:name, :email, :regnumber, :faculty,:dept,:password)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':name'=>$name, ':email'=>$email, ':regnumber'=>$regnumber, ':faculty'=>$faculty, ':dept'=>$dept, ':password'=>$password));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        } 
    }

    public function addLecturer($name, $email, $staffnumber, $faculty,$dept, $password) {
        $sql = "INSERT INTO lecturer(name, email, staffnumber, faculty,dept,password) VALUES(:name, :email, :staffnumber, :faculty,:dept,:password)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':name'=>$name, ':email'=>$email, ':staffnumber'=>$staffnumber, ':faculty'=>$faculty, ':dept'=>$dept, ':password'=>$password));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        } 
    }

    // add admin
    public function addAdmin($name, $username, $password){
        $sql = "INSERT INTO admin (name, username, password) VALUES (:name,:email, :password)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':name'=>$name,':email'=>$username, ':password'=>$password));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    // addition of courses
    public function addCourses($coursetitle,$coursecode,$level,$semester,$unit) {
        $sql = "INSERT INTO course(coursetitle,coursecode,level,semester,unit) VALUES(:coursetitle,:coursecode,:level,:semester,:unit)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':coursetitle'=>$coursetitle, ':coursecode'=>$coursecode, ':level'=>$level, ':semester'=>$semester,':unit'=>$unit));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }        
    }

    // allocate courses to lecturer
    public function courseallocation($courseid,$lecturerid){
        $sql = "INSERT INTO courseallocation (courseid,lecturerid) VALUES (:courseid,:lecturerid)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':courseid'=>$courseid,':lecturerid'=>$lecturerid));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }


    // student course registration table 
    public function registeredcourse($username,$coursetitle,$coursecode,$unit){
        $sql = "INSERT INTO registeredcourse (username,coursetitle,coursecode,unit) VALUES (:username,:coursetitle,:coursecode,:unit)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':username'=>$username,':coursetitle'=>$coursetitle,':coursecode'=>$coursecode,':unit'=>$unit ));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }
    
}
?>