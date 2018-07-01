<?php

/**
 * Classe Base da tabela [region]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Region
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseRegion extends Base {

	const TABLE_NAME = 'region';
	const REGION_ID = 'region_id';
	const SALES_CITY = 'sales_city';
	const SALES_STATE_PROVINCE = 'sales_state_province';
	const SALES_DISTRICT = 'sales_district';
	const SALES_REGION = 'sales_region';
	const SALES_COUNTRY = 'sales_country';
	const SALES_DISTRICT_ID = 'sales_district_id';

	protected $regionId;
	protected $salesCity;
	protected $salesStateProvince;
	protected $salesDistrict;
	protected $salesRegion;
	protected $salesCountry;
	protected $salesDistrictId;



	/**
	 * @param int $regionId
	 */
	public function setRegionId($regionId) {
		$this->regionId = $regionId;
	}

	/**
	 * @return int
	 */
	public function getRegionId() {
		return $this->regionId;
	}

	/**
	 * @param varchar $salesCity
	 */
	public function setSalesCity($salesCity) {
		$this->salesCity = $salesCity;
	}

	/**
	 * @return varchar
	 */
	public function getSalesCity() {
		return $this->salesCity;
	}

	/**
	 * @param varchar $salesStateProvince
	 */
	public function setSalesStateProvince($salesStateProvince) {
		$this->salesStateProvince = $salesStateProvince;
	}

	/**
	 * @return varchar
	 */
	public function getSalesStateProvince() {
		return $this->salesStateProvince;
	}

	/**
	 * @param varchar $salesDistrict
	 */
	public function setSalesDistrict($salesDistrict) {
		$this->salesDistrict = $salesDistrict;
	}

	/**
	 * @return varchar
	 */
	public function getSalesDistrict() {
		return $this->salesDistrict;
	}

	/**
	 * @param varchar $salesRegion
	 */
	public function setSalesRegion($salesRegion) {
		$this->salesRegion = $salesRegion;
	}

	/**
	 * @return varchar
	 */
	public function getSalesRegion() {
		return $this->salesRegion;
	}

	/**
	 * @param varchar $salesCountry
	 */
	public function setSalesCountry($salesCountry) {
		$this->salesCountry = $salesCountry;
	}

	/**
	 * @return varchar
	 */
	public function getSalesCountry() {
		return $this->salesCountry;
	}

	/**
	 * @param int $salesDistrictId
	 */
	public function setSalesDistrictId($salesDistrictId) {
		$this->salesDistrictId = $salesDistrictId;
	}

	/**
	 * @return int
	 */
	public function getSalesDistrictId() {
		return $this->salesDistrictId;
	}
}