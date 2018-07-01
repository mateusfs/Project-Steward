<?php

/**
 * Classe Base da tabela [reserve_employee]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo ReserveEmployee
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseReserveEmployee extends Base {

	const TABLE_NAME = 'reserve_employee';
	const EMPLOYEE_ID = 'employee_id';
	const FULL_NAME = 'full_name';
	const FIRST_NAME = 'first_name';
	const LAST_NAME = 'last_name';
	const POSITION_ID = 'position_id';
	const POSITION_TITLE = 'position_title';
	const STORE_ID = 'store_id';
	const DEPARTMENT_ID = 'department_id';
	const BIRTH_DATE = 'birth_date';
	const HIRE_DATE = 'hire_date';
	const END_DATE = 'end_date';
	const SALARY = 'salary';
	const SUPERVISOR_ID = 'supervisor_id';
	const EDUCATION_LEVEL = 'education_level';
	const MARITAL_STATUS = 'marital_status';
	const GENDER = 'gender';

	protected $employeeId;
	protected $fullName;
	protected $firstName;
	protected $lastName;
	protected $positionId;
	protected $positionTitle;
	protected $storeId;
	protected $departmentId;
	protected $birthDate;
	protected $hireDate;
	protected $endDate;
	protected $salary;
	protected $supervisorId;
	protected $educationLevel;
	protected $maritalStatus;
	protected $gender;



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
	 * @param varchar $fullName
	 */
	public function setFullName($fullName) {
		$this->fullName = $fullName;
	}

	/**
	 * @return varchar
	 */
	public function getFullName() {
		return $this->fullName;
	}

	/**
	 * @param varchar $firstName
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * @return varchar
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @param varchar $lastName
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * @return varchar
	 */
	public function getLastName() {
		return $this->lastName;
	}

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
	 * @param int $storeId
	 */
	public function setStoreId($storeId) {
		$this->storeId = $storeId;
	}

	/**
	 * @return int
	 */
	public function getStoreId() {
		return $this->storeId;
	}

	/**
	 * @param int $departmentId
	 */
	public function setDepartmentId($departmentId) {
		$this->departmentId = $departmentId;
	}

	/**
	 * @return int
	 */
	public function getDepartmentId() {
		return $this->departmentId;
	}

	/**
	 * @param datetime $birthDate
	 */
	public function setBirthDate($birthDate) {
		$this->birthDate = $birthDate;
	}

	/**
	 * @return datetime
	 */
	public function getBirthDate() {
		return $this->birthDate;
	}

	/**
	 * @return date|time|null
	 */
	public function getBirthDateFormatada($formato = 'd/m/Y') {
		if (!$this->getBirthDate()) {
			return null;
		}
		return date($formato, strtotime($this->getBirthDate()));
	}

	/**
	 * @param datetime $hireDate
	 */
	public function setHireDate($hireDate) {
		$this->hireDate = $hireDate;
	}

	/**
	 * @return datetime
	 */
	public function getHireDate() {
		return $this->hireDate;
	}

	/**
	 * @return date|time|null
	 */
	public function getHireDateFormatada($formato = 'd/m/Y') {
		if (!$this->getHireDate()) {
			return null;
		}
		return date($formato, strtotime($this->getHireDate()));
	}

	/**
	 * @param datetime $endDate
	 */
	public function setEndDate($endDate) {
		$this->endDate = $endDate;
	}

	/**
	 * @return datetime
	 */
	public function getEndDate() {
		return $this->endDate;
	}

	/**
	 * @return date|time|null
	 */
	public function getEndDateFormatada($formato = 'd/m/Y') {
		if (!$this->getEndDate()) {
			return null;
		}
		return date($formato, strtotime($this->getEndDate()));
	}

	/**
	 * @param decimal $salary
	 */
	public function setSalary($salary) {
		$this->salary = $salary;
	}

	/**
	 * @return decimal
	 */
	public function getSalary() {
		return $this->salary;
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
	 * @param varchar $educationLevel
	 */
	public function setEducationLevel($educationLevel) {
		$this->educationLevel = $educationLevel;
	}

	/**
	 * @return varchar
	 */
	public function getEducationLevel() {
		return $this->educationLevel;
	}

	/**
	 * @param varchar $maritalStatus
	 */
	public function setMaritalStatus($maritalStatus) {
		$this->maritalStatus = $maritalStatus;
	}

	/**
	 * @return varchar
	 */
	public function getMaritalStatus() {
		return $this->maritalStatus;
	}

	/**
	 * @param varchar $gender
	 */
	public function setGender($gender) {
		$this->gender = $gender;
	}

	/**
	 * @return varchar
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * @throws PDOException
	 * @return ReserveEmployee|null
	 */
	public static function retrieveByPk($employeeId, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':employee_id'] = $employeeId;


		$db = Database::getInstance();
		$sql = "SELECT * FROM reserve_employee WHERE employee_id = :employee_id " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new ReserveEmployee();
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

		if ($this->employeeId  ) {

			 if($this->retrieveByPk($this->employeeId)){

			$sql = "
				UPDATE
					reserve_employee
				SET
					employee_id = :employee_id
					, full_name = :full_name
					, first_name = :first_name
					, last_name = :last_name
					, position_id = :position_id
					, position_title = :position_title
					, store_id = :store_id
					, department_id = :department_id
					, birth_date = :birth_date
					, hire_date = :hire_date
					, end_date = :end_date
					, salary = :salary
					, supervisor_id = :supervisor_id
					, education_level = :education_level
					, marital_status = :marital_status
					, gender = :gender
				WHERE
					employee_id = :employee_id
			";

			}
		} else {

			$sql = "
				INSERT INTO
					reserve_employee
				(
					employee_id
					, full_name
					, first_name
					, last_name
					, position_id
					, position_title
					, store_id
					, department_id
					, birth_date
					, hire_date
					, end_date
					, salary
					, supervisor_id
					, education_level
					, marital_status
					, gender
				) VALUES (
					:employee_id
					, :full_name
					, :first_name
					, :last_name
					, :position_id
					, :position_title
					, :store_id
					, :department_id
					, :birth_date
					, :hire_date
					, :end_date
					, :salary
					, :supervisor_id
					, :education_level
					, :marital_status
					, :gender
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':employee_id'] = $this->employeeId;
		$sqlParam[':full_name'] = $this->fullName;
		$sqlParam[':first_name'] = $this->firstName;
		$sqlParam[':last_name'] = $this->lastName;
		$sqlParam[':position_id'] = $this->positionId;
		$sqlParam[':position_title'] = $this->positionTitle;
		$sqlParam[':store_id'] = $this->storeId;
		$sqlParam[':department_id'] = $this->departmentId;
		$sqlParam[':birth_date'] = $this->birthDate;
		$sqlParam[':hire_date'] = $this->hireDate;
		$sqlParam[':end_date'] = $this->endDate;
		$sqlParam[':salary'] = $this->salary;
		$sqlParam[':supervisor_id'] = $this->supervisorId;
		$sqlParam[':education_level'] = $this->educationLevel;
		$sqlParam[':marital_status'] = $this->maritalStatus;
		$sqlParam[':gender'] = $this->gender;

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
		$sqlParam[':employee_id'] = $this->employeeId;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				reserve_employee
			WHERE
				employee_id = :employee_id
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