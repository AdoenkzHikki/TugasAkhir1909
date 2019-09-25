<?php
    class user{
        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_posyandu','root','');
        }

        public function create($id_user, $nama_user, $pass, $lev_user){
            try{
                $sql = "insert into tb_user values('$id_user', '$nama_user', '$pass', '$lev_user')";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }

        }

        public function read(){
            try{
                $sql = "select * from tb_user";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function read_id($id_user){
            try{
                $sql = "select * from tb_user where id_user = '$id_user'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function update($id_user, $nama_user,$lev_user){
            try{
                $sql = "update tb_user set nama='$nama_user', lev_user = '$lev_user' where id_user='$id_user' ";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function update_pass($id_user,$pass){
            try{
                $sql = "update tb_user set password='$pass' where id_user='$id_user' ";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function delete($id_user){
            try{
                $sql = "delete from tb_user where id_user='$id_user'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }


    }
?>