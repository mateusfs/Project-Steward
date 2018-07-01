<?php

/**
 * Classe Base da tabela [account]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Account
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseAccount extends Base {

	const TABLE_NAME = 'account';
	const ACCOUNT_ID = 'account_id';
	const ACCOUNT_PARENT = 'account_parent';
	const ACCOUNT_DESCRIPTION = 'account_description';
	const ACCOUNT_TYPE = 'account_type';
	const ACCOUNT_ROLLUP = 'account_rollup';
	const CUSTOM_MEMBERS = 'Custom_Members';

	protected $accountId;
	protected $accountParent;
	protected $accountDescription;
	protected $accountType;
	protected $accountRollup;
	protected $customMembers;



	/**
	 * @param int $accountId
	 */
	public function setAccountId($accountId) {
		$this->accountId = $accountId;
	}

	/**
	 * @return int
	 */
	public function getAccountId() {
		return $this->accountId;
	}

	/**
	 * @param int $accountParent
	 */
	public function setAccountParent($accountParent) {
		$this->accountParent = $accountParent;
	}

	/**
	 * @return int
	 */
	public function getAccountParent() {
		return $this->accountParent;
	}

	/**
	 * @param varchar $accountDescription
	 */
	public function setAccountDescription($accountDescription) {
		$this->accountDescription = $accountDescription;
	}

	/**
	 * @return varchar
	 */
	public function getAccountDescription() {
		return $this->accountDescription;
	}

	/**
	 * @param varchar $accountType
	 */
	public function setAccountType($accountType) {
		$this->accountType = $accountType;
	}

	/**
	 * @return varchar
	 */
	public function getAccountType() {
		return $this->accountType;
	}

	/**
	 * @param varchar $accountRollup
	 */
	public function setAccountRollup($accountRollup) {
		$this->accountRollup = $accountRollup;
	}

	/**
	 * @return varchar
	 */
	public function getAccountRollup() {
		return $this->accountRollup;
	}

	/**
	 * @param varchar $customMembers
	 */
	public function setCustomMembers($customMembers) {
		$this->customMembers = $customMembers;
	}

	/**
	 * @return varchar
	 */
	public function getCustomMembers() {
		return $this->customMembers;
	}

	/**
	 * @throws PDOException
	 * @return Account|null
	 */
	public static function retrieveByPk($accountId, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':account_id'] = $accountId;


		$db = Database::getInstance();
		$sql = "SELECT * FROM account WHERE account_id = :account_id " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Account();
				$obj->hydrate($result);

				return $obj;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}


	/**
	 * @throws PDOException
	 * @return void
	 */
	public function save() {

		$db = Database::getInstance();

		if ($this->accountId  ) {

			 if($this->retrieveByPk($this->accountId)){

			$sql = "
				UPDATE
					account
				SET
					account_id = :account_id
					, account_parent = :account_parent
					, account_description = :account_description
					, account_type = :account_type
					, account_rollup = :account_rollup
					, Custom_Members = :Custom_Members
				WHERE
					account_id = :account_id
			";

			}
		} else {

			$sql = "
				INSERT INTO
					account
				(
					account_id
					, account_parent
					, account_description
					, account_type
					, account_rollup
					, Custom_Members
				) VALUES (
					:account_id
					, :account_parent
					, :account_description
					, :account_type
					, :account_rollup
					, :Custom_Members
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':account_id'] = $this->accountId;
		$sqlParam[':account_parent'] = $this->accountParent;
		$sqlParam[':account_description'] = $this->accountDescription;
		$sqlParam[':account_type'] = $this->accountType;
		$sqlParam[':account_rollup'] = $this->accountRollup;
		$sqlParam[':Custom_Members'] = $this->customMembers;

		try{
			$db->beginTransaction();
			$db->execute($sql, $sqlParam);
			$db->commit();
			return true;
		} catch (PDOException $e) {
			$db->rollBack();
			throw new PDOException($e->getMessage());
		}
	}

	/**
	 * @throws PDOException
	 * @return void
	 */
	public function delete() {

		$sqlParam = array();
		$sqlParam[':account_id'] = $this->accountId;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				account
			WHERE
				account_id = :account_id
		";
		try{
			$db->beginTransaction();
			$db->execute($sql, $sqlParam);
			$db->commit();
		} catch (PDOException $e) {
			$db->rollBack();
			throw new PDOException($e->getMessage());
		}
	}

}