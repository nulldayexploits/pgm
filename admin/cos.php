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
                            <center style="font-size: 20px;">Cek Plagiarsm (Cosine Similarity)
                                    <BR>
                            </center>
                        </h1>

                      
                        <div class="pencarian-paginasi">

                            <link href="assets/paginasi/paginasi.css" rel="stylesheet"> 

                            <form method="post" action="result-cos.php">
                
                                
                                <input type="text" name="judul" placeholder="Masukkan Judul..." class="form-control" value="">

                                <br>

                                <textarea class="form-control" placeholder="Masukkan Isi Dokumen..." name="isi_dokumen" style="height:200px"></textarea>
                                
                                <br>
                                
                                <td>
                                    <button type="submit" class="btn btn-primary"> 
                                      <i class="glyphicon glyphicon-add"></i> Cek Plagiarsm
                                    </button>               
                                </td>


                            </form>
                        
                        </div>
                                
                   
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include('template/bottom.php') ?>