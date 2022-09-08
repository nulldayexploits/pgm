<h2>Analisis Perhitungan Euclidean Distance</h2>
<form method="get" action="">
    Text 1 <input type="text" name="txt1" value="<?php echo $_GET['txt1']; ?>"><br>
    Text 2 <input type="text" name="txt2" value="<?php echo $_GET['txt2']; ?>"><br>
    <input type="submit" name="Submit">
</form>

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

    include 'config/connect-db.php';
    include 'cosine-similarity.php';


    require_once 'case-folding.php';
    $casefolding = new CaseFolding;


    require_once 'StopWords/src/StopWords.php';
    require_once 'StopWords/src/Cache.php';
    require_once 'StopWords/src/IrregularLanguageFileException.php';
    require_once 'StopWords/src/LanguageNotFoundException.php';
    //require_once 'StopWords/src/words/indonesian.json';
    $stopremoval = new StopWords\StopWords('id');


    $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
    $stemmer  = $stemmerFactory->createStemmer();
    

    //waktu awal
    $start_time = microtime(true);

    // $judul1       = $casefolding->casefol($_GET['txt1']);
    // $isi_dokumen1 = $casefolding->casefol($_GET['txt1']);

    // $judul1       = $stopremoval->clean($judul1);
    // $isi_dokumen1 = $stopremoval->clean($isi_dokumen1);

    // $judul1       = $stemmer->stem($judul1);
    // $isi_dokumen1 = $stemmer->stem($isi_dokumen1);

    $articles = array();

        // $judul = $casefolding->casefol($_GET['txt2']);
        // $isi   = $casefolding->casefol($_GET['txt2']);
        
        // $judul = $stopremoval->clean($judul);
        // $isi   = $stopremoval->clean($isi);

        // $judul = $stemmer->stem($judul);
        // $isi   = $stemmer->stem($isi);

        // $articles[0]  =  array(
        //                 "article" => $_GET['txt2'],
        //                 //"tags"    => explode(' ',$judul.' '.$isi)
        //                 "tags"    => explode(' ',$_GET['txt2'])
        //             );
        
    echo "Proses Penggabungan Labeling Pada Text yang menjadi Pembanding<br>";
    $dot = CosineSimilarity::dot( explode(' ',$_GET['txt2'] ) );
    var_dump($dot);
    echo "<br><br>";

    //$target = explode(' ',$judul1." ".$isi_dokumen1);
    echo "Proses Pemecahan kata menjadi term pada pada teks 1 dan 2<br>";
    $target = explode(' ',$_GET['txt1']);
    var_dump($dot);
    var_dump($target);
    echo "<br><br>";
    //echo "compare two one-hot encoding vector\n";
    //echo "example articles:\n";
    //print_r($articles);
    //echo "target article:\n";
    //print_r($target);

    // $i=0;
    // foreach($articles as $article) {
    
    echo "Menghitung Nilai Kedekatan Pada Vektor yang tergabung dalam proses penggabungan array<br>";
    $similarity[$i] = CosineSimilarity::cosine($target, explode(' ',$_GET['txt2'] ), $dot);
    var_dump($similarity);
    echo "<br><br>";
    //     $i++;
    // }
    // asort($score);

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




<br><Br>
Hasil Cek Plagiarsm (Cosine Similarity<br>
     
Akurasi Kemiripan Dokumen Dengan Judul <br>
<?php echo "Perbandingan Antara <b>".$_GET['txt1']."</b> Dengan <b>".$_GET['txt2']."</b>"; ?> <br>
Sebesar <b><?php echo (number_format(max($similarity),3)*100); ?> Percen</b></b>

