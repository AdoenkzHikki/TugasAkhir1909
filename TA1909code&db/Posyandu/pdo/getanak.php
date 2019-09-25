<?php
    class getanak{
        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=db_posyandu','root','');
        }

        public function create($nik, $id_user, $nm_anak, $nm_ayah, $nm_ibu, $tgl_lahir, $jns_kel, $rt,$status,$jenis){
            try{
                $sql = "insert into tb_pendaftar values('$nik','$id_user','$nm_anak','$nm_ayah','$nm_ibu','$tgl_lahir','$jns_kel','$rt','$status','$jenis')";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }

        }

        public function read(){
            try{
                $sql = "select * from tb_pendaftar order by nm_anak ASC";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function read_id($nik){
            try{
                $sql = "select * from tb_pendaftar where nik_anak= '$nik'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function cetak(){
            try{
                $sql = "select nik_anak, nm_anak, nm_ayah, nm_ibu, tgl_lahir, jns_kel, rt from tb_pendaftar";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function read_slug($kategori_slug){
            try{
                $sql = "select * from tbkategori where kategori_slug= '$kategori_slug'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function update($nik,$id_user,$nm_anak,$nm_ayah,$nm_ibu,$tgl_lahir,$jns_kel,$rt){
            try{
                $sql = "update tb_pendaftar set nik_anak='$nik',id_user='$id_user', nm_anak = '$nm_anak', nm_ayah='$nm_ayah', nm_ibu='$nm_ibu', tgl_lahir='$tgl_lahir', jns_kel='$jns_kel', rt='$rt' where nik_anak='$nik' ";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function update_imun($nik,$id_user,$nm_anak,$tgl_lahir,$jns_kel, $jenis_imunisasi, $status_imunisasi){
            try{
                $sql = "update tb_pendaftar set nik_anak='$nik',id_user='$id_user', nm_anak = '$nm_anak', tgl_lahir='$tgl_lahir', jns_kel='$jns_kel', jenis_imunisasi='$jenis_imunisasi', status_imunisasi='$status_imunisasi' where nik_anak='$nik' ";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }

        public function delete($nik){
            try{
                $sql = "delete from tb_pendaftar where nik_anak='$nik'";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }catch(PDOException $e){
               echo $e->getMessage();

            }
        }
    }

?>