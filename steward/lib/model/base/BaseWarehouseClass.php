<?php

/**
 * Classe Base da tabela [warehouse_class]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo WarehouseClass
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseWarehouseClass extends Base {

	const TABLE_NAME = 'warehouse_class';
	const WAREHOUSE_CLASS_ID = 'warehouse_class_id';
	const DESCRIPTION = 'description';

	protected $warehouseClassId;
	protected $description;



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
	 * @param varchar $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return varchar
	 */
	public function getDescription() {
		return $this->description;
	}
}