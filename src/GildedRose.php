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
			$item = $items[$i];

			if ($item->is(AGED_BRIE)) {
				$updater = new AgedBrieUpdater();
			} else if ($item->is(BACKSTAGE_PASS)) {
				$updater = new BackstagePassUpdater();
			} else if ($item->is(SULFURAS)) {
				$updater = new SulfurasUpdater();
			} else if ($item->is(CONJURED)) {
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
