<?php
/**
 * Gerador
 *
 * O Gerador � utilizado para criar os modelos BASE da aplica��o a partir de um banco de dados Postgres.
 *
 * Ap�s configurado os dados de conex�o, o gerador faz a leitura banco de dados criado (tabelas, sequences...)
 * A partir do SCHEMA definido, s�o gerados os modelos.
 *
 * CHANGELOG
 *  - 1.2.0
 *  	- Migra��o do gerador para OOP ( melhorar =D );
 *  	- Adicionado m�todo de retorno com o resultado do script ( getResult() );
 *  	- Adicionado "@copyright" no cabe�alho dos modelos;
 *  	- Removido constantes de diret�rios;
 *  	- Removido TODO:
 *  		- migrar script Gerador para OOP;
 *  	- Adicionado TODO:
 *  		- m�todo saveCascade();
 *
 *
 *  - 1.1.1
 *  	- Adicionado verifica��o de tipo quando "text" e "boolean"
 *
 *
 * 	- 1.1.0
 * 		- Retirado VERS�O no coment�rio do arquivo "modelo";
 * 		- Adicionado constantes;
 * 		- Adicionado variaveis para os m�todos "chaining" para n�o consultar no banco toda hora;
 * 		- Adicionado m�todos para setar novos objetos "chaining";
 * 		- Adicionado comentarios "@throws Exception" e "@return void";
 *
 *
 * 	- 1.0.3
 * 		- Removido include da classe FUNCOES e adicionado no script gerador, os m�todos "camelcase";
 * 		- Adicionado valida��o no m�todo "...Formatada" para verificar se n�o est� vazio;
 * 		- Adicionado output no m�todo criaModelo caso n�o tenha permiss�o para abrir as pastas;
 * 		- Adicionado valida��o no la�o do gerador onde cria o m�todo retrieveByPk para verificar se existe o indice;
 * 		- Adicionado valida��o no la�o do gerador onde cria os m�todos "chaining" para verificar se existe o indice;
 * 		- Alterado comentario de retorno do m�todo "...Formatada";
 *
 *
 *  - 1.0.2
 *  	- Adicionado constantes de diret�rios:
 *  		- __PATH_DIR 		caminho do modelo;
 *  		- __PATH_DIR_BASE	caminho do modelo base;
 *  		- __PATH_DB			caminho da classe de conexao "Database.php";
 *  		- __PATH_FUNCOES	caminho da classe de funcoes "Funcoes.php";
 *  	- Alterado valor default do m�todo "...Formatada" de "d.m.Y" para "d/m/Y";
 *  	- Adicionado tempo de execu��o no final do script Gerador;
 *  	- Alterado mensagem final do script Gerador;
 *  	- Alterado m�todo "criaModelo" para ocultar warnings e apresentar mensagem de execu��o;
 *  	- Adicionado TODO:
 *  		- migrar script Gerador para OOP;
 *
 *
 *  - 1.0.1
 *  	- Adicionado HEADER charset UTF-8;
 *  	- Removido "@since" do cabe�alho(descri��o) dos modelos;
 *  	- Adicionado data de cria��o do modelo no cabe�alho(descri��o) dos modelos;
 *  	- Alterado valida��es que procuravam na palavra por "timestamp" para verificar por "time"
 *  	- Adicionado TODO:
 *  		- m�todo deleteCascade();
 *
 * TODO
 * 	- m�todo deleteCascade();
 *  - m�todo saveCascade();
 *
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @since 2010-07-27
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

class WeeGenerate {

	const VERSION = '1.2.0';

	protected $time_start;
	protected $time_end;
	protected $created_at;
	protected $path_root;
	protected $path_model;
	protected $path_model_base;
	protected $schema;
	protected $modified_files;


	public function __construct() {

		$this->time_start = microtime(true);
		$this->created_at = date('Y-m-d H:i:s');

		$this->schema 			= array('public');
		$this->modified_files 	= array();

		/*
		 * wee 					<-- path_root
		*  |--lib
		*  	|--model		<-- path_model
		*  		|--base		<-- path_model_base
		*/
		$this->path_root 		= dirname(dirname(__FILE__));
		$this->path_model 		= $this->path_root . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR;
		$this->path_model_base 	= $this->path_model . 'base' . DIRECTORY_SEPARATOR;

	}

	/**
	 * @param string $schema
	 */
	public function addSchema($schema) {
		$this->schema[] = $schema;
	}


	/**
	 * @param string $string
	 */
	private function camelToUnderline($string) {
		$string = preg_replace('/(?<=\\w)(?=[A-Z])/',"_$1", $string);
		return strtolower($string);
	}


	/**
	 * @param string $string
	 * @param boolean $isClass
	 */
	private function underlineToCamel($string, $isClass = false) {
		$words = explode('_', strtolower($string));

		$string = '';
		foreach ($words as $word) {

			if ($isClass) {
				$string .= ucfirst(trim($word));
			} else {
				if (!empty($string)) {
					$string .= ucfirst(trim($word));
				} else {
					$string .= trim($word);
				}
			}

		}
		return $string;
	}


	/**
	 * @param string $nome
	 * @param string $conteudo
	 * @param string $tipo
	 * @throws Exception
	 */
	private function criaModelo($nome, $conteudo, $tipo = 'x+') {

		$strGerAtu = 'novo';
		if (file_exists($nome)) {
			$strGerAtu = 'atualizado';
		}

		$handle = @fopen ( $nome, $tipo );

		if ($handle) {
			if (! fwrite ( $handle, $conteudo )) {
				throw new Exception('Sem permiss�o de escrita no arquivo: <b>'.$nome.'</b>');
			} else {
				$this->modified_files[] = 'Arquivo '.$strGerAtu.': <b>'.$nome.'</b>';
			}
			fclose ( $handle );
		}

	}


	/**
	 * @param string $tipo
	 * @param string $val
	 */
	private function aspas($tipo, $val) {

		switch ($tipo) {
			case 'date':
			case stristr($tipo, 'time'):
			case 'text':
			case stristr($tipo, 'char'):
				$retorno = "'\".".$val.".\"'";
				break;

			default:
				$retorno = "\".".$val.".\"";
				break;
		}

		return $retorno;

	}


	/**
	 * Faz implode do array de schemas
	 */
	private function schemasToStr() {
		$this->schema = "'".implode("','", $this->schema)."'";
	}


	/**
	 * Roda o gerador
	 */
	public function run() {
		$this->schemasToStr();

		$db = Database::getInstance();

		/*
		 * Pegando as PKs e FKs // POSTGRESQL
		*/

		/*$sql = "
		SELECT
		pg_class.relname AS tabela
		, pg_get_constraintdef(pg_constraint.oid) AS definicao_da_restricao
		, pg_attribute.attname  AS pk
		, clf.relname AS tabela_fk
		, af.attname AS fk
		FROM pg_namespace
		JOIN pg_class ON pg_namespace.oid=pg_class.relnamespace
		LEFT JOIN pg_constraint ON pg_class.oid=pg_constraint.conrelid
		LEFT JOIN pg_catalog.pg_attribute af ON (af.attrelid = pg_constraint.confrelid AND af.attnum = pg_constraint.confkey[1])
		JOIN pg_attribute ON (pg_attribute.attrelid=pg_class.oid AND pg_attribute.attisdropped='f')
		LEFT JOIN pg_catalog.pg_class clf ON (pg_constraint.confrelid = clf.oid AND clf.relkind = 'r')
		JOIN pg_index ON ( pg_index.indrelid=pg_class.oid AND pg_index.indisprimary='t' AND ( pg_index.indkey[0]=pg_attribute.attnum OR pg_index.indkey[1]=pg_attribute.attnum OR pg_index.indkey[2]=pg_attribute.attnum OR pg_index.indkey[3]=pg_attribute.attnum OR pg_index.indkey[4]=pg_attribute.attnum OR pg_index.indkey[5]=pg_attribute.attnum OR pg_index.indkey[6]=pg_attribute.attnum OR pg_index.indkey[7]=pg_attribute.attnum OR pg_index.indkey[8]=pg_attribute.attnum OR pg_index.indkey[9]=pg_attribute.attnum ))
		WHERE pg_namespace.nspname IN (".$this->schema.")
		AND pg_class.relkind='r'
		ORDER BY pg_class.relname, definicao_da_restricao DESC
		";*/

		/*
		$sql = "
		SELECT
		C.table_name as tabela
		, C.CONSTRAINT_TYPE as definicao_da_restricao
		, DECODE(C.CONSTRAINT_TYPE, 'P', uc.COLUMN_NAME, '') as pk
		, DECODE(C.CONSTRAINT_TYPE, 'R', uc.TABLE_NAME, '') as tabela_fk
		, DECODE(C.CONSTRAINT_TYPE, 'R', uc.COLUMN_NAME, '') as fk
		FROM
		USER_CONSTRAINTS C
		, USER_CONS_COLUMNS UC
		WHERE
		C.CONSTRAINT_TYPE IN ('R', 'P')
		AND
		C.CONSTRAINT_NAME = UC.CONSTRAINT_NAME
		ORDER BY
		C.table_name
		, C.CONSTRAINT_TYPE DESC
		, uc.COLUMN_NAME
		";
		*/

		/* MYSQL  */
		$sql = "SELECT table_name AS tabela,
				CONSTRAINT_NAME AS definicao_da_restricao,
				IF(REFERENCED_TABLE_SCHEMA IS NULL, COLUMN_NAME, '') AS pk,
				IF(REFERENCED_TABLE_SCHEMA = 'bancosteward', TABLE_NAME, '') AS tabela_fk,
				IF(REFERENCED_TABLE_SCHEMA = 'bancosteward', COLUMN_NAME, '') AS fk
				FROM information_schema.KEY_COLUMN_USAGE
				WHERE TABLE_SCHEMA = 'bancosteward'
				";




		$arrPkFk = array();
		$result = $db->query($sql);

		foreach ($result as $value) {
			if (empty($value['fk'])) {
				$arrPkFk[$value['tabela']]['pk'][] = $value['pk'];
			} else {
				$arrPkFk[$value['tabela']]['fk'][$value['tabela_fk']] = $value['fk'];
			}
		}

		/*
		 * Pegando as sequences.
		* Padr�o definido como: seq_{primary_key}
		*/
		/* POSTGRESQL
		$sql = "
		SELECT
		c.relname AS seqname
		FROM pg_catalog.pg_class c, pg_catalog.pg_namespace n
		WHERE c.relnamespace=n.oid
		AND c.relkind = 'S' AND n.nspname IN (".$this->schema.")
		ORDER BY seqname
		";

		// ORACLE
		$sql = "
		SELECT
		US.SEQUENCE_NAME as seqname
		FROM
		USER_SEQUENCES US
		ORDER BY
		US.SEQUENCE_NAME
		";
		*/


		/* MYSQL  */
		$sql = "
				SELECT
					auto_increment as seqname
				FROM
					information_schema.tables
				WHERE
					table_schema = 'bancosteward';
		";


		$arrSeq = array();
		$result = $db->query($sql);

		foreach ($result as $item) {
			$arrSeq[] = $item['seqname'];
		}


		/*
		 * Pegando os campos das tabelas e o tipo
		*/
		/* POSTGRESQL
		$sql = "
		SELECT
		c.relname as tabela
		, a.attname as campo
		, format_type(t.oid, null) as tipo_de_dado
		FROM
		pg_namespace n, pg_class c,
		pg_attribute a, pg_type t
		WHERE n.oid = c.relnamespace
		AND c.relkind = 'r'     -- no indices
		AND n.nspname IN (".$this->schema.")
		AND a.attnum > 0
		AND not a.attisdropped
		AND a.attrelid = c.oid
		AND a.atttypid = t.oid
		ORDER BY nspname, relname, attname;
		";
		// ORACLE
		$sql = "
		SELECT
		T.TABLE_NAME as tabela
		, T.COLUMN_NAME as campo
		, T.DATA_TYPE as tipo_de_dado
		FROM
		USER_TAB_COLUMNS T
		ORDER BY
		T.TABLE_NAME
		, T.COLUMN_NAME
		";
		*/

		/* MYSQL  */
		$sql = "SELECT c.table_name as tabela, c.column_name as campo, c.data_type AS tipo_de_dado
				FROM information_schema.COLUMNS c
				WHERE c.TABLE_SCHEMA = 'bancosteward'";



		$result = $db->query($sql);

		$arrFinal = array();
		foreach ($result as $item) {
			$arrFinal[$item['tabela']][$item['campo']] = $item['tipo_de_dado'];
		}

		foreach ($arrFinal as $chave => $arrVal) {

			$content = "";
			$content.= "<?php\n";
			$content.= "\n/**\n";
			$content.= " * Classe Base da tabela [".$chave."]\n";
			$content.= " *\n";
			$content.= " * Modelo criado utilizando a classe \"WeeGenerate\" desenvolvido por <Juan Carlos Monestel>\n";
			// 			$content.= " * Data de cria��o do modelo: ".$this->created_at."\n";
			$content.= " *\n";
			$content.= " * ATEN��O:\n";
			$content.= " * - Implementa��es dever�o ser realizadas no modelo ".$this->underlineToCamel($chave, true)."\n";
			$content.= " *\n";
			$content.= " * SERVER_ADDR: ".$_SERVER['SERVER_ADDR']."\n";
			$content.= " * REMOTE_ADDR: ".$_SERVER['REMOTE_ADDR']."\n";
			$content.= " *\n";
			$content.= " * @author Juan Carlos Monestel <juancm86@gmail.com>\n";
			$content.= " * @copyright 2010 Juan Carlos Monestel\n";
			$content.= " * @version ".self::VERSION."\n";
			$content.= " * @package model.base\n";
			$content.= " */\n";
			$content.= "class Base".$this->underlineToCamel($chave, true)." extends Base {\n\n";

			//Declarando constantes (const)
			$content.= "\tconst TABLE_NAME = '".$chave."';\n";
			foreach ($arrVal as $k => $v) {
				$content.= "\tconst ".strtoupper($k)." = '".$k."';\n";
			}

			$content.= "\n";

			//Declarando variaveis (protected)
			foreach ($arrVal as $k => $v) {
				$content.= "\tprotected $".$this->underlineToCamel($k).";\n";
			}

			//Declarando variaveis Chaining(protected)
			if (isset($arrPkFk[$chave])) {
				if (isset($arrPkFk[$chave]['fk'])) {
					foreach ($arrPkFk[$chave]['fk'] as $table => $primary) {
						if (!isset($arrFinal[$chave][$primary])) {
							continue;
						}

						$content.= "\n\t/**\n";
						$content.= "\t * @var ".$this->underlineToCamel($table, true)."\n";
						$content.= "\t */\n";
						$content.= "\tprotected \$j".$this->underlineToCamel($table, true)." = null;\n";
					}
				}
			}
			foreach ($arrPkFk as $table => $arrTable) {
				$primary = $arrPkFk[$chave]['pk'];
				if (isset($arrTable['fk'])) {
					if (isset($arrTable['fk'][$chave]) && ($arrTable['fk'][$chave] == $primary)) {
						$content.= "\n\t/**\n";
						$content.= "\t * @var array ".$this->underlineToCamel($table, true)."[]\n";
						$content.= "\t */\n";
						$content.= "\tprotected \$j".$this->underlineToCamel($table, true)."s = array();\n";
					}
				}
			}
			$content.= "\n\n";


			//Criando GETs E SETs
			foreach ($arrVal as $k => $v) {

				//SET
				$content.= "\n\t/**\n";
				$content.= "\t * @param ".$v." $".$this->underlineToCamel($k)."\n";
				$content.= "\t */\n";
				$content.= "\tpublic function set".$this->underlineToCamel($k, true)."($".$this->underlineToCamel($k).") {\n";
				if ($v == 'boolean') {
					$content.= "\t\tif ($".$this->underlineToCamel($k)." !== null) {\n";
					$content.= "\t\t\t$".$this->underlineToCamel($k)." = (".$v.")$".$this->underlineToCamel($k).";\n";
					$content.= "\t\t}\n";
					$content.= "\t\t$"."this->".$this->underlineToCamel($k)." = $".$this->underlineToCamel($k).";\n";
				} else {
					$content.= "\t\t$"."this->".$this->underlineToCamel($k)." = $".$this->underlineToCamel($k).";\n";
				}
				$content.= "\t}\n\n";

				//GET
				$content.= "\t/**\n";
				$content.= "\t * @return ".$v."\n";
				$content.= "\t */\n";
				$content.= "\tpublic function get".$this->underlineToCamel($k, true)."() {\n";
				$content.= "\t\treturn $"."this->".$this->underlineToCamel($k).";\n";
				$content.= "\t}\n";

				if (stristr($v, 'time') || $v == 'date') {
					$content.= "\n\t/**\n";
					$content.= "\t * @return date|time|null\n";
					$content.= "\t */\n";
					$content.= "\tpublic function get".$this->underlineToCamel($k, true)."Formatada($"."formato = 'd/m/Y') {\n";
					$content.= "\t\tif (!$"."this->get".$this->underlineToCamel($k, true)."()) {\n";
					$content.= "\t\t\treturn null;\n";
					$content.= "\t\t}\n";
					$content.= "\t\treturn date($"."formato, strtotime($"."this->get".$this->underlineToCamel($k, true)."()));\n";
					$content.= "\t}\n";
				}

				if ($v == 'boolean') {
					$content.= "\n\t/**\n";
					$content.= "\t * @return string\n";
					$content.= "\t */\n";
					$content.= "\tpublic function get".$this->underlineToCamel($k, true)."Str() {\n";
					$content.= "\t\tif ($"."this->".$this->underlineToCamel($k)." !== null) {\n";
					$content.= "\t\t\t$".$this->underlineToCamel($k)." = ((".$v.")$"."this->".$this->underlineToCamel($k)." ? 'TRUE' : 'FALSE');\n";
					$content.= "\t\t} else {\n";
					$content.= "\t\t\t$".$this->underlineToCamel($k)." = 'NULL';\n";
					$content.= "\t\t}\n";
					$content.= "\t\treturn $".$this->underlineToCamel($k).";\n";
					$content.= "\t}\n";
				}
			}

			//RetriveByPk
			if (isset($arrPkFk[$chave])) {


				$pksCamel = array();
				if(is_array($arrPkFk[$chave]['pk'])){
					foreach($arrPkFk[$chave]['pk'] as $pkToCamel){
						$pksCamel[] = $this->underlineToCamel($pkToCamel);
					}
				}

				$content.= "\n\t/**\n";
				$fks = '';
				$sep = '';
				$fksCondition = '';
				$sepCondition = ' AND ';
				if (isset($arrPkFk[$chave]['fk'])) {

					for($countPk = 0; $countPk < sizeof($arrPkFk[$chave]['pk']); $countPk++){
						$content.= "\t * @param ".$arrFinal[$chave][$arrPkFk[$chave]['pk'][$countPk]]." $".$this->underlineToCamel($arrPkFk[$chave]['pk'][$countPk])."\n";
					}

					foreach ($arrPkFk[$chave]['fk'] as $value) {

						if (!isset($arrFinal[$chave][$value])) {
							continue;
						}

						$content.= "\t * @param ".$arrFinal[$chave][$value]." $".$this->underlineToCamel($value)."\n";

						$fks.= $sep.'$'.$this->underlineToCamel($value). " = null";
						$sep = ', ';

						if(is_array($pksCamel)){
							if(!in_array($this->underlineToCamel($value), $pksCamel)){
								$fksCondition.= "\t\tif (!is_null($"."".$this->underlineToCamel($value).")) {\n";
								$fksCondition.= "\t\t\t$"."sql.= \"".$sepCondition.$value." = :".$value."\";\n";
								$fksCondition.= "\t\t\t$"."sqlParam[':".$value."'] = $".$this->underlineToCamel($value).";\n";
								$fksCondition.= "\t\t}\n";
							}

						}




					}
					$fks = $sep.$fks;
				}

				$content.= "\t * @throws PDOException\n";
				$content.= "\t * @return ".$this->underlineToCamel($chave, true)."|null\n";
				$content.= "\t */\n";
				$content.= "\tpublic static function retrieveByPk(";

				for($countPk = 0; $countPk < sizeof($arrPkFk[$chave]['pk']); $countPk++){
					if($countPk > 0){
						$content.=", ";
					}
					$content.= "$".$this->underlineToCamel($arrPkFk[$chave]['pk'][$countPk]);
				}


				if(is_array($pksCamel)){
					$fkTmp = str_replace(array(", $"," = null"),array(""),$fks);
					if(!in_array($fkTmp, $pksCamel)){
						$content.= $fks;
					}

				}

				$content.= ", $"."persistente = false) {\n\n";
				$content.= "\t\t$"."sqlParam = array();\n";

				for($countPk = 0; $countPk < sizeof($arrPkFk[$chave]['pk']); $countPk++){
					$content.= "\t\t$"."sqlParam[':".$arrPkFk[$chave]['pk'][$countPk]."'] = $".$this->underlineToCamel($arrPkFk[$chave]['pk'][$countPk]).";\n";
				}
				$content.= "\n";

				$content.= "\n\t\t$"."db = Database::getInstance();\n";
				$content.= "\t\t$"."sql = \"SELECT * FROM ".$chave." WHERE ";

				for($countPk = 0; $countPk < sizeof($arrPkFk[$chave]['pk']); $countPk++){
					if($countPk > 0){
						$content .= " AND ";
					}
					$content .= $arrPkFk[$chave]['pk'][$countPk]." = :".$arrPkFk[$chave]['pk'][$countPk];
				}

				$content .= " \" ; \n";


				if ($fksCondition) {
					$content.= "\n".$fksCondition."\n";
				}
				$content.= "\t\ttry{\n";
				$content.= "\t\t\t$"."result = $"."db->queryOne($"."sql, $"."sqlParam);\n\n";
				$content.= "\t\t\tif (is_null($"."result)) {\n";
				$content.= "\t\t\t\treturn null;\n";
				$content.= "\t\t\t} else {\n";
				$content.= "\t\t\t\t$"."obj = new ".$this->underlineToCamel($chave, true)."();\n";
				$content.= "\t\t\t\t$"."obj->hydrate($"."result);\n\n";
				$content.= "\t\t\t\treturn $"."obj;\n";
				$content.= "\t\t\t}\n\n";
				$content.= "\t\t} catch (PDOException $"."e) {\n";
				$content.= "\t\t\tthrow new PDOException($"."e->getMessage());\n";
				$content.= "\t\t}\n";

				$content.= "\t}\n\n";


				//SAVE
				$content.= "\n\t/**\n";
				$content.= "\t * @throws PDOException\n";
				$content.= "\t * @return void\n";
				$content.= "\t */\n";
				$content.= "\tpublic function save() {\n\n";
				$content.= "\t\t$"."db = Database::getInstance();\n\n";
				$content.= "\t\tif (";

				for($countPk = 0; $countPk < sizeof($arrPkFk[$chave]['pk']); $countPk++){
					if($countPk > 0 ){
						$content .= " && ";
					}
					$content.= "$"."this->".$this->underlineToCamel($arrPkFk[$chave]['pk'][$countPk])."  ";
				}



				$content.= ") {\n\n";
				$content.= "\t\t\t if($"."this->retrieveByPk(";
				for($countPk = 0; $countPk < sizeof($arrPkFk[$chave]['pk']); $countPk++){
					if($countPk > 0){
						$content.=", ";
					}
					$content.= "$"."this->".$this->underlineToCamel($arrPkFk[$chave]['pk'][$countPk]);
				}
				$content.= ")){\n\n";

				$content.= "\t\t\t$"."sql = \"\n";
				$content.= "\t\t\t\tUPDATE\n";
				$content.= "\t\t\t\t\t".$chave."\n";
				$content.= "\t\t\t\tSET\n";

				$arrInsert = array();
				$sep = "";
				foreach ($arrVal as $k => $v) {
					if($v == 'DATE'){
						$content .= "\t\t\t\t\t".$sep.$k." = TO_DATE(:".$k.", 'dd-mm-yyyy HH24:mi:ss')\n";
					}else{
						$content.= "\t\t\t\t\t".$sep.$k." = :".$k."\n";
					}
					$sep = ", ";
				}

				$content.= "\t\t\t\tWHERE\n";

				for($countPk = 0; $countPk < sizeof($arrPkFk[$chave]['pk']); $countPk++){
					$content.= "\t\t\t\t\t";
					if($countPk > 0){
						$content .= "AND ";
					}
					$content.= $arrPkFk[$chave]['pk'][$countPk]." = :".$arrPkFk[$chave]['pk'][$countPk]."\n";
				}

				$content.= "\t\t\t\";\n\n";

				$content.= "\t\t\t}\n\t\t} else {\n\n";

				//Se tem sequence, adiciona a op��o de pegar o pr�ximo valor
				if (in_array("seq_".$arrPkFk[$chave]['pk'], $arrSeq)) {
					$content.= "\t\t\tif (!$"."this->".$this->underlineToCamel($arrPkFk[$chave]['pk']).") {\n";
					$content.= "\t\t\t\t$"."nextId = $"."db->queryOne(\"SELECT nextval('seq_".$arrPkFk[$chave]['pk']."')\");\n";
					$content.= "\t\t\t\t$"."this->".$this->underlineToCamel($arrPkFk[$chave]['pk'])." = $"."nextId['nextval'];\n";
					$content.= "\t\t\t}\n\n";
				} else {

					for($countPk = 0; $countPk < sizeof($arrPkFk[$chave]['pk']); $countPk++){
						if ($arrFinal[$chave][$arrPkFk[$chave]['pk'][$countPk]] == 'integer') {
							$content.= "\t\t\tif (!$"."this->".$this->underlineToCamel($arrPkFk[$chave]['pk'][$countPk]).") {\n";
							$content.= "\t\t\t\t$"."nextId = $"."db->queryOne(\"SELECT (coalesce(max(".$arrPkFk[$chave]['pk'][$countPk]."),0)+1) as nextval FROM ".$chave."\");\n";
							$content.= "\t\t\t\t$"."this->".$this->underlineToCamel($arrPkFk[$chave]['pk'][$countPk])." = $"."nextId['nextval'];\n";
							$content.= "\t\t\t}\n\n";
						}
					}
				}

				$content.= "\t\t\t$"."sql = \"\n";
				$content.= "\t\t\t\tINSERT INTO\n";
				$content.= "\t\t\t\t\t".$chave."\n";

				$content.= "\t\t\t\t(\n";
				$virg = "";
				foreach ($arrVal as $k => $v) {
					$content.= "\t\t\t\t\t".$virg.$k."\n";
					$virg = ", ";
				}
				$content.= "\t\t\t\t) VALUES (\n";
				$virg = "";
				foreach ($arrVal as $k => $v) {
					if($v == 'DATE'){
						$content.= "\t\t\t\t\t".$virg."TO_DATE(:".$k.", 'dd-mm-yyyy HH24:mi:ss')\n";
					}else{
						$content.= "\t\t\t\t\t".$virg.":".$k."\n";
					}
					$virg = ", ";
				}

				$content.= "\t\t\t\t)\n";
				$content.= "\t\t\t\";\n\n";
				$content.= "\t\t}\n\n";

				$content.= "\t\t$"."sqlParam = array();\n";
				foreach ($arrVal as $k => $v) {

					switch ($v) {
						case 'date':
						case stristr($v, 'time'):
							$content.= "\t\t$"."sqlParam[':".$k."'] = $"."this->timeToDate($"."this->".$this->underlineToCamel($k).");\n";
							break;
							/*
							case 'text':
							case stristr($v, 'char'):
							$retorno = $this->aspas($v, "$"."this->".$this->underlineToCamel($k));
							break;
							*/
						case 'boolean':
							$content.= "\t\t$"."sqlParam[':".$k."'] = $"."this->booleanStr($"."this->".$this->underlineToCamel($k).");\n";
							break;
						default:
// 							if($k != 'codigo'){
// 								$content.= "\t\t$"."sqlParam[':".$k."'] = $"."this->".$this->underlineToCamel($k).";\n";
// 							}else{
// 								$content.= "if($"."this->codigo){\n\t\t $"."sqlParam[':".$k."'] = $"."this->".$this->underlineToCamel($k).";\n\t\t}\n";
// 							}
							$content.= "\t\t$"."sqlParam[':".$k."'] = $"."this->".$this->underlineToCamel($k).";\n";
							break;
					}


				}

				$content.= "\n\t\ttry{\n";
				$content.= "\t\t\t$"."db->beginTransaction();\n";
				$content.= "\t\t\t$"."db->execute($"."sql, $"."sqlParam);\n";

// 				$content.= "\t\t\tif (";

// 				for($countPk = 0; $countPk < sizeof($arrPkFk[$chave]['pk']); $countPk++){
// 					if($countPk > 0){
// 						$content .= " && ";
// 					}
// 					$content.= "!$"."this->".$this->underlineToCamel($arrPkFk[$chave]['pk'][$countPk])." ";
// 				}

// 				$content.= ") {\n";
// 				$content.= "\t\t\t\t$"."lastId = $"."db->query('SELECT SEQ_'.$chave.'.CURRVAL FROM DUAL');\n";
// 				$content.= "\t\t\t\t$"."lastId = $"."lastId[0]['currval'];\n";
// 				$content.= "\t\t\t}\n";

				$content.= "\t\t\t$"."db->commit();\n";
				//$content.= "\t\t\treturn $"."lastId;\n";
				$content.= "\t\t\treturn true;\n";
				$content.= "\t\t} catch (PDOException $"."e) {\n";
				$content.= "\t\t\t$"."db->rollBack();\n";
				$content.= "\t\t\tthrow new PDOException($"."e->getMessage());\n";
				$content.= "\t\t}\n";
				$content.= "\t}\n\n";


				//DELETE
				$content.= "\t/**\n";
				$content.= "\t * @throws PDOException\n";
				$content.= "\t * @return void\n";
				$content.= "\t */\n";
				$content.= "\tpublic function delete() {\n\n";
				$content.= "\t\t$"."sqlParam = array();\n";


				for($countPk = 0; $countPk < sizeof($arrPkFk[$chave]['pk']); $countPk++){
					$content.= "\t\t$"."sqlParam[':".$arrPkFk[$chave]['pk'][$countPk]."'] = \$this->".$this->underlineToCamel($arrPkFk[$chave]['pk'][$countPk]).";\n";
				}
				$content.= "\n";

				$content.= "\t\t$"."db = Database::getInstance();\n\n";

				$content.= "\t\t$"."sql = \"\n";
				$content.= "\t\t\tDELETE FROM\n";
				$content.= "\t\t\t\t".$chave."\n";

				$content.= "\t\t\tWHERE\n";


				for($countPk = 0; $countPk < sizeof($arrPkFk[$chave]['pk']); $countPk++){
					$content .= "\t\t\t\t";
					if($countPk > 0){
						$content .= "AND ";
					}
					$content.= $arrPkFk[$chave]['pk'][$countPk]." = :".$arrPkFk[$chave]['pk'][$countPk]."\n";
				}


				$content.= "\t\t\";\n";

				if ($fksCondition) {
					$fksCondition = str_replace('$', '$this->', $fksCondition);
					$fksCondition = str_replace('$this->sql', '$sql', $fksCondition);
					$content.= $fksCondition."\n";
				}

				$content.= "\t\ttry{\n";
				$content.= "\t\t\t$"."db->beginTransaction();\n";
				$content.= "\t\t\t$"."db->execute($"."sql, $"."sqlParam);\n";
				$content.= "\t\t\t$"."db->commit();\n";
				$content.= "\t\t} catch (PDOException $"."e) {\n";
				$content.= "\t\t\t$"."db->rollBack();\n";
				$content.= "\t\t\tthrow new PDOException($"."e->getMessage());\n";
				$content.= "\t\t}\n";
				$content.= "\t}\n\n";



				//CRIANDO os "Methods chaining"
				if (isset($arrPkFk[$chave])) {
					if (isset($arrPkFk[$chave]['fk'])) {
						foreach ($arrPkFk[$chave]['fk'] as $table => $primary) {
							if (!isset($arrFinal[$chave][$primary])) {
								continue;
							}
							//SET
							$content.= "\t/**\n";
							$content.= "\t * @param ".$this->underlineToCamel($table, true)." $".$this->underlineToCamel($table)."\n";
							$content.= "\t */\n";
							$content.= "\tpublic function set".$this->underlineToCamel($table, true)."(".$this->underlineToCamel($table, true)." $".$this->underlineToCamel($table).") {\n";
							$content.= "\t\t\$this->j".$this->underlineToCamel($table, true)." = $".$this->underlineToCamel($table).";\n";
							$content.= "\t}\n\n";

							//GET
							$content.= "\t/**\n";
							$content.= "\t * @throws PDOException\n";
							$content.= "\t * @return ".$this->underlineToCamel($table, true)."|null\n";
							$content.= "\t */\n";
							$content.= "\tpublic function get".$this->underlineToCamel($table, true)."() {\n\n";
							$content.= "\t\tif (is_null(\$this->j".$this->underlineToCamel($table, true).")) {\n";
							$content.= "\t\t\t\$this->j".$this->underlineToCamel($table, true)." = ".$this->underlineToCamel($table, true)."::retrieveByPk(\$this->".$this->underlineToCamel($primary).");\n";
							$content.= "\t\t}\n\n";
							$content.= "\t\treturn \$this->j".$this->underlineToCamel($table, true).";\n";
							$content.= "\t}\n\n";
						}
					}
				}

				foreach ($arrPkFk as $table => $arrTable) {
					$primary = $arrPkFk[$chave]['pk'];
					if (isset($arrTable['fk'])) {
						if (isset($arrTable['fk'][$chave]) && ($arrTable['fk'][$chave] == $primary)) {

							//CLEAR
							$content.= "\t/**\n";
							$content.= "\t * @return void\n";
							$content.= "\t */\n";
							$content.= "\tpublic function clear".$this->underlineToCamel($table, true)."s() {\n";
							$content.= "\t\t\$this->j".$this->underlineToCamel($table, true)."s = array();\n";
							$content.= "\t}\n\n";

							//ADD
							$content.= "\t/**\n";
							$content.= "\t * @param ".$this->underlineToCamel($table, true)." $".$this->underlineToCamel($table)."\n";
							$content.= "\t */\n";
							$content.= "\tpublic function add".$this->underlineToCamel($table, true)."(".$this->underlineToCamel($table, true)." $".$this->underlineToCamel($table).") {\n";
							$content.= "\t\t\$this->j".$this->underlineToCamel($table, true)."s[] = $".$this->underlineToCamel($table).";\n";
							$content.= "\t}\n\n";

							//GET
							$content.= "\t/**\n";
							$content.= "\t * @throws PDOException\n";
							$content.= "\t * @return array ".$this->underlineToCamel($table, true)."[]\n";
							$content.= "\t */\n";
							$content.= "\tpublic function get".$this->underlineToCamel($table, true)."s() {\n\n";
							$content.= "\t\tif (!count(\$this->j".$this->underlineToCamel($table, true)."s)) {\n\n";
							$content.= "\t\t\t$"."db = Database::getInstance();\n";
							$content.= "\t\t\t$"."sql = \"SELECT * FROM ".$table." WHERE ".$arrTable['fk'][$chave]." = ".$this->aspas($arrFinal[$chave][$primary], '$this->'.$this->underlineToCamel($primary))."\"; \n";
							$content.= "\t\t\ttry{\n";
							$content.= "\t\t\t\t$"."result = $"."db->query($"."sql);\n\n";
							$content.= "\t\t\t\tforeach ($"."result as $"."item){\n";
							$content.= "\t\t\t\t\t$"."obj = new ".$this->underlineToCamel($table, true)."();\n";
							$content.= "\t\t\t\t\t$"."obj->hydrate($"."item);\n\n";
							$content.= "\t\t\t\t\t\$this->j".$this->underlineToCamel($table, true)."s[] = $"."obj;\n";
							$content.= "\t\t\t\t}\n\n";
							$content.= "\t\t\t} catch (PDOException $"."e) {\n";
							$content.= "\t\t\t\tthrow new PDOException($"."e->getMessage());\n";
							$content.= "\t\t\t}\n";
							$content.= "\t\t}\n\n";
							$content.= "\t\treturn \$this->j".$this->underlineToCamel($table, true)."s;\n";
							$content.= "\t}\n\n";
						}
					}
				}

			}


			$content.= "}";


			$filename = $this->path_model_base . 'Base' . $this->underlineToCamel($chave, true).".php";
			$this->criaModelo($filename, $content, 'w+');


			$extendContent = '';
			$extendContent.= "<?php\n";
			$extendContent.= "\n/**\n";
			$extendContent.= " * Modelo ".$this->underlineToCamel($chave, true)." que estende de Base".$this->underlineToCamel($chave, true)."\n";
			$extendContent.= " *\n";
			$extendContent.= " * Modelo criado utilizando a classe \"WeeGenerate\" desenvolvido por <Juan Carlos Monestel>\n";
			$extendContent.= " * Data de cria��o do modelo: ".$this->created_at."\n";
			$extendContent.= " *\n";
			$extendContent.= " * ATEN��O:\n";
			$extendContent.= " * - Implementa��es dever�o ser realizadas neste modelo e n�o no Base".$this->underlineToCamel($chave, true)."\n";
			$extendContent.= " * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output\n";
			$extendContent.= " *\n";
			$extendContent.= " * @author Juan Carlos Monestel <juancm86@gmail.com>\n";
			$extendContent.= " * @copyright 2010 Juan Carlos Monestel\n";
			$extendContent.= " * @package model\n";
			$extendContent.= " */\n";
			$extendContent.= "class ".$this->underlineToCamel($chave, true)." extends Base".$this->underlineToCamel($chave, true)." {\n\n";
			$extendContent.= "\n\n}";


			$filename = $this->path_model . $this->underlineToCamel($chave, true).".php";
			$this->criaModelo($filename, $extendContent);

		}

		$this->time_end = microtime(true);

	}


	/**
	 * Retorna o resultado do gerador
	 */
	public function getResult() {

		$result = '';
		if (count($this->modified_files)) {

			$result.= "<h3>Arquivos modificados</h3><ul>";

			foreach ($this->modified_files as $arquivo) {

				$result.= "<li>".$arquivo."</li>";

			}

			$result.= "</ul>";

		}

		$tempo = $this->time_end - $this->time_start;

		$result.= '<h4>Tempo de execu��o do "gerador" finalizado em: ' . number_format($tempo, 6) . ' ms - '.date('d/m/Y H:i:s').'</h4>';

		return $result;

	}
}