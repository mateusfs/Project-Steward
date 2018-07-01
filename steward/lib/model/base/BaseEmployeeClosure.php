<?php

/**
 * Classe Base da tabela [employee_closure]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo EmployeeClosure
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseEmployeeClosure extends Base {

	const TABLE_NAME = 'employee_closure';
	const EMPLOYEE_ID = 'employee_id';
	const SUPERVISOR_ID = 'supervisor_id';
	const DISTANCE = 'distance';

	protected $employeeId;
	protected $supervisorId;
	protected $distance;



	/**
	 * @param int $employeeId
	 */
	public function setEmployeeId($employeeId) {
		$this->employeeId = $employeeId;
	}

	/**
	 * @return int
	 */
	public function getEmployeeId() {
		return $this->employeeId;
	}

	/**
	 * @param int $supervisorId
	 */
	public function setSupervisorId($supervisorId) {
		$this->supervisorId = $supervisorId;
	}

	/**
	 * @return int
	 */
	public function getSupervisorId() {
		return $this->supervisorId;
	}

	/**
	 * @param int $distance
	 */
	public function setDistance($distance) {
		$this->distance = $distance;
	}

	/**
	 * @return int
	 */
	public function getDistance() {
		return $this->distance;
	}

	/**
	 * @throws PDOException
	 * @return EmployeeClosure|null
	 */
	public static function retrieveByPk($supervisorId, $employeeId, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':supervisor_id'] = $supervisorId;
		$sqlParam[':employee_id'] = $employeeId;


		$db = Database::getInstance();
		$sql = "SELECT * FROM employee_closure WHERE supervisor_id = :supervisor_id AND employee_id = :employee_id " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new EmployeeClosure();
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

		if ($this->supervisorId   && $this->employeeId  ) {

			 if($this->retrieveByPk($this->supervisorId, $this->employeeId)){

			$sql = "
				UPDATE
					employee_closure
				SET
					employee_id = :employee_id
					, supervisor_id = :supervisor_id
					, distance = :distance
				WHERE
					supervisor_id = :supervisor_id
					AND employee_id = :employee_id
			";

			}
		} else {

			$sql = "
				INSERT INTO
					employee_closure
				(
					employee_id
					, supervisor_id
					, distance
				) VALUES (
					:employee_id
					, :supervisor_id
					, :distance
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':employee_id'] = $this->employeeId;
		$sqlParam[':supervisor_id'] = $this->supervisorId;
		$sqlParam[':distance'] = $this->distance;

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
		$sqlParam[':supervisor_id'] = $this->supervisorId;
		$sqlParam[':employee_id'] = $this->employeeId;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				employee_closure
			WHERE
				supervisor_id = :supervisor_id
				AND employee_id = :employee_id
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