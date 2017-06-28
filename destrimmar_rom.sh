#!/usr/bin/php
<?php
$caminho_rom_trimmada = 'tc.nds';
//$caminho_rom_trimmada = 'teste.nds';

$tamanho_rom_trimmada = filesize($caminho_rom_trimmada);
$tamanho_rom_original = 16777216;

echo 'Destrimmando rom...';
if($tamanho_rom_trimmada < $tamanho_rom_original){
	$arquivo = fopen($caminho_rom_trimmada, 'a');
	
	$espaco_em_branco = '';
	for($i=$tamanho_rom_trimmada; $i<$tamanho_rom_original; $i++){
		$espaco_em_branco .= '00';
	}
	fwrite($arquivo, hex2bin($espaco_em_branco));
	fclose($arquivo);
	echo " OK!\n";
} else {
	echo " Rom já destrimmada!\n";
}
?>
