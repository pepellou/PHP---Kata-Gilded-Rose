<?php

require_once 'src/ItemGildedRose.php';
require_once 'src/ItemUpdater.php';
require_once 'src/AgedBrieUpdater.php';
require_once 'src/BackstagePassUpdater.php';
require_once 'src/ConjuredUpdater.php';
require_once 'src/SulfurasUpdater.php';

class GildedRose {

	private static function updateSellIn(
		$item
	) {
		if ($item->isAgedBrie()) {
			$updater = new AgedBrieUpdater();
			$updater->updateSellIn($item);
		} else if ($item->isBackstagePass()) {
			$updater = new BackstagePassUpdater();
			$updater->updateSellIn($item);
		} else if ($item->isSulfuras()) {
			$updater = new SulfurasUpdater();
			$updater->updateSellIn($item);
		} else if ($item->isConjured()) {
			$updater = new ConjuredUpdater();
			$updater->updateSellIn($item);
		} else {
			$updater = new ItemUpdater();
			$updater->updateSellIn($item);
		}
	}

	private static function updateQualityOfItem(
		$item
	) {
		if ($item->isAgedBrie()) {
			$updater = new AgedBrieUpdater();
			$updater->updateQuality($item);
		} else if ($item->isBackstagePass()) {
			$updater = new BackstagePassUpdater();
			$updater->updateQuality($item);
		} else if ($item->isSulfuras()) {
			$updater = new SulfurasUpdater();
			$updater->updateQuality($item);
		} else if ($item->isConjured()) {
			$updater = new ConjuredUpdater();
			$updater->updateQuality($item);
		} else {
			$updater = new ItemUpdater();
			$updater->updateQuality($item);
		}
	}

	public static function updateQuality(
		$items
	) {
		for ($i = 0; $i < count($items); $i++) {
			$item = new ItemGildedRose($items[$i]);

			self::updateSellIn($item);
			self::updateQualityOfItem($item);
		}
	}
}

?>
