<?php

/**
 * Classe Base da tabela [oso_user_ratings]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo OsoUserRatings
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseOsoUserRatings extends Base {

	const TABLE_NAME = 'oso_user_ratings';
	const USER_ID = 'user_id';
	const ITEM_ID = 'item_id';
	const RATING = 'rating';

	protected $userId;
	protected $itemId;
	protected $rating;



	/**
	 * @param int $userId
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * @return int
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * @param int $itemId
	 */
	public function setItemId($itemId) {
		$this->itemId = $itemId;
	}

	/**
	 * @return int
	 */
	public function getItemId() {
		return $this->itemId;
	}

	/**
	 * @param decimal $rating
	 */
	public function setRating($rating) {
		$this->rating = $rating;
	}

	/**
	 * @return decimal
	 */
	public function getRating() {
		return $this->rating;
	}
}