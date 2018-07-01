<?php

/**
 * Classe Base da tabela [store]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Store
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseStore extends Base {

	const TABLE_NAME = 'store';
	const STORE_ID = 'store_id';
	const STORE_TYPE = 'store_type';
	const REGION_ID = 'region_id';
	const STORE_NAME = 'store_name';
	const STORE_NUMBER = 'store_number';
	const STORE_STREET_ADDRESS = 'store_street_address';
	const STORE_CITY = 'store_city';
	const STORE_STATE = 'store_state';
	const STORE_POSTAL_CODE = 'store_postal_code';
	const STORE_COUNTRY = 'store_country';
	const STORE_MANAGER = 'store_manager';
	const STORE_PHONE = 'store_phone';
	const STORE_FAX = 'store_fax';
	const FIRST_OPENED_DATE = 'first_opened_date';
	const LAST_REMODEL_DATE = 'last_remodel_date';
	const STORE_SQFT = 'store_sqft';
	const GROCERY_SQFT = 'grocery_sqft';
	const FROZEN_SQFT = 'frozen_sqft';
	const MEAT_SQFT = 'meat_sqft';
	const COFFEE_BAR = 'coffee_bar';
	const VIDEO_STORE = 'video_store';
	const SALAD_BAR = 'salad_bar';
	const PREPARED_FOOD = 'prepared_food';
	const FLORIST = 'florist';

	protected $storeId;
	protected $storeType;
	protected $regionId;
	protected $storeName;
	protected $storeNumber;
	protected $storeStreetAddress;
	protected $storeCity;
	protected $storeState;
	protected $storePostalCode;
	protected $storeCountry;
	protected $storeManager;
	protected $storePhone;
	protected $storeFax;
	protected $firstOpenedDate;
	protected $lastRemodelDate;
	protected $storeSqft;
	protected $grocerySqft;
	protected $frozenSqft;
	protected $meatSqft;
	protected $coffeeBar;
	protected $videoStore;
	protected $saladBar;
	protected $preparedFood;
	protected $florist;



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
	 * @param varchar $storeType
	 */
	public function setStoreType($storeType) {
		$this->storeType = $storeType;
	}

	/**
	 * @return varchar
	 */
	public function getStoreType() {
		return $this->storeType;
	}

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
	 * @param varchar $storeName
	 */
	public function setStoreName($storeName) {
		$this->storeName = $storeName;
	}

	/**
	 * @return varchar
	 */
	public function getStoreName() {
		return $this->storeName;
	}

	/**
	 * @param int $storeNumber
	 */
	public function setStoreNumber($storeNumber) {
		$this->storeNumber = $storeNumber;
	}

	/**
	 * @return int
	 */
	public function getStoreNumber() {
		return $this->storeNumber;
	}

	/**
	 * @param varchar $storeStreetAddress
	 */
	public function setStoreStreetAddress($storeStreetAddress) {
		$this->storeStreetAddress = $storeStreetAddress;
	}

	/**
	 * @return varchar
	 */
	public function getStoreStreetAddress() {
		return $this->storeStreetAddress;
	}

	/**
	 * @param varchar $storeCity
	 */
	public function setStoreCity($storeCity) {
		$this->storeCity = $storeCity;
	}

	/**
	 * @return varchar
	 */
	public function getStoreCity() {
		return $this->storeCity;
	}

	/**
	 * @param varchar $storeState
	 */
	public function setStoreState($storeState) {
		$this->storeState = $storeState;
	}

	/**
	 * @return varchar
	 */
	public function getStoreState() {
		return $this->storeState;
	}

	/**
	 * @param varchar $storePostalCode
	 */
	public function setStorePostalCode($storePostalCode) {
		$this->storePostalCode = $storePostalCode;
	}

	/**
	 * @return varchar
	 */
	public function getStorePostalCode() {
		return $this->storePostalCode;
	}

	/**
	 * @param varchar $storeCountry
	 */
	public function setStoreCountry($storeCountry) {
		$this->storeCountry = $storeCountry;
	}

	/**
	 * @return varchar
	 */
	public function getStoreCountry() {
		return $this->storeCountry;
	}

	/**
	 * @param varchar $storeManager
	 */
	public function setStoreManager($storeManager) {
		$this->storeManager = $storeManager;
	}

	/**
	 * @return varchar
	 */
	public function getStoreManager() {
		return $this->storeManager;
	}

	/**
	 * @param varchar $storePhone
	 */
	public function setStorePhone($storePhone) {
		$this->storePhone = $storePhone;
	}

	/**
	 * @return varchar
	 */
	public function getStorePhone() {
		return $this->storePhone;
	}

	/**
	 * @param varchar $storeFax
	 */
	public function setStoreFax($storeFax) {
		$this->storeFax = $storeFax;
	}

	/**
	 * @return varchar
	 */
	public function getStoreFax() {
		return $this->storeFax;
	}

	/**
	 * @param datetime $firstOpenedDate
	 */
	public function setFirstOpenedDate($firstOpenedDate) {
		$this->firstOpenedDate = $firstOpenedDate;
	}

	/**
	 * @return datetime
	 */
	public function getFirstOpenedDate() {
		return $this->firstOpenedDate;
	}

	/**
	 * @return date|time|null
	 */
	public function getFirstOpenedDateFormatada($formato = 'd/m/Y') {
		if (!$this->getFirstOpenedDate()) {
			return null;
		}
		return date($formato, strtotime($this->getFirstOpenedDate()));
	}

	/**
	 * @param datetime $lastRemodelDate
	 */
	public function setLastRemodelDate($lastRemodelDate) {
		$this->lastRemodelDate = $lastRemodelDate;
	}

	/**
	 * @return datetime
	 */
	public function getLastRemodelDate() {
		return $this->lastRemodelDate;
	}

	/**
	 * @return date|time|null
	 */
	public function getLastRemodelDateFormatada($formato = 'd/m/Y') {
		if (!$this->getLastRemodelDate()) {
			return null;
		}
		return date($formato, strtotime($this->getLastRemodelDate()));
	}

	/**
	 * @param int $storeSqft
	 */
	public function setStoreSqft($storeSqft) {
		$this->storeSqft = $storeSqft;
	}

	/**
	 * @return int
	 */
	public function getStoreSqft() {
		return $this->storeSqft;
	}

	/**
	 * @param int $grocerySqft
	 */
	public function setGrocerySqft($grocerySqft) {
		$this->grocerySqft = $grocerySqft;
	}

	/**
	 * @return int
	 */
	public function getGrocerySqft() {
		return $this->grocerySqft;
	}

	/**
	 * @param int $frozenSqft
	 */
	public function setFrozenSqft($frozenSqft) {
		$this->frozenSqft = $frozenSqft;
	}

	/**
	 * @return int
	 */
	public function getFrozenSqft() {
		return $this->frozenSqft;
	}

	/**
	 * @param int $meatSqft
	 */
	public function setMeatSqft($meatSqft) {
		$this->meatSqft = $meatSqft;
	}

	/**
	 * @return int
	 */
	public function getMeatSqft() {
		return $this->meatSqft;
	}

	/**
	 * @param tinyint $coffeeBar
	 */
	public function setCoffeeBar($coffeeBar) {
		$this->coffeeBar = $coffeeBar;
	}

	/**
	 * @return tinyint
	 */
	public function getCoffeeBar() {
		return $this->coffeeBar;
	}

	/**
	 * @param tinyint $videoStore
	 */
	public function setVideoStore($videoStore) {
		$this->videoStore = $videoStore;
	}

	/**
	 * @return tinyint
	 */
	public function getVideoStore() {
		return $this->videoStore;
	}

	/**
	 * @param tinyint $saladBar
	 */
	public function setSaladBar($saladBar) {
		$this->saladBar = $saladBar;
	}

	/**
	 * @return tinyint
	 */
	public function getSaladBar() {
		return $this->saladBar;
	}

	/**
	 * @param tinyint $preparedFood
	 */
	public function setPreparedFood($preparedFood) {
		$this->preparedFood = $preparedFood;
	}

	/**
	 * @return tinyint
	 */
	public function getPreparedFood() {
		return $this->preparedFood;
	}

	/**
	 * @param tinyint $florist
	 */
	public function setFlorist($florist) {
		$this->florist = $florist;
	}

	/**
	 * @return tinyint
	 */
	public function getFlorist() {
		return $this->florist;
	}

	/**
	 * @throws PDOException
	 * @return Store|null
	 */
	public static function retrieveByPk($storeId, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':store_id'] = $storeId;


		$db = Database::getInstance();
		$sql = "SELECT * FROM store WHERE store_id = :store_id " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Store();
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

		if ($this->storeId  ) {

			 if($this->retrieveByPk($this->storeId)){

			$sql = "
				UPDATE
					store
				SET
					store_id = :store_id
					, store_type = :store_type
					, region_id = :region_id
					, store_name = :store_name
					, store_number = :store_number
					, store_street_address = :store_street_address
					, store_city = :store_city
					, store_state = :store_state
					, store_postal_code = :store_postal_code
					, store_country = :store_country
					, store_manager = :store_manager
					, store_phone = :store_phone
					, store_fax = :store_fax
					, first_opened_date = :first_opened_date
					, last_remodel_date = :last_remodel_date
					, store_sqft = :store_sqft
					, grocery_sqft = :grocery_sqft
					, frozen_sqft = :frozen_sqft
					, meat_sqft = :meat_sqft
					, coffee_bar = :coffee_bar
					, video_store = :video_store
					, salad_bar = :salad_bar
					, prepared_food = :prepared_food
					, florist = :florist
				WHERE
					store_id = :store_id
			";

			}
		} else {

			$sql = "
				INSERT INTO
					store
				(
					store_id
					, store_type
					, region_id
					, store_name
					, store_number
					, store_street_address
					, store_city
					, store_state
					, store_postal_code
					, store_country
					, store_manager
					, store_phone
					, store_fax
					, first_opened_date
					, last_remodel_date
					, store_sqft
					, grocery_sqft
					, frozen_sqft
					, meat_sqft
					, coffee_bar
					, video_store
					, salad_bar
					, prepared_food
					, florist
				) VALUES (
					:store_id
					, :store_type
					, :region_id
					, :store_name
					, :store_number
					, :store_street_address
					, :store_city
					, :store_state
					, :store_postal_code
					, :store_country
					, :store_manager
					, :store_phone
					, :store_fax
					, :first_opened_date
					, :last_remodel_date
					, :store_sqft
					, :grocery_sqft
					, :frozen_sqft
					, :meat_sqft
					, :coffee_bar
					, :video_store
					, :salad_bar
					, :prepared_food
					, :florist
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':store_id'] = $this->storeId;
		$sqlParam[':store_type'] = $this->storeType;
		$sqlParam[':region_id'] = $this->regionId;
		$sqlParam[':store_name'] = $this->storeName;
		$sqlParam[':store_number'] = $this->storeNumber;
		$sqlParam[':store_street_address'] = $this->storeStreetAddress;
		$sqlParam[':store_city'] = $this->storeCity;
		$sqlParam[':store_state'] = $this->storeState;
		$sqlParam[':store_postal_code'] = $this->storePostalCode;
		$sqlParam[':store_country'] = $this->storeCountry;
		$sqlParam[':store_manager'] = $this->storeManager;
		$sqlParam[':store_phone'] = $this->storePhone;
		$sqlParam[':store_fax'] = $this->storeFax;
		$sqlParam[':first_opened_date'] = $this->firstOpenedDate;
		$sqlParam[':last_remodel_date'] = $this->lastRemodelDate;
		$sqlParam[':store_sqft'] = $this->storeSqft;
		$sqlParam[':grocery_sqft'] = $this->grocerySqft;
		$sqlParam[':frozen_sqft'] = $this->frozenSqft;
		$sqlParam[':meat_sqft'] = $this->meatSqft;
		$sqlParam[':coffee_bar'] = $this->coffeeBar;
		$sqlParam[':video_store'] = $this->videoStore;
		$sqlParam[':salad_bar'] = $this->saladBar;
		$sqlParam[':prepared_food'] = $this->preparedFood;
		$sqlParam[':florist'] = $this->florist;

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
		$sqlParam[':store_id'] = $this->storeId;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				store
			WHERE
				store_id = :store_id
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