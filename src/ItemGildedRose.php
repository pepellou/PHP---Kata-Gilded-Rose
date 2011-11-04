<?php

require_once 'src/Item.php';
require_once 'src/ItemUpdater.php';
require_once 'src/AgedBrieUpdater.php';
require_once 'src/BackstagePassUpdater.php';
require_once 'src/ConjuredUpdater.php';
require_once 'src/SulfurasUpdater.php';

define ('MINIMUM_QUALITY', 0);
define ('MAXIMUM_QUALITY', 50);

define ('AGED_BRIE',      "Aged Brie");
define ('BACKSTAGE_PASS', "Backstage passes to a TAFKAL80ETC concert");
define ('SULFURAS',       "Sulfuras, Hand of Ragnaros");
define ('CONJURED',       "Conjured Mana Cake");

class ItemGildedRose extends Item {

	public function decreaseQuality(
	) {
		$this->quality--;
		if ($this->quality < MINIMUM_QUALITY)
			$this->setMinimumQuality();
	}

	public function increaseQuality(
	) {
		$this->quality++;
		if ($this->quality > MAXIMUM_QUALITY)
			$this->setMaximumQuality();
	}

	public function decreaseSellIn(
	) {
		$this->sellIn--;
	}

	public function setMinimumQuality(
	) {
		$this->quality = MINIMUM_QUALITY;
	}

	public function setMaximumQuality(
	) {
		$this->quality = MAXIMUM_QUALITY;
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

	public function getUpdater(
	) {
		$updaters = array(
			AGED_BRIE => new AgedBrieUpdater(),
			BACKSTAGE_PASS => new BackstagePassUpdater(),
			SULFURAS => new SulfurasUpdater(),
			CONJURED => new ConjuredUpdater()
		);
		return (array_key_exists($this->name, $updaters))
			? $updaters[$this->name]
			: new ItemUpdater();
	}

	public function updateSellIn(
	) {
		$this->getUpdater()->updateSellIn($this);
	}

	public function updateQuality(
	) {
		$this->getUpdater()->updateQuality($this);
	}

}

?>
