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
					if ($item->isCloseToExpire()) {
						$item->increaseQuality();
					}
					if ($item->isVeryCloseToExpire()) {
						$item->increaseQuality();
					}
				}
			}

			if (!$item->isSulfuras()) {
				$item->decreaseSellIn();
			}

			if ($item->isExpired()) {
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
