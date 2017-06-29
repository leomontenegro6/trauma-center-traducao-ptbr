<?php
function obterListaPonteiros(){
	return array(
		// Offsets de textos do sistema, possivelmente a ser tratados
		// sem mexer nos seus ponteiros
		'sistema'=>array(
			'0c5d98', '0c5620', '0c5624', '0c5d9c', '02c618', '02c530',
			'02c61c', '02c718', '02c620', '02c71c', '02c1fc', '02c200',
			'02c204'
		),
		// Offsets do capítulo 1, do modo história
		'cap1-historia'=>array(
			'0f5568', '1d6aac', '1d6ab0', '1d6be4', '1d6ab4', '1d6be8',
			'1d6ab8', '1d6bec', '1d6abc', '1d6ac0', '1d6bf4', '1d6ac4',
			'1d6bf8', '1d6ac8', '1d6acc', '1d6c00'
		),
		// Offsets do capítulo 2, do modo história
		'cap2-historia'=>array(
			'1d6ad0', '1d6c04', '1d6ad4', '1d6ad8', '1d6c0c', '1d6adc',
			'1d6c10', '1d6ae0', '1d6ae4', '1d6c18', '1d6ae8', '1d6aec',
			'1d6af0', '1d6c24', '1d6af4', '1d6af8', '1d6c2c'
		),
		// Offsets do capítulo 3, do modo história
		'cap3-historia'=>array(
			'1d6afc', '1d6b00', '1d6c34', '1d6b04', '1d6b08', '1d6c3c',
			'1d6b0c', '1d6b10', '1d6c44', '1d6b14', '1d6b18', '1d6c4c',
			'1d6b1c', '1d6b20', '1d6c54'
		),
		// Offsets do capítulo 4, do modo história
		'cap4-historia'=>array(
			'1d6b24', '0c8e9c', '0c8ebc', '0c8eb0', '0c8ec0', '0c8ec8',
			'0c8ec4', '0c8ecc', '1d6b3c', '1d6b40', '1d6c74', '1d6b44',
			'1d6b48', '1d6c7c', '1d6b4c', '1d6c80', '1d6b50', '1d6c84',
			'1d6b54', '1d6c88', '1d6b58', '1d6c8c', '1d6b5c'
		),
		// Offsets do capítulo 5, do modo história
		'cap5-historia'=>array(
			'1d6b60',
			'1d6b64', '1d6c98', '1d6b68', '1d6b70', '1d6b78', '1d6c9c',
			'1d6b7c', '1d6cb0', '1d6b80', '1d6b84', '1d6cb8', '1d6b88',
			'1d6b8c', '1d6cc0', '1d6b90', '1d6cc4', '1d6b94', '1d6cc8'
		),
		// Offsets do capítulo 6, do modo história
		'cap6-historia'=>array(
			'1d6b98', '1d6b9c', '1d6cd0', '1d6ba0', '1d6cd4', '1d6ba4',
			'1d6cd8', '1d6ba8', '1d6cdc', '1d6bac', '1d6ce0', '1d6bb0',
			'1d6ce4', '1d6bb4', '1d6ce8', '1d6bb8', '1d6bbc'
		),
		// Offsets do capítulo 1, durante as operações
		'cap1-operacoes'=>array(
			'1a290c', '17517c', '195554', '193ad8', '17eb40', '17ea44',
			'1a3b78'
		),
		// Offsets do capítulo 2, durante as operações
		'cap2-operacoes'=>array(
			'19b6f0', '18335c', '18edb8', '19e3d4', '19e7d0', '1a4d88'
		),
		// Offsets do capítulo 3, durante as operações
		'cap3-operacoes'=>array(
			'179b9c', '1aa6b0', '11d8dc', '18c868'
		),
		// Offsets do capítulo 4, durante as operações
		'cap4-operacoes'=>array(
			'19f488', '19f4c0', '19f4f8', '199a14', '192dc8', '181cf4',
			'183ab0'
		),
		// Offsets do capítulo 5, durante as operações
		'cap5-operacoes'=>array(
			'1d6e14', '1d6e38', '1d6e58', '1d6e5c', '1d6e7c', '1d6e80',
			'1d6ea0', '1d60fc', '1d6110', '197e14', '1b0c90', '188b84'
		),
		// Offsets de textos do briefing, na tela de cima
		'briefing-cima'=>array(
			'1870b0', '1d6848', '1d684c', '1d6850', '1d6858', '1d685c',
			'1d6864', '1d6868', '1d6870', '1d687c', '1d6888', '1d6890',
			'1d6898', '1d68a0', '1d68a8', '1d68b0', '1d68b8', '0c8eb4',
			'0c8eb8', '1d68d8', '1d68e0', '1d68e4', '1d68ec', '1d68f0',
			'1d68fc', '1d6900', '1d6908', '1d6910', '1d6914', '1d691c',
			'1d692c', '1d6934', '1d6938', '1d693c', '1d6940', '1d6944',
			'1d6948', '1d694c', '1d6958', '1d695c', '1d6960', '1d6964',
			'1d6968', '1d696c', '1d6970'
		),
		// Offsets de frases curtas, exibidas imediatamente antes das
		// operações começarem
		'pre-operacao'=>array(
			'1d6714', '1d6718', '1d671c', '1d6724', '1d6728', '1d6730',
			'1d6734', '1d673c', '1d6874', '1d6740', '1d6748', '1d675c',
			'1d6764', '1d676c', '1d6774', '1d677c', '1d6784', '1d678c',
			'1d67a4', '1d67ac', '1d67b0', '1d68e8', '1d67b4', '1d67b8',
			'1d67bc', '1d67c8', '1d67cc', '1d67d4', '1d67dc', '1d67e0',
			'1d67e8', '1d6924', '1d67f0', '1d67f8', '1d6800', '1d6804',
			'1d6808', '1d680c', '1d6810', '1d6814', '1d6818', '1d6824',
			'1d6828', '1d682c', '1d6830', '1d6834', '1d6838', '1d683c'
		),
		// Offsets de frases curtas, exibidas logo após o jogador ter
		// fracassado na operação
		'operacao-fracassada'=>array(
			'1d697c', '1d6980', '1d6984', '1d698c', '1d6990', '1d6998',
			'1d699c', '1d69a4', '1d69a8', '1d69b0', '1d6754', '1d69bc',
			'1d69c4', '1d69cc', '1d69d4', '1d69dc', '1d69e4', '1d69ec',
			'1d69f4', '1d6a0c', '1d6a14', '1d6a18', '1d6a1c', '1d6a20',
			'1d6a24', '1d6a30', '1d6a34', '1d6a3c', '1d6a44', '1d6a48',
			'1d6a50', '1d6a58', '1d6a60', '1d6a68', '1d6a6c', '1d6a70',
			'1d6a74', '1d6a78', '1d6a7c', '1d6a80', '1d6a8c', '1d6a90',
			'1d6a94', '1d6a98', '1d6a9c', '1d6aa0', '1d6aa4'
		),
		// Offsets de textos diversos, durante as operações
		'misc-operacoes'=>array(
			'1b5aa4', '1b5db8', '0ba52c', '0ba530'
		),
		// Offsets de textos do briefing, na tela de baixo
		'briefing-baixo'=>array(
			'0cdca4', '0cdca8', '0cdcf8', '0cdbd4', '0cdbd8', '0cdbdc',
			'0cb1fc', '0cb20c', '0cb21c', '0cb22c', '0cb23c', '0cb24c',
			'0cb25c', '0cb26c', '0cb27c', '0cb28c', '0cb29c', '0cb2ac',
			'0cb2bc', '0cb2cc', '0cc2b0', '1d6f3c', '0cc2c0', '0cc2d0',
			'0cc2e0', '0cc2f0', '0cc300', '0cc310', '0cc320', '0cc330',
			'0cc340', '0cc350', '0cc360', '0cc370', '0cc380', '0cc390',
			'0cc3a0', '0cd450', '0cd460', '0cd470', '0cd480', '0cd490',
			'0cd4a0', '0cd4b0', '0cd4c0', '0cd4d0', '0cd4e0', '0cd4f0',
			'0cd500', '0cd510', '0cd520', '0cd530', '0cdab8', '0cdac8',
			'0cdad8', '0cdae8', '0cdaf8', '0cb200', '0cb210', '0cb220',
			'0cb230', '0cb240', '0cb250', '0cb260', '0cb270', '0cb280',
			'0cb290', '0cb2a0', '0cb2b0', '0cb2c0', '0cb2d0', '0cc2b4',
			'0cc2c4', '0cc2d4', '0cc2e4', '0cc2f4', '0cc304', '0cc314',
			'0cc324', '0cc334', '0cc344', '0cc354', '0cc364', '0cc374',
			'0cc384', '0cc394', '0cd444', '0cd454', '0cd464', '0cd474',
			'0cd484', '0cd494', '0cd4a4', '0cd4b4', '0cd4c4', '0cd4d4',
			'0cd4e4', '0cd4f4', '0cd504', '0cd514', '0cd524', '0cd534',
			'0cdabc', '0cdacc', '0cdadc', '0cdaec', '0cdafc', '0cb204',
			'0cb214', '0cb224', '0cb234', '0cb244', '0cb254', '0cb264',
			'0cb274', '0cb284', '0cb294', '0cb2a4', '0cb2b4', '0cb2c4',
			'0cb2d4', '0cc2b8', '0cc2a8', '0cc2c8', '0cc2d8', '0cc2e8',
			'0cc2f8', '0cc308', '0cc318', '0cc328', '0cc338', '0cc348',
			'0cc358', '0cc368', '0cc378', '0cc388', '0cc398', '0cd448',
			'0cd458', '0cd468', '0cd478', '0cd488', '0cd498', '0cd4a8',
			'0cd4b8', '0cd4c8', '0cd4d8', '0cd4e8', '0cd4f8', '0cd508',
			'0cd518', '0cd528', '0cd538', '0cdac0', '0cdad0', '0cdae0',
			'0cdaf0', '0cdb00', '0cb1f8', '0cb208', '0cb218', '0cb228',
			'0cb238', '0cb248', '0cb258', '0cb268', '0cb278', '0cb288',
			'0cb298', '0cb2a8', '0cb2b8', '0cb2c8', '0cb2d8', '0cc2ac',
			'0cc2bc', '0cc2cc', '0cc2dc', '0cc2ec', '0cc2fc', '0cc30c',
			'0cc31c', '0cc32c', '0cc33c', '0cc34c', '0cc35c', '0cc36c',
			'0cc37c', '0cc38c', '0cc39c', '0cd44c', '0cd45c', '0cd46c',
			'0cd47c', '0cd48c', '0cd49c', '0cd4ac', '0cd4bc', '0cd4cc',
			'0cd4dc', '0cd4ec', '0cd4fc', '0cd50c', '0cd51c', '0cd52c',
			'0cdab4', '0cdac4', '0cdad4', '0cdae4'
		),
		// Offsets desmapeados, sem ponteiros encontrados
		'desmapeados'=>array(
			// Offset de texto do sistema
			'037a14',
			
			// Offsets de textos comuns
			'05a852', '05a94e', '05aa1e', '075642', '075696', '075702',
			'075758', '0757b8', '075806', '075842', '07588a', '0758fe',
			'075976', '0759fc', '075a5a', '075acc', '075b3e', '075bb4',
			'075c10', '075c96', '075d1c', '075d98', '075ed0', '075f4c',
			'075fc8', '076048', '0760d8', '0761c4', '076214', '076280',
			'0762d6', '076342', '0763d8', '076456', '0764c8', '076500',
			'07654c', '076594', '0765f6', '07663e', '0766ce', '07672c',
			'076794', '076800', '076864', '0768d8', '07693a', '0769a6',
			'076a26', '076a98', '076af8', '076baa', '076c28', '076c9c',
			'076d10', '076d8e', '076df8', '076e4c', '076ec2', '076f2c',
			'076fa4', '076fe8', '07703e', '07707e', '0770c6', '077154',
			'0771ca', '077234', '07725a', '077296', '0772de', '077348',
			'077388', '0773fc', '077472', '0774f0', '077568', '0775ce',
			'077608', '077668', '0776e4', '077758', '0777ce', '07783e',
			'077902', '077982', '0779ee', '077a70', '077af2', '077b1e',
			'077b4a', '077bc6', '077c40', '080eb2', '0a855e',
			
			// Offsets de textos do briefing
			'0cddfa', '0cde06', '0cde1e', '0ce38c'
		),
	);
}

function aviso($msg, $quebra=true){
	if($quebra){
		echo $msg . PHP_EOL;
	} else {
		echo $msg . ' ';
	}
}

function ler2BytesHex($arq){
	return strtoupper(bin2hex(fread($arq, 2)));
}

function ler3BytesHexInvertido($arquivo, $posicao=''){
	if(!empty($posicao)){
		fseek($arquivo, $posicao);
	}
	$byte1 = bin2hex(fread($arquivo, 1));
	$byte2 = bin2hex(fread($arquivo, 1));
	$byte3 = bin2hex(fread($arquivo, 1));
	return hexdec($byte3 . $byte2 . $byte1);
}

function escreverByte($arquivo, $byte, $hexadecimal=true){
	if($hexadecimal){
		$byte = hex2bin($byte);
	}
	fwrite($arquivo, $byte);
}

function converterCharByte($char, $tabela_invertida){
	$byte = strtr(utf8_encode($char), $tabela_invertida);
	if(strlen($byte) != 2){
		echo PHP_EOL . "AVISO: Caractere inválido, substituindo para arroba..." . PHP_EOL;
		$byte = '20';
	}
	return $byte;
}

function voltarTupla($arq){
	fseek($arq, (ftell($arq) - 2));
}

function voltar2Tuplas($arq){
	fseek($arq, (ftell($arq) - 4));
}

function checkAlfanumerico($texto){
    $convert = array(
		// Acentos maiúsculos
		"À"=>"A", "Á"=>"A", "Ã"=>"A", "Â"=>"A",
		"Ç"=>"C", "É"=>"E", "Ê"=>"E", "Í"=>"I",
		"Ï"=>"I", "Ó"=>"O", "Ô"=>"O", "Õ"=>"O",
		"Ú"=>"U", "Ü"=>"U", "Ñ"=>"N",
		// Acentos minúsculos
		"à"=>"a", "á"=>"a", "ã"=>"a", "â"=>"a",
		"ç"=>"c", "é"=>"e", "ê"=>"e", "í"=>"i",
		"ï"=>"i", "ó"=>"o", "ô"=>"o", "õ"=>"o",
		"ú"=>"u", "ü"=>"u", "ñ"=>"n"
	);
    return ctype_alnum(strtr($texto, $convert));
}

function checkSinalPontuacao($caractere){
	return in_array($caractere, array('.', '?', '!', '-', '/', ':', '\''));
}

function lerTabelaCaracteres($invertida=false){
	$tabela = array(
		// Caracteres
		'0000'=>' ', '0300'=>',', '0400'=>'.', '0500'=>'·', '0600'=>':', '0700'=>';', '0800'=>'?',
		'0900'=>'!', '1E00'=>'/', '2000'=>'~', '2800'=>'"', '2600'=>"'", '2900'=>'(', '2A00'=>')',
		'3B00'=>'+', '3C00'=>'-', '5400'=>'{e}', '5200'=>'%', '5500'=>'*',
		// Números
		'CB00'=>'0', 'CC00'=>'1', 'CD00'=>'2', 'CE00'=>'3', 'CF00'=>'4', 'D000'=>'5', 'D100'=>'6',
		'D200'=>'7', 'D300'=>'8', 'D400'=>'9',
		// Letras maiúsculas
		'DC00'=>'A', 'DD00'=>'B', 'DE00'=>'C', 'DF00'=>'D', 'E000'=>'E', 'E100'=>'F', 'E200'=>'G',
		'E300'=>'H', 'E400'=>'I', 'E500'=>'J', 'E600'=>'K', 'E700'=>'L', 'E800'=>'M', 'E900'=>'N',
		'EA00'=>'O', 'EB00'=>'P', 'EC00'=>'Q', 'ED00'=>'R', 'EE00'=>'S', 'EF00'=>'T', 'F000'=>'U',
		'F100'=>'V', 'F200'=>'W', 'F300'=>'X', 'F400'=>'Y', 'F500'=>'Z',
		// Letras minúsculas
		'FC00'=>'a', 'FD00'=>'b', 'FE00'=>'c', 'FF00'=>'d', '0001'=>'e', '0101'=>'f', '0201'=>'g',
		'0301'=>'h', '0401'=>'i', '0501'=>'j', '0601'=>'k', '0701'=>'l', '0801'=>'m', '0901'=>'n',
		'0A01'=>'o', '0B01'=>'p', '0C01'=>'q', '0D01'=>'r', '0E01'=>'s', '0F01'=>'t', '1001'=>'u',
		'1101'=>'v', '1201'=>'w', '1301'=>'x', '1401'=>'y', '1501'=>'z',
		// Acentos
		'1010'=>'',
		// Caracteres russos
		'4602'=>'С', '4402'=>'П', '3402'=>'А', '3D02'=>'И', '3502'=>'Б', '4302'=>'О',
		'3602'=>'В', '4002'=>'Л', '3402'=>'А', '4C02'=>'Ч'
	);
	if($invertida){
		return array_flip($tabela);
	} else {
		return $tabela;
	}
}

function startsWith($haystack, $needle){
	// search backwards starting from haystack length characters from the end
	return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}

function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}
