<?php

require_once 'src/Item.php';

define ('AGED_BRIE',      "Aged Brie");
define ('BACKSTAGE_PASS', "Backstage passes to a TAFKAL80ETC concert");
define ('SULFURAS',       "Sulfuras, Hand of Ragnaros");
define ('CONJURED',       "Conjured Mana Cake");

class ItemGildedRose extends Item {

	const MINIMUM_QUALITY = 0;
	const MAXIMUM_QUALITY = 50;

	public function is(
		$type
	) {
		return $this->getName() == $type;
	}

	public function decreaseQuality(
	) {
		$this->quality--;
		if ($this->quality < self::MINIMUM_QUALITY)
			$this->setMinimumQuality();
	}

	public function increaseQuality(
	) {
		$this->quality++;
		if ($this->quality > self::MAXIMUM_QUALITY)
			$this->setMaximumQuality();
	}

	public function decreaseSellIn(
	) {
		$this->sellIn--;
	}

	public function setMinimumQuality(
	) {
		$this->quality = self::MINIMUM_QUALITY;
	}

	public function setMaximumQuality(
	) {
		$this->quality = self::MAXIMUM_QUALITY;
	}

	public function isExpired(
	) {
		return $this->sellIn < 0;
	}

	public function isCloseToExpire(
	) {
		return $this->sellIn < 10;
	}

	public function isVeryCloseToExpire(
	) {
		return $this->sellIn < 5;
	}

}

?>
