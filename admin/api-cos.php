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

    $judul1       = $casefolding->casefol($_POST['judul']);
    $isi_dokumen1 = $casefolding->casefol($_POST['isi_dokumen']);

    $judul1       = $stopremoval->clean($judul1);
    $isi_dokumen1 = $stopremoval->clean($isi_dokumen1);

    $judul1       = $stemmer->stem($judul1);
    $isi_dokumen1 = $stemmer->stem($isi_dokumen1);

    $articles = array();
    $i=0;
    $dt = mysqli_query($mysqli, "SELECT * FROM tdokumen WHERE id_user = 2");
    while($data = mysqli_fetch_array($dt)){

        $judul = $casefolding->casefol($data['judul']);
        $isi   = $casefolding->casefol($data['isi_dokumen']);
        
        $judul = $stopremoval->clean($judul);
        $isi   = $stopremoval->clean($isi);

        $judul = $stemmer->stem($judul);
        $isi   = $stemmer->stem($isi);

        $articles[$i]  =  array(
                        "article" => $data['judul'],
                        //"tags"    => explode(' ',$judul.' '.$isi)
                        "tags"    => explode(' ',$isi)
                    );
        $i++;
    }

    $dot = CosineSimilarity::dot(call_user_func_array("array_merge", array_column($articles, "tags")));

    //$target = explode(' ',$judul1." ".$isi_dokumen1);
    $target = explode(' ',$isi_dokumen1);
    //echo "compare two one-hot encoding vector\n";
    //echo "example articles:\n";
    //print_r($articles);
    //echo "target article:\n";
    //print_r($target);

    $i=0;
    foreach($articles as $article) {
        $score[$article['article']] = CosineSimilarity::cosine($target, $article['tags'], $dot);
        $similarity[$i] = CosineSimilarity::cosine($target, $article['tags'], $dot);
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


      
      $no=1;
      foreach($score as $sc => $v){
        if($v <> 0){

        $data[] = [
                     "no"      => $no,
                     "judul"   => $sc,
                     "akurasi" => number_format(($v*100),2)." Persen"
                  ]; 

         $no++;
         }
      }

        $result[]=[
                    "judul"=>$_POST['judul'],
                    "akurasi" =>(number_format(max($similarity),3)*100)." Persen",
                    "waktu"=>number_format($execution_time,5)." Detik"
                 ];

       //$res[]=["Hasil"=>$result, "Detail"=>$data];
       $res[]=["Hasil"=>$result];
  
  echo json_encode($res);

?>
