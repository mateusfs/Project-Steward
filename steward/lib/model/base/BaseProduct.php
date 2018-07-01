<?php

/**
 * Classe Base da tabela [product]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Product
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseProduct extends Base {

	const TABLE_NAME = 'product';
	const PRODUCT_CLASS_ID = 'product_class_id';
	const PRODUCT_ID = 'product_id';
	const BRAND_NAME = 'brand_name';
	const PRODUCT_NAME = 'product_name';
	const SKU = 'SKU';
	const SRP = 'SRP';
	const GROSS_WEIGHT = 'gross_weight';
	const NET_WEIGHT = 'net_weight';
	const RECYCLABLE_PACKAGE = 'recyclable_package';
	const LOW_FAT = 'low_fat';
	const UNITS_PER_CASE = 'units_per_case';
	const CASES_PER_PALLET = 'cases_per_pallet';
	const SHELF_WIDTH = 'shelf_width';
	const SHELF_HEIGHT = 'shelf_height';
	const SHELF_DEPTH = 'shelf_depth';

	protected $productClassId;
	protected $productId;
	protected $brandName;
	protected $productName;
	protected $sku;
	protected $srp;
	protected $grossWeight;
	protected $netWeight;
	protected $recyclablePackage;
	protected $lowFat;
	protected $unitsPerCase;
	protected $casesPerPallet;
	protected $shelfWidth;
	protected $shelfHeight;
	protected $shelfDepth;



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
	 * @param int $productId
	 */
	public function setProductId($productId) {
		$this->productId = $productId;
	}

	/**
	 * @return int
	 */
	public function getProductId() {
		return $this->productId;
	}

	/**
	 * @param varchar $brandName
	 */
	public function setBrandName($brandName) {
		$this->brandName = $brandName;
	}

	/**
	 * @return varchar
	 */
	public function getBrandName() {
		return $this->brandName;
	}

	/**
	 * @param varchar $productName
	 */
	public function setProductName($productName) {
		$this->productName = $productName;
	}

	/**
	 * @return varchar
	 */
	public function getProductName() {
		return $this->productName;
	}

	/**
	 * @param bigint $sku
	 */
	public function setSku($sku) {
		$this->sku = $sku;
	}

	/**
	 * @return bigint
	 */
	public function getSku() {
		return $this->sku;
	}

	/**
	 * @param decimal $srp
	 */
	public function setSrp($srp) {
		$this->srp = $srp;
	}

	/**
	 * @return decimal
	 */
	public function getSrp() {
		return $this->srp;
	}

	/**
	 * @param double $grossWeight
	 */
	public function setGrossWeight($grossWeight) {
		$this->grossWeight = $grossWeight;
	}

	/**
	 * @return double
	 */
	public function getGrossWeight() {
		return $this->grossWeight;
	}

	/**
	 * @param double $netWeight
	 */
	public function setNetWeight($netWeight) {
		$this->netWeight = $netWeight;
	}

	/**
	 * @return double
	 */
	public function getNetWeight() {
		return $this->netWeight;
	}

	/**
	 * @param tinyint $recyclablePackage
	 */
	public function setRecyclablePackage($recyclablePackage) {
		$this->recyclablePackage = $recyclablePackage;
	}

	/**
	 * @return tinyint
	 */
	public function getRecyclablePackage() {
		return $this->recyclablePackage;
	}

	/**
	 * @param tinyint $lowFat
	 */
	public function setLowFat($lowFat) {
		$this->lowFat = $lowFat;
	}

	/**
	 * @return tinyint
	 */
	public function getLowFat() {
		return $this->lowFat;
	}

	/**
	 * @param smallint $unitsPerCase
	 */
	public function setUnitsPerCase($unitsPerCase) {
		$this->unitsPerCase = $unitsPerCase;
	}

	/**
	 * @return smallint
	 */
	public function getUnitsPerCase() {
		return $this->unitsPerCase;
	}

	/**
	 * @param smallint $casesPerPallet
	 */
	public function setCasesPerPallet($casesPerPallet) {
		$this->casesPerPallet = $casesPerPallet;
	}

	/**
	 * @return smallint
	 */
	public function getCasesPerPallet() {
		return $this->casesPerPallet;
	}

	/**
	 * @param double $shelfWidth
	 */
	public function setShelfWidth($shelfWidth) {
		$this->shelfWidth = $shelfWidth;
	}

	/**
	 * @return double
	 */
	public function getShelfWidth() {
		return $this->shelfWidth;
	}

	/**
	 * @param double $shelfHeight
	 */
	public function setShelfHeight($shelfHeight) {
		$this->shelfHeight = $shelfHeight;
	}

	/**
	 * @return double
	 */
	public function getShelfHeight() {
		return $this->shelfHeight;
	}

	/**
	 * @param double $shelfDepth
	 */
	public function setShelfDepth($shelfDepth) {
		$this->shelfDepth = $shelfDepth;
	}

	/**
	 * @return double
	 */
	public function getShelfDepth() {
		return $this->shelfDepth;
	}

	/**
	 * @throws PDOException
	 * @return Product|null
	 */
	public static function retrieveByPk($productId, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':product_id'] = $productId;


		$db = Database::getInstance();
		$sql = "SELECT * FROM product WHERE product_id = :product_id " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Product();
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

		if ($this->productId  ) {

			 if($this->retrieveByPk($this->productId)){

			$sql = "
				UPDATE
					product
				SET
					product_class_id = :product_class_id
					, product_id = :product_id
					, brand_name = :brand_name
					, product_name = :product_name
					, SKU = :SKU
					, SRP = :SRP
					, gross_weight = :gross_weight
					, net_weight = :net_weight
					, recyclable_package = :recyclable_package
					, low_fat = :low_fat
					, units_per_case = :units_per_case
					, cases_per_pallet = :cases_per_pallet
					, shelf_width = :shelf_width
					, shelf_height = :shelf_height
					, shelf_depth = :shelf_depth
				WHERE
					product_id = :product_id
			";

			}
		} else {

			$sql = "
				INSERT INTO
					product
				(
					product_class_id
					, product_id
					, brand_name
					, product_name
					, SKU
					, SRP
					, gross_weight
					, net_weight
					, recyclable_package
					, low_fat
					, units_per_case
					, cases_per_pallet
					, shelf_width
					, shelf_height
					, shelf_depth
				) VALUES (
					:product_class_id
					, :product_id
					, :brand_name
					, :product_name
					, :SKU
					, :SRP
					, :gross_weight
					, :net_weight
					, :recyclable_package
					, :low_fat
					, :units_per_case
					, :cases_per_pallet
					, :shelf_width
					, :shelf_height
					, :shelf_depth
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':product_class_id'] = $this->productClassId;
		$sqlParam[':product_id'] = $this->productId;
		$sqlParam[':brand_name'] = $this->brandName;
		$sqlParam[':product_name'] = $this->productName;
		$sqlParam[':SKU'] = $this->sku;
		$sqlParam[':SRP'] = $this->srp;
		$sqlParam[':gross_weight'] = $this->grossWeight;
		$sqlParam[':net_weight'] = $this->netWeight;
		$sqlParam[':recyclable_package'] = $this->recyclablePackage;
		$sqlParam[':low_fat'] = $this->lowFat;
		$sqlParam[':units_per_case'] = $this->unitsPerCase;
		$sqlParam[':cases_per_pallet'] = $this->casesPerPallet;
		$sqlParam[':shelf_width'] = $this->shelfWidth;
		$sqlParam[':shelf_height'] = $this->shelfHeight;
		$sqlParam[':shelf_depth'] = $this->shelfDepth;

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
		$sqlParam[':product_id'] = $this->productId;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				product
			WHERE
				product_id = :product_id
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