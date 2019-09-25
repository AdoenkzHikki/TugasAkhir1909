<?php
    function upload_foto($foto_name, $foto_type){
        $directory      = "../media/source/";
        $directoryThumb = "../media/thumbs/";
        //$tgl = round(microtime(true));
        $tgl = date("YmdHis");
        $file = $directory.$tgl;
        //Simpan Gambar Ukuran Asli
        $realImagesName = $_FILES['foto_header']['tmp_name'];
        move_uploaded_file($realImagesName, $file);
        
                //Identitas File Gambar
        $realImages = imagecreatefromjpeg($file);
        $width = imageSX($realImages);
        $height = imageSY($realImages);
        
        //Simpan Ukuran Thumbs
        $thumbWidth = 150;
        $thumbHeight = ($thumbWidth / $width) * $height;
        
        //Mengubah Ukuran Gambar
        $thumbImage = imagecreatetruecolor($thumbWidth, $thumbHeight);
        imagecopyresampled($thumbImage, $realImages, 0,0,0,0, $thumbWidth, $thumbHeight, $width, $height);

        //Simpan Gambar Thumbnail
        imagejpeg($thumbImage, $directoryThumb."thumb_".$tgl);
        
        //Menghapus Objek Dalam Memory
        imagedestroy($realImages);
        imagedestroy($thumbImage);

        $informasi = new Informasi();
        //$tgl_post = date_format(date_create($_POST['tgl_post']), 'Y-m-d'); //Merubah Format Tanggal
        $tgl_post = $_POST['tgl_post'];
        $tgl_post = str_ireplace("/", "-", $tgl_post);
        $tgl_post = date_format(date_create($tgl_post), 'Y-m-d');
        $id_kategori = $_POST['id_kategori'];
        $judul = $_POST['judul'];
        $slug_judul = strtolower($judul);
        $slug_judul = str_ireplace(" ", "-", $slug_judul);
        $foto_header = $tgl;
        $thumbs = "thumb_".$tgl;
        $isi_post = $_POST['isi_informasi'];
        $id_user = $_SESSION['userid'];
        if(isset($_POST['btnSimpan'])){
            $simpan = $informasi->create($tgl_post, $id_kategori, $judul, $slug_judul, $foto_header, $thumbs, $isi_post, $id_user);
        }else{
            $simpan = $informasi->update($_GET['id'], $tgl_post, $id_kategori, $judul, $slug_judul, $foto_header, $thumbs, $isi_post, $id_user);
        }

    }
?>