<?php 
/* SVN FILE: $Id$ */
/* App schema generated on: 2010-04-12 15:04:13 : 1271097613*/
class AppSchema extends CakeSchema {
	var $name = 'App';

	var $file = 'schema_3.php';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $acos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'model' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'alias' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $aros = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'model' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'alias' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $aros_acos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'aro_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'aco_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'_create' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_read' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_update' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_delete' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'ARO_ACO_KEY' => array('column' => array('aro_id', 'aco_id'), 'unique' => 1))
	);
	var $bairros = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'cidade_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'descricao' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 72),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'cidade_codigo' => array('column' => 'cidade_id', 'unique' => 0))
	);
	var $cidades = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'cidade' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 72),
		'cep' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 8),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'uf_codigo' => array('column' => 'estado_id', 'unique' => 0))
	);
	var $consumidores = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'rg' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20),
		'cpf' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 16, 'key' => 'unique'),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'cel' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20),
		'tel' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'sexo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'nascimento' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'estado_civil' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'grau_de_instrucao' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'profissao' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'obs' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 510),
		'saldo_bandeira' => array('type' => 'float', 'null' => true, 'default' => '0'),
		'saldo_outros' => array('type' => 'float', 'null' => true, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'cep' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 8),
		'endereco' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 900),
		'logradouro' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 80),
		'numero' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10),
		'bairro' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 40),
		'cidade' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 40),
		'estado' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 40),
		'complemento' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20),
		'pais' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 40),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'cpf' => array('column' => 'cpf', 'unique' => 1))
	);
	var $cupom_fiscais = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'codigo' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'data_compra' => array('type' => 'timestamp', 'null' => true, 'default' => NULL),
		'troca_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'loja_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'consumidor_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'valor' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'forma_de_pagamento' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20),
		'bandeira' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $cupom_promocionais = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'troca_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'promotor_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'consumidor_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'data_impressao' => array('type' => 'timestamp', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $dia_trocas = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'dia' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $enderecos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'bairro_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'cep' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 8),
		'logradouro' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 72),
		'complemento' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 72),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'bairro_codigo' => array('column' => 'bairro_id', 'unique' => 0))
	);
	var $estados = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'paise_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'sigla' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2),
		'estado' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 40),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $funcionarios = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'rg' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20),
		'cpf' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20),
		'loja_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'tel' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'cel' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'sexo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'nascimento' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'profissao' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'obs' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 510),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $groups = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $lojas = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'razao_social' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'nome_fantasia' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'participante' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'cnpj' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'numero_da_loja' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 10),
		'ramo_de_atividade' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'contato' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'email_contato' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'telefone' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'razao_social' => array('column' => array('razao_social', 'nome_fantasia'), 'unique' => 0))
	);
	var $paises = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'iso' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2, 'key' => 'unique'),
		'iso3' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 3),
		'numcode' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 6),
		'nome' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'iso' => array('column' => 'iso', 'unique' => 1))
	);
	var $promotores = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'rg' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 20),
		'cpf' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 16),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'tel' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'cel' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20),
		'obs' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 510),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $resumo_diarios = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'dia' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'qtd_consumidores' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6),
		'qtd_consumidores_novos' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6),
		'qtd_cupons_fiscais' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 7),
		'qtd_cupons_promocionais' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 7),
		'ticket_medio_consumidor' => array('type' => 'float', 'null' => true, 'default' => '0'),
		'ticket_medio_cupom_fiscal' => array('type' => 'float', 'null' => true, 'default' => '0'),
		'valor_total' => array('type' => 'float', 'null' => true, 'default' => '0'),
		'valor_bandeira' => array('type' => 'float', 'null' => true, 'default' => '0'),
		'valor_outros' => array('type' => 'float', 'null' => true, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $trocas = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'promotor_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'consumidor_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'qtd_cf' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3),
		'valor_total' => array('type' => 'float', 'null' => true, 'default' => '0'),
		'valor_bandeira' => array('type' => 'float', 'null' => true, 'default' => '0'),
		'valor_outros' => array('type' => 'float', 'null' => true, 'default' => '0'),
		'qtd_cp' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 5),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $users = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'unique'),
		'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 40),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'username' => array('column' => 'username', 'unique' => 1))
	);
	var $usuarios = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
?>