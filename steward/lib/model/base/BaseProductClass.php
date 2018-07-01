<?php

/**
 * Classe Base da tabela [product_class]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo ProductClass
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseProductClass extends Base {

	const TABLE_NAME = 'product_class';
	const PRODUCT_CLASS_ID = 'product_class_id';
	const PRODUCT_SUBCATEGORY = 'product_subcategory';
	const PRODUCT_CATEGORY = 'product_category';
	const PRODUCT_DEPARTMENT = 'product_department';
	const PRODUCT_FAMILY = 'product_family';

	protected $productClassId;
	protected $productSubcategory;
	protected $productCategory;
	protected $productDepartment;
	protected $productFamily;



	/**
	 * @param int $productClassId
	 */
	public function setProductClassId($productClassId) {
		$this->productClassId = $productClassId;
	}

	/**
	 * @return int
	 */
	public function getProductClassId() {
		return $this->productClassId;
	}

	/**
	 * @param varchar $productSubcategory
	 */
	public function setProductSubcategory($productSubcategory) {
		$this->productSubcategory = $productSubcategory;
	}

	/**
	 * @return varchar
	 */
	public function getProductSubcategory() {
		return $this->productSubcategory;
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
}