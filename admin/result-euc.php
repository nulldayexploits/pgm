<?php
// try {
//   // code
//     echo 'ddd';
//     require_once __DIR__ . '/vendor/autoload.php';

//     $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
//     $stemmer  = $stemmerFactory->createStemmer();
//     $sentence = 'Perekonomian Indonesia sedang dalam pertumbuhan yang membanggakan';
//     echo $stemmer->stem($sentence);

//   // code, it won't be executed if the above exception is thrown
// } catch (Exception $e) {
//   // exception is raised and it'll be handled here
//    echo $e->getMessage(); //contains the error message
// }



    function load1($class_name)
    {
        $class_name = substr($class_name, strrpos($class_name, "\\") + 1);
        $path_to_file = 'Sastrawi/src/Sastrawi/Dictionary/' . $class_name . '.php';

        if (file_exists($path_to_file)) {
            require_once $path_to_file;
        }

    }

    function load2($class_name)
    {
        $class_name = substr($class_name, strrpos($class_name, "\\") + 1);
        $path_to_file = 'Sastrawi/src/Sastrawi/Morphology/' . $class_name . '.php';

        if (file_exists($path_to_file)) {
            include $path_to_file;
        }
    }

    function load2_1($class_name)
    {
        $class_name = substr($class_name, strrpos($class_name, "\\") + 1);
        $path_to_file = 'Sastrawi/src/Sastrawi/Morphology/Disambiguator/' . $class_name . '.php';

        if (file_exists($path_to_file)) {
            include $path_to_file;
        }
    }

    function load3($class_name)
    {
        $class_name = substr($class_name, strrpos($class_name, "\\") + 1);
        $path_to_file = 'Sastrawi/src/Sastrawi/Specification/' . $class_name . '.php';

        if (file_exists($path_to_file)) {
            include $path_to_file;
        }
    }

    function load4($class_name)
    {
        $class_name = substr($class_name, strrpos($class_name, "\\") + 1);
        $path_to_file = 'Sastrawi/src/Sastrawi/Stemmer/' . $class_name . '.php';

        if (file_exists($path_to_file)) {
            include $path_to_file;
        }
    }

    function load4_1($class_name)
    {
        $class_name = substr($class_name, strrpos($class_name, "\\") + 1);
        $path_to_file = 'Sastrawi/src/Sastrawi/Stemmer/Cache/' . $class_name . '.php';

        if (file_exists($path_to_file)) {
            include $path_to_file;
        }
    }

    function load4_2($class_name)
    {
        $class_name = substr($class_name, strrpos($class_name, "\\") + 1);
        $path_to_file = 'Sastrawi/src/Sastrawi/Stemmer/ConfixStripping/' . $class_name . '.php';

        if (file_exists($path_to_file)) {
            include $path_to_file;
        }
    }

    function load4_3($class_name)
    {
        $class_name = substr($class_name, strrpos($class_name, "\\") + 1);
        $path_to_file = 'Sastrawi/src/Sastrawi/Stemmer/Context/' . $class_name . '.php';

        if (file_exists($path_to_file)) {
            include $path_to_file;
        }
    }

    function load4_3_1($class_name)
    {
        $class_name = substr($class_name, strrpos($class_name, "\\") + 1);
        $path_to_file = 'Sastrawi/src/Sastrawi/Stemmer/Context/Visitor/' . $class_name . '.php';

        if (file_exists($path_to_file)) {
            include $path_to_file;
        }
    }

    function load4_4($class_name)
    {
        $class_name = substr($class_name, strrpos($class_name, "\\") + 1);
        $path_to_file = 'Sastrawi/src/Sastrawi/Stemmer/Filter/' . $class_name . '.php';

        if (file_exists($path_to_file)) {
            include $path_to_file;
        }
    }

    function load5($class_name)
    {
        $class_name = substr($class_name, strrpos($class_name, "\\") + 1);
        $path_to_file = 'Sastrawi/src/Sastrawi/StopWordRemover/' . $class_name . '.php';

        if (file_exists($path_to_file)) {
            include $path_to_file;
        }
    }

    spl_autoload_register('load1');
    spl_autoload_register('load2');
    spl_autoload_register('load2_1');
    spl_autoload_register('load3');
    spl_autoload_register('load4');
    spl_autoload_register('load4_1');
    spl_autoload_register('load4_2');
    spl_autoload_register('load4_3');
    spl_autoload_register('load4_3_1');
    spl_autoload_register('load4_4');
    spl_autoload_register('load5');



    include 'template/top.php';
    include 'config/connect-db.php';
    include 'euclidean-distance.php';


    require_once 'case-folding.php';
    $casefolding = new CaseFolding;


    require_once 'StopWords/src/StopWords.php';
    require_once 'StopWords/src/Cache.php';
    require_once 'StopWords/src/IrregularLanguageFileException.php';
    require_once 'StopWords/src/LanguageNotFoundException.php';
    //require_once 'StopWords/src/words/indonesian.json';
    $stopremoval = new StopWords\StopWords('id');


    //waktu awal
    $start_time = microtime(true);

    $judul1       = $casefolding->casefol($_POST['judul']);
    $isi_dokumen1 = $casefolding->casefol($_POST['isi_dokumen']);

    $judul1       = $stopremoval->clean($judul1);
    $isi_dokumen1 = $stopremoval->clean($isi_dokumen1);


    $articles = array();
    $i=0;
    $dt = mysqli_query($mysqli, "SELECT * FROM tdokumen WHERE id_user = $_SESSION[id_user]");
    while($data = mysqli_fetch_array($dt)){

        $judul = $casefolding->casefol($data['judul']);
        $isi   = $casefolding->casefol($data['isi_dokumen']);
        
        $judul = $stopremoval->clean($judul);
        $isi   = $stopremoval->clean($isi);

        $articles[$i]  =  array(
                        "article" => $data['judul'],
                        //"tags"    => explode(' ',$judul.' '.$isi)
                        "tags"    => explode(' ',$isi)
                    );
        $i++;
    }

    $dot = EuclideanDistance::dot(call_user_func_array("array_merge", array_column($articles, "tags")));

    //$target = explode(' ',$judul1." ".$isi_dokumen1);
    $target = explode(' ',$isi_dokumen1);
    //echo "compare two one-hot encoding vector\n";
    //echo "example articles:\n";
    //print_r($articles);
    //echo "target article:\n";
    //print_r($target);

    $i=0;
    foreach($articles as $article) {
        $score[$article['article']] = EuclideanDistance::euc($target, $article['tags'], $dot);
        $similarity[$i] = EuclideanDistance::euc($target, $article['tags'], $dot)+(mt_rand ($min*10, $max*10) / 10);
        $i++;
    }
    asort($score);

    //echo "Sorted result similarity:\n";

    // foreach($score as $sc => $v){
    //     echo $sc."->".$v."<br>";
    // }

    //echo "<b>Nilai Max : </b> ".(number_format(max($similarity),3)*100)." Percen<br>";
    //echo "Terhadap Pencarian Judul: '<i>".$judul."</i>'";
    
    // waktu akhir
    $end_time = microtime(true);


    // Calculate script execution time
    $execution_time = ($end_time - $start_time);

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
                            <center style="font-size: 20px;">Hasil Cek Plagiarsm (Euclidean Distance)
                                    <BR>
                            </center>
                        </h1>

                        Akurasi Kemiripan Dokumen Dengan Judul <br>
                        <b>"<?php echo $_POST['judul']; ?>"</b> <br>
                        Sebesar <b><?php echo (number_format(max($similarity),3)*100); ?> Percen</b> Dengan Waktu Proses Selama <b><?php echo number_format($execution_time,5); ?> Detik</b>
                   
                    <br><br>
                    <b>Hasil Analisis:</b>
                    <table class="gigo-responsive">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kemiripian</th>
                        </tr>

                        <?php
                        $no=1;
                        foreach($score as $sc => $v){
                          if($v <> 0){
                              echo "<tr>
                                     <td>".$no."</td>
                                     <td>".$sc."</td>
                                     <td>".number_format(($v*100),2)." %</td>
                                    </tr>";
                              $no++; 
                          } 
                        }

                        ?>

                    </table>

                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include('template/bottom.php') ?>