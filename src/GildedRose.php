<?php

require_once 'src/ItemGildedRose.php';

class GildedRose {

	public static function updateQuality(
		$items
	) {
		for ($i = 0; $i < count($items); $i++) {
			$item = $items[$i];
			$item->updateSellIn();
			$item->updateQuality();
		}
	}
}

?>
