#!/bin/bash
#echo "Copiando scripts traduzidos do projeto do OmegaT para a pasta da tool..."
#cp -v /home/user/OmegaTProjects/Mega\ Man\ ZX/target/*.txt tool/scripts/traduzidos/

echo "Reinserindo scripts traduzidos..."
cd tool
php tc_inserter.php
#php tc_inserter_trim.php
cd ..

echo "Copiando scripts reinseridos para a rom desempacotada via ndstool..."
cp -v tool/scripts/reinseridos/*.bin tc/data/

echo "Re-empacotando a rom, para teste"
./empacotar_rom.sh tc

echo "Destrimmando a rom, para mantê-la no seu tamanho original de 64mb"
./destrimmar_rom.sh
