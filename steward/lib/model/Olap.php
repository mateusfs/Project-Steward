<?php


class Olap extends Base {



	public static function countMesDespesa($mes) {

		$proximo = $mes+1;
		$sqlParam = array();
		$sqlParam[':DATA'] = date('Y').'-'.$mes.'-'.date('d');
		$sqlParam[':PROXIMO'] = date('Y').'-'.$proximo.'-'.date('d');
		$db = Database::getInstance();
		$sql = "SELECT count(exp_date) as data FROM expense_fact WHERE exp_date > :DATA AND exp_date < :PROXIMO " ;

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				return $result['data'];
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}


	public static function countMesTempo($mes) {

		$proximo = $mes+1;
		$sqlParam = array();
		$sqlParam[':DATA'] = date('Y').'-'.$mes.'-'.date('d');
		$sqlParam[':PROXIMO'] = date('Y').'-'.$proximo.'-'.date('d');
		$db = Database::getInstance();
		$sql = "SELECT count(the_date) as data FROM time_by_day WHERE the_date > :DATA AND the_date < :PROXIMO " ;

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				return $result['data'];
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}





}