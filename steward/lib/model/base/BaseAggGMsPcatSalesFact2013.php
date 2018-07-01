<?php

/**
 * Classe Base da tabela [agg_g_ms_pcat_sales_fact_2013]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo AggGMsPcatSalesFact2013
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseAggGMsPcatSalesFact2013 extends Base {

	const TABLE_NAME = 'agg_g_ms_pcat_sales_fact_2013';
	const GENDER = 'gender';
	const MARITAL_STATUS = 'marital_status';
	const PRODUCT_FAMILY = 'product_family';
	const PRODUCT_DEPARTMENT = 'product_department';
	const PRODUCT_CATEGORY = 'product_category';
	const MONTH_OF_YEAR = 'month_of_year';
	const QUARTER = 'quarter';
	const THE_YEAR = 'the_year';
	const STORE_SALES = 'store_sales';
	const STORE_COST = 'store_cost';
	const UNIT_SALES = 'unit_sales';
	const CUSTOMER_COUNT = 'customer_count';
	const FACT_COUNT = 'fact_count';

	protected $gender;
	protected $maritalStatus;
	protected $productFamily;
	protected $productDepartment;
	protected $productCategory;
	protected $monthOfYear;
	protected $quarter;
	protected $theYear;
	protected $storeSales;
	protected $storeCost;
	protected $unitSales;
	protected $customerCount;
	protected $factCount;



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
	 * @param varchar $productFamily
	 */
	public function setProductFamily($productFamily) {
		$this->productFamily = $productFamily;
	}

	/**
	 * @return varchar
	 */
	public function getProductFamily() {
		return $this->productFamily;
	}

	/**
	 * @param varchar $productDepartment
	 */
	public function setProductDepartment($productDepartment) {
		$this->productDepartment = $productDepartment;
	}

	/**
	 * @return varchar
	 */
	public function getProductDepartment() {
		return $this->productDepartment;
	}

	/**
	 * @param varchar $productCategory
	 */
	public function setProductCategory($productCategory) {
		$this->productCategory = $productCategory;
	}

	/**
	 * @return varchar
	 */
	public function getProductCategory() {
		return $this->productCategory;
	}

	/**
	 * @param smallint $monthOfYear
	 */
	public function setMonthOfYear($monthOfYear) {
		$this->monthOfYear = $monthOfYear;
	}

	/**
	 * @return smallint
	 */
	public function getMonthOfYear() {
		return $this->monthOfYear;
	}

	/**
	 * @param varchar $quarter
	 */
	public function setQuarter($quarter) {
		$this->quarter = $quarter;
	}

	/**
	 * @return varchar
	 */
	public function getQuarter() {
		return $this->quarter;
	}

	/**
	 * @param smallint $theYear
	 */
	public function setTheYear($theYear) {
		$this->theYear = $theYear;
	}

	/**
	 * @return smallint
	 */
	public function getTheYear() {
		return $this->theYear;
	}

	/**
	 * @param decimal $storeSales
	 */
	public function setStoreSales($storeSales) {
		$this->storeSales = $storeSales;
	}

	/**
	 * @return decimal
	 */
	public function getStoreSales() {
		return $this->storeSales;
	}

	/**
	 * @param decimal $storeCost
	 */
	public function setStoreCost($storeCost) {
		$this->storeCost = $storeCost;
	}

	/**
	 * @return decimal
	 */
	public function getStoreCost() {
		return $this->storeCost;
	}

	/**
	 * @param decimal $unitSales
	 */
	public function setUnitSales($unitSales) {
		$this->unitSales = $unitSales;
	}

	/**
	 * @return decimal
	 */
	public function getUnitSales() {
		return $this->unitSales;
	}

	/**
	 * @param int $customerCount
	 */
	public function setCustomerCount($customerCount) {
		$this->customerCount = $customerCount;
	}

	/**
	 * @return int
	 */
	public function getCustomerCount() {
		return $this->customerCount;
	}

	/**
	 * @param int $factCount
	 */
	public function setFactCount($factCount) {
		$this->factCount = $factCount;
	}

	/**
	 * @return int
	 */
	public function getFactCount() {
		return $this->factCount;
	}
}