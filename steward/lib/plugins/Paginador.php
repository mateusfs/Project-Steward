<?php
class Paginador {

	/*
	 * Página atual
	 */
	private $current_page;

	/*
	 * Total de items
	 */
	private $total_items;

	/*
	 * Itens por página
	 */
	private $items_per_page;

	/*
	 * Total de páginas
	 */
	private $total_pages;

	/*
	 * Primeiro item da página atual
	 */
	private $current_first_item;

	/*
	 * Último item da página atual
	 */
	private $current_last_item;

	/*
	 * Página anterior
	 */
	private $previous_page;

	/*
	 * Próxima página
	 */
	private $next_page;

	/*
	 * Número da PRIMEIRA página ou FALSE se não for a primeira
	 */
	private $first_page;

	/*
	 * Número da ÚLTIMA página ou FALSE se não for a primeira
	 */
	private $last_page;

	private $limit;
	private $url;
	private $target;

	public function setUrl($url) {
		$this->url = $url;
	}

	public function setTarget($target) {
		$this->target = $target;
	}

	public function setCurrentPage($current_page) {
		$this->current_page = $current_page;
	}

	public function setTotalItems($total_items) {
		$this->total_items = $total_items;
	}

	public function setItemsPerPage($items_per_page) {
		$this->items_per_page = $items_per_page;
	}

	public function getItemsPerPage(){
		return $this->items_per_page;
	}

	public function __construct() {
		$this->current_page = 0;
		$this->total_items = 0;
		$this->items_per_page = 10;

		$this->url = "";
		$this->target = "";
	}

	public function getHtml() {

		if($this->total_items > 0){
			$this->total_pages          = (int) ceil($this->total_items / $this->items_per_page);
		}else{
			$this->total_pages = 0;
		}


		$this->previous_page        = ($this->current_page > 1) ? $this->current_page - 1 : FALSE;
		$this->next_page            = ($this->current_page < $this->total_pages) ? $this->current_page + 1 : FALSE;
		$this->last_page            = ($this->current_page >= $this->total_pages) ? FALSE : $this->total_pages;

		$conteudo = '<ul class="pagination">';

		if ($this->current_page != 1) {
			$conteudo .= '<li class="next" onclick="loadPage(\''.$this->url . (1).'\',\''. $this->target.'\' )" >&laquo;&laquo;</li>';
			$conteudo .= '<li class="next"  onclick="loadPage(\''.$this->url . ($this->current_page-1).'\',\''. $this->target.'\' )" >&laquo;</li>';
		} else {
			$conteudo .= '<li class="previous-off">&laquo;&laquo;</li>';
			$conteudo .= '<li class="previous-off">&laquo;</li>';
		}

		if ($this->total_pages > 5) {
			$mid_range = 3;

			$start_range = $this->current_page - floor ( $mid_range / 2 );
			$end_range = $this->current_page + floor ( $mid_range / 2 );

			if ($start_range <= 0) {
				$end_range += abs ( $start_range ) + 1;
				$start_range = 1;
			}
			if ($end_range > $this->total_pages) {
				$start_range -= $end_range - $this->total_pages;
				$end_range = $this->total_pages;
			}
			$range = range ( $start_range, $end_range );

			for($i = 1; $i <= $this->total_pages; $i ++) {
				if ($range [0] > 2 && $i == $range [0]) {
					$conteudo .= '<li class="next-off">...</li>';
				}

				if ($i == 1 || $i == $this->total_pages || in_array ( $i, $range )) {
					if ($this->current_page == $i) {
						$conteudo .= '<li class="next active">' . $i . '</li>';
					} else {
						$conteudo .= '<li class="next" onclick="loadPage(\''.$this->url . $i.'\',\''. $this->target.'\' )" >' . $i . '</li>';
					}
				}

				if ($range [$mid_range - 1] < $this->total_pages - 1 && $i == $range [$mid_range - 1]) {
					$conteudo .= '<li class="next-off">...</li>';
				}
			}

		} else {
			for($i = 1; $i <= $this->total_pages; $i ++) {
				if ($this->current_page == $i) {
					$conteudo .= '<li class="next active">' . $i . '</li>';
				} else {
					$conteudo .= '<li class="next" onclick="loadPage(\''.$this->url . $i.'\',\''. $this->target.'\' )" >' . $i . '</li>';
				}
			}
		}

		if ($this->last_page) {
			$conteudo .= '<li class="next" onclick="loadPage(\''.$this->url . ($this->current_page+1).'\',\''. $this->target.'\' )" > &raquo;</li>';
			$conteudo .= '<li class="next" onclick="loadPage(\''.$this->url . ($this->last_page).'\',\''. $this->target.'\' )">&raquo;&raquo;</li>';
		} else {
			$conteudo .= '<li class="next-off">&raquo;</li>';
			$conteudo .= '<li class="next-off">&raquo;&raquo;</li>';
		}

		$conteudo .= "</ul><div onclick='loadPage(\"http://www.google.com\",)";

		return $conteudo;
	}
}

?>