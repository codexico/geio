<?php
/**
 * Regras de pluralização e singualização do português
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Sadjow Medeiros Leão <sadjow@gmail.com>
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

	$pluralRules = array(
		'/^(.*)ao$/i' => '\1oes',
		'/^(.*)(r|s|z)$/i' => '\1\2es',
		'/^(.*)(a|e|o|u)l$/i' => '\1\2is',
		'/^(.*)il$/i' => '\1is',
		'/^(.*)(m|n)$/i' => '\1ns',
		'/^(.*)$/i' => '\1s'
	);

	$uninflectedPlural = array('atlas', 'lapis', 'onibus', 'pires', 'virus', '.*x');
	
	//codexico: fica mais bacana o contato singular
	$uninflectedPlural = array_merge($uninflectedPlural, array('contato'));

	$irregularPlural = array(
		'abdomens' => 'abdomen',
		'alemao' => 'alemaes',
		'artesa' => 'artesaos',
		'as' => 'ases',
		'bencao' => 'bencaos',
		'cao' => 'caes',
		'capelao' => 'capelaes',
		'capitao' => 'capitaes',
		'chao' => 'chaos',
		'charlatao' => 'charlataes',
		'cidadao' => 'cidadaos',
		'consul' => 'consules',
		'cristao' => 'cristaos',
		'dificil' => 'dificeis',
		'escrivao' => 'escrivaes',
		'fossel' => 'fosseis',
		'germens' => 'germen',
		'grao' => 'graos',
		'hifens' => 'hifen',
		'irmao' => 'irmaos',
		'liquens' => 'liquen',
		'mal' => 'males',
		'mao' => 'maos',
		'orfao' => 'orfaos',
		'pais' => 'paises',
		'pao' => 'paes',
		'perfil' => 'perfis',
		'projetil' => 'projeteis',
		'reptil' => 'repteis',
		'sacristao' => 'sacristaes',
		'sotao' => 'sotaos',
		'tabeliao' => 'tabeliaes'
	);
        
        //manter o funcionamento do acl
        $irregularPlural = array_merge($irregularPlural, array('user' => 'users', 'group' => 'groups'));

	$singularRules = array(
		'/^(.*)(oes|aes|aos)$/i' => '\1ao',
		'/^(.*)(a|e|o|u)is$/i' => '\1\2l',
		'/^(.*)e?is$/i' => '\1il',
		'/^(.*)(r|s|z)es$/i' => '\1\2',
		'/^(.*)ns$/i' => '\1m',
		'/^(.*)s$/i' => '\1',
	);

	$uninflectedSingular = $uninflectedPlural;

	$irregularSingular = array_flip($irregularPlural);
?>
