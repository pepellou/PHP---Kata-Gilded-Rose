<?php

require_once 'src/Item.php';

class ItemGildedRose {

	private $item;

	const AGED_BRIE = "Aged Brie";
	const BACKSTAGE_PASSES = "Backstage passes to a TAFKAL80ETC concert";
	const SULFURAS = "Sulfuras, Hand of Ragnaros";

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
		return $this->item->getName() == ItemGildedRose::AGED_BRIE;
	}

	public function isBackstagePass(
	) {
		return $this->item->getName() == ItemGildedRose::BACKSTAGE_PASSES;
	}

	public function isSulfuras(
	) {
		return $this->item->getName() == ItemGildedRose::SULFURAS;
	}

}

?>
