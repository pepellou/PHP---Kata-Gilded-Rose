<?php

require_once 'src/ItemGildedRose.php';

class GildedRose {

	public static function updateQuality(
		$items
	) {
		for ($i = 0; $i < count($items); $i++) {
			$item = new ItemGildedRose($items[$i]);
			if (!$item->isAgedBrie() && !$item->isBackstagePass()) {
				if ($item->getQuality() > 0) {
					if (!$item->isSulfuras()) {
						$item->decreaseQuality();
						if ($item->isConjured())
							$item->decreaseQuality();
					}
				}
			} else {
				if ($item->getQuality() < 50) {
					$item->setQuality($item->getQuality() + 1);
					if ($item->isBackstagePass()) {
						if ($item->getSellIn() < 11) {
							if ($item->getQuality() < 50) {
								$item->increaseQuality();
							}
						}
						if ($item->getSellIn() < 6) {
							if ($item->getQuality() < 50) {
								$item->increaseQuality();
							}
						}
					}
				}
			}

			if (!$item->isSulfuras()) {
				$item->decreaseSellIn();
			}

			if ($item->getSellIn() < 0) {
				if (!$item->isAgedBrie()) {
					if (!$item->isBackstagePass()) {
						if ($item->getQuality() > 0) {
							if (!$item->isSulfuras()) {
								$item->decreaseQuality();
								if ($item->isConjured()) {
									$item->decreaseQuality();
								}
							}
						}
					} else {
						$item->setMinimumQuality();
					}
				} else {
					if ($item->getQuality() < 50) {
						$item->increaseQuality();
					}
				}
			}
		}
	}
}

?>
