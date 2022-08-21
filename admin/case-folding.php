<?php
class CaseFolding {

    public function casefol(string $kalimat): string
    {

		$kalimat = preg_replace('/[^A-Za-z\  ]/', '', strtolower($kalimat));

		return $kalimat; 
	}

} 
