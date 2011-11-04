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
		return $this->getName() == self::AGED_BRIE;
	}

	public function isBackstagePass(
	) {
		return $this->getName() == self::BACKSTAGE_PASSES;
	}

	public function isSulfuras(
	) {
		return $this->getName() == self::SULFURAS;
	}

	public function isConjured(
	) {
		return stripos($this->getName(), self::CONJURED) !== false;
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
