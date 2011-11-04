<?php

require_once 'src/Item.php';

define ('AGED_BRIE',        "Aged Brie");
define ('BACKSTAGE_PASSES', "Backstage passes to a TAFKAL80ETC concert");
define ('SULFURAS',         "Sulfuras, Hand of Ragnaros");
define ('CONJURED',         "Conjured Mana Cake");

class ItemGildedRose extends Item {

	const MINIMUM_QUALITY = 0;
	const MAXIMUM_QUALITY = 50;


	public function isAgedBrie(
	) {
		return $this->getName() == AGED_BRIE;
	}

	public function isBackstagePass(
	) {
		return $this->getName() == BACKSTAGE_PASSES;
	}

	public function isSulfuras(
	) {
		return $this->getName() == SULFURAS;
	}

	public function isConjured(
	) {
		return $this->getName() == CONJURED;
	}

	public function decreaseQuality(
	) {
		$this->setQuality($this->getQuality() - 1);
		if ($this->getQuality() < self::MINIMUM_QUALITY)
			$this->setMinimumQuality();
	}

	public function increaseQuality(
	) {
		$this->setQuality($this->getQuality() + 1);
		if ($this->getQuality() > self::MAXIMUM_QUALITY)
			$this->setMaximumQuality();
	}

	public function decreaseSellIn(
	) {
		$this->setSellIn($this->getSellIn() - 1);
	}

	public function setMinimumQuality(
	) {
		$this->setQuality(self::MINIMUM_QUALITY);
	}

	public function setMaximumQuality(
	) {
		$this->setQuality(self::MAXIMUM_QUALITY);
	}

	public function isExpired(
	) {
		return $this->getSellIn() < 0;
	}

	public function isCloseToExpire(
	) {
		return $this->getSellIn() < 10;
	}

	public function isVeryCloseToExpire(
	) {
		return $this->getSellIn() < 5;
	}

}

?>
