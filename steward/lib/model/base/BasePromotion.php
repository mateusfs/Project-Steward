<?php

/**
 * Classe Base da tabela [promotion]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Promotion
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BasePromotion extends Base {

	const TABLE_NAME = 'promotion';
	const PROMOTION_ID = 'promotion_id';
	const PROMOTION_DISTRICT_ID = 'promotion_district_id';
	const PROMOTION_NAME = 'promotion_name';
	const MEDIA_TYPE = 'media_type';
	const COST = 'cost';
	const START_DATE = 'start_date';
	const END_DATE = 'end_date';

	protected $promotionId;
	protected $promotionDistrictId;
	protected $promotionName;
	protected $mediaType;
	protected $cost;
	protected $startDate;
	protected $endDate;



	/**
	 * @param int $promotionId
	 */
	public function setPromotionId($promotionId) {
		$this->promotionId = $promotionId;
	}

	/**
	 * @return int
	 */
	public function getPromotionId() {
		return $this->promotionId;
	}

	/**
	 * @param int $promotionDistrictId
	 */
	public function setPromotionDistrictId($promotionDistrictId) {
		$this->promotionDistrictId = $promotionDistrictId;
	}

	/**
	 * @return int
	 */
	public function getPromotionDistrictId() {
		return $this->promotionDistrictId;
	}

	/**
	 * @param varchar $promotionName
	 */
	public function setPromotionName($promotionName) {
		$this->promotionName = $promotionName;
	}

	/**
	 * @return varchar
	 */
	public function getPromotionName() {
		return $this->promotionName;
	}

	/**
	 * @param varchar $mediaType
	 */
	public function setMediaType($mediaType) {
		$this->mediaType = $mediaType;
	}

	/**
	 * @return varchar
	 */
	public function getMediaType() {
		return $this->mediaType;
	}

	/**
	 * @param decimal $cost
	 */
	public function setCost($cost) {
		$this->cost = $cost;
	}

	/**
	 * @return decimal
	 */
	public function getCost() {
		return $this->cost;
	}

	/**
	 * @param datetime $startDate
	 */
	public function setStartDate($startDate) {
		$this->startDate = $startDate;
	}

	/**
	 * @return datetime
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	/**
	 * @return date|time|null
	 */
	public function getStartDateFormatada($formato = 'd/m/Y') {
		if (!$this->getStartDate()) {
			return null;
		}
		return date($formato, strtotime($this->getStartDate()));
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
	 * @throws PDOException
	 * @return Promotion|null
	 */
	public static function retrieveByPk($promotionId, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':promotion_id'] = $promotionId;


		$db = Database::getInstance();
		$sql = "SELECT * FROM promotion WHERE promotion_id = :promotion_id " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Promotion();
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

		if ($this->promotionId  ) {

			 if($this->retrieveByPk($this->promotionId)){

			$sql = "
				UPDATE
					promotion
				SET
					promotion_id = :promotion_id
					, promotion_district_id = :promotion_district_id
					, promotion_name = :promotion_name
					, media_type = :media_type
					, cost = :cost
					, start_date = :start_date
					, end_date = :end_date
				WHERE
					promotion_id = :promotion_id
			";

			}
		} else {

			$sql = "
				INSERT INTO
					promotion
				(
					promotion_id
					, promotion_district_id
					, promotion_name
					, media_type
					, cost
					, start_date
					, end_date
				) VALUES (
					:promotion_id
					, :promotion_district_id
					, :promotion_name
					, :media_type
					, :cost
					, :start_date
					, :end_date
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':promotion_id'] = $this->promotionId;
		$sqlParam[':promotion_district_id'] = $this->promotionDistrictId;
		$sqlParam[':promotion_name'] = $this->promotionName;
		$sqlParam[':media_type'] = $this->mediaType;
		$sqlParam[':cost'] = $this->cost;
		$sqlParam[':start_date'] = $this->startDate;
		$sqlParam[':end_date'] = $this->endDate;

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
		$sqlParam[':promotion_id'] = $this->promotionId;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				promotion
			WHERE
				promotion_id = :promotion_id
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