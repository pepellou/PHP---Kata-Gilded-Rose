<?php

require_once 'src/Item.php';

class ItemGildedRose {

	private $item;

	public function __construct(
		$item
	) {
		$this->item = $item;
	}

	public function getName(
	) {
		return $this->item->getName();
	}

	public function getQuality(
	) {
		return $this->item->getQuality();
	}

	public function getSellIn(
	) {
		return $this->item->getSellIn();
	}

	public function setQuality(
		$quality
	) {
		return $this->item->setQuality($quality);
	}

	public function setSellIn(
		$sellIn
	) {
		return $this->item->setSellIn($sellIn);
	}

}

?>
