<?php
include('tc_lib.php');

echo "+==============================+" . PHP_EOL;
echo "+ [NDS] Trauma Center (U)      +" . PHP_EOL;
echo "+ Script Inserter v0.1         +" . PHP_EOL;
echo "+ RHBR, 2017                   +" . PHP_EOL;
echo "+ Solid_One                    +" . PHP_EOL;
echo "+==============================+" . PHP_EOL;
echo PHP_EOL;
echo "Como usar:" . PHP_EOL;
echo " - Extraia os scripts da rom americana com o Script Dumper, se já não tiver o feito;" . PHP_EOL;
echo " - Dentro da pasta 'scripts', crie outras duas pastas 'traduzidos' e 'reinserido';" . PHP_EOL;
echo " - Copie todos os arquivos de texto da pasta 'dumpados' para a pasta 'traduzidos';" . PHP_EOL;
echo " - Comece a traduzir os scripts da pasta 'traduzidos', mantendo os originais da pasta 'dumpados' intactos;" . PHP_EOL;
echo " - À medida que for traduzindo, ou ao terminar tudo, execute este script;" . PHP_EOL;
echo " - A reinserção dará início em seguida, re-gerando o arquivo arm9.bin na pasta 'dumpado', pronto para ser testado no jogo;" . PHP_EOL;
echo PHP_EOL;

aviso('Verificando quantidade de scripts dumpados...', false);
$textos = glob('scripts/traduzidos/*.html', GLOB_BRACE);
$total_textos = count($textos);
aviso($total_textos);
if($total_textos > 0){
	//aviso('Lendo tabela...', false);
	//$tabela = lerTabelaCaracteres(true);
	//aviso('OK!');
	
	libxml_use_internal_errors(true);
	
	aviso('Iniciando reinserção dos scripts no arm9.bin...');
	foreach($textos as $texto) {
		$doc = new DOMDocument();
		$doc->loadHTMLFile($texto);
		
		// Percorrendo seções do script (elementos <div>)
		foreach($doc->getElementsByTagName('div') as $secao){
			$endereco_ponteiro = $endereco_inicio_textos = $endereco_fim_textos = '';
			
			// Percorrendo atributos da seção atual, para dela
			// obter os endereços de ponteiros e textos.
			if ($secao->hasAttributes()) {
				foreach ($secao->attributes as $atributo) {
					$nome = $atributo->name;
					$valor = $atributo->value;
					
					if($nome == 'data-endereco-ponteiro'){
						$endereco_ponteiro = $valor;
					} elseif($nome == 'data-endereco-inicio-textos'){
						$endereco_inicio_textos = $valor;
					} elseif($nome == 'data-endereco-fim-textos'){
						$endereco_fim_textos = $valor;
					}
				}
			}
			
			if(empty($endereco_ponteiro) || empty($endereco_inicio_textos) || empty($endereco_fim_textos)){
				die('Erro: Não foi possível obter os endereços de ponteiros e textos');
			}
			
			// Percorrendo blocos da seção atual (elementos <p>)
			foreach($secao->getElementsByTagName('p') as $bloco){
				$texto = trim($bloco->nodeValue);
				
				$tags = array(
					'inicio'=>array(),
					'fim'=>array()
				);
				
				// Percorrendo atributos do bloco atual, de modo a separar
				// os de início e fim
				if ($bloco->hasAttributes()) {
					foreach ($bloco->attributes as $atributo) {
						$nome = str_replace('data-a', '', $atributo->name);
						$valor = $atributo->value;
						
						if(endsWith($nome, 'fim')){
							$nome = str_replace('-fim', '', $nome);
							$posicao = 'fim';
						} else {
							$posicao = 'inicio';
						}
						
						$numero = explode('-', $nome);
						$numero = (int)$numero[0];
						$nome = str_replace("{$numero}-", '', $nome);
						
						$tags[$posicao][$numero] = array(
							$nome=>$valor
						);
					}
				}
				
				// TODO: Inserir tags de inicio
				foreach($tags['inicio'] as $numero=>$tag){
					$atributo = key($tag);
					$valor = $tag[$atributo];
					
					// Interpretação das tags de início
					if($atributo == 'voz'){ // Voz
						$tupla = 'C2FF';
					} elseif($atributo == 'escurece-tela'){ // Escurece tela
						$tupla = 'C8FF';
					} elseif($atributo == 'clareia-tela'){ // Clareia tela
						$tupla = 'C9FF';
					} elseif($atributo == 'CBFF'){ // Cinco tuplas
						$tupla = 'CBFF';
					} elseif($atributo == 'avatar'){ // Clareia tela
						$tupla = 'E7FF';
					} else { // Tags gerais de tupla única.
						$tupla = $atributo;
					}
				}
				
				// TODO: Reinserir texto
				
				
				// TODO: Inserir tags de fim
				foreach($tags['fim'] as $numero=>$tag){
					$atributo = key($tag);
					$valor = $tag[$atributo];
					
					// Interpretação das tags de fim
					if($atributo == 'quebra-secao-tipo-2'){ // Quebra de seção de tipo 2
						$tupla = 'F9FF';
						$valor = '';
					} elseif($atributo == 'quebra-secao-tipo-3'){ // Quebra de seção de tipo 2
						$tupla = 'F5FF';
						$valor = '';
					} else { // Tags gerais de tupla única.
						$tupla = $atributo;
					}
				}
				
				// TODO: Inserir quebra de seção
				
			}
			
			// TODO: Inserir fim de texto
			
		}
	}
} else {
	aviso('Nenhum script encontrado!');
}
