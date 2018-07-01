<?php

/**
 * Classe Base da tabela [salary]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Salary
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseSalary extends Base {

	const TABLE_NAME = 'salary';
	const PAY_DATE = 'pay_date';
	const EMPLOYEE_ID = 'employee_id';
	const DEPARTMENT_ID = 'department_id';
	const CURRENCY_ID = 'currency_id';
	const SALARY_PAID = 'salary_paid';
	const OVERTIME_PAID = 'overtime_paid';
	const VACATION_ACCRUED = 'vacation_accrued';
	const VACATION_USED = 'vacation_used';

	protected $payDate;
	protected $employeeId;
	protected $departmentId;
	protected $currencyId;
	protected $salaryPaid;
	protected $overtimePaid;
	protected $vacationAccrued;
	protected $vacationUsed;



	/**
	 * @param datetime $payDate
	 */
	public function setPayDate($payDate) {
		$this->payDate = $payDate;
	}

	/**
	 * @return datetime
	 */
	public function getPayDate() {
		return $this->payDate;
	}

	/**
	 * @return date|time|null
	 */
	public function getPayDateFormatada($formato = 'd/m/Y') {
		if (!$this->getPayDate()) {
			return null;
		}
		return date($formato, strtotime($this->getPayDate()));
	}

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
	 * @param int $currencyId
	 */
	public function setCurrencyId($currencyId) {
		$this->currencyId = $currencyId;
	}

	/**
	 * @return int
	 */
	public function getCurrencyId() {
		return $this->currencyId;
	}

	/**
	 * @param decimal $salaryPaid
	 */
	public function setSalaryPaid($salaryPaid) {
		$this->salaryPaid = $salaryPaid;
	}

	/**
	 * @return decimal
	 */
	public function getSalaryPaid() {
		return $this->salaryPaid;
	}

	/**
	 * @param decimal $overtimePaid
	 */
	public function setOvertimePaid($overtimePaid) {
		$this->overtimePaid = $overtimePaid;
	}

	/**
	 * @return decimal
	 */
	public function getOvertimePaid() {
		return $this->overtimePaid;
	}

	/**
	 * @param double $vacationAccrued
	 */
	public function setVacationAccrued($vacationAccrued) {
		$this->vacationAccrued = $vacationAccrued;
	}

	/**
	 * @return double
	 */
	public function getVacationAccrued() {
		return $this->vacationAccrued;
	}

	/**
	 * @param double $vacationUsed
	 */
	public function setVacationUsed($vacationUsed) {
		$this->vacationUsed = $vacationUsed;
	}

	/**
	 * @return double
	 */
	public function getVacationUsed() {
		return $this->vacationUsed;
	}
}