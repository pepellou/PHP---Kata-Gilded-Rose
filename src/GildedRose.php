<?php

require_once 'src/ItemGildedRose.php';

class GildedRose {

	public static function updateQuality(
		$items
	) {
		for ($i = 0; $i < count($items); $i++) {
			$item = new ItemGildedRose($items[$i]);
			if ($item->isAgedBrie() || $item->isBackstagePass()) {
				$item->increaseQuality();
				if ($item->isBackstagePass()) {
					if ($item->isCloseToExpire()) {
						$item->increaseQuality();
					}
					if ($item->isVeryCloseToExpire()) {
						$item->increaseQuality();
					}
				}
			} else {
				if (!$item->isSulfuras()) {
					$item->decreaseQuality();
					if ($item->isConjured())
						$item->decreaseQuality();
				}
			}

			if (!$item->isSulfuras()) {
				$item->decreaseSellIn();
			}

			if ($item->isExpired()) {
				if ($item->isAgedBrie()) {
					$item->increaseQuality();
				} else {
					if ($item->isBackstagePass()) {
						$item->setMinimumQuality();
					} else {
						if (!$item->isSulfuras()) {
							$item->decreaseQuality();
							if ($item->isConjured()) {
								$item->decreaseQuality();
							}
						}
					}
				}
			}
		}
	}
}

?>
