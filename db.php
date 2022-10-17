<?php 

    require_once 'config.php';

    class Database extends Config {
        public function insert($fname, $lname, $email, $phone) {
            $sql = "INSERT INTO users(first_name, last_name, email, phone) VALUES(:fname, :lname, :email, :phone)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'phone' => $phone
            ]);
            return true;
        }

        public function read() {
            $sql = "SELECT * FROM users ORDER BY id ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function readOne($id) {
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch();
            return $result;
        }

        public function update($id, $fname, $lname, $email, $phone) {
            $sql = "UPDATE users SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'phone' => $phone,
                'id' => $id,
            ]);
            return true;
        }

        public function delete($id) {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        }

        //camera

        public function insert_camera($statuscm, $locationcm) {
            $sql = "INSERT INTO tbcamera(status_cm, location_cm) VALUES(:statuscm, :locationcm)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'statuscm' => $statuscm,
                'locationcm' => $locationcm,
            ]);
            return true;
        }

        public function update_camera($id, $statuscm, $locationcm) {
            $sql = "UPDATE tbcamera SET status_cm = :statuscm, location_cm = :locationcm where id_camera = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'statuscm' => $statuscm,
                'locationcm' => $locationcm,
                'id' => $id,
            ]);
            return true;
        }

        public function read_camera() {
            $sql = "SELECT * FROM tbcamera ORDER BY id_camera DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function readOne_camera($id) {
            $sql = "SELECT * FROM tbcamera WHERE id_camera = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            $result = $stmt->fetch();
            return $result;
        }

        public function delete_camera($id) {
            $sql = "DELETE FROM tbcamera WHERE id_camera = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        }
    }

?>