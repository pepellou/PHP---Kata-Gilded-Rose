<?php

require_once 'src/ItemGildedRose.php';

class GildedRose {

	public static function updateQuality(
		$items
	) {
		for ($i = 0; $i < count($items); $i++) {
			$item = new ItemGildedRose($items[$i]);
			if (!$item->isAgedBrie() && !$item->isBackstagePass()) {
				if (!$item->isSulfuras()) {
					$item->decreaseQuality();
					if ($item->isConjured())
						$item->decreaseQuality();
				}
			} else {
				$item->increaseQuality();
				if ($item->isBackstagePass()) {
					if ($item->getSellIn() < 11) {
						$item->increaseQuality();
					}
					if ($item->getSellIn() < 6) {
						$item->increaseQuality();
					}
				}
			}

			if (!$item->isSulfuras()) {
				$item->decreaseSellIn();
			}

			if ($item->getSellIn() < 0) {
				if (!$item->isAgedBrie()) {
					if (!$item->isBackstagePass()) {
						if (!$item->isSulfuras()) {
							$item->decreaseQuality();
							if ($item->isConjured()) {
								$item->decreaseQuality();
							}
						}
					} else {
						$item->setMinimumQuality();
					}
				} else {
					$item->increaseQuality();
				}
			}
		}
	}
}

?>
