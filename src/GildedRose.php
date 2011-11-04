<?php

require_once 'src/ItemGildedRose.php';

class GildedRose {

	private static function updateSellIn(
		$item
	) {
		if (!$item->isSulfuras()) {
			$item->decreaseSellIn();
		}
	}

	private static function updateQualityOfItem(
		$item
	) {
		if ($item->isAgedBrie()) {
			$item->increaseQuality();
			if ($item->isExpired()) {
				$item->increaseQuality();
			}
		} else if ($item->isBackstagePass()) {
			$item->increaseQuality();
			if ($item->isCloseToExpire()) {
				$item->increaseQuality();
			}
			if ($item->isVeryCloseToExpire()) {
				$item->increaseQuality();
			}
			if ($item->isExpired()) {
				$item->setMinimumQuality();
			}
		} else if ($item->isSulfuras()) {
		} else if ($item->isConjured()) {
			$item->decreaseQuality();
			$item->decreaseQuality();
			if ($item->isExpired()) {
				$item->decreaseQuality();
				$item->decreaseQuality();
			}
		} else {
			$item->decreaseQuality();
			if ($item->isExpired()) {
				$item->decreaseQuality();
			}
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
