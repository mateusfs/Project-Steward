<?php

/**
 * Classe Base da tabela [oso_slope_one]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo OsoSlopeOne
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseOsoSlopeOne extends Base {

	const TABLE_NAME = 'oso_slope_one';
	const ITEM_ID1 = 'item_id1';
	const ITEM_ID2 = 'item_id2';
	const TIMES = 'times';
	const RATING = 'rating';

	protected $itemId1;
	protected $itemId2;
	protected $times;
	protected $rating;



	/**
	 * @param int $itemId1
	 */
	public function setItemId1($itemId1) {
		$this->itemId1 = $itemId1;
	}

	/**
	 * @return int
	 */
	public function getItemId1() {
		return $this->itemId1;
	}

	/**
	 * @param int $itemId2
	 */
	public function setItemId2($itemId2) {
		$this->itemId2 = $itemId2;
	}

	/**
	 * @return int
	 */
	public function getItemId2() {
		return $this->itemId2;
	}

	/**
	 * @param int $times
	 */
	public function setTimes($times) {
		$this->times = $times;
	}

	/**
	 * @return int
	 */
	public function getTimes() {
		return $this->times;
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