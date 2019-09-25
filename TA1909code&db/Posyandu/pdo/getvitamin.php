<?php
    class getvitamin{
        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_posyandu','root','');
        }

        public function create($id_vitamin,$id_user,$jns_vitamin, $jml_stok,$keterangan){
            try{
                $sql = "insert into tb_vitamin values('$id_vitamin','$id_user','$jns_vitamin','$jml_stok','$keterangan')";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }

        }

        public function read(){
            try{
                $sql = "select * from tb_vitamin";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function read_id($id_vitamin){
            try{
                $sql = "select * from tb_vitamin where id_vitamin= '$id_vitamin'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function update_masuk($jns_vitamin,$jml_stok_masuk){
            try{
                $sql = "update tb_vitamin set jml_stok = (jml_stok+$jml_stok_masuk) where id_vitamin='$jns_vitamin' ";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function update_keluar($jns_vitamin,$jml_stok_keluar){
            try{
                $sql = "update tb_vitamin set jml_stok = (jml_stok-$jml_stok_keluar) where id_vitamin='$jns_vitamin' ";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function delete($id_vitamin){
            try{
                $sql = "delete from tb_vitamin where id_vitamin='$id_vitamin'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }
    }

?>