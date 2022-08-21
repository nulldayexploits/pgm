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
                            <center style="font-size: 20px;">Kelola Dokumen
                                    <BR>
                            </center>
                        </h1>

                      <span style="text-align: left;">
                        <a href="kelola_dokumen_tambah.php" class="btn btn-warning btn-sm" style="margin-left:0px;">Tambah</a>
                      </span>

                        <center>
                            <table class="gigo-responsive" style="margin-right: 10px;">
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">JUDUL</th>
                                  <th scope="col">AKSI</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php

                                    $no=1;

                                    $dt = mysqli_query($mysqli, "SELECT * FROM tdokumen WHERE id_user = $_SESSION[id_user]");

                                    while($data = mysqli_fetch_array($dt)){

                                ?>
                                <tr>
                                  <td data-label="No">
                                      <?php echo $no; ?>
                                  </td>
                                  <td data-label="JUDUL">
                                      <?php echo $data['judul']; ?>
                                  </td>
                                  <td data-label="AKSI">
                                      <a href="kelola_dokumen_edit.php?id=<?php echo $data['id'] ?>" class="button btn btn-secondary btn-sm">Edit</a>
                                      <a href="kelola_dokumen_hapus.php?id=<?php echo $data['id'] ?>" class="button btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Ini?');">Hapus</a>
                                  </td>
                                </tr>    
                            <?php $no++; }?>
                            </tbody>
                        </table>
                        <br>
                        </center>
                                
                   
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include('template/bottom.php') ?>