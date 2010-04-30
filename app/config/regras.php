<?php
/**
 * regras.php
 *
 * Regras da campanha
 */


/**
 * Valor minimo em R$ necessarios para gerar um cupom ou brinde
 *
 * @global int $GLOBALS['config']
 * @name $config
 */
$config['Regras.Valor'] =  50;


/**
 * True se acumula os saldos, False se descarta o saldo
 *
 * @global boolean $GLOBALS['config']
 * @name $config
 */
$config['Regras.Saldo.true'] =  FALSE;


/**
 * True se tem alguma bandeira patrocinadora
 *
 * @global boolean $GLOBALS['config']
 * @name $config
 */
$config['Regras.Bandeira.true'] = TRUE;
/**
 * Nome da bandeira patrocinadora
 *
 * @global String $GLOBALS['config']
 * @name $config
 */
$config['Regras.Bandeira.nome'] =  'VISA';
/**
 * Quantidade de cupons por 'Regras.Valor'
 *
 * @global int $GLOBALS['config']
 * @name $config
 */
$config['Regras.Bandeira.valor'] =  3;


/**
 * True se troca por brinde, false se imprime cupom
 *
 * @global boolean $GLOBALS['config']
 * @name $config
 */
$config['Regras.Brinde.true'] = FALSE;
/**
 * Máximo de brindes que um consumidor pode retirar
 *
 * @global int $GLOBALS['config']
 * @name $config
 */
$config['Regras.Brinde.max'] = 4;


?>