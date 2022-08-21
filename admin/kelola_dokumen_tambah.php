<?php 

      include 'template/top.php';
      include 'config/connect-db.php';


?>


    <style type="text/css">
        table tr td{
            text-align: left;
        }
    </style>


    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">
            <div class="container">
                <div class="row">
                    <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">
                        <h1 class="mbr-section-title display-3">
                            <center style="font-size: 20px;">Kelola Dokumen (Tambah Data)
                                    <BR>
                            </center>
                        </h1>

                      
                        <div class="pencarian-paginasi">

                            <link href="assets/paginasi/paginasi.css" rel="stylesheet"> 

                            <form method="post" action="">
                
                                
                                <input type="text" name="judul" placeholder="Masukkan Judul..." class="form-control" value="">

                                <br>

                                <textarea class="form-control" placeholder="Masukkan Isi Dokumen..." name="isi_dokumen" style="height:200px"></textarea>
                                
                                <br>
                                
                                <td>
                                    <button type="submit" name="Submit" class="btn btn-primary"> 
                                      <i class="glyphicon glyphicon-add"></i> Tambah
                                    </button>               
                                </td>


                            </form>
                        
                        </div>
                                
                   
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 

    if(isset($_POST['Submit'])){

        $judul = $_POST['judul'];
        $isi   = $_POST['isi_dokumen'];


          // Memasukkan data kedatabase berdasarakan variabel tadi
          $result = mysqli_query($mysqli, "INSERT INTO tdokumen (id, judul, isi_dokumen, id_user) 
                                       VALUES(null, '$judul', '$isi', $_SESSION[id_user])");
          
          // Cek jika proses simpan ke database sukses atau tidak   
          if($result){ 
               // Jika Sukses, redirect halaman menggunakan javascript
            echo '<script language="javascript"> alert("Berhasil Tambah Data!"); window.location.href = "'.$base_url_back.'/kelola_dokumen.php" </script>';
          }else{
              // Jika Gagal, Lakukan :
            echo '<script language="javascript"> alert("Gagal Tambah Data!"); window.location.href = "'.$base_url_back.'/kelola_dokumen_tambah.php" </script>';
              //echo "<br><a href='tambah_tok.php'>Kembali Ke Form</a>";
          }

    }

    

    ?>


<?php include('template/bottom.php') ?>