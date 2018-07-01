<?php

/**
 * Classe Base da tabela [category]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Category
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseCategory extends Base {

	const TABLE_NAME = 'category';
	const CATEGORY_ID = 'category_id';
	const CATEGORY_PARENT = 'category_parent';
	const CATEGORY_DESCRIPTION = 'category_description';
	const CATEGORY_ROLLUP = 'category_rollup';

	protected $categoryId;
	protected $categoryParent;
	protected $categoryDescription;
	protected $categoryRollup;



	/**
	 * @param varchar $categoryId
	 */
	public function setCategoryId($categoryId) {
		$this->categoryId = $categoryId;
	}

	/**
	 * @return varchar
	 */
	public function getCategoryId() {
		return $this->categoryId;
	}

	/**
	 * @param varchar $categoryParent
	 */
	public function setCategoryParent($categoryParent) {
		$this->categoryParent = $categoryParent;
	}

	/**
	 * @return varchar
	 */
	public function getCategoryParent() {
		return $this->categoryParent;
	}

	/**
	 * @param varchar $categoryDescription
	 */
	public function setCategoryDescription($categoryDescription) {
		$this->categoryDescription = $categoryDescription;
	}

	/**
	 * @return varchar
	 */
	public function getCategoryDescription() {
		return $this->categoryDescription;
	}

	/**
	 * @param varchar $categoryRollup
	 */
	public function setCategoryRollup($categoryRollup) {
		$this->categoryRollup = $categoryRollup;
	}

	/**
	 * @return varchar
	 */
	public function getCategoryRollup() {
		return $this->categoryRollup;
	}

	/**
	 * @throws PDOException
	 * @return Category|null
	 */
	public static function retrieveByPk($categoryId, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':category_id'] = $categoryId;


		$db = Database::getInstance();
		$sql = "SELECT * FROM category WHERE category_id = :category_id " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Category();
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

		if ($this->categoryId  ) {

			 if($this->retrieveByPk($this->categoryId)){

			$sql = "
				UPDATE
					category
				SET
					category_id = :category_id
					, category_parent = :category_parent
					, category_description = :category_description
					, category_rollup = :category_rollup
				WHERE
					category_id = :category_id
			";

			}
		} else {

			$sql = "
				INSERT INTO
					category
				(
					category_id
					, category_parent
					, category_description
					, category_rollup
				) VALUES (
					:category_id
					, :category_parent
					, :category_description
					, :category_rollup
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':category_id'] = $this->categoryId;
		$sqlParam[':category_parent'] = $this->categoryParent;
		$sqlParam[':category_description'] = $this->categoryDescription;
		$sqlParam[':category_rollup'] = $this->categoryRollup;

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
		$sqlParam[':category_id'] = $this->categoryId;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				category
			WHERE
				category_id = :category_id
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