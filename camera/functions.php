<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'smoke');
    
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function insert($status, $location) {
            $result = mysqli_query($this->dbcon, "INSERT INTO tbcamera(status_cm, location_cm) VALUES('$status', '$location')");
            return $result;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tbcamera");
            return $result;
        }

        public function fetchonerecord($cameraid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tbcamera WHERE id_camera = '$cameraid'");
            return $result;
        }

        public function update($status, $location, $cameraid) {
            $result = mysqli_query($this->dbcon, "UPDATE tbcamera SET 
                status_cm = '$status',
                location_cm = '$location',
                WHERE id_camera = '$cameraid'
            ");
            return $result;
        }

        public function delete($cameraid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tbcamera WHERE id_camera = '$cameraid'");
            return $deleterecord;
        }

        public function count(){
            $result= mysqli_query($this->dbcon,"SELECT count(*) as total from tbcamera where status_cm = 1");
                return $result;
               
        }

        public function count_off(){
            $result= mysqli_query($this->dbcon,"SELECT count(*) as total from tbcamera where status_cm = 0 ");
                return $result;
               
        }
        
        public function usernameavailable($uname) {
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tbl_user WHERE username = '$uname'");
            return $checkuser;
        }


        public function signin($uname, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT id, fullname FROM tbl_user WHERE username = '$uname' AND password = '$password'");
            return $signinquery;
        }
        public function registration($fname, $uname, $password, $uemail) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO tbl_user(fullname, username, password, email) VALUES('$fname', '$uname', '$password', '$uemail')");
            return $reg;
        }

        public function insert_officer($id, $fname, $lname, $location) {
            $result = mysqli_query($this->dbcon, "INSERT INTO tbl_officer(id, first_name, last_name, job_location) VALUES('$id', '$fname', '$lname', '$location')");
            return $result;
        }

        public function fetchdata_officer() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tbl_officer");
            return $result;
        }

        

    }
    

?>