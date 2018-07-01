<?php

/**
 * Classe Base da tabela [position]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Position
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BasePosition extends Base {

	const TABLE_NAME = 'position';
	const POSITION_ID = 'position_id';
	const POSITION_TITLE = 'position_title';
	const PAY_TYPE = 'pay_type';
	const MIN_SCALE = 'min_scale';
	const MAX_SCALE = 'max_scale';
	const MANAGEMENT_ROLE = 'management_role';

	protected $positionId;
	protected $positionTitle;
	protected $payType;
	protected $minScale;
	protected $maxScale;
	protected $managementRole;



	/**
	 * @param int $positionId
	 */
	public function setPositionId($positionId) {
		$this->positionId = $positionId;
	}

	/**
	 * @return int
	 */
	public function getPositionId() {
		return $this->positionId;
	}

	/**
	 * @param varchar $positionTitle
	 */
	public function setPositionTitle($positionTitle) {
		$this->positionTitle = $positionTitle;
	}

	/**
	 * @return varchar
	 */
	public function getPositionTitle() {
		return $this->positionTitle;
	}

	/**
	 * @param varchar $payType
	 */
	public function setPayType($payType) {
		$this->payType = $payType;
	}

	/**
	 * @return varchar
	 */
	public function getPayType() {
		return $this->payType;
	}

	/**
	 * @param decimal $minScale
	 */
	public function setMinScale($minScale) {
		$this->minScale = $minScale;
	}

	/**
	 * @return decimal
	 */
	public function getMinScale() {
		return $this->minScale;
	}

	/**
	 * @param decimal $maxScale
	 */
	public function setMaxScale($maxScale) {
		$this->maxScale = $maxScale;
	}

	/**
	 * @return decimal
	 */
	public function getMaxScale() {
		return $this->maxScale;
	}

	/**
	 * @param varchar $managementRole
	 */
	public function setManagementRole($managementRole) {
		$this->managementRole = $managementRole;
	}

	/**
	 * @return varchar
	 */
	public function getManagementRole() {
		return $this->managementRole;
	}

	/**
	 * @throws PDOException
	 * @return Position|null
	 */
	public static function retrieveByPk($positionId, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':position_id'] = $positionId;


		$db = Database::getInstance();
		$sql = "SELECT * FROM position WHERE position_id = :position_id " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Position();
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

		if ($this->positionId  ) {

			 if($this->retrieveByPk($this->positionId)){

			$sql = "
				UPDATE
					position
				SET
					position_id = :position_id
					, position_title = :position_title
					, pay_type = :pay_type
					, min_scale = :min_scale
					, max_scale = :max_scale
					, management_role = :management_role
				WHERE
					position_id = :position_id
			";

			}
		} else {

			$sql = "
				INSERT INTO
					position
				(
					position_id
					, position_title
					, pay_type
					, min_scale
					, max_scale
					, management_role
				) VALUES (
					:position_id
					, :position_title
					, :pay_type
					, :min_scale
					, :max_scale
					, :management_role
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':position_id'] = $this->positionId;
		$sqlParam[':position_title'] = $this->positionTitle;
		$sqlParam[':pay_type'] = $this->payType;
		$sqlParam[':min_scale'] = $this->minScale;
		$sqlParam[':max_scale'] = $this->maxScale;
		$sqlParam[':management_role'] = $this->managementRole;

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
		$sqlParam[':position_id'] = $this->positionId;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				position
			WHERE
				position_id = :position_id
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