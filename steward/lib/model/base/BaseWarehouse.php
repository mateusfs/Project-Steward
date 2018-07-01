<?php

/**
 * Classe Base da tabela [warehouse]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Warehouse
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseWarehouse extends Base {

	const TABLE_NAME = 'warehouse';
	const WAREHOUSE_ID = 'warehouse_id';
	const WAREHOUSE_CLASS_ID = 'warehouse_class_id';
	const STORES_ID = 'stores_id';
	const WAREHOUSE_NAME = 'warehouse_name';
	const WA_ADDRESS1 = 'wa_address1';
	const WA_ADDRESS2 = 'wa_address2';
	const WA_ADDRESS3 = 'wa_address3';
	const WA_ADDRESS4 = 'wa_address4';
	const WAREHOUSE_CITY = 'warehouse_city';
	const WAREHOUSE_STATE_PROVINCE = 'warehouse_state_province';
	const WAREHOUSE_POSTAL_CODE = 'warehouse_postal_code';
	const WAREHOUSE_COUNTRY = 'warehouse_country';
	const WAREHOUSE_OWNER_NAME = 'warehouse_owner_name';
	const WAREHOUSE_PHONE = 'warehouse_phone';
	const WAREHOUSE_FAX = 'warehouse_fax';

	protected $warehouseId;
	protected $warehouseClassId;
	protected $storesId;
	protected $warehouseName;
	protected $waAddress1;
	protected $waAddress2;
	protected $waAddress3;
	protected $waAddress4;
	protected $warehouseCity;
	protected $warehouseStateProvince;
	protected $warehousePostalCode;
	protected $warehouseCountry;
	protected $warehouseOwnerName;
	protected $warehousePhone;
	protected $warehouseFax;



	/**
	 * @param int $warehouseId
	 */
	public function setWarehouseId($warehouseId) {
		$this->warehouseId = $warehouseId;
	}

	/**
	 * @return int
	 */
	public function getWarehouseId() {
		return $this->warehouseId;
	}

	/**
	 * @param int $warehouseClassId
	 */
	public function setWarehouseClassId($warehouseClassId) {
		$this->warehouseClassId = $warehouseClassId;
	}

	/**
	 * @return int
	 */
	public function getWarehouseClassId() {
		return $this->warehouseClassId;
	}

	/**
	 * @param int $storesId
	 */
	public function setStoresId($storesId) {
		$this->storesId = $storesId;
	}

	/**
	 * @return int
	 */
	public function getStoresId() {
		return $this->storesId;
	}

	/**
	 * @param varchar $warehouseName
	 */
	public function setWarehouseName($warehouseName) {
		$this->warehouseName = $warehouseName;
	}

	/**
	 * @return varchar
	 */
	public function getWarehouseName() {
		return $this->warehouseName;
	}

	/**
	 * @param varchar $waAddress1
	 */
	public function setWaAddress1($waAddress1) {
		$this->waAddress1 = $waAddress1;
	}

	/**
	 * @return varchar
	 */
	public function getWaAddress1() {
		return $this->waAddress1;
	}

	/**
	 * @param varchar $waAddress2
	 */
	public function setWaAddress2($waAddress2) {
		$this->waAddress2 = $waAddress2;
	}

	/**
	 * @return varchar
	 */
	public function getWaAddress2() {
		return $this->waAddress2;
	}

	/**
	 * @param varchar $waAddress3
	 */
	public function setWaAddress3($waAddress3) {
		$this->waAddress3 = $waAddress3;
	}

	/**
	 * @return varchar
	 */
	public function getWaAddress3() {
		return $this->waAddress3;
	}

	/**
	 * @param varchar $waAddress4
	 */
	public function setWaAddress4($waAddress4) {
		$this->waAddress4 = $waAddress4;
	}

	/**
	 * @return varchar
	 */
	public function getWaAddress4() {
		return $this->waAddress4;
	}

	/**
	 * @param varchar $warehouseCity
	 */
	public function setWarehouseCity($warehouseCity) {
		$this->warehouseCity = $warehouseCity;
	}

	/**
	 * @return varchar
	 */
	public function getWarehouseCity() {
		return $this->warehouseCity;
	}

	/**
	 * @param varchar $warehouseStateProvince
	 */
	public function setWarehouseStateProvince($warehouseStateProvince) {
		$this->warehouseStateProvince = $warehouseStateProvince;
	}

	/**
	 * @return varchar
	 */
	public function getWarehouseStateProvince() {
		return $this->warehouseStateProvince;
	}

	/**
	 * @param varchar $warehousePostalCode
	 */
	public function setWarehousePostalCode($warehousePostalCode) {
		$this->warehousePostalCode = $warehousePostalCode;
	}

	/**
	 * @return varchar
	 */
	public function getWarehousePostalCode() {
		return $this->warehousePostalCode;
	}

	/**
	 * @param varchar $warehouseCountry
	 */
	public function setWarehouseCountry($warehouseCountry) {
		$this->warehouseCountry = $warehouseCountry;
	}

	/**
	 * @return varchar
	 */
	public function getWarehouseCountry() {
		return $this->warehouseCountry;
	}

	/**
	 * @param varchar $warehouseOwnerName
	 */
	public function setWarehouseOwnerName($warehouseOwnerName) {
		$this->warehouseOwnerName = $warehouseOwnerName;
	}

	/**
	 * @return varchar
	 */
	public function getWarehouseOwnerName() {
		return $this->warehouseOwnerName;
	}

	/**
	 * @param varchar $warehousePhone
	 */
	public function setWarehousePhone($warehousePhone) {
		$this->warehousePhone = $warehousePhone;
	}

	/**
	 * @return varchar
	 */
	public function getWarehousePhone() {
		return $this->warehousePhone;
	}

	/**
	 * @param varchar $warehouseFax
	 */
	public function setWarehouseFax($warehouseFax) {
		$this->warehouseFax = $warehouseFax;
	}

	/**
	 * @return varchar
	 */
	public function getWarehouseFax() {
		return $this->warehouseFax;
	}
}