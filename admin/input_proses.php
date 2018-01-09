<?php

include "../konfigurasi/sesi.php";

if (!isset($_SESSION['login_user'])) {
header("location:../konfigurasi/login.php");
}
else{
  if (isset($_POST['submit'])) {
    if(!isset($_POST['id_wisata'])){
        $nama_wisata = $_POST['nama_wisata'];
        $alamat = $_POST['alamat'];
        $kategori = $_POST['kategori'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $deskripsi = $_POST['deskripsi'];
        $FILE      = $_FILES['foto'];
        $query = "insert into wisata values ( '', '$nama_wisata', '$alamat', $kategori, '$deskripsi',$latitude,$longitude)";
        if ($db->query($query)===TRUE)
        {
          //ambil id terakhir insert
          $id_wisata = mysqli_insert_id($db);
          //Upload foto
          if(!isset($FILE['tmp_name']))
          {
            echo 'Gambar Harus diisi';
          }
          else
          {
            if(count($FILE['name']) > 0 && $FILE['name'][0] !== ""){
              for ($i=0; $i < count($FILE['name']); $i++) {
                  $errors= array();
                  $file_name = $FILE['name'][$i];
                  $file_size =$FILE['size'][$i];
                  $file_tmp =$FILE['tmp_name'][$i];
                  $file_type=$FILE['type'][$i];
                  $fileNameUpload="";
                  $file_ext = explode('.',$file_name);
                  $file_ext=strtolower(end($file_ext));

                  $expensions= array("jpeg","jpg","png");
                  $date = date('mdYhisa', time());
                  $rand=rand(10000,99999);
                  $namfoto=$date.$rand;
                  $fileNameUpload= $namfoto.'.'.$file_ext;
                  if(in_array($file_ext,$expensions)=== false){
                     $errors[]="Ekstensi tidak diijinkan, silahkan pilih file JPEG atau PNG";
                  }

                  if($file_size > 2097152){
                     $errors[]='Ukuran file tidak boleh melebihi 2 MB';
                  }

                  if(empty($errors)==true){
                     move_uploaded_file($file_tmp,"../Images/".$fileNameUpload);
                     if(!$insert = $db->query("INSERT into foto VALUES ('', $id_wisata, '$fileNameUpload')"))
                      {
                       echo 'Gagal upload gambar';
                      }
                  }
          }
          if(empty($errors)==true){
             // Informasi berhasil dan kembali ke inputan
             echo"<script>alert('Data Berhasil disimpan !');location.href='list_wisata.php';</script>";
          }
        }else{
           echo"<script>alert('Data Berhasil disimpan !');location.href='list_wisata.php';</script>";
        }
       }
        }
        else
        {
          echo "<script>alert('Mohon Masukan Data Dengan Benar')</script>";
          echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
        }
    }else {
      $id_wisata = $_POST['id_wisata'];
      $nama_wisata = $_POST['nama_wisata'];
      $alamat = $_POST['alamat'];
      $kategori = $_POST['kategori'];
      $latitude = $_POST['latitude'];
      $longitude = $_POST['longitude'];
      $deskripsi = $_POST['deskripsi'];
      $FILE      = $_FILES['foto'];
      $query = "UPDATE wisata SET nama_wisata='$nama_wisata',alamat='$alamat',id_kategori='$kategori',latitude='$latitude',longitude='$longitude', deskripsi='$deskripsi' WHERE id_wisata=$id_wisata";
      if ($db->query($query)===TRUE)
      {
        //Upload foto
        if(!isset($FILE['tmp_name']))
        {
          echo 'Gambar Harus diisi';
        }
        else
        {
          if(count($FILE['name']) > 0 && $FILE['name'][0] !== ""){
          $errors= array();
          $query = "DELETE FROM foto WHERE id_wisata='$id_wisata'";
          if ($db->query($query)===TRUE)
           {
            for ($i=0; $i < count($FILE['name']); $i++) {
                $file_name = $FILE['name'][$i];
                $file_size =$FILE['size'][$i];
                $file_tmp =$FILE['tmp_name'][$i];
                $file_type=$FILE['type'][$i];
                $fileNameUpload="";
                $file_ext = explode('.',$file_name);
                $file_ext=strtolower(end($file_ext));

                $expensions= array("jpeg","jpg","png");
                $date = date('mdYhisa', time());
                $rand=rand(10000,99999);
                $namfoto=$date.$rand;
                $fileNameUpload= $namfoto.'.'.$file_ext;
                if(in_array($file_ext,$expensions)=== false){
                   $errors[]="Ekstensi tidak diijinkan, silahkan pilih file JPEG atau PNG";
                }

                if($file_size > 2097152){
                   $errors[]='Ukuran file tidak boleh melebihi 2 MB';
                }

                if(empty($errors)==true){
                   move_uploaded_file($file_tmp,"../Images/".$fileNameUpload);
                   if(!$insert = $db->query("INSERT into foto VALUES ('', $id_wisata, '$fileNameUpload')"))
                    {
                     echo 'Gagal upload gambar';
                    }
                }
            }
            if(empty($errors)==true){
               // Informasi berhasil dan kembali ke inputan
               echo"<script>alert('Data Berhasil di Update !');location.href='list_wisata.php';</script>";
            }
        }
      }else {
         echo"<script>alert('Data Berhasil di Update !');location.href='list_wisata.php';</script>";
      }
      }
      }
      else
      {
       echo "<script>alert('Mohon Masukan Data Dengan Benar')</script>";
        echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
      }
    }
  }
}
?>
