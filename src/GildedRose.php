<?php

require_once 'src/ItemGildedRose.php';
require_once 'src/AgedBrieItem.php';
require_once 'src/BackstagePassItem.php';
require_once 'src/ConjuredItem.php';
require_once 'src/SulfurasItem.php';

class GildedRose {

	private static function decorateItem(
		$item
	) {
		switch ($item->getName()) {
			case AGED_BRIE:
				return new AgedBrieItem($item);
			case BACKSTAGE_PASS:
				return new BackstagePassItem($item);
			case SULFURAS:
				return new SulfurasItem($item);
			case CONJURED:
				return new ConjuredItem($item);
		}
		return new ItemGildedRose($item);
	}

	public static function updateQuality(
		$items
	) {
		for ($i = 0; $i < count($items); $i++) {
			$item = self::decorateItem($items[$i]);
			$item->updateSellIn();
			$item->updateQuality();
		}
	}
}

?>
