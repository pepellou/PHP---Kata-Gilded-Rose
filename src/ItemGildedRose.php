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

	public function isAgedBrie(
	) {
		return "Aged Brie" == $this->item->getName();
	}

	public function isBackstagePass(
	) {
		return "Backstage passes to a TAFKAL80ETC concert" == $this->item->getName();
	}

	public function isSulfuras(
	) {
		return "Sulfuras, Hand of Ragnaros" == $this->item->getName();
	}

}

?>
