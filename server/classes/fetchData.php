<?php

    require_once('dbconnection.php');


    class fetchData extends DbConnection {
        // display All Lecturer from the database
        public function displayAllLecturer(){
            $sql = "SELECT * FROM lecturer ORDER BY id";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

        // display all students from the database
        public function displayAllStudents(){
            $sql = "SELECT * FROM student ORDER BY id ";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

        // display all admin from the database
        public function displayAllAdmin(){
            $sql = "SELECT * FROM admin ORDER BY id ";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

        // display all courses from the database
        public function displayAllCourses(){
            $sql = "SELECT * FROM course ORDER BY id ";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }
        // to check wether a user exist in the database
        public function studentEmailCheck($email){
            $sql = "SELECT email FROM student WHERE email = :email";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array(':email' => $email));

            if ($qry->errorCode() == 0) {
                if ($qry->rowCount() > 0) {
                    $data = $qry->fetchAll(PDO::FETCH_ASSOC);
                    return array('status'=>1,'data'=>$data);
                }else{
                    return  array('status' => 0);
                }
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }
        }
        // to check wether a user exist in the database
        public function lecturerEmailCheck($email){
            $sql = "SELECT email FROM lecturer WHERE email = :email";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array(':email' => $email));

            if ($qry->errorCode() == 0) {
                if ($qry->rowCount() > 0) {
                    $data = $qry->fetchAll(PDO::FETCH_ASSOC);
                    return array('status'=>1,'data'=>$data);
                }else{
                    return  array('status' => 0);
                }
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }
        }


        // to check wether a user exist in the database
        public function adminEmailCheck($username){

            $sql = "SELECT  password FROM admin WHERE username = :username ";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array(':username'=>$username));
            
            if($query->errorCode() == 0){
                if ($query->rowCount() > 0) {
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($data as $row) {
                        $pass = $row['password'];
                        // echo ($pass);
                        return array('status'=>1, 'password'=>$pass);
                    } 
                }else{
                    return array('status'=>0, 'message'=>'User Does not exist');
                } 
            }else{
                return array('status'=>0, 'message'=>$query->errorInfo()); 
            }
        }

        // Admin login validation
        public function adminLogin($email){
            $sql = "SELECT  password FROM admin WHERE username = :username ";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array(':username'=>$email));
            
            if($query->errorCode() == 0){
                if ($query->rowCount() > 0) {
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($data as $row) {
                        $pass = $row['password'];
                        return array('status'=>1, 'password'=>$pass);
                    } 
                }else{
                    return array('status'=>0, 'message'=>'User Does not exist');
                } 
            }else{
                return array('status'=>0, 'message'=>$query->errorInfo()); 
            }
        }
        // student login validation
        public function studentLgoin($email){
            $sql = "SELECT  * FROM student WHERE  email = ?";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array($email));
            if ($query->rowCount() >= 1) {
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($data as $row) {
                    $name = $row['name'];
                    $pass = $row['password'];
                    return array('status'=>1,'password'=>$pass, 'name'=>$name);
                } 
            }else{
                return array('status'=>0, 'message'=>'User Does not exist');
            } 
        }
        // lecturer login validation
        public function lecturerLogin($email){
            $sql = "SELECT  * FROM lecturer WHERE  email = ?";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array($email));
            if ($query->rowCount() >= 1) {
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($data as $row) {
                    $id = $row['id'];
                    $pass = $row['password'];
                    return array('status'=>1,'password'=>$pass, 'id'=>$id);
                } 
            }else{
                return array('status'=>0, 'message'=>'User Does not exist');
            } 
            // $query = $this->connection->prepare($sql);
            // $exec = $query->execute(array(':email'=>$email,':password'=>$password));
            
            // if($query->errorCode() == 0){
            //     if ($query->rowCount() > 0) {
            //         $data = $query->fetchAll(PDO::FETCH_ASSOC);
            //         foreach ($data as $row) {
            //             $id = $row['id'];
            //             $pass = $row['password'];
            //             return array('status'=>1, 'password'=>$pass, 'id'=>$id);
            //         } 
            //     }else{
            //         return array('status'=>0, 'message'=>'User Does not exist');
            //     } 
            // }else{
            //     return array('status'=>0, 'message'=>$query->errorInfo()); 
            // }
        }

        public function displayStudentProfile($email) {
            $sql = "SELECT * FROM student WHERE email = :email ";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array(':email'=>$email));

            if ($query->errorCode() == 0) {
                if ($query->rowCount() > 0) {
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    return array('status'=>1,'data'=>$data);
                }else{
                    return array('status'=>0);
                }
            }else{
                return array('status'=>0, 'message'=>$query->errorInfo());
            }
        }


        //  // display all courses and join for each lecturer
         public function displayAllocateCouseToLecturer(){
            $sql = "SELECT * FROM course AS a INNER JOIN courseallocation AS c ON a.id = c.courseid INNER JOIN lecturer AS l ON c.lecturerid = l.id WHERE l.id = '{$_SESSION["id"]}'";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

         // display All Lecturer from the database
         public function displayAllAcademicSession(){
            $sql = "SELECT * FROM classbatch ORDER BY id";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }


        //  display personal register course
        public function displayPersonalRegisterCos(){
            $sql = "SELECT * FROM registeredcourse WHERE username = '{$_SESSION['email']}'";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

        //  display personal personal
        public function displayStudent(){
            $sql = "SELECT * FROM student WHERE email = '{$_SESSION['email']}'";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

        public function displayAddExam(){
            $sql = "SELECT * FROM quiz WHERE lecturerid = '{$_SESSION['id']}'";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

       // verify courses before registration by students
        public function displayRegisteredCourse($coursetitle){
            $sql = "SELECT * registeredcourse  WHERE coursetitle = :coursetitle";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array(':coursetitle'=>$coursetitle));
            if ($query->errorCode() == 0) {
                if ($query->rowCount() > 0) {
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    return array('status'=>1,'data'=>$data);
                }else{
                    return  array('status' => 0);
                }
            }else{
                return array('status'=>0, 'message'=>$query->errorInfo()); 
            }
        }


        //  // display all courses and join for each student
        public function displayAllocateCouseToStudent(){
            $sql = "SELECT * FROM course AS a INNER JOIN courseallocation AS c ON a.id = c.courseid INNER JOIN lecturer AS l ON c.lecturerid = l.id WHERE l.id = '{$_SESSION["id"]}'";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }


        // display All Lecturer from the database
        public function displayAllQuestions(){
            $sql = "SELECT * FROM question ORDER BY id";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

        //  // display all assignment and join for each student
        public function displayAssignmentToStudent(){
            $sql = "SELECT * FROM assignment ORDER BY id";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

        public function displayAssignment(){
            $sql = "SELECT * FROM subassign ORDER BY id";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

        public function displayQuiz(){
            $sql = "SELECT * FROM quiz ORDER BY id";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }



        public function displayQuestion($id){
            $sql = "SELECT * FROM question WHERE examid ='$id'";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

        public function displayLiveLink(){
            $sql = "SELECT * FROM liveclass ORDER BY id";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }


        public function displayStudents(){
            $sql = "SELECT * FROM student ORDER BY id";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

        public function displayRes(){
            $sql = "SELECT * FROM document ORDER BY id";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }

        public function displayMedia(){
            $sql = "SELECT * FROM media ORDER BY id";
            $qry = $this->connection->prepare($sql);
            $exec = $qry->execute(array());

            if($qry->errorCode() == 0){
                if ($qry->rowCount() > 0) {
                    return $qry->fetchAll(PDO::FETCH_ASSOC);    
                }else{
                    return 0;
                } 
            }else{
                return array('status'=>0, 'message'=>$qry->errorInfo()); 
            }

        }
    }
?>