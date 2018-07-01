<?php

/**
 * Classe Base da tabela [expense_fact]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo ExpenseFact
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseExpenseFact extends Base {

	const TABLE_NAME = 'expense_fact';
	const STORE_ID = 'store_id';
	const ACCOUNT_ID = 'account_id';
	const EXP_DATE = 'exp_date';
	const TIME_ID = 'time_id';
	const CATEGORY_ID = 'category_id';
	const CURRENCY_ID = 'currency_id';
	const AMOUNT = 'amount';

	protected $storeId;
	protected $accountId;
	protected $expDate;
	protected $timeId;
	protected $categoryId;
	protected $currencyId;
	protected $amount;



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
	 * @param datetime $expDate
	 */
	public function setExpDate($expDate) {
		$this->expDate = $expDate;
	}

	/**
	 * @return datetime
	 */
	public function getExpDate() {
		return $this->expDate;
	}

	/**
	 * @return date|time|null
	 */
	public function getExpDateFormatada($formato = 'd/m/Y') {
		if (!$this->getExpDate()) {
			return null;
		}
		return date($formato, strtotime($this->getExpDate()));
	}

	/**
	 * @param int $timeId
	 */
	public function setTimeId($timeId) {
		$this->timeId = $timeId;
	}

	/**
	 * @return int
	 */
	public function getTimeId() {
		return $this->timeId;
	}

	/**
	 * @param varchar $categoryId
	 */
	public function setCategoryId($categoryId) {
		$this->categoryId = $categoryId;
	}

	/**
	 * @return varchar
	 */
	public function getCategoryId() {
		return $this->categoryId;
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
	 * @param decimal $amount
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}

	/**
	 * @return decimal
	 */
	public function getAmount() {
		return $this->amount;
	}
}