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
						$item->setQuality($item->getQuality() - 1);
					}
				}
			} else {
				if ($item->getQuality() < 50) {
					$item->setQuality($item->getQuality() + 1);
					if ($item->isBackstagePass()) {
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

			if (!$item->isSulfuras()) {
				$item->setSellIn($item->getSellIn() - 1);
			}

			if ($item->getSellIn() < 0) {
				if (!$item->isAgedBrie()) {
					if (!$item->isBackstagePass()) {
						if ($item->getQuality() > 0) {
							if (!$item->isSulfuras()) {
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
