<?php
include('tc_lib.php');

echo "+==============================+" . PHP_EOL;
echo "+ [NDS] Trauma Center (U)      +" . PHP_EOL;
echo "+ Pointer Mapper v0.1          +" . PHP_EOL;
echo "+ RHBR, 2017                   +" . PHP_EOL;
echo "+ Solid_One                    +" . PHP_EOL;
echo "+==============================+" . PHP_EOL;
echo PHP_EOL;
echo "Como usar:" . PHP_EOL;
echo " - Crie uma pasta chamada 'scripts' no mesmo local onde estão os arquivos da tool;" . PHP_EOL;
echo " - Dentro da pasta 'scripts', crie uma pasta de nome 'original';" . PHP_EOL;
echo " - Extraia, da rom do jogo (preferencialmente a americana), o arquivo 'arm9.bin'" . PHP_EOL;
echo " - Ponha o arquivo acima dentro da pasta 'original' e execute este script;" . PHP_EOL;
echo " - Será exibida, na tela, uma lista com todos os ponteiros mapeados." . PHP_EOL;
echo PHP_EOL;

$script = fopen('scripts/original/arm9.bin', 'r');

$offset_inicio_textos = hexdec('0CDDE0');
$offset_fim_textos = hexdec('0D0E5C');

$valores_ponteiros = array();

aviso('Percorrendo textos para obter os valores dos ponteiros...', false);
for($i=$offset_inicio_textos; $i<$offset_fim_textos; $i += 2){
	fseek($script, $i);
	$tupla_atual = ler2BytesHex($script);
	fseek($script, $i - 2);
	$tupla_anterior = ler2BytesHex($script);
	
	if($tupla_anterior == 'F2FF'){
		$offset_texto = str_pad(dechex($i), 6, "0", STR_PAD_LEFT);
		
		$bytes_offset_texto = str_split($offset_texto, 2);
		$valor_ponteiro = $bytes_offset_texto[2] . $bytes_offset_texto[1] . $bytes_offset_texto[0] . '02';
		
		$valores_ponteiros[$offset_texto] = $valor_ponteiro;
	}
}
$total_valores_ponteiros = count($valores_ponteiros);

aviso("Foram encontrados {$total_valores_ponteiros} valores.");

/*
aviso('Percorrendo ponteiros não-achados...', false);
$ponteiros_nao_achados = array(
	'05a852', '05a94e', '05aa1e', '075642', '075696', '075702', '075758',
	'0757b8', '075806', '075842', '07588a', '0758fe', '075976', '0759fc',
	'075a5a', '075acc', '075b3e', '075bb4', '075c10', '075c96', '075d1c',
	'075d98', '075ed0', '075f4c', '075fc8', '076048', '0760d8', '0761c4',
	'076214', '076280', '0762d6', '076342', '0763d8', '076456', '0764c8',
	'076500', '07654c', '076594', '0765f6', '07663e', '0766ce', '07672c',
	'076794', '076800', '076864', '0768d8', '07693a', '0769a6', '076a26',
	'076a98', '076af8', '076baa', '076c28', '076c9c', '076d10', '076d8e',
	'076df8', '076e4c', '076ec2', '076f2c', '076fa4', '076fe8', '07703e',
	'07707e', '0770c6', '077154', '0771ca', '077234', '07725a', '077296',
	'0772de', '077348', '077388', '0773fc', '077472', '0774f0', '077568',
	'0775ce', '077608', '077668', '0776e4', '077758', '0777ce', '07783e',
	'077902', '077982', '0779ee', '077a70', '077af2', '077b1e', '077b4a',
	'077bc6', '077c40', '080eb2', '0a855e'
);
foreach($ponteiros_nao_achados as $offset_texto){
	$bytes_offset_texto = str_split($offset_texto, 2);
	$valor_ponteiro = $bytes_offset_texto[2] . $bytes_offset_texto[1] . $bytes_offset_texto[0] . '02';
	
	$valores_ponteiros[$offset_texto] = $valor_ponteiro;
}
*/
$total_ponteiros_achados = 0;

aviso('Procurando pelos offsets dos ponteiros, a partir de seus valores hexadecimais...');
foreach($valores_ponteiros as $offset=>$valor){
	aviso("Ponteiro {$offset}, de valor {$valor}...", false);
	
	$checkPonteiroEncontrado = false;
	
	fseek($script, 0);
	while(!feof($script)){
		$bytes = fread($script, 4);
		if(bin2hex($bytes) == $valor){
			$offset_encontrado = str_pad(dechex( ftell($script) - 4 ), 6, "0", STR_PAD_LEFT);
			aviso("achado no offset {$offset_encontrado}!");
			$total_ponteiros_achados++;
			$checkPonteiroEncontrado = true;
			break;
		} //else if(!feof($script)) fseek($script, -3, SEEK_CUR);
	}
	
	if(!$checkPonteiroEncontrado){
		aviso("Não encontrado.");
	}
}
aviso("Operação concluída. Foram encontrados {$total_ponteiros_achados} ponteiros.");

fclose($script);
