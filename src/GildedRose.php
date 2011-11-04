<?php

require_once 'src/ItemGildedRose.php';
require_once 'src/ItemUpdater.php';
require_once 'src/AgedBrieUpdater.php';
require_once 'src/BackstagePassUpdater.php';
require_once 'src/ConjuredUpdater.php';
require_once 'src/SulfurasUpdater.php';

class GildedRose {

	public static function updateQuality(
		$items
	) {
		for ($i = 0; $i < count($items); $i++) {
			$item = new ItemGildedRose($items[$i]);

			if ($item->isAgedBrie()) {
				$updater = new AgedBrieUpdater();
			} else if ($item->isBackstagePass()) {
				$updater = new BackstagePassUpdater();
			} else if ($item->isSulfuras()) {
				$updater = new SulfurasUpdater();
			} else if ($item->isConjured()) {
				$updater = new ConjuredUpdater();
			} else {
				$updater = new ItemUpdater();
			}
			$updater->updateSellIn($item);
			$updater->updateQuality($item);
		}
	}
}

?>
