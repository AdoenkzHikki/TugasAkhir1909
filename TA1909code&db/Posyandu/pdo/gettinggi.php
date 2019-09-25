<?php
    class gettinggi{
        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_posyandu','root','');
        }

        public function create($id_berat,$nik,$bulan,$tinggi,$tahun){
            try{
                $sql = "insert into tb_tinggi values('$id_berat','$nik','$bulan','$tinggi','$tahun')";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }

        }

        public function read($nik){
            try{
                $sql = "select * from tb_tinggi_badan where nik_anak='$nik'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function read_id($nik,$tahun){
            try{
                $sql = "select bulan,tinggi,tahun from tb_tinggi where nik_anak='$nik' and tahun='$tahun'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }
        public function cetak_id($nik){
            try{
                $sql = "select bulan,tinggi,tahun from tb_tinggi where nik_anak='$nik'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }
        public function read_tinggi($nik,$tahun){
            try{
                $sql = "select tinggi,tahun from tb_tinggi where nik_anak='$nik' and tahun='$tahun'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function delete($id_tinggi){
            try{
                $sql = "delete from tb_tinggi_badan where id_tinggi='$id_tinggi'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }
        public function update($bulan,$tinggi,$tahun){
            try{
                $sql = "update tb_tinggi set tinggi='$tinggi' where bulan='$bulan' and tahun='$tahun'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }


        
    }

?>