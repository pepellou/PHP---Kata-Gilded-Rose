<?php

require_once 'src/ItemGildedRose.php';

class GildedRose {

	private static function isAgedBrie(
		$item
	) {
		return "Aged Brie" == $item->getName();
	}

	private static function isBackstagePass(
		$item
	) {
		return "Backstage passes to a TAFKAL80ETC concert" == $item->getName();
	}

	private static function isSulfuras(
		$item
	) {
		return "Sulfuras, Hand of Ragnaros" == $item->getName();
	}

	public static function updateQuality(
		$items
	) {
		for ($i = 0; $i < count($items); $i++) {
			$item = new ItemGildedRose($items[$i]);
			if (!self::isAgedBrie($item) && !self::isBackstagePass($item)) {
				if ($item->getQuality() > 0) {
					if (!self::isSulfuras($item)) {
						$item->setQuality($item->getQuality() - 1);
					}
				}
			} else {
				if ($item->getQuality() < 50) {
					$item->setQuality($item->getQuality() + 1);
					if (self::isBackstagePass($item)) {
						if ($item->getSellIn() < 11) {
							if ($item->getQuality() < 50) {
								$item->setQuality($item->getQuality() + 1);
							}
						}
						if ($item->getSellIn() < 6) {
							if ($item->getQuality() < 50) {
								$item->setQuality($item->getQuality() + 1);
							}
						}
					}
				}
			}

			if (!self::isSulfuras($item)) {
				$item->setSellIn($item->getSellIn() - 1);
			}

			if ($item->getSellIn() < 0) {
				if (!self::isAgedBrie($item)) {
					if (!self::isBackstagePass($item)) {
						if ($item->getQuality() > 0) {
							if (!self::isSulfuras($item)) {
								$item->setQuality($item->getQuality() - 1);
							}
						}
					} else {
						$item->setQuality($item->getQuality() - $item->getQuality());
					}
				} else {
					if ($item->getQuality() < 50) {
						$item->setQuality($item->getQuality() + 1);
					}
				}
			}
		}
	}
}

?>
