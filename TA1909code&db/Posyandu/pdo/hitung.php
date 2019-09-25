<?php
    class hitung{
        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_posyandu','root','');
        }


        public function read(){
            try{
                $sql = "select count(*) from tb_pendaftar";
                $result = $this->db->prepare($sql);
                $result->execute();
                return $result;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function read_anak(){
            try{
                $sql = "SELECT COUNT(*) as jml FROM `tb_pendaftar` where TIMESTAMPDIFF(YEAR, tgl_lahir, CURRENT_TIMESTAMP) > 5 AND TIMESTAMPDIFF(YEAR, tgl_lahir, CURRENT_TIMESTAMP) <= 12";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }
        public function read_balita(){
            try{
                $sql = "SELECT COUNT(*) as jml FROM `tb_pendaftar` where TIMESTAMPDIFF(YEAR, tgl_lahir, CURRENT_TIMESTAMP) <= 5";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }
    }
        

?>