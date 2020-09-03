<?php
namespace study_news\libs\pagination;

class Pagination {
	private $first_page = 1;
	private $last_page;
	private $curr_page;
	private $qty_items;
	private $display_by;

	public function __construct($curr_page, $qty_items, $display_by = 10) {
		$this->qty_items = $qty_items;
		$this->display_by = $display_by;
		$this->last_page = $this->set_last_page();
		$this->curr_page = $this->set_curr_page((int)$curr_page);
	}

	public function getView() {
		//echo $this->getUri();
		$view = [];
		$count = 3;
		if($this->last_page <= 1) {
			return false;
		}

		//формирование списка
		$coeff = floor($this->display_by/2);

		if(($this->curr_page > $coeff) && ($this->curr_page<$this->last_page-$coeff)) {
			$view[] = "<li class = 'page-item active'><a class='page-link' href='".$this->getUri()."page=$this->curr_page'>$this->curr_page</a></li>";
			for($i=1; $i<=$coeff; $i++) {
				$leftLi = "<li class = 'page-item'><a class='page-link' href='".$this->getUri()."page=".($this->curr_page-$i)."'>".($this->curr_page-$i)."</a></li>";
				$rightLi = "<li class = 'page-item'><a class='page-link' href='".$this->getUri()."page=".($this->curr_page+$i)."'>".($this->curr_page+$i)."</a></li>";
				array_unshift($view, $leftLi);
				array_push($view, $rightLi);
			}
		} else {
			if($this->curr_page<=$coeff) {
				for($i=1; $i<=$this->display_by; $i++){
					if($i>$this->last_page) break;
					$li = "<li class = 'page-item'><a class='page-link' href='".$this->getUri()."page=$i'>$i</a></li>";
					if($this->curr_page == $i) {
						$li = "<li class = 'page-item active'><a class='page-link' href='".$this->getUri()."page=$i'>$i</a></li>";
					}
					array_push($view, $li);
				} 
			} else {
				if($this->curr_page==$this->last_page && $this->curr_page<$this->display_by) {
					$this->display_by-=1;
				}
				for($i=0; $i<$this->display_by; $i++) {
					$li = "<li class = 'page-item'><a class='page-link' href='".$this->getUri()."page=".($this->last_page-$i)."'>".($this->last_page-$i)."</a></li>";
					if($this->curr_page == $this->last_page-$i) {
						$li = "<li class = 'page-item active'><a class='page-link' href='".$this->getUri()."page=".($this->last_page-$i)."'>".($this->last_page-$i)."</a></li>";
					}
					array_unshift($view, $li);
				}
			}
		}

		if($this->last_page>$count) {
			array_unshift($view, "<li class = 'page-item'><a class='page-link' href='".$this->getUri()."page=$this->first_page' aria-label='Previous'><span aria-hidden='true'>«</span></a></li>");
		}

		if($this->last_page>$count) {
			$view [] = "<li class = 'page-item'><a class='page-link' href='".$this->getUri()."page=$this->last_page' aria-label='Previous'><span aria-hidden='true'>»</span></a></li>";
		}
		return implode($view);
	}

	private function set_curr_page($num) {
		if(is_int($num) && $num>=1 && $num<=$this->last_page) {
			return $num;
		}
		return 1;
	}

	private function set_last_page() {
		return ceil($this->qty_items/$this->display_by);
	}

	private function getUri() {
		$requestUri = $_SERVER['REQUEST_URI'];
		$requestUri = preg_replace('#\?*&*page=[0-9]+#', "", $requestUri);
		return $requestUri .= (strripos($requestUri, "?") !== false) ? "&": "?";
	}
}
?>