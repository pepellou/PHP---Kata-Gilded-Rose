<?php

require_once 'src/Item.php';

class ItemGildedRose {

	private $item;

	const MINIMUM_QUALITY = 0;
	const MAXIMUM_QUALITY = 50;

	const AGED_BRIE = "Aged Brie";
	const BACKSTAGE_PASSES = "Backstage passes to a TAFKAL80ETC concert";
	const SULFURAS = "Sulfuras, Hand of Ragnaros";
	const CONJURED = "Conjured";

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

	public function isConjured(
	) {
		$res = stripos($this->item->getName(), ItemGildedRose::CONJURED);
		if ($res === false) {
		        return false;
		} else {
		    return true;
		}
	}

	public function decreaseQuality(
	) {
		$this->item->setQuality($this->item->getQuality() - 1);
		if ($this->item->quality < ItemGildedRose::MINIMUM_QUALITY)
			$this->setMinimumQuality();
	}

	public function increaseQuality(
	) {
		$this->item->setQuality($this->item->getQuality() + 1);
		if ($this->item->quality > ItemGildedRose::MAXIMUM_QUALITY)
			$this->setMaximumQuality();
	}

	public function decreaseSellIn(
	) {
		$this->item->setSellIn($this->item->getSellIn() - 1);
	}

	public function setMinimumQuality(
	) {
		$this->item->setQuality(ItemGildedRose::MINIMUM_QUALITY);
	}

	public function setMaximumQuality(
	) {
		$this->item->setQuality(ItemGildedRose::MAXIMUM_QUALITY);
	}

	public function isExpired(
	) {
		return $this->item->getSellIn() < 0;
	}

	public function isCloseToExpire(
	) {
		return $this->item->getSellIn() < 10;
	}

	public function isVeryCloseToExpire(
	) {
		return $this->item->getSellIn() < 5;
	}

}

?>
