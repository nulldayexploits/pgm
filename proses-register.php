<?php

//* Includde Koneksi Ke database
include_once("admin/config/connect-db.php");

//* Include Base Url
include_once("admin/config/base-url.php");


  // Memasukkan Data Inputan ke Varibael
  $nama  = $_POST['nama'];
  $email = $_POST['email'];
  $usrnm = $_POST['username'];
  $passw = MD5($_POST['password']);
  
  // Memasukkan data kedatabase berdasarakan variabel tadi
  $result = mysqli_query($mysqli, "INSERT INTO tusers (id, nama_lengkap, email, username, password) 
                               VALUES(null, '$nama', '$email', '$usrnm', '$passw')");
  
  // Cek jika proses simpan ke database sukses atau tidak   
  if($result){ 
       // Jika Sukses, redirect halaman menggunakan javascript
    echo '<script language="javascript"> alert("Berhasil Menyimpan Data Register!"); window.location.href = "'.$base_url_front.'/index.php" </script>';
  }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Gagal Menyimpan Data Register!!";
      //echo "<br><a href='tambah_tok.php'>Kembali Ke Form</a>";
  }



?>