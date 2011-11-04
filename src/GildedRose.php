<?php

require_once 'src/Item.php';

class GildedRose {

	public static function updateQuality(
		$items
	) {
		for ($i = 0; $i < count($items); $i++) {
			$item = $items[$i];
			if (("Aged Brie" != $item->getName()) && ("Backstage passes to a TAFKAL80ETC concert" != $item->getName())) {
				if ($item->getQuality() > 0) {
					if ("Sulfuras, Hand of Ragnaros" != $item->getName()) {
						$item->setQuality($item->getQuality() - 1);
					}
				}
			} else {
				if ($item->getQuality() < 50) {
					$item->setQuality($item->getQuality() + 1);
					if ("Backstage passes to a TAFKAL80ETC concert" == $item->getName()) {
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

			if ("Sulfuras, Hand of Ragnaros" != $item->getName()) {
				$item->setSellIn($item->getSellIn() - 1);
			}

			if ($item->getSellIn() < 0) {
				if ("Aged Brie" != $item->getName()) {
					if ("Backstage passes to a TAFKAL80ETC concert" != $item->getName()) {
						if ($item->getQuality() > 0) {
							if ("Sulfuras, Hand of Ragnaros" != $item->getName()) {
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
