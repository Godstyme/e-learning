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
        public function adminEmailCheck($email){

            $sql = "SELECT  password FROM admin WHERE email = :email ";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array(':email'=>$email));
            
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
            $sql = "SELECT  password FROM student WHERE email = :username ";
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
    }
?>