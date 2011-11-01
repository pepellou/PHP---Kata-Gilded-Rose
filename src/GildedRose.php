<?php

require_once 'src/Item.php';

class GildedRose {

	public static function updateQuality(
		$items
	) {
		for ($i = 0; $i < count($items); $i++) {
			if (("Aged Brie" != $items[$i]->getName()) && ("Backstage passes to a TAFKAL80ETC concert" != $items[$i]->getName())) {
				if ($items[$i]->getQuality() > 0) {
					if ("Sulfuras, Hand of Ragnaros" != $items[$i]->getName()) {
						$items[$i]->setQuality($items[$i]->getQuality() - 1);
					}
				}
			} else {
				if ($items[$i]->getQuality() < 50) {
					$items[$i]->setQuality($items[$i]->getQuality() + 1);
					if ("Backstage passes to a TAFKAL80ETC concert" == $items[$i]->getName()) {
						if ($items[$i]->getSellIn() < 11) {
							if ($items[$i]->getQuality() < 50) {
								$items[$i]->setQuality($items[$i]->getQuality() + 1);
							}
						}
						if ($items[$i]->getSellIn() < 6) {
							if ($items[$i]->getQuality() < 50) {
								$items[$i]->setQuality($items[$i]->getQuality() + 1);
							}
						}
					}
				}
			}

			if ("Sulfuras, Hand of Ragnaros" != $items[$i]->getName()) {
				$items[$i]->setSellIn($items[$i]->getSellIn() - 1);
			}

			if ($items[$i]->getSellIn() < 0) {
				if ("Aged Brie" != $items[$i]->getName()) {
					if ("Backstage passes to a TAFKAL80ETC concert" != $items[$i]->getName()) {
						if ($items[$i]->getQuality() > 0) {
							if ("Sulfuras, Hand of Ragnaros" != $items[$i]->getName()) {
								$items[$i]->setQuality($items[$i]->getQuality() - 1);
							}
						}
					} else {
						$items[$i]->setQuality($items[$i]->getQuality() - $items[$i]->getQuality());
					}
				} else {
					if ($items[$i]->getQuality() < 50) {
						$items[$i]->setQuality($items[$i]->getQuality() + 1);
					}
				}
			}
		}
	}
}

?>
