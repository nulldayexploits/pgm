<?php


    require_once 'case-folding.php';
    $casefolding = new CaseFolding;


        $judul = $casefolding->casefol("Sya 7&* jangaN");
echo $judul;

?>