<?php

/**
 * Classe Base da tabela [customer]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Customer
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseCustomer extends Base {

	const TABLE_NAME = 'customer';
	const CUSTOMER_ID = 'customer_id';
	const ACCOUNT_NUM = 'account_num';
	const LNAME = 'lname';
	const FNAME = 'fname';
	const MI = 'mi';
	const ADDRESS1 = 'address1';
	const ADDRESS2 = 'address2';
	const ADDRESS3 = 'address3';
	const ADDRESS4 = 'address4';
	const CITY = 'city';
	const STATE_PROVINCE = 'state_province';
	const POSTAL_CODE = 'postal_code';
	const COUNTRY = 'country';
	const CUSTOMER_REGION_ID = 'customer_region_id';
	const PHONE1 = 'phone1';
	const PHONE2 = 'phone2';
	const BIRTHDATE = 'birthdate';
	const MARITAL_STATUS = 'marital_status';
	const YEARLY_INCOME = 'yearly_income';
	const GENDER = 'gender';
	const TOTAL_CHILDREN = 'total_children';
	const NUM_CHILDREN_AT_HOME = 'num_children_at_home';
	const EDUCATION = 'education';
	const DATE_ACCNT_OPENED = 'date_accnt_opened';
	const MEMBER_CARD = 'member_card';
	const OCCUPATION = 'occupation';
	const HOUSEOWNER = 'houseowner';
	const NUM_CARS_OWNED = 'num_cars_owned';
	const FULLNAME = 'fullname';

	protected $customerId;
	protected $accountNum;
	protected $lname;
	protected $fname;
	protected $mi;
	protected $address1;
	protected $address2;
	protected $address3;
	protected $address4;
	protected $city;
	protected $stateProvince;
	protected $postalCode;
	protected $country;
	protected $customerRegionId;
	protected $phone1;
	protected $phone2;
	protected $birthdate;
	protected $maritalStatus;
	protected $yearlyIncome;
	protected $gender;
	protected $totalChildren;
	protected $numChildrenAtHome;
	protected $education;
	protected $dateAccntOpened;
	protected $memberCard;
	protected $occupation;
	protected $houseowner;
	protected $numCarsOwned;
	protected $fullname;



	/**
	 * @param int $customerId
	 */
	public function setCustomerId($customerId) {
		$this->customerId = $customerId;
	}

	/**
	 * @return int
	 */
	public function getCustomerId() {
		return $this->customerId;
	}

	/**
	 * @param bigint $accountNum
	 */
	public function setAccountNum($accountNum) {
		$this->accountNum = $accountNum;
	}

	/**
	 * @return bigint
	 */
	public function getAccountNum() {
		return $this->accountNum;
	}

	/**
	 * @param varchar $lname
	 */
	public function setLname($lname) {
		$this->lname = $lname;
	}

	/**
	 * @return varchar
	 */
	public function getLname() {
		return $this->lname;
	}

	/**
	 * @param varchar $fname
	 */
	public function setFname($fname) {
		$this->fname = $fname;
	}

	/**
	 * @return varchar
	 */
	public function getFname() {
		return $this->fname;
	}

	/**
	 * @param varchar $mi
	 */
	public function setMi($mi) {
		$this->mi = $mi;
	}

	/**
	 * @return varchar
	 */
	public function getMi() {
		return $this->mi;
	}

	/**
	 * @param varchar $address1
	 */
	public function setAddress1($address1) {
		$this->address1 = $address1;
	}

	/**
	 * @return varchar
	 */
	public function getAddress1() {
		return $this->address1;
	}

	/**
	 * @param varchar $address2
	 */
	public function setAddress2($address2) {
		$this->address2 = $address2;
	}

	/**
	 * @return varchar
	 */
	public function getAddress2() {
		return $this->address2;
	}

	/**
	 * @param varchar $address3
	 */
	public function setAddress3($address3) {
		$this->address3 = $address3;
	}

	/**
	 * @return varchar
	 */
	public function getAddress3() {
		return $this->address3;
	}

	/**
	 * @param varchar $address4
	 */
	public function setAddress4($address4) {
		$this->address4 = $address4;
	}

	/**
	 * @return varchar
	 */
	public function getAddress4() {
		return $this->address4;
	}

	/**
	 * @param varchar $city
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * @return varchar
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @param varchar $stateProvince
	 */
	public function setStateProvince($stateProvince) {
		$this->stateProvince = $stateProvince;
	}

	/**
	 * @return varchar
	 */
	public function getStateProvince() {
		return $this->stateProvince;
	}

	/**
	 * @param varchar $postalCode
	 */
	public function setPostalCode($postalCode) {
		$this->postalCode = $postalCode;
	}

	/**
	 * @return varchar
	 */
	public function getPostalCode() {
		return $this->postalCode;
	}

	/**
	 * @param varchar $country
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * @return varchar
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @param int $customerRegionId
	 */
	public function setCustomerRegionId($customerRegionId) {
		$this->customerRegionId = $customerRegionId;
	}

	/**
	 * @return int
	 */
	public function getCustomerRegionId() {
		return $this->customerRegionId;
	}

	/**
	 * @param varchar $phone1
	 */
	public function setPhone1($phone1) {
		$this->phone1 = $phone1;
	}

	/**
	 * @return varchar
	 */
	public function getPhone1() {
		return $this->phone1;
	}

	/**
	 * @param varchar $phone2
	 */
	public function setPhone2($phone2) {
		$this->phone2 = $phone2;
	}

	/**
	 * @return varchar
	 */
	public function getPhone2() {
		return $this->phone2;
	}

	/**
	 * @param date $birthdate
	 */
	public function setBirthdate($birthdate) {
		$this->birthdate = $birthdate;
	}

	/**
	 * @return date
	 */
	public function getBirthdate() {
		return $this->birthdate;
	}

	/**
	 * @return date|time|null
	 */
	public function getBirthdateFormatada($formato = 'd/m/Y') {
		if (!$this->getBirthdate()) {
			return null;
		}
		return date($formato, strtotime($this->getBirthdate()));
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
	 * @param varchar $yearlyIncome
	 */
	public function setYearlyIncome($yearlyIncome) {
		$this->yearlyIncome = $yearlyIncome;
	}

	/**
	 * @return varchar
	 */
	public function getYearlyIncome() {
		return $this->yearlyIncome;
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
	 * @param smallint $totalChildren
	 */
	public function setTotalChildren($totalChildren) {
		$this->totalChildren = $totalChildren;
	}

	/**
	 * @return smallint
	 */
	public function getTotalChildren() {
		return $this->totalChildren;
	}

	/**
	 * @param smallint $numChildrenAtHome
	 */
	public function setNumChildrenAtHome($numChildrenAtHome) {
		$this->numChildrenAtHome = $numChildrenAtHome;
	}

	/**
	 * @return smallint
	 */
	public function getNumChildrenAtHome() {
		return $this->numChildrenAtHome;
	}

	/**
	 * @param varchar $education
	 */
	public function setEducation($education) {
		$this->education = $education;
	}

	/**
	 * @return varchar
	 */
	public function getEducation() {
		return $this->education;
	}

	/**
	 * @param date $dateAccntOpened
	 */
	public function setDateAccntOpened($dateAccntOpened) {
		$this->dateAccntOpened = $dateAccntOpened;
	}

	/**
	 * @return date
	 */
	public function getDateAccntOpened() {
		return $this->dateAccntOpened;
	}

	/**
	 * @return date|time|null
	 */
	public function getDateAccntOpenedFormatada($formato = 'd/m/Y') {
		if (!$this->getDateAccntOpened()) {
			return null;
		}
		return date($formato, strtotime($this->getDateAccntOpened()));
	}

	/**
	 * @param varchar $memberCard
	 */
	public function setMemberCard($memberCard) {
		$this->memberCard = $memberCard;
	}

	/**
	 * @return varchar
	 */
	public function getMemberCard() {
		return $this->memberCard;
	}

	/**
	 * @param varchar $occupation
	 */
	public function setOccupation($occupation) {
		$this->occupation = $occupation;
	}

	/**
	 * @return varchar
	 */
	public function getOccupation() {
		return $this->occupation;
	}

	/**
	 * @param varchar $houseowner
	 */
	public function setHouseowner($houseowner) {
		$this->houseowner = $houseowner;
	}

	/**
	 * @return varchar
	 */
	public function getHouseowner() {
		return $this->houseowner;
	}

	/**
	 * @param int $numCarsOwned
	 */
	public function setNumCarsOwned($numCarsOwned) {
		$this->numCarsOwned = $numCarsOwned;
	}

	/**
	 * @return int
	 */
	public function getNumCarsOwned() {
		return $this->numCarsOwned;
	}

	/**
	 * @param varchar $fullname
	 */
	public function setFullname($fullname) {
		$this->fullname = $fullname;
	}

	/**
	 * @return varchar
	 */
	public function getFullname() {
		return $this->fullname;
	}

	/**
	 * @throws PDOException
	 * @return Customer|null
	 */
	public static function retrieveByPk($customerId, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':customer_id'] = $customerId;


		$db = Database::getInstance();
		$sql = "SELECT * FROM customer WHERE customer_id = :customer_id " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Customer();
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

		if ($this->customerId  ) {

			 if($this->retrieveByPk($this->customerId)){

			$sql = "
				UPDATE
					customer
				SET
					customer_id = :customer_id
					, account_num = :account_num
					, lname = :lname
					, fname = :fname
					, mi = :mi
					, address1 = :address1
					, address2 = :address2
					, address3 = :address3
					, address4 = :address4
					, city = :city
					, state_province = :state_province
					, postal_code = :postal_code
					, country = :country
					, customer_region_id = :customer_region_id
					, phone1 = :phone1
					, phone2 = :phone2
					, birthdate = :birthdate
					, marital_status = :marital_status
					, yearly_income = :yearly_income
					, gender = :gender
					, total_children = :total_children
					, num_children_at_home = :num_children_at_home
					, education = :education
					, date_accnt_opened = :date_accnt_opened
					, member_card = :member_card
					, occupation = :occupation
					, houseowner = :houseowner
					, num_cars_owned = :num_cars_owned
					, fullname = :fullname
				WHERE
					customer_id = :customer_id
			";

			}
		} else {

			$sql = "
				INSERT INTO
					customer
				(
					customer_id
					, account_num
					, lname
					, fname
					, mi
					, address1
					, address2
					, address3
					, address4
					, city
					, state_province
					, postal_code
					, country
					, customer_region_id
					, phone1
					, phone2
					, birthdate
					, marital_status
					, yearly_income
					, gender
					, total_children
					, num_children_at_home
					, education
					, date_accnt_opened
					, member_card
					, occupation
					, houseowner
					, num_cars_owned
					, fullname
				) VALUES (
					:customer_id
					, :account_num
					, :lname
					, :fname
					, :mi
					, :address1
					, :address2
					, :address3
					, :address4
					, :city
					, :state_province
					, :postal_code
					, :country
					, :customer_region_id
					, :phone1
					, :phone2
					, :birthdate
					, :marital_status
					, :yearly_income
					, :gender
					, :total_children
					, :num_children_at_home
					, :education
					, :date_accnt_opened
					, :member_card
					, :occupation
					, :houseowner
					, :num_cars_owned
					, :fullname
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':customer_id'] = $this->customerId;
		$sqlParam[':account_num'] = $this->accountNum;
		$sqlParam[':lname'] = $this->lname;
		$sqlParam[':fname'] = $this->fname;
		$sqlParam[':mi'] = $this->mi;
		$sqlParam[':address1'] = $this->address1;
		$sqlParam[':address2'] = $this->address2;
		$sqlParam[':address3'] = $this->address3;
		$sqlParam[':address4'] = $this->address4;
		$sqlParam[':city'] = $this->city;
		$sqlParam[':state_province'] = $this->stateProvince;
		$sqlParam[':postal_code'] = $this->postalCode;
		$sqlParam[':country'] = $this->country;
		$sqlParam[':customer_region_id'] = $this->customerRegionId;
		$sqlParam[':phone1'] = $this->phone1;
		$sqlParam[':phone2'] = $this->phone2;
		$sqlParam[':birthdate'] = $this->timeToDate($this->birthdate);
		$sqlParam[':marital_status'] = $this->maritalStatus;
		$sqlParam[':yearly_income'] = $this->yearlyIncome;
		$sqlParam[':gender'] = $this->gender;
		$sqlParam[':total_children'] = $this->totalChildren;
		$sqlParam[':num_children_at_home'] = $this->numChildrenAtHome;
		$sqlParam[':education'] = $this->education;
		$sqlParam[':date_accnt_opened'] = $this->timeToDate($this->dateAccntOpened);
		$sqlParam[':member_card'] = $this->memberCard;
		$sqlParam[':occupation'] = $this->occupation;
		$sqlParam[':houseowner'] = $this->houseowner;
		$sqlParam[':num_cars_owned'] = $this->numCarsOwned;
		$sqlParam[':fullname'] = $this->fullname;

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
		$sqlParam[':customer_id'] = $this->customerId;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				customer
			WHERE
				customer_id = :customer_id
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