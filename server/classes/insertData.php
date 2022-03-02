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
    public function addCourses($coursetitle,$coursecode,$unit) {
        $sql = "INSERT INTO course(coursetitle,coursecode,unit) VALUES(:coursetitle,:coursecode,:unit)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':coursetitle'=>$coursetitle, ':coursecode'=>$coursecode, ':unit'=>$unit));
        
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
    public function registeredcourse($username,$courseid,$coursetitle,$coursecode,$unit){
        $sql = "INSERT INTO registeredcourse (username,courseid,coursetitle,coursecode,unit) VALUES (:username,:courseid,:coursetitle,:coursecode,:unit)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':username'=>$username,':courseid'=>$courseid,':coursetitle'=>$coursetitle,':coursecode'=>$coursecode,':unit'=>$unit ));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }
    // student course registration table 
    public function setAcademicSession($batch,$date){
        $sql = "INSERT INTO classbatch (batch,date) VALUES (:batch,:date)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':batch'=>$batch, ':date'=> $date));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    // =====>e 
    public function assignCosAcademicSession($batchid,$courseid,$semester,$level){
        $sql = "INSERT INTO coursebatch (batchid,courseid,semester,level) VALUES (:batchid,:courseid,:semester,:level)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':batchid'=>$batchid,':courseid'=>$courseid,':semester'=>$semester,':level'=>$level ));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    // =====>e 
    public function setExam($lecturerid,$examname,$batchid,$examduration,$datecreated,$examstatus){
        $sql = "INSERT INTO quiz (lecturerid,examname,batchid,examduration,datecreated,examstatus) VALUES (:lecturerid,:examname,:batchid,:examduration,:datecreated,:examstatus)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':lecturerid'=>$lecturerid,':examname'=>$examname,':batchid'=>$batchid, ':examduration'=>$examduration,':datecreated'=>$datecreated,':examstatus'=>$examstatus));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function setSchedule($lecturerid,$examname,$coursetitle,$batchid,$examduration,$datecreated,$examstatus){
        $sql = "INSERT INTO quiz (lecturerid,examname, coursetitle,batchid,examduration,datecreated,examstatus) VALUES (:lecturerid,:examname, :coursetitle,:batchid,:examduration,:datecreated,:examstatus)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':coursetitle'=>$coursetitle,':lecturerid'=>$lecturerid,':examname'=>$examname,':batchid'=>$batchid, ':examduration'=>$examduration,':datecreated'=>$datecreated,':examstatus'=>$examstatus));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function assignment($lecturerid,$coursetitle,$assignment,$date){
        $sql = "INSERT INTO assignment (lecturerid,assignment, coursetitle,date) VALUES (:lecturerid,:assignment, :coursetitle,:date)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':coursetitle'=>$coursetitle,':lecturerid'=>$lecturerid,':assignment'=>$assignment,':date'=>$date));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function insertQuestion($examid,$questiontitle,$option1,$option2,$option3,$option4,$answer){
        $sql = "INSERT INTO question (examid,option1, questiontitle,option2,option3,option4,correct) VALUES (:examid,:option1,:questiontitle,:option2,:option3,:option4,:correct)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':questiontitle'=>$questiontitle,':examid'=>$examid,':option1'=>$option1,':option2'=>$option2,':option3'=>$option3,':option4'=>$option4,':correct'=>$answer));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function submitAssignment($user,$courseTitle,$courseCode,$assignment,$date){
        $sql = "INSERT INTO subassign (user,coursetitle,coursecode, assignment,date) VALUES (:user,:coursetitle,:coursecode,:assignment,:date)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':user'=> $user, ':coursetitle'=>$courseTitle,':coursecode'=>$courseCode,':assignment'=>$assignment,':date'=>$date));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function setLiveClass($user,$course,$link){
        $sql = "INSERT INTO liveclass (user,course,link) VALUES (:user,:course,:link)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':user'=>$user,':course'=> $course, ':link'=>$link));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function setInsertExamUserDetail($useremail,$examid){
        $sql = "INSERT INTO exam_enroll (useremail,examid) VALUES (:useremail,:examid)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':useremail'=>$useremail,':examid'=> $examid));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }


    public function uploadFile($user,$course,$image){
        $sql = "INSERT INTO document (user,course,image) VALUES (:user,:course,:image)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':user'=> $user, ':course'=>$course,':image'=>$image));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function uploadMedia($user,$course,$file){
        $sql = "INSERT INTO media (user,course,file) VALUES (:user,:course,:file)";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':user'=> $user, ':course'=>$course,':file'=>$file));
        if ($query->errorCode()==0) {
            return array('status'=>1);
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }
}
?>