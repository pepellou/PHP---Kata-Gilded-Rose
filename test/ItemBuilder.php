<?php

class ItemBuilder {

	var $name;
	var $sellIn;
	var $quality;

	private function __construct(
	) {
		$this->name = "Un item cualquiera";
		$this->sellIn = 10;
		$this->quality = 10;
	}

	public static function newItem(
	) {
		return new ItemBuilder();
	}

	public function withName(
		$name
	) {
		$this->name = $name;
		return $this;
	}

	public function withSellIn(
		$sellIn
	) {
		$this->sellIn = $sellIn;
		return $this;
	}

	public function withQuality(
		$quality
	) {
		$this->quality= $quality;
		return $this;
	}

	public function build(
	) {
		return new Item(
			$this->name,
			$this->sellIn,
			$this->quality
		);
	}

}

?>
