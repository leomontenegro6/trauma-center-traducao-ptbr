<?php
include('tc_lib.php');

echo "+==============================+" . PHP_EOL;
echo "+ [NDS] Trauma Center (U)      +" . PHP_EOL;
echo "+ Script Dumper v0.1           +" . PHP_EOL;
echo "+ RHBR, 2017                   +" . PHP_EOL;
echo "+ Solid_One                    +" . PHP_EOL;
echo "+==============================+" . PHP_EOL;
echo PHP_EOL;
echo "Como usar:" . PHP_EOL;
echo " - Crie uma pasta chamada 'scripts' no mesmo local onde estão os arquivos da tool;" . PHP_EOL;
echo " - Dentro da pasta 'scripts', crie outras duas pastas de nome 'original' e 'dumpados';" . PHP_EOL;
echo " - Extraia, da rom do jogo (preferencialmente a americana), o arquivo 'arm9.bin'" . PHP_EOL;
echo " - Ponha o arquivo acima dentro da pasta 'original' e execute este script;" . PHP_EOL;
echo " - A extração dará início em seguida, salvando os scripts na pasta 'dumpados'." . PHP_EOL;
echo PHP_EOL;

aviso('Lendo tabela...', false);
$tabela = lerTabelaCaracteres(false);
aviso('OK!');
aviso('Iniciando extração dos scripts...');

$script = fopen('scripts/original/arm9.bin', 'r');

$lista_ponteiros = obterListaPonteiros();
foreach($lista_ponteiros as $tipo=>$ponteiros){
	$documento = new DOMDocument('1.0', 'utf-8');
	$documento->formatOutput = true;
	
	$caminho_script_dumpado = "scripts/dumpados/{$tipo}.html";
	
	aviso("Extraindo textos de tipo \"{$tipo}\" para arquivo de texto \"{$tipo}.html\"...", false);
	
	foreach($ponteiros as $ponteiro){
		$secao = $documento->createElement('div');
		$secao = $documento->appendChild($secao);
		
		if($tipo == 'desmapeados'){
			$endereco_ponteiro = 0;
			$endereco_inicio_textos = hexdec($ponteiro);
			
			$endereco_ponteiro_hex = str_pad(dechex($endereco_ponteiro), 6, "0", STR_PAD_LEFT);
			$endereco_inicio_textos_hex = str_pad(dechex($endereco_inicio_textos), 6, "0", STR_PAD_LEFT);
		} else {
			$endereco_ponteiro = hexdec($ponteiro);
			$endereco_inicio_textos = ler3BytesHexInvertido($script, $endereco_ponteiro);
			
			$endereco_ponteiro_hex = str_pad(dechex($endereco_ponteiro), 6, "0", STR_PAD_LEFT);
			$endereco_inicio_textos_hex = str_pad(dechex($endereco_inicio_textos), 6, "0", STR_PAD_LEFT);
		}
		
		$secao->setAttribute('data-endereco-ponteiro', $endereco_ponteiro_hex);
		$secao->setAttribute('data-endereco-inicio-textos', $endereco_inicio_textos_hex);
		
		fseek($script, $endereco_inicio_textos);
		
		$bloco = $documento->createElement('p');
		$bloco = $secao->appendChild($bloco);
		
		$bloco->nodeValue = PHP_EOL . "\t";
		
		$flag_parametros = false;
		$total_atributos = 0;
		
		// Percorrendo textos do script em tuplas de 2 bytes,
		// de modo a extrair seu conteúdo para arquivos HTML
		do {
			$tupla = ler2BytesHex($script);
			if($flag_parametros === false) {
				$lista_tags = array(
					'C0FF', 'C1FF', 'C3FF', 'C4FF', 'C5FF', 'C6FF', 'C7FF',
					'CAFF', 'CCFF', 'CDFF', 'E6FF', 'E9FF', 'EBFF'
				);
				
				if(in_array($tupla, $lista_tags)){ // Tags da lista acima
					$total_atributos++;
					$tupla2 = ler2BytesHex($script);
					$bloco->setAttribute("data-a{$total_atributos}-{$tupla}", $tupla2);
				} elseif($tupla == 'C2FF'){ // Voz (?)
					$total_atributos++;
					$tupla2 = ler2BytesHex($script);
					$tupla3 = ler2BytesHex($script);
					
					$tuplas = $tupla2 . $tupla3;
					$bloco->setAttribute("data-a{$total_atributos}-voz", $tuplas);
				} elseif($tupla == 'C8FF'){ // Escurecimento da tela
					$total_atributos++;
					$tupla2 = ler2BytesHex($script);
					$bloco->setAttribute("data-a{$total_atributos}-escurece-tela", $tupla2);
				} elseif($tupla == 'C9FF'){ // Clareamento da tela
					$total_atributos++;
					$tupla2 = ler2BytesHex($script);
					$bloco->setAttribute("data-a{$total_atributos}-clareia-tela", $tupla2);
				} elseif($tupla == 'CBFF'){ // Cinco tuplas
					$total_atributos++;
					$tupla2 = ler2BytesHex($script);
					$tupla3 = ler2BytesHex($script);
					$tupla4 = ler2BytesHex($script);
					$tupla5 = ler2BytesHex($script);
					$tupla6 = ler2BytesHex($script);
					
					$tuplas = $tupla2 . $tupla3 . $tupla4 . $tupla5 . $tupla6;
					$bloco->setAttribute("data-a{$total_atributos}-{$tupla}", $tuplas);
				} elseif($tupla == 'E7FF'){ // Avatar
					$total_atributos++;
					$tupla2 = ler2BytesHex($script);
					$bloco->setAttribute("data-a{$total_atributos}-avatar", $tupla2);
				} elseif($tupla == 'F9FF'){ // Quebra de seção alternativa, ao início
					$total_atributos++;
					$bloco->setAttribute("data-a{$total_atributos}-quebra-secao-tipo-2-fim", 'true');
				} else {
					// Caractere diferente dos acima.
					// Nesse caso, voltar um byte no arquivo e ativar a flag de parâmetros,
					// para o decoder extrair corretamente o texto do script em si,
					// em função da tabela de caracteres
					$flag_parametros = true;
					voltarTupla($script);
					continue;
				}
			} else {
				// Do contrário, são textos comuns
				if($tupla == 'F3FF'){ // Quebra de linha
					$char = '|';
				} elseif($tupla == 'F1FF'){ // Pausa de diálogos
					$char = '@';
				} elseif($tupla == 'F4FF'){ // Quebra de seção
					$char = '';
					
					// Inserindo quebras de formatação ao fim do bloco
					$bloco->nodeValue .= PHP_EOL;
					
					// Criando novo bloco e atualizando a variável
					$bloco = $documento->createElement('p');
					$bloco = $secao->appendChild($bloco);
					
					// Inserindo quebras de formatação no novo bloco
					$bloco->nodeValue = PHP_EOL . "\t";
					
					// Desativando flag de parâmetros, para que o próximo bloco
					// tenha suas tags devidamente interpretadas
					$flag_parametros = false;
					$total_atributos = 0;
				} elseif($tupla == 'F9FF'){ // Quebra de seção tipo 2
					$char = '';
					
					// Inserindo atributo para simbolizar a inserção deste tipo de quebra
					// ao final do bloco
					$total_atributos++;
					$bloco->setAttribute("data-a{$total_atributos}-quebra-secao-tipo-2-fim", 'true');
					
					// Inserindo quebras de formatação ao fim do bloco
					$bloco->nodeValue .= PHP_EOL;
					
					// Criando novo bloco e atualizando a variável
					$bloco = $documento->createElement('p');
					$bloco = $secao->appendChild($bloco);
					
					// Inserindo quebras de formatação no novo bloco
					$bloco->nodeValue = PHP_EOL . "\t";
					
					// Desativando flag de parâmetros, para que o próximo bloco
					// tenha suas tags devidamente interpretadas
					$flag_parametros = false;
					$total_atributos = 0;
				} elseif($tupla == 'F5FF'){ // Quebra de seção tipo 3
					$char = '';
					
					// Inserindo atributo para simbolizar a inserção deste tipo de quebra
					// ao final do bloco
					$total_atributos++;
					$bloco->setAttribute("data-a{$total_atributos}-quebra-secao-tipo-3-fim", 'true');
					
					// Inserindo quebras de formatação ao fim do bloco
					$bloco->nodeValue .= PHP_EOL;
					
					// Criando novo bloco e atualizando a variável
					$bloco = $documento->createElement('p');
					$bloco = $secao->appendChild($bloco);
					
					// Inserindo quebras de formatação no novo bloco
					$bloco->nodeValue = PHP_EOL . "\t";
					
					// Desativando flag de parâmetros, para que o próximo bloco
					// tenha suas tags devidamente interpretadas
					$flag_parametros = false;
					$total_atributos = 0;
				} elseif($tupla == 'F2FF'){ // Fim de texto
					$char = PHP_EOL;
				} elseif(in_array($tupla, array('C0FF', 'C2FF', 'C6FF', 'C7FF', 'ECFF', 'E9FF', 'EBFF', 'FAFF'))){
					// Tags adicionais, situadas no final de blocos.
					// Nesse caso, interpretá-las e inserir o sufixo "-fim",
					// para simbolizar que ele deve ser reinserido no final
					// do bloco
					$char = '';
					$total_atributos++;
					$tupla2 = ler2BytesHex($script);
					$bloco->setAttribute("data-a{$total_atributos}-{$tupla}-fim", $tupla2);
				} elseif(array_key_exists($tupla, $tabela)){
					// Caractere de texto comum.
					$char = strtr($tupla, $tabela);
				} else {
					// Caractere desconhecido. Exibir seu valor entre tags
					$char = ('{' . $tupla . '}');
				}
				
				$bloco->nodeValue .= $char;
			}
		} while($tupla != 'F2FF');
		
		$endereco_fim_texto = str_pad(dechex( ftell($script) ), 6, "0", STR_PAD_LEFT);
		$secao->setAttribute('data-endereco-fim-textos', $endereco_fim_texto);
	}
	
	$documento->saveHTMLFile($caminho_script_dumpado);
		
	// Realizando pós-formatação do script HTML
	$html_script = file($caminho_script_dumpado);
	
	foreach($html_script as $i=>$linha){
		$html_script[$i] = str_replace('</div><div', "</div>\n<div", $html_script[$i]);
	}
	foreach($html_script as $i=>$linha){
		$checkTagSecao = (startsWith($linha, '<div') || startsWith($linha, '</div'));
		if(!$checkTagSecao){
			$html_script[$i] = "\t" . $html_script[$i];
		}
		
		$html_script[$i] = str_replace('|', "<br />\n\t\t", $html_script[$i]);
		$html_script[$i] = str_replace('@', "<hr />", $html_script[$i]);
		$html_script[$i] = str_replace('{e}', "&", $html_script[$i]);
	}
	file_put_contents($caminho_script_dumpado, implode('', $html_script));
	
	aviso("OK!");
}

fclose($script);
aviso('Scripts extraídos com sucesso!');
