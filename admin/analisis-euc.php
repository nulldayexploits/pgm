<h2>Analisis Perhitungan Euclidean Distance</h2>
<form method="get" action="">
    Text 1 <input type="text" name="txt1" value="<?php echo $_GET['txt1']; ?>"><br>
    Text 2 <input type="text" name="txt2" value="<?php echo $_GET['txt2']; ?>"><br>
    <input type="submit" name="Submit">
</form>

<?php

class EuclideanDistance {
    static public function dot($tags) {
        $tags = array_unique($tags);
        $tags = array_fill_keys($tags, 0);
        ksort($tags);
        return $tags;
    }
    protected function dot_product($a, $b) {
        $products = array_map(function($a, $b) {
            return $a * $b;
        }, $a, $b);
        return array_reduce($products, function($a, $b) {
            return $a + $b;
        });
    }
    protected function magnitude($point) {
        $squares = array_map(function($x) {
            return pow($x, 2);
        }, $point);
        return sqrt(array_reduce($squares, function($a, $b) {
            return $a + $b;
        }));
    }
    static public function euc($a, $b, $base) {
    $a = array_fill_keys($a, 1) + $base;
    $b = array_fill_keys($b, 1) + $base;
        ksort($a);
        ksort($b);
        return self::dot_product($a, $b) / (self::magnitude($a) * self::magnitude($b)); 
    }
} 


function getSimilarityCoefficient( $item1, $item2, $separator = "," ) {

	$item1 = array_unique(array_map('trim', explode( $separator, strtolower($item1) )));
    echo "Txt 1 Ditransformasikan ke lowercase dan dibuat menjadi array Menjadi Dibawah Ini<br>";
    var_dump($item1);
    echo "<br><br>";

	$item2 = array_unique(array_map('trim', explode( $separator, strtolower($item2) )));
    echo "Txt 2 Ditransformasikan ke lowercase dan dibuat menjadi array Menjadi Dibawah Ini<br>";
    var_dump($item2);
    echo "<br><br>";

    echo "Penggabungan array Dan Mencari Term Yang Sama<br>";
    $arr_intersection = array_intersect( $item2, $item1 );
    var_dump($arr_intersection);
    echo "<br><br>";

    echo "Menggabungkan Kata Lalu Mencari Term Yang Unik<br>";
	$arr_union = array_unique(array_merge( $item1, $item2 ));
    var_dump($arr_union);
    echo "<br><br>";

    echo "Proses Memasukan Kedalam Vektor----<br><br>";
    echo "Mengihutng Nilai Kedekatan Vektor Dari text1 dan text2<br>";
    $coefficient = count( $arr_intersection ) / count( $arr_union );
    var_dump($coefficient);
    	

	return $coefficient;
}


echo "<br><br>Perbandingan similarity Euclidean Distance <b>".$_GET['txt1']."</b> dan <b>".$_GET['txt2']."</b> Adalah ".getSimilarityCoefficient( $_GET['txt1'], $_GET['txt2'], " " );