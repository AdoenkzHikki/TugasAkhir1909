<?php
    class getberat{
        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_posyandu','root','');
        }

        public function create($id_berat,$nik,$bulan,$berat,$tahun){
            try{
                $sql = "insert into tb_berat values('$id_berat','$nik','$bulan','$berat','$tahun')";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }

        }

        public function read($nik){
            try{
                $sql = "select * from tb_berat_badan where nik_anak='$nik'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function read_id($nik,$tahun){
            try{
                $sql = "select bulan,berat,tahun from tb_berat where nik_anak='$nik' and tahun='$tahun'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }
        public function cetak_id($nik){
            try{
                $sql = "select bulan,berat,tahun from tb_berat where nik_anak='$nik' ";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }
        public function read_berat($nik,$tahun){
            try{
                $sql = "select berat,tahun from tb_berat where nik_anak='$nik' and tahun='$tahun'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }
        
        public function update($bulan,$berat,$tahun){
            try{
                $sql = "update tb_berat set berat='$berat' where bulan='$bulan' and tahun='$tahun'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function delete($id_berat){
            try{
                $sql = "delete from tb_berat_badan where id_berat='$id_berat'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }


        
    }

?>