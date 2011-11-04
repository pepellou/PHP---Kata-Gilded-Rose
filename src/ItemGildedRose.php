<?php

require_once 'src/Item.php';

define ('MINIMUM_QUALITY', 0);
define ('MAXIMUM_QUALITY', 50);

define ('AGED_BRIE',      "Aged Brie");
define ('BACKSTAGE_PASS', "Backstage passes to a TAFKAL80ETC concert");
define ('SULFURAS',       "Sulfuras, Hand of Ragnaros");
define ('CONJURED',       "Conjured Mana Cake");

class ItemGildedRose {

	private $item;

	public function __construct(
		$item
	) {
		$this->item = $item;
	}

	protected function getName(
	) {
		return $this->item->getName();
	}

	protected function getQuality(
	) {
		return $this->item->getQuality();
	}

	protected function setQuality(
		$quality
	) {
		$this->item->setQuality($quality);
	}

	protected function getSellIn(
	) {
		return $this->item->getSellIn();
	}

	protected function setSellIn(
		$sellIn
	) {
		$this->item->setSellIn($sellIn);
	}

	public function decreaseQuality(
	) {
		$this->setQuality($this->getQuality() - 1);
		if ($this->getQuality() < MINIMUM_QUALITY)
			$this->setMinimumQuality();
	}

	public function increaseQuality(
	) {
		$this->setQuality($this->getQuality() + 1);
		if ($this->getQuality() > MAXIMUM_QUALITY)
			$this->setMaximumQuality();
	}

	public function decreaseSellIn(
	) {
		$this->setSellIn($this->getSellIn() - 1);
	}

	public function setMinimumQuality(
	) {
		$this->setQuality(MINIMUM_QUALITY);
	}

	public function setMaximumQuality(
	) {
		$this->setQuality(MAXIMUM_QUALITY);
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

	public function updateSellIn(
	) {
		$this->decreaseSellIn();
	}

	public function updateQuality(
	) {
		$this->decreaseQuality();
		if ($this->isExpired()) {
			$this->decreaseQuality();
		}
	}

}

?>
